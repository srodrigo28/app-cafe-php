<?php

require "../vendor/autoload.php";

// echo "estou aqui gerando pdf ..."

use Dompdf\Dompdf;

$dompdf = new Dompdf();

ob_start();
require_once "conteudo-pdf.php";
$html = ob_get_clean();


$dompdf->loadHtml($html);

$dompdf->setPaper('A4');

$dompdf->render();

$dompdf->stream();

?>