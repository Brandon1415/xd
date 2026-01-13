<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

$host = "localhost";
$user = "root";
$pass = "";
$db   = "biblioteca"; // 👈 CAMBIA si tu BD tiene otro nombre
$port = 3310;         // cambia si usas otro puerto

echo "<h3>TEST DE CONEXIÓN</h3>";

$conn = new mysqli($host, $user, $pass, $db, $port);

if ($conn->connect_error) {
    die("❌ ERROR DE CONEXIÓN: " . $conn->connect_error);
}

echo "✅ Conexión a la base de datos OK<br><br>";

echo "<h3>TEST DE TABLA USUARIOS</h3>";

$sql = "SHOW TABLES";
$result = $conn->query($sql);

if (!$result) {
    die("❌ ERROR AL LISTAR TABLAS: " . $conn->error);
}

while ($row = $result->fetch_array()) {
    echo "📦 Tabla: " . $row[0] . "<br>";
}

echo "<br><h3>TEST DE USUARIOS</h3>";

$sql = "SELECT * FROM usuarios LIMIT 5"; // cambia si la tabla tiene otro nombre
$result = $conn->query($sql);

if (!$result) {
    die("❌ ERROR EN CONSULTA USUARIOS: " . $conn->error);
}

if ($result->num_rows == 0) {
    echo "⚠️ No hay usuarios en la tabla";
} else {
    while ($row = $result->fetch_assoc()) {
        echo "👤 Usuario encontrado: <pre>";
        print_r($row);
        echo "</pre><hr>";
    }
}

$conn->close();
echo "<br>✅ Test finalizado";
