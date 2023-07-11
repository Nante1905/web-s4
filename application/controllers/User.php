<?php
defined('BASEPATH') or exit('No direct script access allowed');


/**
 *
 * Controller User
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

class User extends CI_Controller
{
    
  public function __construct()
  {
    parent::__construct();
    $this->load->model('utilisateur_model','utilisateur',true);
  }

  public function index()
  {

  }

  public function inscription(){
    $this->load->view('pages/inscription');
  }

  public function login() {
    $this->load->view('pages/login');
  }

  public function seconnecter() {

    $email = trim($this->input->post("email"));
    $pass = trim($this->input->post("mdp"));

    $check = $this->utilisateur->checklogin($email, $pass);

    if($check == false) {

    } else {
      $this->session->set_userdata('userid', $check);
      redirect("/");
    }
  }

  public function insert(){
    $nom = $this->input->post('nom');
    $email = $this->input->post('email');
    $mdp = $this->input->post('mdp');
    $idgenre = $this->input->post('idgenre');
    $poids = $this->input->post('poids');
    $taille = $this->input->post('taille');

    require APPPATH.'constant\validation_msg.php';
    $this->form_validation->set_rules(
      "nom","Nom de l'Utilisateur",
      'trim|required',
      $error_msg
    );
    $this->form_validation->set_rules(
      "email", "Adresse Email",
      'trim|required',
      $error_msg
    );
    $this->form_validation->set_rules(
      "mdp", "Mot de passe",
      'trim|required|min_length[5]',
      $error_msg
    );
    $this->form_validation->set_rules(
      "idgenre","Genre",
      'required',
      $error_msg
    );
    $this->form_validation->set_rules(
      "poids", "Poids",
      'required|greater_than[0]',
      $error_msg
    );
    $this->form_validation->set_rules(
      "taille","Taille",
      'required|greater_than[0]',
      $error_msg
    );

    if ($this->form_validation->run() == false){
      $errors =array();
      foreach ($this->input->post() as $key => $value) {
        $errors[$key]= form_error($key);
      }
      $this->load->view("pages/inscription");
    }else{
      // Mapiditra anle user
      $this->utilisateur->inscription($nom, $email, $mdp, $idgenre, $poids, $taille);
      echo 'inserer';
    }

  }

}


/* End of file User.php */
/* Location: ./application/controllers/User.php */