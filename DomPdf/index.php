<?php 
// https://manuais.iessanclemente.net/index.php/Generaci%C3%B3n_de_PDF's_con_PHP_y_la_librer%C3%ADa_DOMPDF
//documentacion
require_once './dompdf/vendor/autoload.php';


use Dompdf\Dompdf;

$dompdf = new Dompdf();

ob_start();
include "view/userslist.php";
$gethtml = ob_get_contents(); //para interpretar el contenido dinamico
ob_end_clean();

// Cargar contenido HTML para generar un PDF

$dompdf->setPaper('A4', 'portrait');
//$dompdf->loadHtml('<h1 style="color:blue;">Hola Mundo!</h1>');
// coger otro documento html y convertir en pdf, solo para contenido estatico
 //$html_file = file_get_contents("view/userslist.php");
 $dompdf->loadHtml($gethtml);
// Render the HTML as PDF
$dompdf->render();

// Definir el nombre de un archivo PDF 
// Previsualizar/Descargar el archivo PDF generado, (0 = Previsualizar en el navegador y 1 = Descargar PDF)
// Activar/desactivar la compresión del flujo de contenidos (0 = Desactivar y 1 = Activar) 
$dompdf->stream("test", array("Attachment" => 0, "compress" => 0));
// The Composer autoloader


// Devuelve el archivo PDF en forma de cadena.
$pdf_string = $dompdf->output(); 
// Nombre y ubicación del archivo PDF
$pdf_file_loc = './files/new.pdf';
// Guardar el PDF generado en la ubicación deseada con un nombre personalizado
file_put_contents($pdf_file_loc, $pdf_string);
?>