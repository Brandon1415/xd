<?php
session_start();
require_once 'Docentes/includes/conexion.php'; // Asegúrate de tener aquí tu conexión PDO como $pdo

$error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $cedula = trim($_POST['cedula'] ?? '');
    $password = $_POST['password'] ?? '';

    if ($cedula && $password) {
        $stmt = $pdo->prepare("SELECT cedula, password, rol FROM usuarios WHERE cedula = :cedula LIMIT 1");
        $stmt->bindParam(':cedula', $cedula);
        $stmt->execute();

        $usuario = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($usuario && password_verify($password, $usuario['password'])) {
            // Inicio de sesión exitoso
            $_SESSION['cedula'] = $usuario['cedula'];
            $_SESSION['rol'] = $usuario['rol'];

            // Redirige según el rol
            switch ($usuario['rol']) {
                case 'director':
                    header('Location: director/index.php');
                    exit;
                case 'docente':
                    header('Location: docente/index.php');
                    exit;
                case 'estudiante':
                    header('Location: estudiante/index.php');
                    exit;
                default:
                    header('Location: index.php');
                    exit;
            }
        } else {
            $error = 'Credenciales incorrectas.';
        }
    } else {
        $error = 'Por favor, complete todos los campos.';
    }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Iniciar sesión</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f4f4f4;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        form {
            background: white;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0,0,0,0.2);
        }
        input[type="text"], input[type="password"] {
            width: 100%;
            padding: 12px;
            margin: 10px 0;
        }
        input[type="submit"] {
            padding: 12px;
            width: 100%;
            background: #dc2626;
            color: white;
            border: none;
            cursor: pointer;
        }
        .error {
            color: red;
            margin-top: 10px;
            font-weight: bold;
        }
    </style>
</head>
<body>

<form method="POST">
    <h2>Iniciar sesión</h2>
    <input type="text" name="cedula" placeholder="Cédula" required>
    <input type="password" name="password" placeholder="Contraseña" required>
    <input type="submit" value="Entrar">
    <?php if (!empty($error)): ?>
        <div class="error"><?= htmlspecialchars($error) ?></div>
    <?php endif; ?>
</form>

</body>
</html>
