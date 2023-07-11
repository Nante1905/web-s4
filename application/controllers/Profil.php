<?php
defined('BASEPATH') or exit('No direct script access allowed');


/**
 *
 * Controller Profile
 *
 * This controller for ...
 *
 * @package   CodeIgniter
 * @category  Controller CI
 * @author    Setiawan Jodi <jodisetiawan@fisip-untirta.ac.id>
 * @author    Raul Guerrero <r.g.c@me.com>
 * @link      https://github.com/setdjod/myci-extension/
 * @param     ...
 * @return    ...
 *
 */

class Profil extends CI_Controller
{
    
  public function __construct()
  {
    parent::__construct();
    $this->load->model('Utilisateur_model', 'user', true);
    $this->load->model('Code_model', 'code', true);
  
  }

  public function index()
  {
    $this->load->view('templates/body', [
      'metadata' => [
        'styles' => ['profil'],
        'script' => [],
        'title' => 'Profil',
        'active' => 'Profil'
      ],
      'page' => 'profil',
      'isGold' => $this->user->is_gold( $this->session->userid),
      'solde' => $this->user->getMontantPorteMonnaie(),
      'user' =>$this->user->getProfil(),
      'imc' => format_number( $this->user->IMC())
      // 'codes' => $this->code->findAll()
    ]);
  }

  public function ajoutSolde() {
    $this->load->view('templates/body', [
      'metadata' => [
        'styles' => ['ajoutsolde'],
        'script' => ['ajoutsolde'],
        'title' => 'Ajout solde',
        'active' => 'Profil'
      ],
      'page' => 'ajoutsolde',
      'isGold' => $this->user->is_gold( $this->session->userid),
      'codes' => $this->code->findAll()
    ]);
  }

  public function recharger() {
    $token = trim($this->input->post("code"));
    if($token == null) {
      echo json_encode([
        'OK' => false,
        'message' => "Code ne peut etre null"
      ]);
    } else {
      try {
        $res = $this->user->recharger($this->session->userid, $token);
        if($res == false) {
          echo json_encode([
            'OK' => false,
            'message' => "Code invalide ou indisponible"
          ]);  
        } else {
          echo json_encode([
            'OK' => true,
            'message' => "Requete prise en compte"
          ]);
        }
      } catch(Exception $e) {
        echo json_encode([
          'OK' => false,
          'message' => $e->getMessage()
        ]);
      }
    }
  }

  public function gold() {
    $this->load->model('Transaction_model', 'transaction', true);
    $this->load->view('templates/body', [
      'metadata' => [
        'styles' => ['gold'],
        'script' => ['gold'],
        'title' => 'Passez à gold',
        'active' => 'Profil'
      ],
      'page' => 'gold',
      'isGold' => $this->user->is_gold( $this->session->userid),
      'prix' => $this->transaction->getLastGold()
    ]);
  }
  public function toGold() {
    $idUtilisateur = $this->session->userid;
    try {
      if($this->user->transformToGold($idUtilisateur) == false) {
        echo json_encode(['OK' => false, 'msg' => 'Solde insuffisant']); 
      }
      else {
        echo json_encode(['OK' => true]);
      }
    } catch (\Throwable $th) {
      //throw $th;
      var_dump($th);
      echo json_encode(['OK' => false]);
    }
    // var_dump($this->user->transformToGold($idUtilisateur));
  }
}


/* End of file Profile.php */
/* Location: ./application/controllers/Profile.php */