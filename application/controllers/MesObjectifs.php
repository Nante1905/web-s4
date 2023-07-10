<?php
defined('BASEPATH') or exit('No direct script access allowed');


/**
 *
 * Controller MesObjectifs
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

class MesObjectifs extends CI_Controller
{
  public $title;
    
  public function __construct()
  {
    parent::__construct();
    $this->title = "Mes Objectifs";
  }

  public function index()
  {
    $this->load->view("templates/body", [
      'metadata' => [
        'styles' => ['objectifs'],
        'script' => [],
        'title' => $this->title,
        'active' => 'Mes Objectifs'
      ],
      'page' => 'objectifs'
    ]);
  }

}


/* End of file MesObjectifs.php */
/* Location: ./application/controllers/MesObjectifs.php */