<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Formulario de Solicitud - Gestión Académica</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css"/>
  <style>
    /* Reset y estilos generales */
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }

    body {
        background: linear-gradient(135deg, #1a1a1a 0%, #2d2d2d 100%);
        background-attachment: fixed;
        display: flex;
        flex-direction: column;
        min-height: 100vh;
        color: #333;
    }

    /* Contenedor principal */
    .container {
        display: flex;
        flex: 1;
    }

    /* Cabecera */
    .header {
        background: linear-gradient(135deg, #000000 0%, #1a1a1a 100%);
        color: white;
        padding: 15px 25px;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.3);
        display: flex;
        justify-content: space-between;
        align-items: center;
        border-bottom: 3px solid #dc2626;
        position: relative;
    }

    .header-left {
        display: flex;
        align-items: center;
    }

    .logo {
      width: 120px;
      height: auto;
      border-radius: 8px;
      padding: 2px;
      filter: drop-shadow(0 0 4px rgba(255, 255, 255, 0.3));
      transition: all 0.3s ease;
      object-fit: contain;
    }

    .logo:hover {
      transform: scale(1.05);
      filter: drop-shadow(0 0 6px rgba(255, 255, 255, 0.5));
      animation: pulse 1s infinite;
    }

    .titulo-centro {
      position: absolute;
      left: 50%;
      transform: translateX(-50%);
      font-size: 22px;
      color: white;
      text-align: center;
      white-space: nowrap;
      font-weight: 700;
      letter-spacing: 0.5px;
      z-index: 1;
      text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.3);
    }

    .header h1 {
        font-size: 24px;
        font-weight: 600;
        letter-spacing: 0.5px;
    }

    .header-right {
        display: flex;
        align-items: center;
        gap: 15px;
    }

    .back-btn, .logout-btn {
        background: linear-gradient(135deg, #dc2626 0%, #b91c1c 100%);
        color: white;
        border: none;
        padding: 10px 20px;
        border-radius: 8px;
        cursor: pointer;
        font-weight: 500;
        transition: all 0.3s ease;
        box-shadow: 0 2px 8px rgba(220, 38, 38, 0.3);
        text-decoration: none;
        display: flex;
        align-items: center;
    }

    .back-btn {
        background: linear-gradient(135deg, #6b7280 0%, #4b5563 100%);
        box-shadow: 0 2px 8px rgba(107, 114, 128, 0.3);
    }

    .back-btn:hover {
        background: linear-gradient(135deg, #4b5563 0%, #374151 100%);
        transform: translateY(-2px);
        box-shadow: 0 4px 12px rgba(107, 114, 128, 0.4);
    }

    .logout-btn:hover {
        background: linear-gradient(135deg, #b91c1c 0%, #991b1b 100%);
        transform: translateY(-2px);
        box-shadow: 0 4px 12px rgba(220, 38, 38, 0.4);
    }

    .back-btn i, .logout-btn i {
        margin-right: 8px;
    }

    /* Contenido principal sin sidebar */
    .main-content {
        flex: 1;
        padding: 30px;
        background: rgba(255, 255, 255, 0.9);
        backdrop-filter: blur(10px);
        margin: 20px;
        border-radius: 15px;
        box-shadow: 0 8px 32px rgba(0, 0, 0, 0.1);
        border: 1px solid rgba(255, 255, 255, 0.2);
    }

    .main-content h2 {
        color: #1a1a1a;
        margin-bottom: 25px;
        font-size: 28px;
        font-weight: 600;
        text-align: center;
        border-bottom: 3px solid #dc2626;
        padding-bottom: 15px;
    }

    /* Formulario moderno */
    .modern-form {
        background: white;
        border-radius: 15px;
        box-shadow: 0 8px 25px rgba(0, 0, 0, 0.1);
        padding: 30px;
        border-left: 5px solid #dc2626;
        position: relative;
        overflow: hidden;
    }

    .modern-form::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        height: 3px;
        background: linear-gradient(90deg, #dc2626 0%, #b91c1c 50%, #dc2626 100%);
    }

    .modern-form section {
        margin-bottom: 30px;
        padding: 20px;
        background: #fafafa;
        border-radius: 10px;
        border: 1px solid #e5e5e5;
        transition: all 0.3s ease;
    }

    .modern-form section:hover {
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
        transform: translateY(-2px);
    }

    .modern-form h4 {
        font-size: 18px;
        color: #1a1a1a;
        margin-bottom: 20px;
        border-bottom: 2px solid #dc2626;
        padding-bottom: 8px;
        display: flex;
        align-items: center;
        font-weight: 600;
    }

    .form-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
        gap: 15px;
        margin-bottom: 15px;
    }

    .form-grid input,
    .form-grid select {
        padding: 12px 15px;
        border-radius: 8px;
        border: 2px solid #e5e5e5;
        font-size: 16px;
        transition: all 0.3s ease;
        background-color: white;
    }

    .form-grid input:focus,
    .form-grid select:focus {
        outline: none;
        border-color: #dc2626;
        box-shadow: 0 0 0 3px rgba(220, 38, 38, 0.1);
        transform: translateY(-1px);
    }

    .form-grid input::placeholder {
        color: #999;
    }

    .form-grid label {
        color: #555;
        font-weight: 500;
        margin-bottom: 5px;
        display: block;
    }

    /* Indicaciones especiales */
    .form-grid + label {
        color: #666;
        font-style: italic;
        margin-top: 10px;
        padding: 10px;
        background: #f0f9ff;
        border-left: 4px solid #0ea5e9;
        border-radius: 4px;
    }

    /* Botón de envío */
    .form-footer {
        text-align: center;
        margin-top: 30px;
        padding-top: 20px;
        border-top: 1px solid #e5e5e5;
    }

    .btn.btn-primary {
        background: linear-gradient(135deg, #dc2626 0%, #b91c1c 100%);
        color: white;
        padding: 15px 40px;
        border: none;
        border-radius: 10px;
        font-size: 16px;
        font-weight: 600;
        cursor: pointer;
        transition: all 0.3s ease;
        box-shadow: 0 4px 15px rgba(220, 38, 38, 0.3);
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }

    .btn.btn-primary:hover {
        background: linear-gradient(135deg, #b91c1c 0%, #991b1b 100%);
        transform: translateY(-3px);
        box-shadow: 0 8px 25px rgba(220, 38, 38, 0.4);
    }

    .btn.btn-primary:active {
        transform: translateY(-1px);
    }

    /* Pie de página */
    .footer {
        background: linear-gradient(135deg, #000000 0%, #1a1a1a 100%);
        color: white;
        padding: 15px;
        text-align: center;
        font-size: 14px;
        border-top: 3px solid #dc2626;
        box-shadow: 0 -4px 15px rgba(0, 0, 0, 0.2);
    }

    /* Animaciones */
    @keyframes fadeIn {
        from {
            opacity: 0;
            transform: translateY(20px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    @keyframes pulse {
        0% { transform: scale(1.05); }
        50% { transform: scale(1.1); }
        100% { transform: scale(1.05); }
    }

    .main-content {
        animation: fadeIn 0.6s ease-out;
    }

    /* Responsive Design */
    @media (max-width: 768px) {
        .header {
            padding: 10px 15px;
            flex-direction: column;
            gap: 10px;
        }
        
        .titulo-centro {
            position: static;
            transform: none;
            font-size: 18px;
            margin: 10px 0;
        }

        .header-left, .header-right {
            width: 100%;
            justify-content: center;
        }

        .main-content {
            margin: 10px;
            padding: 20px;
        }

        .modern-form {
            padding: 20px;
        }

        .form-grid {
            grid-template-columns: 1fr;
        }

        .btn.btn-primary {
            width: 100%;
            padding: 15px;
        }
    }

    /* Scrollbar personalizado */
    ::-webkit-scrollbar {
        width: 8px;
    }

    ::-webkit-scrollbar-track {
        background: #f1f1f1;
    }

    ::-webkit-scrollbar-thumb {
        background: linear-gradient(135deg, #dc2626 0%, #b91c1c 100%);
        border-radius: 4px;
    }

    ::-webkit-scrollbar-thumb:hover {
        background: linear-gradient(135deg, #b91c1c 0%, #991b1b 100%);
    }

    /* Efectos adicionales para inputs */
    .form-grid input[type="date"]::-webkit-calendar-picker-indicator {
        color: #dc2626;
        cursor: pointer;
    }

    .form-grid select {
        cursor: pointer;
    }

    /* Estilos para campos requeridos */
    .form-grid input:required:invalid {
        border-color: #fecaca;
    }

    .form-grid input:required:valid {
        border-color: #bbf7d0;
    }
  </style>
</head>

<body>
  <header class="header">
    <div class="header-left">
      <img src="../../img/INT.png" alt="Logo INT" class="logo" />
    </div>
    <div class="titulo-centro">
      SISTEMA DE GESTIÓN ACADÉMICA - INT
    </div>
    <div class="header-right">
      <a href="javascript:history.back()" class="back-btn">
        <i class="fas fa-arrow-left"></i> Regresar
      </a>
      <button class="logout-btn">
        <i class="fas fa-sign-out-alt"></i> Cerrar Sesión
      </button>
    </div>
  </header>

  <div class="container">
    <div class="main-content">
      <h2>📋 Formulario de Solicitud de Prácticas</h2>
      
      <form method="POST" action="generar_pdf.php" target="_blank" class="modern-form">
        
        <!-- Información General -->
        <section>
          <h4>📌 Información General</h4>
          <div class="form-grid">
            <select name="ciudad" id="ciudad" required>
              <option value="">Seleccione una ciudad</option>
              <option value="Cayambe" selected>Cayambe</option>
            </select>
            
            <input type="number" id="horas" name="horas" placeholder="Total de horas" required min="1">

            <select name="tipo" id="tipo" required>
              <option value="">Seleccione tipo de práctica</option>
              <option value="Prácticas 1">Prácticas 1</option>
              <option value="Prácticas 2">Prácticas 2</option>
              <option value="Prácticas 3">Prácticas 3</option>
            </select>
            
            <div>
              <label for="fecha_inicio">Fecha de inicio de prácticas:</label>
              <input type="date" id="fecha_inicio" name="fecha_inicio" required>
            </div>
            
            <div>
              <label for="fecha_fin">Fecha de fin de prácticas:</label>
              <input type="date" id="fecha_fin" name="fecha_fin" required>
            </div>
          </div>
        </section>

        <!-- Visitas Programadas -->
        <section>
          <h4>🗓️ Visitas Programadas</h4>
          <div class="form-grid">
            <div>
              <label for="v1_fecha">Fecha de visita 1:</label>
              <input type="date" id="v1_fecha" name="v1_fecha" required>
            </div>
            <input type="number" name="v1_avance" placeholder="Horas avanzadas - Visita 1" required min="1">
            
            <div>
              <label for="v2_fecha">Fecha de visita 2:</label>
              <input type="date" id="v2_fecha" name="v2_fecha" required>
            </div>
            <input type="number" name="v2_avance" placeholder="Horas avanzadas - Visita 2" required min="1">
            
            <div>
              <label for="v3_fecha">Fecha de visita 3:</label>
              <input type="date" id="v3_fecha" name="v3_fecha" required>
            </div>
            <input type="number" name="v3_avance" placeholder="Horas avanzadas - Visita 3" required min="1">
          </div>
          
          <label for="indicaciones">💡 <strong>Indicaciones:</strong> Ingrese las fechas en las que desea ser visitado durante sus prácticas profesionales.</label>
        </section>

        <!-- Estudiante -->
        <section>
          <h4>👤 Datos del Estudiante</h4>
          <div class="form-grid">
            <input type="text" name="nombre" placeholder="Nombre completo" required>
            <input type="text" name="cedula" placeholder="Número de cédula" required pattern="[0-9]{10}" title="Ingrese 10 dígitos">
            <input type="text" name="carrera" placeholder="Carrera" required>
            <input type="text" name="nivel" placeholder='Nivel y Paralelo (Ej: 1 "A")' required>
            <input type="tel" name="contacto" placeholder="Número de contacto" required>
            <input type="email" name="correo" placeholder="Correo institucional" required>
          </div>
        </section>

        <!-- Empresa -->
        <section>
          <h4>🏢 Datos de la Empresa</h4>
          <div class="form-grid">
            <input type="text" name="empresa" placeholder="Nombre de la empresa" required>
            <input type="text" name="representante" placeholder="Representante legal" required>
            <input type="text" name="direccion" placeholder="Dirección completa" required>
            <input type="tel" name="contacto_empresa" placeholder="Contacto de la empresa" required>
            <input type="email" name="correo_empresa" placeholder="Correo de la empresa" required>
            <input type="text" name="area" placeholder="Área(s) de prácticas" required>
          </div>
        </section>

        <!-- Tutor Empresarial -->
        <section>
          <h4>👔 Tutor Empresarial</h4>
          <div class="form-grid">
            <input type="text" name="tutor_empresarial" placeholder="Nombre completo del tutor" required>
            <input type="tel" name="contacto_empresarial" placeholder="Contacto del tutor" required>
            <input type="email" name="correo_empresarial" placeholder="Correo del tutor" required>
          </div>
        </section>

        <!-- Tutor Académico -->
        <section>
          <h4>🎓 Tutor Académico</h4>
          <div class="form-grid">
            <input type="text" name="tutor_academico" placeholder="Nombre completo del tutor" required>
            <input type="tel" name="contacto_academico" placeholder="Contacto del tutor" required>
            <input type="email" name="correo_academico" placeholder="Correo del tutor" required>
          </div>
        </section>

        <!-- Botón de envío -->
        <div class="form-footer">
          <button type="submit" class="btn btn-primary">
            <i class="fas fa-file-pdf"></i> Generar PDF
          </button>
        </div>
      </form>
    </div>
  </div>

  <div class="footer">
    <p>Sistema de Gestión Documental © 2025 - Instituto Superior Tecnológico</p>
  </div>

  <script>
    document.addEventListener('DOMContentLoaded', function () {
      // Funcionalidad del botón de cerrar sesión
      document.querySelector('.logout-btn').addEventListener('click', function () {
        if (confirm('¿Está seguro que desea cerrar sesión?')) {
          alert('Sesión cerrada correctamente');
          // Aquí puedes agregar la lógica de redirección
          // window.location.href = 'logout.php';
        }
      });

      // Validación de fechas
      const fechaInicio = document.getElementById('fecha_inicio');
      const fechaFin = document.getElementById('fecha_fin');
      const visitaFechas = ['v1_fecha', 'v2_fecha', 'v3_fecha'];

      fechaInicio.addEventListener('change', function() {
        fechaFin.min = this.value;
        visitaFechas.forEach(id => {
          const visita = document.getElementById(id);
          visita.min = this.value;
          if (fechaFin.value) {
            visita.max = fechaFin.value;
          }
        });
      });

      fechaFin.addEventListener('change', function() {
        visitaFechas.forEach(id => {
          document.getElementById(id).max = this.value;
        });
      });

      // Validación del formulario
      const form = document.querySelector('.modern-form');
      form.addEventListener('submit', function(e) {
        const requiredFields = form.querySelectorAll('[required]');
        let valid = true;

        requiredFields.forEach(field => {
          if (!field.value.trim()) {
            field.style.borderColor = '#dc2626';
            valid = false;
          } else {
            field.style.borderColor = '#22c55e';
          }
        });

        if (!valid) {
          e.preventDefault();
          alert('Por favor, complete todos los campos requeridos.');
        }
      });

      // Efectos visuales en inputs
      const inputs = document.querySelectorAll('input, select');
      inputs.forEach(input => {
        input.addEventListener('focus', function() {
          this.parentElement.style.transform = 'scale(1.02)';
        });

        input.addEventListener('blur', function() {
          this.parentElement.style.transform = 'scale(1)';
        });
      });

      // Animación de secciones
      const sections = document.querySelectorAll('section');
      sections.forEach((section, index) => {
        section.style.opacity = '0';
        section.style.transform = 'translateY(20px)';
        
        setTimeout(() => {
          section.style.transition = 'opacity 0.6s ease, transform 0.6s ease';
          section.style.opacity = '1';
          section.style.transform = 'translateY(0)';
        }, index * 100);
      });
    });
  </script>
</body>
</html>