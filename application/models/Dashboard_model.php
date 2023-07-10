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
  
  public function getCodeTransactionsInMonth($year, $month) {
    $query = "select date_genere date, COALESCE(montant, 0) montant from get_all_dates_in_month(%d,%d) d left outer join (select sum(valeur) montant, datetransaction::date from transaction_utilisateur where idregime is null group by datetransaction::date) t on d.date_genere=t.datetransaction";
    $query = sprintf($query, $year, $month);

    $res = $this->db->query($query);
    if(count($res) > 0) {
      return $res->result();
    }
  }

  public function getRegimeTransactionsInMonth($year, $month) {
    $query = "select date_genere date, COALESCE(montant, 0) montant from get_all_dates_in_month(%d,%d) d left outer join (select sum(valeur) montant, datetransaction::date from transaction_utilisateur where idregime is not null group by datetransaction::date) t on d.date_genere=t.datetransaction";
    $query = sprintf($query, $year, $month);

    $res = $this->db->query($query);
    if(count($res) > 0) {
      return $res->result();
    }
  }

  // ------------------------------------------------------------------------

}

/* End of file Dashboard_model.php */
/* Location: ./application/models/Dashboard_model.php */