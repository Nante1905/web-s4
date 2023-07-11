<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 *
 * Model Code_model
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

class Code_model extends CI_Model {

  // ------------------------------------------------------------------------

  public function __construct()
  {
    parent::__construct();
  }

  // ------------------------------------------------------------------------

  public function findAll(){
    $query = $this->db->get('code');
    return $query->result();
  }

  public function validerRecharge($idcode) {
    try {
      $this->db->update('recharge_utilisateur', ['statut' => 10], ['idcode' => $idcode]);
    } catch(Exception $e) {
      throw $e;
    }
  }

  public function update($idcode, $token, $valeur){
    $this->db->where('id', $idcode);
    $this->db->update('code',['token' => $token, 'valeur' => $valeur]);
  }

  public function delete($id){
    $this->db->where('id',$id);
    $this->db->delete('code');
  }

  public function insert($token, $valeur){
    try {
      $this->db->set('statut',1,false);
      $this->db->insert('code',[
        "token" => $token,
        "valeur" => $valeur
      ]);
    } catch (Exception $ex) {
      echo $ex;
    }
  }

  // ------------------------------------------------------------------------
  public function index()
  {
    // 
  }

  // ------------------------------------------------------------------------

}

/* End of file Code_model.php */
/* Location: ./application/models/Code_model.php */