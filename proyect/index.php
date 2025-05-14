<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Director de Unidad - Gestión Académica</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css"/>
  <link rel="stylesheet" href="style.css">
</head>
<?php
$base_url = "http://localhost/Proyecto_Instituto/GestionDocumental_02/xd/proyect/";
?>

<body>
  <header class="header">
    <div class="header-left">
      <img src="INT.PNG" alt="Logo INT" class="logo" />
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
      <div class="menu-section">
        <h2><i class="fas fa-user-graduate"></i> Estudiantes <i class="fas fa-chevron-down expand-icon"></i></h2>
        <ul>
      <li><a href="<?php echo $base_url; ?>estudiantes/generar_solicitud/solicitud.php">
        <i class="fas fa-pen"></i> Formato de prácticas</a>
      </li>

          <li><i class="fas fa-file-alt"></i> Documentos</li>
          <li><i class="fas fa-exclamation-triangle"></i> Reportes</li>
        </ul>
      </div>

      <div class="menu-section">
        <h2><i class="fas fa-chalkboard-teacher"></i> Docentes <i class="fas fa-chevron-down expand-icon"></i></h2>
        <ul>
          <li><i class="fas fa-pen"></i> Evaluaciones</li>
          <li><i class="fas fa-file-alt"></i> Planificaciones</li>
          <li><i class="fas fa-exclamation-triangle"></i> Incidencias</li>
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
        <p>Bienvenido al Sistema de Gestión Académica. Seleccione una opción del menú lateral para comenzar.</p>
      </div>
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
          // window.location.href = 'login.html';
        }
      });
    });
  </script>
</body>
</html>