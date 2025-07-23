<?php
require_once __DIR__.'/../../vendor/autoload.php';

// Cargar variables de entorno (apuntando a la raíz del proyecto)
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__.'/../..');
$dotenv->safeLoad();  // Usamos safeLoad() en lugar de load() para evitar errores si no existe

// Configuración con valores por defecto
$host     = $_ENV['DB_HOST'] ?? 'localhost';
$dbname   = $_ENV['DB_NAME'] ?? 'dbgestdoc2025';
$user     = $_ENV['DB_USER'] ?? 'root';
$pass     = $_ENV['DB_PASS'] ?? '';
$charset  = $_ENV['DB_CHARSET'] ?? 'utf8mb4';

$dsn = "mysql:host=$host;dbname=$dbname;charset=$charset";

$options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
];

try {
    $pdo = new PDO($dsn, $user, $pass, $options);
    $pdo->exec("SET NAMES '$charset' COLLATE 'utf8mb4_spanish_ci'");
} catch (PDOException $e) {
    error_log('Error de conexión: ' . $e->getMessage());
    die("Error al conectar con la base de datos. Por favor, inténtelo más tarde.");
}