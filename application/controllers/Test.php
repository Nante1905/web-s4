<?php
defined('BASEPATH') or exit('No direct script access allowed');


/**
 *
 * Controller Test
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
require_once APPPATH.'controllers/SessionSecure.php';
class Test extends CI_Controller 
{
    
  public function __construct()
  {
    parent::__construct();
    $this->load->model('regime_model','regime',true);
    $this->load->model('utilisateur_model','utilisateur',true);
    $this->load->model('sport_model','sport',true);
    $this->load->model('transaction_model','transaction',true);
    $this->load->model('dashboard_model','board',true);
    $this->load->model('code_model','code',true);
  }

  public function index()
  {
    
  }

  public function test(){
    $data = $this->regime->insertRegime('regime draconien',12333,12,21,'regime.png',1);
    $this->load->view('templates/body', [
			'metadata' => [
				'styles' => [],
				'script' => [],
				'title' => 'Test template',
        'active' => 'Mes Objectifs'
			],
			'page' => 'test',
			'test' => $data
		]);
  }

  public function pdf() {
    $this->load->library('Pdf', null, 'pdf');
    $html = $this->load->view('pages/testpdf', [], true);
    // var_dump($html);
    $this->pdf->createPDF($html);
  }
  public function login() {
    $this->session->set_userdata('userid', 2);
  }

  public function profil() {
    var_dump($this->utilisateur->getMontantPorteMonnaie(null));
  }

}


/* End of file Test.php */
/* Location: ./application/controllers/Test.php */