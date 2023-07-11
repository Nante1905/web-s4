<?php
defined('BASEPATH') or exit('No direct script access allowed');


/**
 *
 * Controller Admin
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

class Admin extends CI_Controller
{
    
  public function __construct()
  {
    parent::__construct();
  }

  public function index()
  {
    // 
  }

  public function login()
  {
    $this->load->view("pages/login-admin");
  }

  public function seconnecter() {

    $id = trim($this->input->post("id"));
    $pass = trim($this->input->post("mdp"));

    if($id == "admin" && $pass == "admin") {
      $this->session->set_userdata('adminid', -1);
      redirect("dashboard");
    }
  }

  public function deconnexion() {
    $this->session->unset_userdata('adminid');
    redirect("admin/login");
  }
}


/* End of file Admin.php */
/* Location: ./application/controllers/Admin.php */