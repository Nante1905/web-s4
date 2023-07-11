<?php
defined('BASEPATH') or exit('No direct script access allowed');


/**
 *
 * Controller Profile
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

class Profil extends CI_Controller
{
    
  public function __construct()
  {
    parent::__construct();
    $this->load->model('Utilisateur_model', 'user', true);
  }

  public function index()
  {
    $this->load->view('templates/body', [
      'metadata' => [
        'styles' => ['profil'],
        'script' => [],
        'title' => 'Profil',
        'active' => 'Profil'
      ],
      'page' => 'profil',
      'solde' => $this->user->getMontantPorteMonnaie()
    ]);
  }

  public function ajoutSolde() {
    $this->load->view('templates/body', [
      'metadata' => [
        'styles' => ['ajoutsolde'],
        'script' => [],
        'title' => 'Ajout solde',
        'active' => 'Profil'
      ],
      'page' => 'ajoutsolde'
    ]);
  }
}


/* End of file Profile.php */
/* Location: ./application/controllers/Profile.php */