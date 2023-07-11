<?php
defined('BASEPATH') or exit('No direct script access allowed');


/**
 *
 * Controller Regime
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

class Regime extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
    $this->load->model('Utilisateur_model', 'utilisateur', true);
    $this->load->model('Regime_model', 'regime', true);
  }

  public function index()
  {
    // 
  }

  public function insertView(){
    $this->load->view('templates/body', [
			'metadata' => [
				'styles' => [],
				'script' => [],
				'title' => 'Test template',
        'active' => 'Mes Objectifs'
			],
			'page' => 'regime'
		]);
  }

  public function accept($id)
  {
    // $montantActuel = $this->utilisateur->getMontantPorteMonnaie(null);
    // $montantRegime = $this->utilisateur-->getMontantRegime($id);
    // var_dump([$montantActuel, $montantRegime]);
    try {
      if($this->regime->accept($id)) {
        echo json_encode(['status' => 1]);
      }
      else {
        echo json_encode(['status' => -1, 'msg' => 'Votre solde est insuffisant.']);
      }
    } catch (\Throwable $th) {
      echo json_encode(['status' => -5, 'msg' => 'Erreur interne au serveur']);
    }
  }
}


/* End of file Regime.php */
/* Location: ./application/controllers/Regime.php */