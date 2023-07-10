<?php
defined('BASEPATH') or exit('No direct script access allowed');

require_once APPPATH.'controllers/SessionSecure.php';

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
    $this->load->model('Objectif_model', 'objectif', true);
  }

  public function index()
  {

    $objectifs = $this->objectif->findAll();

    $this->load->view("templates/body", [
      'metadata' => [
        'styles' => ['objectifs'],
        'script' => ['objectifs'],
        'title' => $this->title,
        'active' => 'Mes Objectifs'
      ],
      'page' => 'objectifs',
      'objectifs' => $objectifs
    ]);
  }

  public function submit() {
    $idobjectif = $this->input->post("idobjectif");
    $poids = $this->input->post("poids");
    $userid = $this->session->userid;

    try {
      $this->objectif->insert($userid, $idobjectif, $poids);
      echo json_encode(['OK' => true]);
    } catch(Exception $e) {
      echo json_encode(['OK' => false]);
    }
  }

}


/* End of file MesObjectifs.php */
/* Location: ./application/controllers/MesObjectifs.php */