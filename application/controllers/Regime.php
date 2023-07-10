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

class Regime extends CI_Controller
{
    
  public function __construct()
  {
    parent::__construct();
    $this->load->model('Utilisateur_model', 'utilisateur', true);
  }

  public function index()
  {
    // 
  }

  public function accept($id) {
    $montantActuel = $this->utilisateur->getMontantPorteMonnaie(null);
    $montantRegime = $this->utilisateur-->getMontantRegime($id);
    var_dump([$montantActuel, $montantRegime]);
  }

}


/* End of file Regime.php */
/* Location: ./application/controllers/Regime.php */