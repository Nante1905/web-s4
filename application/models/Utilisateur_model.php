<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 *
 * Model Utilisateur_model
 *
 * This Model for ...
 * 
 * @package		CodeIgniter
 * @category	Model
 * @author    Setiawan Jodi <jodisetiawan@fisip-untirta.ac.id>
 * @link      https://github.com/setdjod/myci-extension/
 * @param     ...
 * @return    ...
 *
 */

class Utilisateur_model extends CI_Model {


  public function __construct()
  {
    parent::__construct();
    $this->load->model('regime_model','regime',true);
    $this->load->model('sport_model','sport',true);
  }

  public function transformToGold($idutilisateur){
    try {
      $this->load->model('Transaction_model', 'transaction', true);
      $volagold = $this->transaction->getLastGold();
      $portmonaie = $this->getMontantPorteMonnaie($idutilisateur);
      
      if ($portmonaie<$volagold){
        return false;
      }
      else {
        $this->db->trans_begin();
        $this->db->where('id', $idutilisateur);
        $this->db->update('utilisateur',["isgold" => 't']);
        $this->db->set('date_gold',"now() at time zone 'gmt-3'",false);
        $this->db->insert('utilisateur_gold',[
          "idutilisateur" => $idutilisateur
        ]);
        $this->db->set('dateachat',"now() at time zone 'gmt-3'",false);
        $this->db->insert('achat_utilisateur',[
          "idutilisateur" =>$idutilisateur,
          "montant" =>$volagold,
          "remise"=>0
        ]);
        $this->db->trans_commit();
        return true;
      }
    } catch (Exception $ex) {
      $this->db->trans_rollback();
      // echo $ex;
      throw $ex;
    }
  }

  public function is_gold($idutilisateur){
    $this->db->where('id',$idutilisateur);
    $query = $this->db->get('utilisateur');
    if ($query->result()[0]->isgold == "t") return true;
    return false;
  }

  public function IMC_ideal($idutilisateur){
    $this->db->where('id',$idutilisateur);
    $query = $this->db->get('utilisateur');
    $poids = $this->poidsIdeal($idutilisateur);
    $denom = $query->result()[0]->taille*0.01;
    return $poids/($denom*$denom);
  }

  public function poidsIdeal(){
    $idutilisateur = $this->session->userid;
    $this->db->where('id',$idutilisateur);
    $query = $this->db->get('utilisateur');
    $idgenre = $query->result()[0]->idgenre;
    $taille = $query->result()[0]->taille;
    if ($idgenre == 1) return $taille - 100 - (($taille - 150) / 4);
    else if ($idgenre == 2) return $taille - 100 - (($taille - 150) / 2.5);
  }


  public function IMC(){
    $idutilisateur = $this->session->userid;
    $this->db->where('id',$idutilisateur);
    $query = $this->db->get('utilisateur');
    $poids = $query->result()[0]->poids;
    $denom = $query->result()[0]->taille*0.01;
    return $poids/($denom*$denom);
  }


  public function inscription($nom, $email,$mdp,$idgenre,$poids, $taille){
    $this->db->set('dateinscription', "now() at time zone 'gmt-3'", false);
    $this->db->insert('utilisateur',[
      "nom" => $nom,
      "email" => $email,
      "password" => md5($mdp),
      "idgenre" => $idgenre,
      "poids" => $poids,
      "taille" => $taille
    ]);
  }

  public function checklogin($email, $mdp){
    $this->db->where(["email"=> trim($email), "password" => md5(trim(($mdp)))]);
    $query = $this->db->get('utilisateur');
    if (count($query->result())<=0) return false;
    else return $query->result()[0]->id;
  }

  public function getProfil() {
    $id = $this->session->userid;
    if($id == null) {
      throw new Exception("USer not connected", 1);
    }
    $this->db->where('id',$id);
    $query = $this->db->get('utilisateur');
    return $query->result()[0];
  }

  public function getMontantPorteMonnaie($id=null) {
    if($id == null) {
      $id = $this->session->userid;
    }
    $recharge = 0;
    $achat = 0;
    // $this->db->where('idutilisateur', $id);
    $query = $this->db->get_where('v_recharge_utilisateur', ['idutilisateur' => $id]);
    $queryAchat = $this->db->get_where('v_achat_total_utilisateur', ['idutilisateur' => $id]);

    if(count($query->result()) > 0) {
      $recharge = $query->result()[0]->montant;
    }
    if(count($queryAchat->result()) > 0) {
      $achat = $queryAchat->result()[0]->montant;
    }

    return $recharge-$achat;
  }

