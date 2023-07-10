<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 *
 * Model RegimeTmp_model
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

class RegimeTmp_model extends CI_Model {

  // ------------------------------------------------------------------------

  public function __construct()
  {
    parent::__construct();
  }

  // ------------------------------------------------------------------------


  // ------------------------------------------------------------------------
  public function index()
  {
    // 
  }

  public function getDetailsById($id) {
    $this->db->where(['iregime' => $id]);
    $query = $this->db->get('v_regime_plat');
    return $query->result();
  }

  // ------------------------------------------------------------------------

}

/* End of file RegimeTmp_model.php */
/* Location: ./application/models/RegimeTmp_model.php */