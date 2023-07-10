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



  public function insererTransaction($idutilisateur, $idcode, $valeur){
    try {
      $this->db->set("datetransaction","now()",false);
      $this->db->set("statut",1,false);
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
        $data['dureetotal']=$poidsobjectif*($regime->duree/$regime->apport);
        $data['prixtotal']= $regime->prix*( $data['dureetotal']/$regime->duree);
        array_push($result, $data);
    }
    return $result;
  }

  public function getLastPoidsObjectif($idutilisateur){
    $this->db->where('idutilisateur', $idutilisateur);
    $this->db->order_by('dateobjectif','DESC');
    $this->db->limit(1);
    $query = $this->db->get('utilisateur_objectif');
    return $query->result()[0]->poids;
  }

  public function getLastObjectif($idutilisateur){
    $this->db->where('idutilisateur', $idutilisateur);
    $this->db->order_by('dateobjectif','DESC');
    $this->db->limit(1);
    $query = $this->db->get('utilisateur_objectif');
    return $query->result()[0]->idobjectif;
  }

}

/* End of file Utilisateur_model.php */
/* Location: ./application/models/Utilisateur_model.php */