  public function recharger($idutilisateur, $code) {
    try {

      // code exist and dispo ?
      $idcode = $this->db->get_where('code', ['statut' => 1, 'token' => $code])->result();
      if(count($idcode) > 0) {
        $this->db->trans_begin();

        $this->db->set("daterecharge","now() at time zone 'gmt-3'",false);
  
        $this->db->set("statut",1,false);
        $this->db->insert('recharge_utilisateur',[
          'idutilisateur' => $idutilisateur,
          'idcode'=> $idcode[0]->id
        ]);

        $this->db->update('code', ['statut' => 10], ['id' => $idcode[0]->id]);

        $this->db->trans_commit();
        return true;
      } else {
        return false;
      }

    } catch (Exception $e) {
      $this->db->trans_rollback();
      echo $e;
      throw $e;
    }
  }

  public function buy($idutilisateur, $idregime, $montant) {

    $remise = 0;
    if($this->isGold($idutilisateur)) {
      $remise = $this->getLastRemise()->valeur;
    }

    $this->db->set('dateachat', "now() at time zone 'gmt-3'", false);
    $this->db->insert('achat_utilisateur', [
      'idutilisateur' => $idutilisateur,
      'montant' => $montant,
      'idregime' => $idregime,
      'remise' => $remise
    ]);
  }


  public function findTransaction($idutilisateur){
    $this->db->where(['v_utilisateur_transaction.idutilisateur' => $idutilisateur,'v_utilisateur_transaction.statut' => 10 ]);
    $query = $this->db->get('v_utilisateur_transaction');
    return $query->result();
  }

  public function getSuggestionSport($idutilisateur){
    $objectif = $this->getLastObjectif($idutilisateur);
    if($objectif != null) {
      $poidsobjectif = $this->getLastPoidsObjectif($idutilisateur);
      $idobjectif = $objectif->idobjectif;
      if($objectif->idobjectif == 3) {
        if($poidsobjectif > 0) {
          $idobjectif = 1;
        }
        else {
          $idobjectif = 2;
        }
      }
      $sports = $this->sport->findByObjectif($idobjectif);
      $result = array();
      foreach ($sports as $sport) {
        $data['sport']= $sport;
        $data['dureetotal']=ceil(abs($poidsobjectif)/$sport->apportjour);
        array_push($result, $data);
      }
      return $result;
    }
    return [];
  }

  public function getSuggestionRegime($idutilisateur){
    $objectif = $this->getLastObjectif($idutilisateur);
    if($objectif != null) {
      $poidsobjectif = $this->getLastPoidsObjectif($idutilisateur);
      $idobjectif = $objectif->idobjectif;
      if($objectif->idobjectif == 3) {
        if($poidsobjectif > 0) {
          $idobjectif = 1;
        }
        else {
          $idobjectif = 2;
        }
      }
      $regimes= $this->regime->findByObjectif($idobjectif);
      $result = array();
      foreach ($regimes as $regime){
          $data['regime']= $regime;
          $data['dureetotal']=ceil(abs($poidsobjectif)*($regime->duree/$regime->apport));
          $data['prixtotal']= ceil($regime->prix*( $data['dureetotal']/$regime->duree));
          array_push($result, $data);
      }
      return $result;
    }
    return [];
  }

  public function getLastRemise() {
    $res = $this->db->query("select * from remise where dateremise = (select max(dateremise) from remise)")->result();

    return $res[0];
  }

  public function getMontantRegime($idregime) {
    $regime = $this->regime->findById($idregime);
    if($regime == null) {
      return null;
    }
    $idutilisateur = $this->session->userid;

    $remise = 0;
    if($this->isGold($idutilisateur)) {
      $remise = $this->getLastRemise()->valeur;
    }

    $poidsobjectif = $this->getLastPoidsObjectif($idutilisateur);
    $duree = ceil($poidsobjectif*($regime->duree/$regime->apport));
    $montant = ceil($regime->prix*( $duree/$regime->duree));
    if($remise > 0) {
      $montant = $montant - $montant*$remise/100;
    }
    return $montant;
  }

  public function isGold($idutilisateur) {
    $res = $this->db->get_where('utilisateur_gold', ['idutilisateur' => $idutilisateur])->result();
    if(count($res) > 0) {
      return true;
    }
    else {
      return false;
    }
  }

  public function getLastPoidsObjectif($idutilisateur){
    $this->db->where('idutilisateur', $idutilisateur);
    $this->db->order_by('dateobjectif','DESC');
    $this->db->limit(1);
    $query = $this->db->get('utilisateur_objectif');
    if(count($query->result()) == 0) {
      return null;
    }
    return $query->result()[0]->poids;
  }

  public function getLastObjectif($idutilisateur){
    $this->db->where('idutilisateur', $idutilisateur);
    $this->db->order_by('dateobjectif','DESC');
    $this->db->limit(1);
    $this->db->join('objectif', 'idobjectif=id');
    $query = $this->db->get('utilisateur_objectif');
    if(count($query->result()) == 0) {
      return null;
    }
    return $query->result()[0];
  }

}

/* End of file Utilisateur_model.php */
/* Location: ./application/models/Utilisateur_model.php */