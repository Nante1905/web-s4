<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 *
 * Libraries Pdf
 *
 * This Libraries for ...
 * 
 * @package		CodeIgniter
 * @category	Libraries
 * @author    Setiawan Jodi <jodisetiawan@fisip-untirta.ac.id>
 * @link      https://github.com/setdjod/myci-extension/
 * @param     ...
 * @return    ...
 *
 */
require_once APPPATH.'third_party\dompdf\autoload.inc.php';
class Pdf
{

  // ------------------------------------------------------------------------

  public function __construct()
  {
    // 
  }

  // ------------------------------------------------------------------------


  // ------------------------------------------------------------------------

  function createPDF($html, $filename='', $download=false, $paper='A4', $orientation='portrait'){
    $dompdf = new Dompdf\DOMPDF();
    $dompdf->loadHtml($html);
    $dompdf->setPaper($paper, $orientation);
    $dompdf->render();
    if($download)
        $dompdf->stream($filename.'.pdf', array('Attachment' => 1));
    else
        $dompdf->stream($filename.'.pdf', array('Attachment' => 0));
}

  // ------------------------------------------------------------------------
}

/* End of file Pdf.php */
/* Location: ./application/libraries/Pdf.php */