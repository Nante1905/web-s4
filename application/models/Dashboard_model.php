<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 *
 * Model Dashboard_model
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

class Dashboard_model extends CI_Model {

  // ------------------------------------------------------------------------

  public function __construct()
  {
    parent::__construct();
  }

  public function 

  public function getUsersPerMonth($annee, $mois){
      $sql= "SELECT * FROM nombre_utilisateurs_par_mois(%s, %s)";
      $sql = sprintf($sql,$this->db->escape($annee),$this->db->escape($mois));
      $query = $this->db->query($sql);
      return $query->result();
    
  }
  public function index()
  {
    // 
  }

  // ------------------------------------------------------------------------

}

/* End of file Dashboard_model.php */
/* Location: ./application/models/Dashboard_model.php */