<?php
defined('BASEPATH') or exit('No direct script access allowed');
require_once APPPATH.'controllers/SessionSecure.php';

class Welcome extends SessionSecure
{

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/userguide3/general/urls.html
	 */
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Regime_model', 'regime', true);
		$this->load->model('Sport_model', 'sport', true);
	}
	
	public function index()
	{
		$this->accueil();
	}
	
	public function accueil()
	{
		// var_dump($this->regime->findAll());
		$this->load->model('Utilisateur_model', 'user', true);
		$this->load->view('templates/body', [
			'metadata' => [
				'styles' => ['accueil'],
				'script' => ['accueil'],
				'title' => 'Bienvenue',
				'active' => 'Accueil'
			],
			'page' => 'accueil',
			'regimes' => $this->regime->findAll(),
			'sports' => $this->sport->findAll(),
			'isGold' => $this->user->is_gold($this->session->userid)
		]);
	}

	public function details($id)
	{
		$data = $this->regime->findAllPlats($id);
		echo json_encode($data);
	}
}
