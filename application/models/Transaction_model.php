<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 *
 * Model Transaction_model
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

class Transaction_model extends CI_Model {


  public function __construct()
  {
    parent::__construct();
  }

  public function getLastGold() {
    $this->db->order_by('date','DESC');
    $this->db->limit(1);
    $query = $this->db->get('prix_gold');
    if(count($query->result()) == 0) {
      return null;
    }
    return $query->result()[0]->montant;
  }

}

/* End of file Transaction_model.php */
/* Location: ./application/models/Transaction_model.php */