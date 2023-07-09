<?php
defined('BASEPATH') or exit('No direct script access allowed');


/**
 *
 * Controller SessionSecure
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

class SessionSecure extends CI_Controller
{
    
  public function __construct()
  {
    parent::__construct();
    if( $this->session->has_userdata('userid') == false ) {
      redirect('welcome');
    }
  }

  public function index()
  {
    // 
  }

}


/* End of file SessionSecure.php */
/* Location: ./application/controllers/SessionSecure.php */