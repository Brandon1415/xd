<?php $base_url = "http://localhost/xd/proyect/"; ?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Gestión Académica - INT</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css"/>
  <link rel="stylesheet" href="<?php echo $base_url; ?>style.css">
</head>
<body>
  <header class="header">
    <div class="header-left">
      <img src="<?php echo $base_url; ?>img/INT.png" alt="Logo INT" class="logo" />
      <h1>SISTEMA DE GESTIÓN ACADÉMICA - INT</h1>
    </div>
    <div class="header-right">
      <button class="logout-btn">
        <i class="fas fa-sign-out-alt"></i> Cerrar Sesión
      </button>
    </div>
  </header>
  <div class="container">
