<?php
require_once __DIR__.'/includes/conexion.php';

$id = $_GET['id'] ?? null;

if (!$id) {
    die("ID de informe no especificado");
}

try {
    $sql = "SELECT nombre_archivo, archivo FROM informes WHERE id = :id";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([':id' => $id]);
    $informe = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$informe) {
        die("Informe no encontrado");
    }

    // Configurar headers para la descarga
    header('Content-Description: File Transfer');
    header('Content-Type: application/octet-stream');
    header('Content-Disposition: attachment; filename="' . basename($informe['nombre_archivo']) . '"');
    header('Expires: 0');
    header('Cache-Control: must-revalidate');
    header('Pragma: public');
    header('Content-Length: ' . strlen($informe['archivo']));
    
    // Output del contenido del archivo
    echo $informe['archivo'];
    exit;

} catch (PDOException $e) {
    die("Error al descargar el informe: " . $e->getMessage());
}