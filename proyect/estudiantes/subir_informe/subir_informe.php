<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Director de Unidad - Gestión Académica</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css"/>
  <link rel="stylesheet" href="../../style.css">
  <style>
    .main-content h4 {
      margin-top: 2rem;
      margin-bottom: 1rem;
      border-bottom: 2px solidrgb(210, 6, 6);
      padding-bottom: 0.5rem;
      color:rgb(0, 1, 2);
    }
  </style>
</head>

<?php
$base_url = "http://localhost/Proyecto_Instituto/xd/proyect/";
// Ruta del archivo JSON con notificaciones
$archivo_notificaciones = 'subir_informe/notificacion.json'; // Ajusta la ruta si está en otro lado

// Cargar notificaciones desde el archivo JSON
$notificaciones = file_exists($archivo_notificaciones)
    ? json_decode(file_get_contents($archivo_notificaciones), true)
    : [];

?>

<body>
  <header class="header">
    <div class="header-left">
      <img src="../../img/INT.png" alt="Logo INT" class="logo" />
      <h1>SISTEMA DE GESTIÓN ACADÉMICA - INT</h1>
    </div>
    <div class="header-right">
      <button class="logout-btn"><i class="fas fa-sign-out-alt"></i> Cerrar Sesión</button>
    </div>
  </header>

  <div class="container">
    <div class="sidebar">
      <div class="menu-section">
        <h2><i class="fas fa-user-graduate"></i> Estudiantes <i class="fas fa-chevron-down expand-icon"></i></h2>
        <ul>
          <li><a href="<?= $base_url; ?>estudiantes/generar_solicitud/solicitud.php"><i class="fas fa-pen"></i> Formato de prácticas</a></li>
          <li><a href="<?= $base_url; ?>estudiantes/subir_informe/subir_informe.php"><i class="fas fa-pen"></i>Subir informe </a></li>
          <li><i class="fas fa-exclamation-triangle"></i> Reportes</li>
        </ul>
      </div>



    </div>
  <div class="footer">
    <p>Sistema de Gestión Académica © 2025 - Instituto Superior</p>
  </div>

  <script>
    document.addEventListener('DOMContentLoaded', function () {
      const menuSections = document.querySelectorAll('.menu-section h2');
      menuSections.forEach(section => {
        section.addEventListener('click', function () {
          this.parentElement.classList.toggle('active');
        });
      });

      document.querySelector('.menu-section').classList.add('active');

      document.querySelector('.logout-btn').addEventListener('click', function () {
        if (confirm('¿Está seguro que desea cerrar sesión?')) {
          alert('Sesión cerrada correctamente');
          // Redireccionar si es necesario
        }
      });
    });
  </script>

  <style>
    .modern-form {
      padding: 2rem;
      background-color: #fff;
      border-radius: 16px;
      box-shadow: 0 4px 16px rgba(0,0,0,0.1);
    }

    .modern-form section {
      margin-bottom: 2rem;
    }

    .modern-form h4 {
      font-size: 1.25rem;
      color: #003366;
      margin-bottom: 1rem;
      border-bottom: 2px solid #0066cc;
      padding-bottom: 0.5rem;
    }

    .form-grid {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
      gap: 1rem;
    }

    .form-grid input,
    .form-grid select {
      padding: 0.75rem;
      border-radius: 8px;
      border: 1px solid #ccc;
      font-size: 1rem;
    }

    .form-footer {
      text-align: center;
      margin-top: 2rem;
    }

    .btn.btn-primary {
      background-color: #0066cc;
      color: white;
      padding: 0.75rem 2rem;
      border: none;
      border-radius: 8px;
      font-size: 1rem;
      cursor: pointer;
    }

    .btn.btn-primary:hover {
      background-color:rgb(232, 19, 11);
    }
  </style>
</body>
</html>
