<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 *
 * Model Objectif_model
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

class Objectif_model extends CI_Model {

  // ------------------------------------------------------------------------

  public function __construct()
  {
    parent::__construct();
  }

  // ------------------------------------------------------------------------


  public function insert($iduser, $typeObjectif, $poids) {
    try {
      $this->db->set("dateobjectif", "now()", false);
      $this->db->insert('utilisateur_objectif', [
        'idutilisateur' => $iduser,
        'idobjectif' => $typeObjectif,
        'poids' => $poids,
      ]);
    } catch(Exception $e) {
      echo $e;
    }
  }

  public function findAll() {
    try {
      return $this->db->get('objectif')->result();
    } catch(Exception $e) {
      throw $e;
    }
  }

  // ------------------------------------------------------------------------

}

/* End of file Objectif_model.php */
/* Location: ./application/models/Objectif_model.php */