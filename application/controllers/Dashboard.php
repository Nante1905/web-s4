<?php
defined('BASEPATH') or exit('No direct script access allowed');


/**
 *
 * Controller Dashboard
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

class Dashboard extends CI_Controller
{
    
  public function __construct()
  {
    parent::__construct();
    $this->load->model('Dashboard_model', 'dashboard', true);
  }

  public function index()
  {
    $mois = array("Janvier","Février","Mars","Avril","Mai","Juin","Juillet","Août","Septembre","Octobre","Novembre","Decembre");
    
    $this->load->view('templates/body', [
			'metadata' => [
				'styles' => ['dashboard'],
				'script' => ['dashboard'],
				'title' => 'Dashboard',
        'active' => '',
        'sidebar' => true
			],
			'page' => 'dashboard',
      'mois' => $mois,
      'annee' => date("Y")
		]);
  }

  public function statistics() {
    $mois = $this->input->post('mois');
    $annee = $this->input->post('annee');
    if(!isset($mois, $annee)) {
      $mois = date('m');
      $annee = date('Y');
    }
    $nbrUtilisateur = $this->dashboard->getUsersPerMonth($annee, $mois);
    $regime = $this->dashboard->getClassementRegime($annee, $mois);
    $recharge = $this->dashboard->getStatRecharge($annee, $mois);
    $vente = $this->dashboard->getStatAchat($annee, $mois);
    echo json_encode([
      'utilisateurs' => $nbrUtilisateur,
      'classement' => $regime,
      'recharge' => $recharge,
      'vente' => $vente
    ]);
  }

}


/* End of file Dashboard.php */
/* Location: ./application/controllers/Dashboard.php */