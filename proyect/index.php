<!-- <?php
// session_start();

// if (!isset($_SESSION['cedula'])) {
//     header("Location: login.php");
//     exit;
// }else{
  
// }

?> -->


<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Director de Unidad - Gestión Académica</title>
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
        z-index: 2;
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
    }

    .header-right {
        display: flex;
        align-items: center;
        z-index: 2;
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

    /* Barra lateral */
    .sidebar {
        width: 280px;
        background: rgba(255, 255, 255, 0.95);
        backdrop-filter: blur(10px);
        box-shadow: 2px 0 15px rgba(0, 0, 0, 0.1);
        padding: 20px 0;
        flex-shrink: 0;
        border-right: 1px solid rgba(220, 38, 38, 0.1);
    }

    /* Secciones del menú */
    .menu-section {
        margin-bottom: 5px;
    }

    .menu-section h2 {
        color: #1a1a1a;
        font-size: 16px;
        font-weight: 600;
        padding: 15px 20px;
        background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
        cursor: pointer;
        display: flex;
        justify-content: space-between;
        align-items: center;
        transition: all 0.3s ease;
        border-left: 4px solid transparent;
    }

    .menu-section h2:hover {
        background: linear-gradient(135deg, #dc2626 0%, #b91c1c 100%);
        color: white;
        border-left: 4px solid #dc2626;
        transform: translateX(5px);
    }

    .menu-section h2 .expand-icon {
        transition: transform 0.3s ease;
        font-size: 12px;
        margin-left: auto;
    }

    .menu-section h2.collapsed .expand-icon {
        transform: rotate(-90deg);
    }

    /* MODIFICACIÓN PRINCIPAL: Hacer el menú siempre visible */
    .menu-section ul {
        list-style: none;
        max-height: none; /* Cambiado de 0 a none */
        overflow: visible; /* Cambiado de hidden a visible */
        transition: max-height 0.4s ease-out;
        background-color: #fafafa;
        display: block; /* Asegurar que esté visible */
    }

    .menu-section.active ul {
        max-height: 400px;
    }

    /* Clase para ocultar cuando se colapsa manualmente */
    .menu-section.collapsed ul {
        max-height: 0;
        overflow: hidden;
    }

    .menu-section li {
        padding: 12px 20px 12px 35px;
        color: #555;
        cursor: pointer;
        transition: all 0.3s ease;
        border-left: 4px solid transparent;
        position: relative;
    }

    .menu-section li a {
        color: inherit;
        text-decoration: none;
        display: flex;
        align-items: center;
    }

    .menu-section li::before {
        content: '';
        position: absolute;
        left: 20px;
        top: 50%;
        transform: translateY(-50%);
        width: 6px;
        height: 6px;
        background-color: #dc2626;
        border-radius: 50%;
        opacity: 0;
        transition: opacity 0.3s ease;
    }

    .menu-section li:hover {
        color: #dc2626;
        background: linear-gradient(90deg, rgba(220, 38, 38, 0.1) 0%, transparent 100%);
        border-left: 4px solid #dc2626;
        font-weight: 500;
    }

    .menu-section li:hover::before {
        opacity: 1;
    }

    .menu-section li i {
        margin-right: 8px;
        width: 16px;
    }

    /* Contenido principal */
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

    /* Barra de búsqueda */
    .search-bar {
        display: flex;
        margin-bottom: 25px;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
        border-radius: 10px;
        overflow: hidden;
    }

    .search-bar input {
        flex: 1;
        padding: 15px 20px;
        border: none;
        outline: none;
        font-size: 16px;
        background-color: white;
    }

    .search-bar input::placeholder {
        color: #999;
    }

    .search-bar button {
        background: linear-gradient(135deg, #1a1a1a 0%, #000000 100%);
        color: white;
        border: none;
        padding: 15px 25px;
        cursor: pointer;
        font-weight: 500;
        transition: all 0.3s ease;
    }

    .search-bar button:hover {
        background: linear-gradient(135deg, #dc2626 0%, #b91c1c 100%);
        transform: scale(1.05);
    }

    /* Panel de control */
    .dashboard-panel {
        background: white;
        padding: 30px;
        border-radius: 15px;
        border-left: 5px solid #dc2626;
        box-shadow: 0 8px 25px rgba(0, 0, 0, 0.1);
        position: relative;
        overflow: hidden;
    }

    .dashboard-panel::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        height: 3px;
        background: linear-gradient(90deg, #dc2626 0%, #b91c1c 50%, #dc2626 100%);
    }

    .dashboard-panel h2 {
        color: #1a1a1a;
        margin-bottom: 15px;
        font-size: 24px;
        font-weight: 600;
    }

    .dashboard-panel p {
        color: #666;
        margin-bottom: 15px;
        line-height: 1.6;
        font-size: 16px;
    }

    .dashboard-panel strong {
        color: #dc2626;
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

    /* Animaciones y efectos adicionales */
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

    .main-content {
        animation: fadeIn 0.6s ease-out;
    }

    /* Responsive Design */
    @media (max-width: 768px) {
        .container {
            flex-direction: column;
        }
        
        .sidebar {
            width: 100%;
            order: 2;
        }
        
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
        
        .titulo-centro {
            font-size: 16px;
            position: relative;
            transform: none;
            left: auto;
            margin: 10px 0;
        }

        .header-left, .header-right {
            width: 100%;
            justify-content: center;
        }
    }

    /* Estados activos */
    .menu-section li.active {
        background: linear-gradient(90deg, rgba(220, 38, 38, 0.15) 0%, transparent 100%);
        color: #dc2626;
        border-left: 4px solid #dc2626;
        font-weight: 600;
    }

    .menu-section li.active::before {
        opacity: 1;
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

    /* Efectos de hover mejorados */
    .menu-section h2 i:first-child {
        margin-right: 10px;
        transition: transform 0.3s ease;
    }

    .menu-section h2:hover i:first-child {
        transform: scale(1.1);
    }

    /* Indicador visual para enlaces */
    .menu-section li a:hover {
        color: #dc2626;
    }
    
  </style>
</head>
<body>
  <header class="header">
    <div class="header-left">
      <img src="img/INT.png" alt="Logo INT" class="logo" />
    </div>
    <div class="titulo-centro">
      SISTEMA DE GESTIÓN DE ARCHIVOS - INT
    </div>
    <div class="header-right">
      <a href="logout.php" class="logout-btn">
        <i class="fas fa-sign-out-alt"></i> Cerrar Sesión
      </a>
    </div>
  </header>

  <div class="container">
    <div class="sidebar">
      <div class="menu-section">
        <h2><i class="fas fa-user-graduate"></i> Estudiantes <i class="fas fa-chevron-down expand-icon"></i></h2>
        <ul>
          <li><a href="estudiantes/generar_solicitud/solicitud.php">
            <i class="fas fa-pen"></i> Formato de solicitud prácticas</a>
          </li>
          <li><a href="estudiantes/subir_informe/subir_informe.php">
            <i class="fas fa-upload"></i> Subir informes</a>
          </li>
          <li><a href="#reportes">
            <i class="fas fa-exclamation-triangle"></i> Reportes</a>
          </li>
        </ul>
      </div>

      <div class="menu-section">
        <h2><i class="fas fa-chalkboard-teacher"></i> Docentes <i class="fas fa-chevron-down expand-icon"></i></h2>
        <ul>
          <li><a href="Docentes/tutorados.php">
            <i class="fas fa-users"></i> Tutorados</a>
          </li>
          <li><a href="Docentes/seguimiento.php">
            <i class="fas fa-chart-line"></i> Seguimiento</a>
          </li>
          <li><a href="Docentes/revisar_informes.php">
            <i class="fas fa-file-alt"></i> Revisión de Informes</a>
          </li>
          <li><a href="Docentes/notificaciones.php">
            <i class="fas fa-bell"></i> Enviar Notificaciones</a>
          </li>
        </ul>
      </div>

      <div class="menu-section">
        <h2><i class="fas fa-tools"></i> Área de Prácticas <i class="fas fa-chevron-down expand-icon"></i></h2>
        <ul>
          <li><a href="#proyectos">
            <i class="fas fa-project-diagram"></i> Proyectos</a>
          </li>
          <li><a href="#horarios">
            <i class="fas fa-clock"></i> Horarios</a>
          </li>
          <li><a href="#tutores">
            <i class="fas fa-user-tie"></i> Tutores</a>
          </li>
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
        <p>Bienvenido, <strong>Usuario</strong>! Seleccione una opción del menú lateral para comenzar.</p>
        <p>Este sistema le permite gestionar de manera eficiente todos los aspectos relacionados con las prácticas académicas, desde la solicitud hasta el seguimiento y evaluación de los estudiantes.</p>
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
          const isCollapsed = parent.classList.contains('collapsed');
          
          // Toggle collapsed state
          if (isCollapsed) {
            parent.classList.remove('collapsed');
            this.classList.remove('collapsed');
          } else {
            parent.classList.add('collapsed');
            this.classList.add('collapsed');
          }
        });
      });

      // Efecto de búsqueda
      const searchInput = document.querySelector('.search-bar input');
      const searchButton = document.querySelector('.search-bar button');
      
      searchButton.addEventListener('click', function() {
        const searchTerm = searchInput.value.trim();
        if (searchTerm) {
          // Aquí podrías implementar la lógica de búsqueda
          console.log('Buscando:', searchTerm);
        }
      });

      searchInput.addEventListener('keypress', function(e) {
        if (e.key === 'Enter') {
          searchButton.click();
        }
      });

      // Efecto de hover en los elementos del menú
      const menuItems = document.querySelectorAll('.menu-section li');
      menuItems.forEach(item => {
        item.addEventListener('mouseenter', function() {
          this.style.transform = 'translateX(3px)';
        });
        
        item.addEventListener('mouseleave', function() {
          this.style.transform = 'translateX(0)';
        });
      });
    });
  </script>
</body>
</html>