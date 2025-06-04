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
$ciudad = "Cayambe";
$ciudades = ["Cayambe"];
$tipos_practica = ["Prácticas 1", "Prácticas 2", "Prácticas 3"];
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
      <!-- Otros menús... -->
    </div>

    <div class="main-content">
      <h2 class="mb-4">Formulario de Solicitud de Prácticas</h2>
      <form method="POST" action="generar_pdf.php" target="_blank" class="modern-form">
        
        <!-- Información General -->
        <section>
  <h4>📌 Información General</h4>
  <div class="form-grid">
    
    <select name="ciudad" id="ciudad" required>
      <option value="">Seleccione una ciudad</option>
      <?php foreach ($ciudades as $c): ?>
        <option value="<?= htmlspecialchars($c) ?>" <?= $c == $ciudad ? 'selected' : '' ?>>
          <?= htmlspecialchars($c) ?>
        </option>
      <?php endforeach; ?>
    </select>
            <input type="number" id="horas" name="horas" placeholder="Total horas" required value="<?= htmlspecialchars($horas ?? '') ?>">

    <select name="tipo" id="tipo" required>
      <option value="">Seleccione tipo de práctica</option>
      <?php foreach ($tipos_practica as $t): ?>
        <option value="<?= htmlspecialchars($t) ?>" <?= ($tipo ?? '') == $t ? 'selected' : '' ?>>
          <?= htmlspecialchars($t) ?>
        </option>
      <?php endforeach; ?>
    </select>
    <br>
        <label for="fecha_inicio">Fecha de inicio prácticas:</label>
        <input type="date" id="fecha_inicio" name="fecha_inicio" required value="<?= htmlspecialchars($fecha_inicio ?? '') ?>">
        <label for="fecha_fin">Fecha de fin prácticas:</label>
        <input type="date" id="fecha_fin" name="fecha_fin" required value="<?= htmlspecialchars($fecha_fin ?? '') ?>">
        </div>
        </section>


        <!-- Visitas Programadas -->
        <section>
          <h4>🗓 Visitas Programadas</h4>
          <div class="form-grid">
            <?php for ($i = 1; $i <= 3; $i++): ?>
              <input type="date" name="v<?= $i ?>_fecha" placeholder="Fecha visita <?= $i ?>" required>
              <input type="text" name="v<?= $i ?>_avance" placeholder="Horas avanzadas <?= $i ?>" required>
            <?php endfor; ?>
          </div>
<br>

          <label for="Indicaciones">Indicaciones: Ingresar las fechas en las que desea ser visitado </label>
        </section>

        <!-- Estudiante -->
        <section>
          <h4>👤 Datos del Estudiante</h4>
          <div class="form-grid">
            <input type="text" name="nombre" placeholder="Nombre completo" required>
            <input type="text" name="cedula" placeholder="Cédula" required>
            <input type="text" name="carrera" placeholder="Carrera" required>
            <input type="text" name="nivel" placeholder='Nivel y Paralelo (1 "A")' required>
            <input type="text" name="contacto" placeholder="Contacto" required>
            <input type="email" name="correo" placeholder="Correo Institusional " required>
          </div>
        </section>

        <!-- Empresa -->
        <section>
          <h4>🏢 Empresa</h4>
          <div class="form-grid">
            <input type="text" name="empresa" placeholder="Empresa" required>
            <input type="text" name="representante" placeholder="Representante Legal" required>
            <input type="text" name="direccion" placeholder="Dirección" required>
            <input type="text" name="contacto_empresa" placeholder="Contacto Empresa" required>
            <input type="email" name="correo_empresa" placeholder="Correo Empresa" required>
            <input type="text" name="area" placeholder="Área(s) de prácticas" required>
          </div>
        </section>

        <!-- Tutor Empresarial -->
        <section>
          <h4>👔 Tutor Empresarial</h4>
          <div class="form-grid">
            <input type="text" name="tutor_empresarial" placeholder="Nombre" required>
            <input type="text" name="contacto_empresarial" placeholder="Contacto" required>
            <input type="email" name="correo_empresarial" placeholder="Correo" required>
          </div>
        </section>

        <!-- Tutor Académico -->
        <section>
          <h4>🎓 Tutor Académico</h4>
          <div class="form-grid">
            <input type="text" name="tutor_academico" placeholder="Nombre" required>
            <input type="text" name="contacto_academico" placeholder="Contacto" required>
            <input type="email" name="correo_academico" placeholder="Correo" required>
          </div>
        </section>

        <!-- Botón -->
        <div class="form-footer">
          <button type="submit" class="btn btn-primary">Generar PDF</button>
        </div>
      </form>
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
