<?php 
session_start();
require_once 'dompdf/autoload.inc.php';


ob_start();
include "page.php";
$html = ob_get_clean();

use Dompdf\Dompdf;
$dompdf = new Dompdf();
$dompdf->loadHtml($html);
$dompdf->render();
$dompdf->stream('pesan.pdf', array('Attachment' => 0)); //display pdf