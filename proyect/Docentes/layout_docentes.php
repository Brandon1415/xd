<?php
$base_url = "http://localhost/xd/proyect/";
$titulo = isset($titulo) ? $titulo : "Docentes";
$contenido = isset($contenido) ? $contenido : "";
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title><?php echo $titulo; ?> - Gestión Académica</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css"/>
  <link rel="stylesheet" href="<?php echo $base_url; ?>style.css">
</head>
<body>
  <header class="header">
    <div class="header-left">
      <img src="<?php echo $base_url; ?>INT.PNG" alt="Logo INT" class="logo" />
      <h1>SISTEMA DE GESTIÓN ACADÉMICA - INT</h1>
    </div>
    <div class="header-right">
      <button class="logout-btn">
        <i class="fas fa-sign-out-alt"></i> Cerrar Sesión
      </button>
    </div>
  </header>

  <div class="container">
    <div class="sidebar">
      <!-- Menú lateral -->
      <div class="menu-section">
        <h2><i class="fas fa-chalkboard-teacher"></i> Docentes <i class="fas fa-chevron-down expand-icon"></i></h2>
        <ul>
          <li><a href="<?php echo $base_url; ?>docentes/tutorados.php"><i class="fas fa-users"></i> Tutorados</a></li>
          <li><a href="<?php echo $base_url; ?>docentes/seguimiento.php"><i class="fas fa-check-circle"></i> Seguimiento</a></li>
          <li><a href="<?php echo $base_url; ?>docentes/revisar_informes.php"><i class="fas fa-file-alt"></i> Revisar Informes</a></li>
          <li><a href="<?php echo $base_url; ?>docentes/notificaciones.php"><i class="fas fa-bell"></i> Notificaciones</a></li>
        </ul>
      </div>
    </div>

    <div class="main-content">
      <?php echo $contenido; ?>
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
          const parent = this.parentElement;
          parent.classList.toggle('active');
          this.classList.toggle('collapsed');
        });
      });
      document.querySelector('.menu-section').classList.add('active');

      document.querySelector('.logout-btn').addEventListener('click', function () {
        if (confirm('¿Está seguro que desea cerrar sesión?')) {
          alert('Sesión cerrada correctamente');
        }
      });
    });
  </script>
</body>
</html>
