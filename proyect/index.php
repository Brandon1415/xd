
<?php
  ob_start();
session_start();


// // Validar si hay sesión activa, si no redirigir al login
// if (empty($_SESSION['cedula'])) {
//     header('Location: login.php');
//     exit;
// }

// URL base de la aplicación
$base_url = "http://localhost/Proyecto_Instituto/xd/proyect/";
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Director de Unidad - Gestión Académica</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css"/>
  <link rel="stylesheet" href="<?= $base_url ?>style.css">
</head>
<body>
  <header class="header">
    <div class="header-left">
      <img src="<?= $base_url ?>img/INT.png" alt="Logo INT" class="logo" />
      <h1>SISTEMA DE GESTIÓN DE ARCHIVOS - INT</h1>
    </div>
    <div class="header-right">
      <a href="<?= $base_url ?>logout.php" class="logout-btn">
        <i class="fas fa-sign-out-alt"></i> Cerrar Sesión
      </a>
    </div>
  </header>

  <div class="container">
    <div class="sidebar">
      <div class="menu-section">
        <h2><i class="fas fa-user-graduate"></i> Estudiantes <i class="fas fa-chevron-down expand-icon"></i></h2>
        <ul>
          <li><a href="<?= $base_url ?>estudiantes/generar_solicitud/solicitud.php">
            <i class="fas fa-pen"></i> Formato de solicitud prácticas</a>
          </li>
          <li><a href="<?= $base_url ?>estudiantes/subir_informe/subir_informe.php">
            <i class="fas fa-pen"></i> Subir informes</a>
          </li>
          <li><i class="fas fa-exclamation-triangle"></i> Reportes</li>
        </ul>
      </div>

      <div class="menu-section">
        <h2><i class="fas fa-chalkboard-teacher"></i> Docentes <i class="fas fa-chevron-down expand-icon"></i></h2>
        <ul>
          <li><a href="<?= $base_url ?>Docentes/tutorados.php">
            <i class="fas fa-pen"></i> Tutorados</a>
          </li>
          <li><a href="<?= $base_url ?>Docentes/seguimiento.php">
            <i class="fas fa-pen"></i> Seguimiento</a>
          </li>
          <li><a href="<?= $base_url ?>Docentes/revisar_informes.php">
            <i class="fas fa-pen"></i> Revisión de Informes</a>
          </li>
          <li><a href="<?= $base_url ?>Docentes/notificaciones.php">
            <i class="fas fa-pen"></i> Enviar Notificaciones</a>
          </li>
        </ul>
      </div>

      <div class="menu-section">
        <h2><i class="fas fa-tools"></i> Área de Prácticas <i class="fas fa-chevron-down expand-icon"></i></h2>
        <ul>
          <li><i class="fas fa-ruler"></i> Proyectos</li>
          <li><i class="fas fa-clock"></i> Horarios</li>
          <li><i class="fas fa-asterisk"></i> Tutores</li>
        </ul>
      </div>
    </div>

    <div class="main-content">
      <div class="search-bar">
        <input type="text" placeholder="Buscar proyectos, convenios, tutores..." />
        <button><i class="fas fa-search"></i> Buscar</button>
      </div>

      <div class="dashboard-panel">
        <h2>Panel de Control</h2>
        <p>Bienvenido, <strong><?= htmlspecialchars($_SESSION['nombre'] ?? 'Usuario'); ?>!</strong> Seleccione una opción del menú lateral para comenzar.</p>
      </div>
    </div>
  </div>

  <div class="footer">
    <p>Sistema de Gestión Documental © 2025 - Instituto Superior</p>
  </div>

  <script>
    document.addEventListener('DOMContentLoaded', function () {
      const menuSections = document.querySelectorAll('.menu-section h2');

      menuSections.forEach(section => {
        section.addEventListener('click', function () {
          const parent = this.parentElement;
          parent.classList.toggle('active');
          this.classList.toggle('collapsed');
        });
      });

      // Expande la primera sección por defecto
      const firstSection = document.querySelector('.menu-section');
      if (firstSection) {
        firstSection.classList.add('active');
      }
    });
  </script>
</body>
</html>
