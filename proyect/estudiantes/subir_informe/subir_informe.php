<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Director de Unidad - Gestión Académica</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css"/>
  <link rel="stylesheet" href="../../style.css">
  <style>
    .main-content {
      flex: 1;
      padding: 2rem;
      background-color: #f9f9f9;
    }

    .container {
      display: flex;
    }

    .main-content h4 {
      margin-top: 2rem;
      margin-bottom: 1rem;
      border-bottom: 2px solid rgb(210, 6, 6);
      padding-bottom: 0.5rem;
      color: rgb(0, 1, 2);
    }

    .modern-form {
      background-color: #fff;
      border-radius: 16px;
      box-shadow: 0 4px 16px rgba(0,0,0,0.1);
      padding: 2rem;
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
      grid-template-columns: 1fr;
      gap: 1rem;
    }

    .form-grid input {
      padding: 0.75rem;
      border-radius: 8px;
      border: 1px solid #ccc;
      font-size: 1rem;
    }

    .form-footer {
      text-align: center;
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
      background-color: rgb(232, 19, 11);
    }
  </style>
</head>

<?php
$base_url = "http://localhost/Proyecto_Instituto/xd/proyect/";
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
          <li><a href="<?= $base_url; ?>estudiantes/subir_informe/subir_informe.php"><i class="fas fa-pen"></i> Subir informe</a></li>
          <li><i class="fas fa-exclamation-triangle"></i> Reportes</li>
        </ul>
      </div>
    </div>

    <!-- Contenido de la parte derecha -->
    <div class="main-content">
      <h4>Subir Informe de Prácticas</h4>
      <form class="modern-form" action="procesar_informe.php" method="POST" enctype="multipart/form-data">
  <section>
    <label for="cedula">Cédula del Estudiante</label>
    <input type="text" name="cedula" id="cedula" required>
  </section>

  <section>
    <label for="informe">Informe en PDF</label>
    <input type="file" name="informe" id="informe" accept=".pdf" required>
  </section>

  <label><strong>Nota:</strong> El nombre del archivo debe tener el formato: <em>APELLIDO1_APELLIDO2_NOMBRE1_NOMBRE2.pdf</em></label>

  <div class="form-footer">
    <button type="submit" class="btn btn-primary">Subir Informe</button>
  </div>
</form>

    </div>
  </div>

  <div class="footer">
    <p>Sistema de Gestión de Archivos © 2025 - Instituto Superior</p>
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
</body>
</html>
