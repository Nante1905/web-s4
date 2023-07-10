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

  public $id;
  public $nom;
  public $email;
  public $idgenre;
  public $poids;
  public $taille;
  public $idobjectif;
  public $poidsobjectif;
  // ------------------------------------------------------------------------

  public function __construct()
  {
    parent::__construct();
    $this->load->model('regime_model','regime',true);
    $this->load->model('sport_model','sport',true);
  }

  // public function insererTransaction(){
  //   $sql = "INSERT INTO transaction_utilisateur values()"
  // }

  public function idPorteMonaie(){
    $this->db->where('idutilisateur',$this->id);
    $query= $this->db->get('portemonaie');
    return $query->result()[0]->id;
  }

  public function findTransaction(){
    $this->db->where('v_utilisateur_transaction.idutilisateur',$this->id);
    $this->db->where('v_utilisateur_transaction.statut',10); // le statut est validé
    $query = $this->db->get('v_utilisateur_transaction');
    $result = array();
    foreach ($query->result() as $row) {
      $model = new Transaction_model();
      $model->id = $row->id;;
      $model->idcode = $row->idcode;
      $model->valeur = $row->valeur;
      $model->datetransaction = $row->datetransaction;
      $model->statut = $row->statut;
      array_push($result,$model);
    }
    return $result;
  }

  public function getSuggestionSport($idutilisateur){
    $idobjectif = $this->getLastObjectif($idutilisateur);
    $poidsobjectif = $this->getLastPoidsObjectif($idutilisateur);
    $sports = $this->regime->findByObjectif($idobjectif);
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