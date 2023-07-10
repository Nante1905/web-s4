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

}

/* End of file Regime_model.php */
/* Location: ./application/models/Regime_model.php */