<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Subir Informe - Gestión Académica</title>
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
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      color: white;
      text-align: center;
      white-space: nowrap;
      font-weight: 700;
      letter-spacing: 0.5px;
      z-index: 1;
      text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.3);
      animation: fadeInDown 0.8s ease-out 0.3s both;
    }

    .header-right {
        display: flex;
        align-items: center;
        gap: 15px;
    }

    .back-btn {
        background: linear-gradient(135deg, #6b7280 0%, #4b5563 100%);
        color: white;
        border: none;
        padding: 10px 20px;
        border-radius: 8px;
        cursor: pointer;
        font-weight: 500;
        transition: all 0.3s ease;
        box-shadow: 0 2px 8px rgba(107, 114, 128, 0.3);
        text-decoration: none;
        display: flex;
        align-items: center;
    }

    .back-btn:hover {
        background: linear-gradient(135deg, #4b5563 0%, #374151 100%);
        transform: translateY(-2px);
        box-shadow: 0 4px 12px rgba(107, 114, 128, 0.4);
    }

    .back-btn i {
        margin-right: 8px;
    }

    .logout-btn {
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

    .logout-btn:hover {
        background: linear-gradient(135deg, #b91c1c 0%, #991b1b 100%);
        transform: translateY(-2px);
        box-shadow: 0 4px 12px rgba(220, 38, 38, 0.4);
    }

    .logout-btn i {
        margin-right: 8px;
    }

    /* Contenido principal - sin sidebar */
    .main-content {
        flex: 1;
        padding: 30px;
        background: rgba(255, 255, 255, 0.9);
        backdrop-filter: blur(10px);
        margin: 20px;
        border-radius: 15px;
        box-shadow: 0 8px 32px rgba(0, 0, 0, 0.1);
        border: 1px solid rgba(255, 255, 255, 0.2);
        animation: fadeIn 0.6s ease-out;
    }

    .main-content h4 {
        color: #1a1a1a;
        margin-bottom: 25px;
        font-size: 28px;
        font-weight: 600;
        border-bottom: 3px solid #dc2626;
        padding-bottom: 10px;
        display: flex;
        align-items: center;
    }

    .main-content h4 i {
        margin-right: 15px;
        color: #dc2626;
        font-size: 24px;
    }

    /* Formulario moderno */
    .modern-form {
        background: white;
        padding: 40px;
        border-radius: 15px;
        border-left: 5px solid #dc2626;
        box-shadow: 0 8px 25px rgba(0, 0, 0, 0.1);
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
        margin-bottom: 25px;
    }

    .modern-form label {
        display: block;
        margin-bottom: 8px;
        font-weight: 600;
        color: #1a1a1a;
        font-size: 16px;
    }

    .modern-form input[type="text"],
    .modern-form input[type="file"] {
        width: 100%;
        padding: 15px 20px;
        border: 2px solid #e5e7eb;
        border-radius: 10px;
        font-size: 16px;
        transition: all 0.3s ease;
        background-color: #fafafa;
    }

    .modern-form input[type="text"]:focus,
    .modern-form input[type="file"]:focus {
        outline: none;
        border-color: #dc2626;
        background-color: white;
        box-shadow: 0 0 0 3px rgba(220, 38, 38, 0.1);
        transform: translateY(-2px);
    }

    .modern-form input[type="file"] {
        padding: 12px 15px;
        cursor: pointer;
    }

    .note-text {
        background: linear-gradient(135deg, #fef3c7 0%, #fde68a 100%);
        border: 1px solid #f59e0b;
        border-radius: 10px;
        padding: 15px 20px;
        margin: 20px 0;
        color: #92400e;
        font-size: 14px;
        display: flex;
        align-items: center;
    }

    .note-text i {
        margin-right: 10px;
        color: #f59e0b;
        font-size: 16px;
    }

    .form-footer {
        text-align: center;
        margin-top: 30px;
        padding-top: 25px;
        border-top: 1px solid #e5e7eb;
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
        display: inline-flex;
        align-items: center;
        gap: 10px;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }

    .btn.btn-primary:hover {
        background: linear-gradient(135deg, #b91c1c 0%, #991b1b 100%);
        transform: translateY(-3px);
        box-shadow: 0 6px 20px rgba(220, 38, 38, 0.4);
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

    @keyframes fadeInDown {
        from {
            opacity: 0;
            transform: translate(-50%, -20px);
        }
        to {
            opacity: 1;
            transform: translateX(-50%);
        }
    }

    @keyframes pulse {
        0%, 100% { opacity: 1; }
        50% { opacity: 0.8; }
    }

    /* Efectos de carga */
    .form-loading {
        position: relative;
        overflow: hidden;
    }

    .form-loading::after {
        content: '';
        position: absolute;
        top: 0;
        left: -100%;
        width: 100%;
        height: 2px;
        background: linear-gradient(90deg, transparent, #dc2626, transparent);
        animation: loading 2s infinite;
    }

    @keyframes loading {
        0% { left: -100%; }
        100% { left: 100%; }
    }

    /* Responsive Design */
    @media (max-width: 768px) {
        .main-content {
            margin: 10px;
            padding: 20px;
        }
        
        .modern-form {
            padding: 25px;
        }
        
        .header {
            padding: 10px 15px;
            flex-direction: column;
            gap: 10px;
        }
        
        .titulo-centro {
            font-size: 18px;
            position: static;
            transform: none;
            margin: 10px 0;
        }

        .header-left, .header-right {
            width: 100%;
            justify-content: center;
        }

        .header-right {
            flex-direction: row;
            gap: 10px;
        }

        .main-content h4 {
            font-size: 22px;
        }
    }

    /* Estados de validación */
    .modern-form input.error {
        border-color: #ef4444;
        background-color: #fef2f2;
    }

    .modern-form input.success {
        border-color: #10b981;
        background-color: #f0fdf4;
    }

    .error-message {
        color: #ef4444;
        font-size: 14px;
        margin-top: 5px;
        display: flex;
        align-items: center;
    }

    .error-message i {
        margin-right: 5px;
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
  </style>
</head>

<body>
  <header class="header">
    <div class="header-left">
      <img src="../../img/INT.png" alt="Logo INT" class="logo" />
    </div>
    
    <h1 class="titulo-centro">SISTEMA DE GESTIÓN ACADÉMICA - INT</h1>
    
    <div class="header-right">
      <a href="../../index.php" class="back-btn">
        <i class="fas fa-arrow-left"></i> Regresar</a>
      <button class="logout-btn">
        <i class="fas fa-sign-out-alt"></i> Cerrar Sesión
      </button>
    </div>
  </header>

  <div class="container">
    <!-- Contenido principal sin sidebar -->
    <div class="main-content">
      <h4><i class="fas fa-upload"></i> Subir Informe de Prácticas</h4>
      
      <form class="modern-form" action="procesar_informe.php" method="POST" enctype="multipart/form-data" id="informeForm">
        <section>
          <label for="cedula">
            <i class="fas fa-id-card" style="margin-right: 8px; color: #dc2626;"></i>
            Cédula del Estudiante
          </label>
          <input type="text" name="cedula" id="cedula" required placeholder="Ingrese el número de cédula">
          <div class="error-message" id="cedulaError" style="display: none;">
            <i class="fas fa-exclamation-circle"></i>
            Por favor ingrese una cédula válida
          </div>
        </section>

        <section>
          <label for="informe">
            <i class="fas fa-file-pdf" style="margin-right: 8px; color: #dc2626;"></i>
            Informe en PDF
          </label>
          <input type="file" name="informe" id="informe" accept=".pdf" required>
          <div class="error-message" id="archivoError" style="display: none;">
            <i class="fas fa-exclamation-circle"></i>
            Por favor seleccione un archivo PDF válido
          </div>
        </section>

        <div class="note-text">
          <i class="fas fa-info-circle"></i>
          <div>
            <strong>Importante:</strong> El nombre del archivo debe seguir el formato: 
            <em>APELLIDO1_APELLIDO2_NOMBRE1_NOMBRE2.pdf</em>
            <br>
            <small>Ejemplo: GONZALEZ_RODRIGUEZ_JUAN_CARLOS.pdf</small>
          </div>
        </div>

        <div class="form-footer">
          <button type="submit" class="btn btn-primary">
            <i class="fas fa-cloud-upload-alt"></i>
            Subir Informe
          </button>
        </div>
      </form>
    </div>
  </div>

  <div class="footer">
    <p>Sistema de Gestión Académica © 2025 - Instituto Superior Tecnológico</p>
  </div>

  <script>
    document.addEventListener('DOMContentLoaded', function () {
      const form = document.getElementById('informeForm');
      const cedulaInput = document.getElementById('cedula');
      const archivoInput = document.getElementById('informe');
      const cedulaError = document.getElementById('cedulaError');
      const archivoError = document.getElementById('archivoError');
      
      // Validación de cédula ecuatoriana
      // function validarCedulaEcuatoriana(cedula) {
      //   if (cedula.length !== 10) return false;
        
      //   const digitos = cedula.split('').map(Number);
      //   const provincia = parseInt(cedula.substring(0, 2));
        
      //   if (provincia < 1 || provincia > 24) return false;
        
      //   let suma = 0;
      //   for (let i = 0; i < 9; i++) {
      //     let digito = digitos[i];
      //     if (i % 2 === 0) {
      //       digito *= 2;
      //       if (digito > 9) digito -= 9;
      //     }
      //     suma += digito;
      //   }
        
      //   const digitoVerificador = (Math.ceil(suma / 10) * 10) - suma;
      //   return digitoVerificador === digitos[9] || (digitoVerificador === 10 && digitos[9] === 0);
      // }
      
      // Validación en tiempo real de la cédula
      // cedulaInput.addEventListener('input', function() {
      //   const cedula = this.value.replace(/\D/g, ''); // Solo números
      //   this.value = cedula;
        
      //   if (cedula.length === 10) {
      //     if (validarCedulaEcuatoriana(cedula)) {
      //       this.classList.remove('error');
      //       this.classList.add('success');
      //       cedulaError.style.display = 'none';
      //     } else {
      //       this.classList.add('error');
      //       this.classList.remove('success');
      //       cedulaError.textContent = 'La cédula ingresada no es válida';
      //       cedulaError.style.display = 'flex';
      //     }
      //   } else {
      //     this.classList.remove('error', 'success');
      //     cedulaError.style.display = 'none';
      //   }
      // });
      
      // Validación del archivo
      archivoInput.addEventListener('change', function() {
        const file = this.files[0];
        if (file) {
          if (file.type !== 'application/pdf') {
            this.classList.add('error');
            archivoError.textContent = 'El archivo debe ser un PDF';
            archivoError.style.display = 'flex';
          } else if (file.size > 10 * 1024 * 1024) { // 10MB
            this.classList.add('error');
            archivoError.textContent = 'El archivo no debe superar los 10MB';
            archivoError.style.display = 'flex';
          } else {
            this.classList.remove('error');
            this.classList.add('success');
            archivoError.style.display = 'none';
          }
        }
      });
      
      // Validación del formulario al enviarlo
      form.addEventListener('submit', function(e) {
        let isValid = true;
        
        // Validar cédula
        if (!validarCedulaEcuatoriana(cedulaInput.value)) {
          e.preventDefault();
          cedulaInput.classList.add('error');
          cedulaError.textContent = 'Por favor ingrese una cédula ecuatoriana válida';
          cedulaError.style.display = 'flex';
          isValid = false;
        }
        
        // Validar archivo
        const file = archivoInput.files[0];
        if (!file || file.type !== 'application/pdf') {
          e.preventDefault();
          archivoInput.classList.add('error');
          archivoError.textContent = 'Por favor seleccione un archivo PDF válido';
          archivoError.style.display = 'flex';
          isValid = false;
        }
        
        if (isValid) {
          // Mostrar efecto de carga
          form.classList.add('form-loading');
          const submitBtn = form.querySelector('.btn-primary');
          submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Subiendo...';
          submitBtn.disabled = true;
        }
      });
      
      // Botón de cerrar sesión
      document.querySelector('.logout-btn').addEventListener('click', function () {
        if (confirm('¿Está seguro que desea cerrar sesión?')) {
          // Aquí iría la lógica de logout
          window.location.href = '../../logout.php';
        }
      });
      
      // Efecto de enfoque suave en inputs
      const inputs = document.querySelectorAll('input');
      inputs.forEach(input => {
        input.addEventListener('focus', function() {
          this.parentElement.style.transform = 'scale(1.02)';
          this.parentElement.style.transition = 'transform 0.3s ease';
        });
        
        input.addEventListener('blur', function() {
          this.parentElement.style.transform = 'scale(1)';
        });
      });
    });
  </script>
</body>
</html>