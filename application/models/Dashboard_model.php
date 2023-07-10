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

  public function getClassementRegime($annee, $mois){
      $sql= " select r.id idregime, coalesce(c.nbr_users,0) nbr_users from regime r
              LEFT JOIN get_classement(%s,%s) c
              ON r.id = c.idregime;";
      $sql = sprintf($sql,$this->db->escape($annee),$this->db->escape($mois));
      $query = $this->db->query($sql);
      return $query->result();
  }

  public function getUsersPerMonth($annee, $mois){
      $sql= "SELECT * FROM nombre_utilisateurs_par_mois(%s, %s)";
      $sql = sprintf($sql,$this->db->escape($annee),$this->db->escape($mois));
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