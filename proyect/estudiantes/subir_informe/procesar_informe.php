<?php
date_default_timezone_set('America/Guayaquil');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $cedula = htmlspecialchars($_POST['cedula']);
    $file = $_FILES['informe'];

    if ($file['error'] === UPLOAD_ERR_OK) {
        $fileName = basename($file['name']);
        $fileType = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));

        // Validar extensión PDF
        if ($fileType !== 'pdf') {
            echo "<script>alert('⚠️ Solo se permiten archivos PDF.'); window.history.back();</script>";
            exit;
        }

        // Validar nombre de archivo
        if (!preg_match('/^[A-Z_]+\.pdf$/', $fileName)) {
            echo "<script>alert('⚠️ El nombre del archivo debe tener el formato: APELLIDO1_APELLIDO2_NOMBRE1_NOMBRE2.pdf'); window.history.back();</script>";
            exit;
        }

        // Leer contenido binario del archivo
        $fileData = file_get_contents($file['tmp_name']);

        // Conexión a la base de datos
        $host = 'localhost';
        $dbname = 'dbgestdoc2025';
        $user = 'root';
        $pass = '';
        $dsn = "mysql:host=$host;dbname=$dbname;charset=utf8mb4";

        try {
            $pdo = new PDO($dsn, $user, $pass, [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
            ]);

            // Insertar en la base de datos
            $stmt = $pdo->prepare("INSERT INTO informes (cedula, nombre_archivo, archivo) VALUES (?, ?, ?)");
            $stmt->bindParam(1, $cedula);
            $stmt->bindParam(2, $fileName);
            $stmt->bindParam(3, $fileData, PDO::PARAM_LOB);

            $stmt->execute();

            echo "<script>alert('✅ Informe subido y guardado en la base de datos correctamente.'); window.location.href='subir_informe.php';</script>";
        } catch (PDOException $e) {
            echo "<script>alert('❌ Error en la base de datos: " . $e->getMessage() . "'); window.history.back();</script>";
        }
    } else {
        echo "<script>alert('❌ Error al subir el archivo. Código: " . $file['error'] . "'); window.history.back();</script>";
    }
} else {
    echo "<script>alert('🚫 Acceso no permitido.'); window.history.back();</script>";
}
