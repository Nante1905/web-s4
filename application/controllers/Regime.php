<?php
defined('BASEPATH') or exit('No direct script access allowed');


/**
 *
 * Controller Regime
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
require_once APPPATH.'controllers/AdminSecure.php';

class Regime extends AdminSecure
{

  public function __construct()
  {
    parent::__construct();
    $this->load->model('Utilisateur_model', 'utilisateur', true);
    $this->load->model('Regime_model', 'regime', true);
    $this->load->model('Objectif_model', 'objectif', true);
  }

  public function index()
  {
    // 
  }

  public function nouveau() {
    $this->load->view('templates/body', [
			'metadata' => [
				'styles' => ['create-regime'],
				'script' => [],
				'title' => 'Nouveau régime',
        'active' => '',
        'sidebar' => true
			],
			'page' => 'regime',
      'objectifs' => $this->objectif->findAll()
		]);
  }

  public function inserer(){
    $nom = $this->input->post('nom');
    $prix = $this->input->post('prix');
    $apport = $this->input->post('apport');
    $duree = $this->input->post('duree');
    $idobjectif = $this->input->post('idobjectif');
    $photo = $_FILES['photo'];
    
    require APPPATH.'constant\validation_msg.php';
    $this->form_validation->set_rules(
      "nom","Nom du Reégime",
      'trim|required',
      $error_msg
    );
    $this->form_validation->set_rules(
      "prix", "Prix du Régime",
      'required|greater_than[0]',
      $error_msg
    );
    $this->form_validation->set_rules(
      "apport", "Apport du Régime",
      'required|greater_than[0]',
      $error_msg
    );
    $this->form_validation->set_rules(
      "duree","Durée du Régime",
      'required|greater_than[0]',
      $error_msg
    );
    $this->form_validation->set_rules(
      "idobjectif", "Idobjectif",
      'required',
      $error_msg
    );
    if ($this->form_validation->run() == false){
      $this->load->view('templates/body', [
        'metadata' => [
          'styles' => ['create-regime'],
          'script' => [],
          'title' => 'Nouveau régime',
          'active' => '',
          'sidebar' => true
        ],
        'page' => 'regime',
        'objectifs' => $this->objectif->findAll()
      ]);
    }else{
      $photo = $this->regime->upload_img('photo');
      if($photo == -1) {
        // redirect(site_url('regime/nouveau'));
        $form_error['photo'] = 'Erreur lors de l\'import';
        $this->load->view('templates/body', [
          'metadata' => [
            'styles' => ['create-regime'],
            'script' => [],
            'title' => 'Nouveau régime',
            'active' => '',
            'sidebar' => true
          ],
          'page' => 'regime',
          'objectifs' => $this->objectif->findAll(),
          'plats' => $this->regime->getAllPlat()
        ]);
      }
      else {
        $this->regime->insertRegime($nom, $prix, $apport, $duree, $photo, $idobjectif);
        redirect('dashboard');
      }
    }
    
  }

  

  public function insertView(){
    $this->load->view('templates/body', [
			'metadata' => [
				'styles' => [],
				'script' => [],
				'title' => 'Test template',
        'active' => 'Mes Objectifs',
        'sidebar' => true
			],
			'page' => 'regime'
		]);
  }

  public function accept($id)
  {
    try {
      if($this->regime->accept($id)) {
        echo json_encode(['status' => 1]);
      }
      else {
        echo json_encode(['status' => -1, 'msg' => 'Votre solde est insuffisant.']);
      }
    } catch (\Throwable $th) {
      echo json_encode(['status' => -5, 'msg' => 'Erreur interne au serveur']);
    }
  }
}


/* End of file Regime.php */
/* Location: ./application/controllers/Regime.php */