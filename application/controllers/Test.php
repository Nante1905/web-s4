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
    $this->load->model('regime_model');
    $this->load->model('utilisateur_model');
    $this->load->model('sport_model');
    $this->load->model('transaction_model');
  }

  public function index()
  {
    
  }

  public function test(){
    $user = new Utilisateur_model();
    $user->id= 1;
    $user->idobjectif = 1;
    $user->poidsobjectif = 20;

    $model= new Regime_model();
    $model->id = 2;
    $data = $user->idPorteMonaie();
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