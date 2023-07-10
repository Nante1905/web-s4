<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 *
 * Model Sport_model
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

class Sport_model extends CI_Model {

  public $id;
  public $nom;
  public $apportjour;
  public $idobjectif;
  // ------------------------------------------------------------------------

  public function __construct()
  {
    parent::__construct();
  }

  public function findByObjectif($idobjectif){
    $this->db->where('idobjectif', $idobjectif);
    $query = $this->db->get('sport');
    $result = array();
    foreach ($query->result() as $row) {
      $model = new Sport_model();
      $model->id = $row->id;
      $model->nom = $row->nom;
      $model->apportjour = $row->apportjour;
      $model->idobjectif = $row->idobjectif;
      array_push($result,$model);
    }
    return $result;
  }

  public function findAll(){
    $query = $this->db->get('sport');
    $result = array();
    foreach ($query->result() as $row) {
      $model = new Sport_model();
      $model->id = $row->id;
      $model->nom = $row->nom;
      $model->apportjour = $row->apportjour;
      $model->idobjectif = $row->idobjectif;
      array_push($result,$model);
    }
    return $result;
  }

  // ------------------------------------------------------------------------


  // ------------------------------------------------------------------------

  // ------------------------------------------------------------------------

}

/* End of file Sport_model.php */
/* Location: ./application/models/Sport_model.php */