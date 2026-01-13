<?php
// Puedes usar esto para mostrar un mensaje después de la importación
$msg = $_GET['msg'] ?? '';
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Subir CSV de Usuarios</title>
  <style>
    body {
      background-color: #efecec;
      color: #fff;
      font-family: Arial, sans-serif;
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
      margin: 0;
    }

    .form-container {
      background-color: #111;
      padding: 30px 40px;
      border: 2px solid red;
      border-radius: 10px;
      text-align: center;
      box-shadow: 0 0 15px red;
    }

    h1 {
      color: red;
      margin-bottom: 20px;
    }

    label {
      font-weight: bold;
      color: white;
    }

    input[type="file"] {
      margin-top: 10px;
      padding: 5px;
      background-color: #222;
      color: white;
      border: 1px solid red;
    }

    button {
      margin-top: 20px;
      padding: 10px 20px;
      background-color: red;
      color: white;
      border: none;
      border-radius: 5px;
      cursor: pointer;
      font-weight: bold;
    }

    button:hover {
      background-color: #cc0000;
    }

    .message {
      color: #00ff88;
      margin-top: 15px;
      font-weight: bold;
    }
  </style>
</head>
<body>
  <div class="form-container">
    <h1>Importar CSV de Usuarios</h1>

    <?php if (!empty($msg)): ?>
      <div class="message"><?php echo htmlspecialchars($msg); ?></div>
    <?php endif; ?>

    <form action="process_csv.php" method="post" enctype="multipart/form-data">
      <label for="csv_file">Archivo CSV:</label><br>
      <input type="file" name="csv_file" id="csv_file" accept=".csv" required>
      <br><br>
      <button type="submit">Subir e Importar</button>
    </form>
  </div>
</body>
</html>
