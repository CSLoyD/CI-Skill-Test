<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require_once(dirname(__FILE__) . '/mpdf/autoload.php');
use Mpdf\Mpdf;
class Pdf extends Mpdf {
    function __construct()
    {
	   parent::__construct();
    }

	function createPDF($html, $filename='', $paper='A4', $orientation='portrait'){    
        $mpdf = new Pdf();
		$mpdf->WriteHTML($html);
        $mpdf->Output();
    }

} // End of Class