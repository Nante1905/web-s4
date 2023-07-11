<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 *
 * Model Regime_model
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

class Regime_model extends CI_Model {
    public $id;
    public $nom;
    public $prix;
    public $apport;
    public $duree;
    public $idobjectif;  //1 +, 2 -
  // ------------------------------------------------------------------------

  public function __construct()
  {
    parent::__construct();
  }

  public function upload_img($input_name){
    if(!empty($_FILES[$input_name]['name'])){
      $config['upload_path']= './assets/img';
      $config['allowed_types']='gif|jpg|png|jpeg';
      $config['max_size']= 1000;
      $config['max_width'] = 1024;
      $config['max_height']= 2048;
      $extensions= explode('.', $_FILES[$input_name]['name']);
      $config['file_name']= $this->getNextId().'.'.end($extensions);

      $this->load->library('upload',$config);
      if($this->upload->do_upload($input_name)){
          $upload = $this->upload->data();
          // var_dump($upload);
          return $upload['file_name'];
      }else{
        $error = array('error' => $this->upload->display_errors());
        var_dump($error);
        return -1;
      }
    }
    return NULL;
  }

  public function insertRegime($nom, $prix, $apport, $duree, $photo, $idobjectif){
    $this->db->insert('regime',[
      "nom" => $nom,
      "prix" => $prix,
      "apport" => $apport,
      "duree" => $duree,
      "photo" =>$photo,
      "idobjectif" => $idobjectif
    ]);

    $plats = $this->getAllPlat();
    $data = [];
    foreach($plats as $plat) {
      $this->db->insert('regime_plat', [
        "idregime" => $this->getNextId() - 1,
        "idplat" => $plat->id,
        "pourcentage" => 30
      ]);
    }
  }

  public function getNextId(){
    $this->db->order_by('id', 'DESC');
    $this->db->limit(1);
    $query = $this->db->get('regime');
    return $query->result()[0]->id+1;
  }

  public function getAllPlat() {
    $query = $this->db->get('plat');
    return $query->result();
  }


  public function findAllPlats($id){
    $this->db->where('v_regime_plat.iregime',$id);
    $query= $this->db->get('v_regime_plat');
    return $query->result();
  }

  public function findByObjectif($idobjectif){
    $this->db->where('idobjectif', $idobjectif);
    $query = $this->db->get('regime');
    return $query->result();
  }

  public function findAll(){
    $query = $this->db->get('regime');
    return $query->result();
  }

  public function findById($id) {
    $this->db->where('id', $id);
    $query = $this->db->get('regime');
    if(count($query->result()) == 0) {
      return null;
    }
    return $query->result()[0];
  }

  public function accept($id) {
    $idutilisateur = $this->session->userid;
    $montantActuel = $this->utilisateur->getMontantPorteMonnaie($idutilisateur);
    $montantRegime = $this->utilisateur->getMontantRegime($id);
    if($montantActuel >= $montantRegime) {
      $this->utilisateur->buy($idutilisateur, $id, $montantRegime);
      return true;
    }
    else {
      return false;
    }
  }

  

}

/* End of file Regime_model.php */
/* Location: ./application/models/Regime_model.php */