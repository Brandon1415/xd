<?php
// session_start();
// if (!isset($_SESSION['usuario_id'])) {
//     header("Location: login.php");
//     exit;
// }

require 'vendor/autoload.php';
use Dompdf\Dompdf;
use Dompdf\Options;

function sanitize($value) {
    return htmlspecialchars(trim($value ?? ''), ENT_QUOTES, 'UTF-8');
}

if ($_SERVER["REQUEST_METHOD"] === "POST" && !empty($_POST)) {
    ob_start();
    include 'plantilla_pdf.php'; // Aquí se carga el HTML del PDF
    $html = ob_get_clean();

    $options = new Options();
    $options->set('isRemoteEnabled', true);
    $options->set('isHtml5ParserEnabled', true);
    $options->set('defaultFont', 'Arial');

    $dompdf = new Dompdf($options);
    $dompdf->loadHtml($html);
    $dompdf->setPaper('A4', 'portrait');
    $dompdf->render();
    $dompdf->stream("Solicitud_Practicas.pdf", ["Attachment" => false]);
    exit;
} else {
    echo "Acceso no permitido o datos faltantes.";
}
