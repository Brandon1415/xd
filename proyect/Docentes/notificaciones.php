<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Enviar Notificaciones - Gestión Académica</title>
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

    .header h1 {
        position: absolute;
        left: 50%;
        transform: translateX(-50%);
        font-size: 22px;
        font-weight: 700;
        letter-spacing: 0.5px;
        color: white;
        text-align: center;
        white-space: nowrap;
        z-index: 1;
        text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.3);
        animation: fadeInDown 0.8s ease-out 0.3s both;
    }

    .header-right {
        display: flex;
        align-items: center;
        gap: 15px;
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
        animation: fadeIn 0.6s ease-out;
    }

    /* Título de la página */
    .page-title {
        color: #1a1a1a;
        font-size: 28px;
        font-weight: 600;
        margin-bottom: 30px;
        padding-bottom: 15px;
        border-bottom: 3px solid #dc2626;
        position: relative;
    }

    .page-title::after {
        content: '';
        position: absolute;
        bottom: -3px;
        left: 0;
        width: 100px;
        height: 3px;
        background: linear-gradient(90deg, #dc2626 0%, #b91c1c 100%);
    }

    /* Formulario */
    .form-container {
        background: white;
        padding: 30px;
        border-radius: 15px;
        border-left: 5px solid #dc2626;
        box-shadow: 0 8px 25px rgba(0, 0, 0, 0.1);
        position: relative;
        overflow: hidden;
    }

    .form-container::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        height: 3px;
        background: linear-gradient(90deg, #dc2626 0%, #b91c1c 50%, #dc2626 100%);
    }

    .form-label {
        color: #1a1a1a;
        font-weight: 600;
        margin-bottom: 8px;
        display: block;
        font-size: 16px;
    }

    .form-select, .form-control {
        width: 100%;
        padding: 12px 15px;
        border: 2px solid #e5e7eb;
        border-radius: 8px;
        font-size: 16px;
        transition: all 0.3s ease;
        background-color: #fafafa;
    }

    .form-select:focus, .form-control:focus {
        outline: none;
        border-color: #dc2626;
        box-shadow: 0 0 0 3px rgba(220, 38, 38, 0.1);
        background-color: white;
    }

    .form-control {
        resize: vertical;
        min-height: 120px;
    }

    .mb-3 {
        margin-bottom: 20px;
    }

    .mt-4 {
        margin-top: 25px;
    }

    .mt-5 {
        margin-top: 35px;
    }

    /* Botones */
    .btn {
        padding: 12px 25px;
        border: none;
        border-radius: 8px;
        font-weight: 600;
        font-size: 16px;
        cursor: pointer;
        transition: all 0.3s ease;
        display: inline-flex;
        align-items: center;
        text-decoration: none;
    }

    .btn-primary {
        background: linear-gradient(135deg, #dc2626 0%, #b91c1c 100%);
        color: white;
        box-shadow: 0 4px 15px rgba(220, 38, 38, 0.3);
    }

    .btn-primary:hover {
        background: linear-gradient(135deg, #b91c1c 0%, #991b1b 100%);
        transform: translateY(-2px);
        box-shadow: 0 6px 20px rgba(220, 38, 38, 0.4);
    }

    .btn i {
        margin-right: 8px;
    }

    /* Alertas */
    .alert {
        padding: 15px 20px;
        border-radius: 8px;
        font-size: 16px;
        font-weight: 500;
        position: relative;
        border-left: 4px solid;
    }

    .alert-success {
        background-color: #d1fae5;
        color: #065f46;
        border-left-color: #10b981;
        box-shadow: 0 4px 15px rgba(16, 185, 129, 0.2);
    }

    .alert strong {
        font-weight: 600;
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
            transform: translateX(-50%) translateY(-20px);
        }
        to {
            opacity: 1;
            transform: translateX(-50%) translateY(0);
        }
    }

    @keyframes pulse {
        0%, 100% {
            transform: scale(1.05);
        }
        50% {
            transform: scale(1.1);
        }
    }

    /* Responsive Design */
    @media (max-width: 768px) {
        .main-content {
            margin: 10px;
            padding: 20px;
        }
        
        .header {
            padding: 10px 15px;
            flex-direction: column;
            gap: 10px;
            position: relative;
        }

        .header h1 {
            position: static;
            transform: none;
            font-size: 18px;
            text-align: center;
            width: 100%;
            order: 1;
        }

        .header-left {
            order: 0;
            width: 100%;
            justify-content: center;
        }

        .header-right {
            order: 2;
            width: 100%;
            justify-content: center;
            flex-direction: row;
            gap: 10px;
        }

        .page-title {
            font-size: 24px;
        }

        .form-container {
            padding: 20px;
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
  </style>
</head>
<body>
  <header class="header">
    <div class="header-left">
      <img src="../img/INT.png" alt="Logo INT" class="logo" />
    </div>
    <h1>SISTEMA DE GESTIÓN DE ARCHIVOS - INT</h1>
    <div class="header-right">
      <a href="../index.php" class="back-btn">
        <i class="fas fa-arrow-left"></i> Regresar
      </a>
      <a href="../logout.php" class="logout-btn">
        <i class="fas fa-sign-out-alt"></i> Cerrar Sesión
      </a>
    </div>
  </header>

  <div class="main-content">
    <h2 class="page-title">
      <i class="fas fa-bell"></i> Enviar Notificación a Tutorados
    </h2>
    
    <div class="form-container">
      <form action="#" method="post">
        <div class="mb-3">
          <label for="estudiante" class="form-label">
            <i class="fas fa-user-graduate"></i> Seleccionar Estudiante:
          </label>
          <select class="form-select" name="estudiante" id="estudiante" required>
            <option value="">-- Seleccione un estudiante --</option>
            <option value="Laura Gómez">Laura Gómez</option>
            <option value="Carlos Méndez">Carlos Méndez</option>
            <option value="Andrea Pérez">Andrea Pérez</option>
          </select>
        </div>

        <div class="mb-3">
          <label for="mensaje" class="form-label">
            <i class="fas fa-comment-alt"></i> Mensaje:
          </label>
          <textarea name="mensaje" id="mensaje" rows="5" class="form-control" 
                    placeholder="Escribe tu mensaje aquí..." required></textarea>
        </div>

        <button type="submit" class="btn btn-primary">
          <i class="fas fa-paper-plane"></i> Enviar Notificación
        </button>
      </form>

      <div class="alert alert-success mt-4" style="display: none;" id="success-alert">
        <i class="fas fa-check-circle"></i> 
        <strong>¡Notificación enviada exitosamente!</strong><br>
        <strong>Destinatario:</strong> <span id="destinatario"></span><br>
        <strong>Mensaje:</strong> "<span id="mensaje-enviado"></span>"
      </div>
    </div>
  </div>

  <div class="footer">
    <p>Sistema de Gestión Documental © 2025 - Instituto Superior</p>
  </div>

  <script>
    document.addEventListener('DOMContentLoaded', function () {
      // Efecto de focus en los inputs
      const inputs = document.querySelectorAll('.form-select, .form-control');
      inputs.forEach(input => {
        input.addEventListener('focus', function() {
          this.style.transform = 'scale(1.02)';
        });
        
        input.addEventListener('blur', function() {
          this.style.transform = 'scale(1)';
        });
      });

      // Validación del formulario
      const form = document.querySelector('form');
      form.addEventListener('submit', function(e) {
        e.preventDefault();
        
        const estudiante = document.getElementById('estudiante').value;
        const mensaje = document.getElementById('mensaje').value.trim();
        
        if (!estudiante || !mensaje) {
          alert('Por favor, complete todos los campos antes de enviar.');
          return false;
        }
        
        if (mensaje.length < 10) {
          alert('El mensaje debe tener al menos 10 caracteres.');
          return false;
        }

        // Mostrar alerta de éxito
        document.getElementById('destinatario').textContent = estudiante;
        document.getElementById('mensaje-enviado').textContent = mensaje;
        document.getElementById('success-alert').style.display = 'block';
        
        // Limpiar formulario
        form.reset();
        
        // Scroll hacia la alerta
        document.getElementById('success-alert').scrollIntoView({ behavior: 'smooth' });
      });

      // Contador de caracteres para el textarea
      const textarea = document.getElementById('mensaje');
      const label = document.querySelector('label[for="mensaje"]');
      
      textarea.addEventListener('input', function() {
        const count = this.value.length;
        const originalText = label.innerHTML.split('<span')[0];
        label.innerHTML = originalText + ` <span style="color: #6b7280; font-size: 14px;">(${count} caracteres)</span>`;
      });
    });
  </script>
</body>
</html>