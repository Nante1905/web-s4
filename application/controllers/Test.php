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
  }

  public function index()
  {
    
  }

  public function test(){
    $data = $this->board->getClassementRegime(2023,7);
    $this->load->view('templates/body', [
			'metadata' => [
				'styles' => [],
				'script' => [],
				'title' => 'Test template'
			],
			'page' => 'test',
			'test' => $data
		]);
  }

}


/* End of file Test.php */
/* Location: ./application/controllers/Test.php */