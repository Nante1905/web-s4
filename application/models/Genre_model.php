<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 *
 * Model Genre_model
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

class Genre_model extends CI_Model {

  // ------------------------------------------------------------------------

  public function __construct()
  {
    parent::__construct();
  }

  // ------------------------------------------------------------------------


  // ------------------------------------------------------------------------
  public function findAll() {
    return $this->db->get('genre')->result();
  }

  // ------------------------------------------------------------------------

}

/* End of file Genre_model.php */
/* Location: ./application/models/Genre_model.php */