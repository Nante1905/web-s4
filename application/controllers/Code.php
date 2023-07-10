<?php
defined('BASEPATH') or exit('No direct script access allowed');


/**
 *
 * Controller Code
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

class Code extends CI_Controller
{
    
  public function __construct()
  {
    parent::__construct();
  }

  public function ajouterView(){
    $this->load->view('templates/body', [
			'metadata' => [
				'styles' => [],
				'script' => [],
				'title' => 'Test template'
			],
			'page' => 'code'
		]);
  }

  public function modifier(){
    
  }
  
  public function delete(){

  }

  public function index()
  {
    // 
  }

}


/* End of file Code.php */
/* Location: ./application/controllers/Code.php */