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
class Test extends SessionSecure
{
    
  public function __construct()
  {
    parent::__construct();
  }

  public function index()
  {
    // 
  }

}


/* End of file Test.php */
/* Location: ./application/controllers/Test.php */