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


  public function inscription($nom, $email,$mdp,$idgenre,$poids, $taille){
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
    else return true;
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

  public function getMontantPorteMonnaie($id) {
    if($id == null) {
      $id = $this->session->userid;
    }
    $this->db->where('idutilisateur', $id);
    $query = $this->db->get('v_montant_utilisateur');
    if(count($query->result()) == 0) {
      return 0;
    }
    return $query->result()[0]->montant;
  }

  public function insererTransaction($idutilisateur, $idcode, $valeur){
    try {
      $this->db->set("datetransaction","now() at time zone 'gmt-3'",false);
      $this->db->set("statut",10,false);
      $this->db->insert('transaction_utilisateur',[
        'idutilisateur' => $idutilisateur,
        'idcode'=> $idcode,
        'valeur'=> $valeur
      ]);
    } catch (Exception $e) {
      echo $e;
    }
  }


  public function findTransaction($idutilisateur){
    $this->db->where(['v_utilisateur_transaction.idutilisateur' => $idutilisateur,'v_utilisateur_transaction.statut' => 10 ]);
    $query = $this->db->get('v_utilisateur_transaction');
    return $query->result();
  }

  public function getSuggestionSport($idutilisateur){
    $idobjectif = $this->getLastObjectif($idutilisateur);
    $poidsobjectif = $this->getLastPoidsObjectif($idutilisateur);
    $sports = $this->sport->findByObjectif($idobjectif);
    $result = array();
    foreach ($sports as $sport) {
      $data['sport']= $sport;
      $data['dureetotal']=$poidsobjectif/$sport->apportjour;
      array_push($result, $data);
    }
    return $result;
  }

  public function getSuggestionRegime($idutilisateur){
    $idobjectif = $this->getLastObjectif($idutilisateur);
    $poidsobjectif = $this->getLastPoidsObjectif($idutilisateur);
    $regimes= $this->regime->findByObjectif($idobjectif);
    $result = array();
    foreach ($regimes as $regime){
        $data['regime']= $regime;
        $data['dureetotal']=ceil($poidsobjectif*($regime->duree/$regime->apport));
        $data['prixtotal']= ceil($regime->prix*( $data['dureetotal']/$regime->duree));
        array_push($result, $data);
    }
    return $result;
  }

  public function getMontantRegime($idregime) {
    $regime = $this->regime->findById($idregime);
    if($regime == null) {
      return null;
    }
    $idutilisateur = $this->session->userid;
    $poidsobjectif = $this->getLastPoidsObjectif($idutilisateur);
    $duree = ceil($poidsobjectif*($regime->duree/$regime->apport));
    $montant = ceil($regime->prix*( $duree/$regime->duree));
    return $montant;
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
    $query = $this->db->get('utilisateur_objectif');
    if(count($query->result()) == 0) {
      return null;
    }
    return $query->result()[0]->idobjectif;
  }

}

/* End of file Utilisateur_model.php */
/* Location: ./application/models/Utilisateur_model.php */