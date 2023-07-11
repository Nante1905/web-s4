<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 *
 * Model Dashboard_model
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

class Dashboard_model extends CI_Model {

  // ------------------------------------------------------------------------

  public function __construct()
  {
    parent::__construct();
  }

  public function getClassementRegime($annee = null, $mois = null){
      if($annee == null) {
        $annee = date('Y');
      }
      if($mois == null) {
        $mois = date('m');
      }
      $sql= " select r.*, coalesce(c.nbr_users,0) valeur from regime r
              LEFT JOIN get_classement(%s,%s) c
              ON r.id = c.idregime order by valeur desc";
      $sql = sprintf($sql,$this->db->escape($annee),$this->db->escape($mois));
      $query = $this->db->query($sql);
      return $query->result();
  }

  public function getUsersPerMonth($annee, $mois){
      $sql= "SELECT datedujour, nbr_users valeur FROM nombre_utilisateurs_par_mois(%s, %s)";
      if($annee == null) {
        $annee = date('Y');
      }
      if($mois == null) {
        $mois = date('m');
      }
      $sql = sprintf($sql, $this->db->escape($annee), $this->db->escape($mois));
      $query = $this->db->query($sql);
      return $query->result();
    
  }
  
  public function getStatRecharge($year, $month) {
    $query = "select date_genere datedujour, COALESCE(valeur, 0) valeur  from get_all_dates_in_month(%d,%d) d left outer join (select sum(valeur) valeur, daterecharge::date from v_recharge_details group by daterecharge::date) t on d.date_genere=t.daterecharge;";
    $query = sprintf($query, $year, $month);

    $res = $this->db->query($query);
    if(count($res->result()) > 0) {
      return $res->result();
    }
  }

  public function getStatAchat($year, $month) {
    $query = "select date_genere datedujour, COALESCE(valeur, 0) valeur from get_all_dates_in_month(%d,%d) d left outer join (select sum(montant) valeur, dateachat::date from achat_utilisateur group by dateachat::date) t on d.date_genere=t.dateachat;";
    $query = sprintf($query, $year, $month);

    $res = $this->db->query($query);
    if(count($res->result()) > 0) {
      return $res->result();
    }
  }

  public function findInvalideRecharge() {
    $recharges = $this->db->get_where('v_recharge_details', ['statut' => 1])->result();

    return $recharges;
  }

  // ------------------------------------------------------------------------

}

/* End of file Dashboard_model.php */
/* Location: ./application/models/Dashboard_model.php */