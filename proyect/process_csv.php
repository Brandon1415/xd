<?php
$host     = 'localhost';
$dbname   = 'dbgestdoc2025';
$user     = 'root';
$pass     = '';
$charset  = 'utf8mb4';

$dsn = "mysql:host=$host;dbname=$dbname;charset=$charset";
$options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
];

try {
    $pdo = new PDO($dsn, $user, $pass, $options);
} catch (PDOException $e) {
    die("Error en conexión PDO: " . $e->getMessage());
}

// 2) Validar subida de archivo
if (!isset($_FILES['csv_file']) || $_FILES['csv_file']['error'] !== UPLOAD_ERR_OK) {
    die("Error al subir el archivo.");
}

// 3) Asegurarse de que sea CSV
$finfo = new finfo(FILEINFO_MIME_TYPE);
if ($finfo->file($_FILES['csv_file']['tmp_name']) !== 'text/plain' &&
    pathinfo($_FILES['csv_file']['name'], PATHINFO_EXTENSION) !== 'csv') {
    die("Solo se permiten archivos CSV.");
}

// 4) Abrir y leer CSV
$file = fopen($_FILES['csv_file']['tmp_name'], 'r');
if (!$file) {
    die("No se pudo abrir el archivo.");
}

// 5) Preparar statement de inserción
$stmt = $pdo->prepare("
    INSERT INTO usuarios (cedula, nombre, apellido, carrera, rol)
    VALUES (:cedula, :nombre, :apellido, :carrera, :rol)
    ON DUPLICATE KEY UPDATE
      nombre   = VALUES(nombre),
      apellido = VALUES(apellido),
      carrera  = VALUES(carrera),
      rol      = VALUES(rol)
");

// 5) Preparar statement de inserción con password
$stmt = $pdo->prepare("
    INSERT INTO usuarios (cedula, nombre, apellido, carrera, rol, password)
    VALUES (:cedula, :nombre, :apellido, :carrera, :rol, :password)
    ON DUPLICATE KEY UPDATE
      nombre   = VALUES(nombre),
      apellido = VALUES(apellido),
      carrera  = VALUES(carrera),
      rol      = VALUES(rol),
      password = VALUES(password)
");

// 6) Leer línea por línea
$rowCount = 0;
// Si el CSV tiene cabecera, descartarla:
$header = fgetcsv($file, 1000, ';');
while (($data = fgetcsv($file, 1000, ';')) !== FALSE) {
    // Asumiendo el orden: cedula, nombre, apellido, carrera, rol, password
    list($cedula, $nombre, $apellido, $carrera, $rol, $clave) = $data;

    // Validaciones básicas (no nulos, longitud, etc.)
    if (empty($cedula) || empty($nombre) || empty($apellido) || empty($clave)) {
        // Puedes loguear o saltar
        continue;
    }

    // Hashear la contraseña
    $hash = password_hash(trim($clave), PASSWORD_DEFAULT);

    // Ejecutar inserción
    $stmt->execute([
        ':cedula'   => trim($cedula),
        ':nombre'   => trim($nombre),
        ':apellido' => trim($apellido),
        ':carrera'  => trim($carrera),
        ':rol'      => trim($rol),
        ':password' => $hash,
    ]);
    $rowCount++;
}

fclose($file);

echo "<p>Importación completada. Filas procesadas: $rowCount</p>";
echo '<p><a href="upload.html">Volver</a></p>';
