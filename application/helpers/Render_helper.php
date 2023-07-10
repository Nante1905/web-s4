<?php
defined('BASEPATH') or exit('No direct script access allowed');

/**
 *
 * Helpers Render_helper
 *
 * This Helpers for ...
 * 
 * @package   CodeIgniter
 * @category  Helpers
 * @author    Setiawan Jodi <jodisetiawan@fisip-untirta.ac.id>
 * @link      https://github.com/setdjod/myci-extension/
 *
 */

// ------------------------------------------------------------------------


function format_zero($value) {
  if($value == 0) {
    return '';
  }
  return number_format($value, 2, '.', ' ');
}

function format_number($value) {
  return number_format($value, 2, '.', ' ');
}


function format_str_date($str_date) {
  return date_format(date_create($str_date),"d-m-Y");
}

function format_date($date) {
  return date_format($date,"d-m-Y");
}

// ------------------------------------------------------------------------

/* End of file Render_helper.php */
/* Location: ./application/helpers/Render_helper.php */