<?php
session_start();

// Parámetros de conexión
$host     = 'localhost';
$dbname   = 'dbgestdoc2025';
$user     = 'root';
$pass     = '';
$dsn      = "mysql:host=$host;dbname=$dbname;charset=utf8mb4";
$options  = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
];

$error = '';
$cedula = '';
$password = '';

try {
    $pdo = new PDO($dsn, $user, $pass, $options);
} catch (PDOException $e) {
    die("Error de conexión: " . $e->getMessage());
}

// Si se envió el formulario
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Recoge las credenciales
    $cedula   = trim($_POST['cedula'] ?? '');
    $password = $_POST['password'] ?? '';

    if ($cedula === '' || $password === '') {
        $error = "Debes indicar cédula y contraseña.";
    } else {
        $stmt = $pdo->prepare("
            SELECT cedula, password
              FROM usuarios
             WHERE cedula = :cedula
             LIMIT 1
        ");
        $stmt->execute([':cedula' => $cedula]);
        $user = $stmt->fetch();

        // Verifica usuario y contraseña
        if ($user && password_verify($password, $user['password'])) {
            $_SESSION['cedula'] = $user['cedula'];
            header('Location: index.php');
            exit;
        } else {
            $error = "Cédula o contraseña incorrectas.";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Login de Usuarios</title>
  <style>
    body {
      background-color: #111;
      color: white;
      font-family: Arial, sans-serif;
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
    }
    .login-box {
      background: #222;
      padding: 30px;
      border-radius: 10px;
      box-shadow: 0 0 10px red;
    }
    h1 {
      text-align: center;
      color: red;
    }
    label {
      display: block;
      margin-top: 10px;
    }
    input[type="text"], input[type="password"] {
      width: 100%;
      padding: 8px;
      margin-top: 5px;
      background: #333;
      border: 1px solid red;
      color: white;
      border-radius: 5px;
    }
    button {
      margin-top: 20px;
      padding: 10px;
      width: 100%;
      background: red;
      border: none;
      color: white;
      font-weight: bold;
      border-radius: 5px;
      cursor: pointer;
    }
    .error {
      color: red;
      margin-top: 10px;
      text-align: center;
    }
  </style>
</head>
<body>
  <div class="login-box">
    <h1>Iniciar sesión</h1>

    <?php if (!empty($error)): ?>
      <div class="error"><?php echo htmlspecialchars($error); ?></div>
    <?php endif; ?>

    <form action="login.php" method="post">
      <label for="cedula">Cédula:</label>
      <input type="text" name="cedula" id="cedula"
             value="<?php echo htmlspecialchars($cedula); ?>" required>

      <label for="password">Contraseña:</label>
      <input type="password" name="password" id="password" required>

      <button type="submit">Entrar</button>
    </form>
  </div>
</body>
</html>
