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


  public function __construct()
  {
    parent::__construct();
  }

  public function findByObjectif($idobjectif){
    $this->db->where('idobjectif', $idobjectif);
    $query = $this->db->get('sport');
    return $query->result();
  }

  public function findAll(){
    $query = $this->db->get('sport');
    return $query->result();
  }


}

/* End of file Sport_model.php */
/* Location: ./application/models/Sport_model.php */