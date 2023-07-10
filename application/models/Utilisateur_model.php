<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 *
 * Model Utilisateur_model
 *
 * This Model for ...
 * 
 * @package		CodeIgniter
 * @category	Model
 * @author    Setiawan Jodi <jodisetiawan@fisip-untirta.ac.id>
 * @link      https://github.com/setdjod/myci-extension/
 * @param     ...
 * @return    ...
 *
 */

class Utilisateur_model extends CI_Model {

  public $id;
  public $nom;
  public $email;
  public $idgenre;
  public $poids;
  public $taille;
  public $idobjectif;
  public $poidsobjectif;
  // ------------------------------------------------------------------------

  public function __construct()
  {
    parent::__construct();
  }

  public function getSuggestionRegime(){
    $model = new Regime_model();
    $regimes= $model->findByObjectif($this->idobjectif);
    $result = array();
    foreach ($regimes as $regime){
        $data['regime']= $regime;
        $data['dureetotal']= $this->poidsobjectif*($regime->duree/$regime->apport);
        $data['prixtotal']= $regime->prix*( $data['dureetotal']/$regime->duree);
        array_push($result, $data);
    }
    return $data;
  }

  // ------------------------------------------------------------------------


  // ------------------------------------------------------------------------
  public function index()
  {
    // 
  }

  // ------------------------------------------------------------------------

}

/* End of file Utilisateur_model.php */
/* Location: ./application/models/Utilisateur_model.php */