<?php
// Configura la zona horaria
date_default_timezone_set('America/Guayaquil');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $uploadDir = '../../uploads/'; // Asegúrate de que esta carpeta exista con permisos 755

    // Crear carpeta si no existe
    if (!is_dir($uploadDir)) {
        mkdir($uploadDir, 0755, true);
    }

    $cedula = htmlspecialchars($_POST['cedula']);
    $file = $_FILES['informe'];

    if ($file['error'] === UPLOAD_ERR_OK) {
        $fileName = basename($file['name']);
        $fileType = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));

        // Validar extensión
        if ($fileType !== 'pdf') {
            echo "<script>alert('⚠️ Solo se permiten archivos PDF.'); window.history.back();</script>";
            exit;
        }

        // Validar formato del nombre del archivo
        if (!preg_match('/^[A-Z_]+\.pdf$/', $fileName)) {
            echo "<script>alert('⚠️ El nombre del archivo debe tener el formato: GARCIA_TOCAIN_MICHAEL_ENRIQUE.pdf'); window.history.back();</script>";
            exit;
        }

        $destination = $uploadDir . $fileName;

        if (move_uploaded_file($file['tmp_name'], $destination)) {
            echo "<script>alert('✅ Informe subido correctamente.'); window.location.href='subir_informe.php';</script>";
        } else {
            echo "<script>alert('❌ Error al mover el archivo.'); window.history.back();</script>";
        }
    } else {
        echo "<script>alert('❌ Error al subir el archivo. Código: " . $file['error'] . "'); window.history.back();</script>";
    }
} else {
    echo "<script>alert('🚫 Acceso no permitido.'); window.history.back();</script>";
}
?>
