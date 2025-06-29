<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Listado de Tutorados - Gestión Académica</title>
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
        flex: 1;
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

    .header h1 {
        position: absolute;
        left: 50%;
        transform: translateX(-50%);
        font-size: 24px;
        font-weight: 600;
        letter-spacing: 0.5px;
        text-align: center;
        white-space: nowrap;
        z-index: 1;
        text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.3);
    }

    .header-right {
        display: flex;
        align-items: center;
        gap: 15px;
        flex: 1;
        justify-content: flex-end;
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

    .main-content h2 {
        color: #1a1a1a;
        margin-bottom: 25px;
        font-size: 28px;
        font-weight: 600;
        border-bottom: 3px solid #dc2626;
        padding-bottom: 10px;
        display: flex;
        align-items: center;
    }

    .main-content h2 i {
        margin-right: 15px;
        color: #dc2626;
        font-size: 24px;
    }

    /* Estadísticas rápidas */
    .stats-container {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
        gap: 20px;
        margin-bottom: 30px;
    }

    .stat-card {
        background: linear-gradient(135deg, #ffffff 0%, #f8f9fa 100%);
        padding: 20px;
        border-radius: 12px;
        border-left: 4px solid #dc2626;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
        transition: all 0.3s ease;
    }

    .stat-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 8px 25px rgba(0, 0, 0, 0.15);
        border-left: 4px solid #dc2626;
        background: linear-gradient(135deg, #fef2f2 0%, #ffffff 100%);
    }

    .stat-card h3 {
        font-size: 2rem;
        color: #dc2626;
        margin-bottom: 5px;
        font-weight: 700;
    }

    .stat-card p {
        color: #666;
        font-size: 0.9rem;
        margin: 0;
    }

    .stat-card i {
        float: right;
        font-size: 2rem;
        color: #dc2626;
        opacity: 0.3;
    }

    /* Tabla moderna */
    .table-container {
        background: white;
        border-radius: 15px;
        overflow: hidden;
        box-shadow: 0 8px 25px rgba(0, 0, 0, 0.1);
        border: 1px solid rgba(220, 38, 38, 0.1);
    }

    .table-responsive {
        overflow-x: auto;
    }

    .table {
        width: 100%;
        border-collapse: separate;
        border-spacing: 0;
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        background-color: #fff;
        margin: 0;
    }

    .table thead.table-dark {
        background: linear-gradient(135deg, #1a1a1a 0%, #000000 100%);
        color: #ffffff;
        font-weight: 600;
        font-size: 1rem;
    }

    .table thead th {
        padding: 20px 24px;
        text-align: left;
        border-bottom: none;
        user-select: none;
        position: sticky;
        top: 0;
        z-index: 10;
        font-weight: 600;
        text-transform: uppercase;
        letter-spacing: 0.5px;
        font-size: 0.85rem;
    }

    .table thead th:first-child {
        border-top-left-radius: 0;
    }

    .table thead th:last-child {
        border-top-right-radius: 0;
    }

    .table tbody tr {
        background-color: #ffffff;
        transition: all 0.3s ease;
        border-bottom: 1px solid #f1f3f4;
        cursor: pointer;
        animation: slideInLeft 0.5s ease-out;
        animation-fill-mode: both;
    }

    .table tbody tr:hover {
        background-color: #f8f9fa;
        box-shadow: 0 4px 12px rgba(220, 38, 38, 0.1);
        transform: translateY(-1px);
    }

    .table tbody tr:nth-child(even) {
        background-color: #fafafa;
    }

    .table tbody tr:nth-child(even):hover {
        background-color: #f8f9fa;
    }

    .table tbody tr:hover td {
        color: #1a1a1a;
    }

    .table tbody td {
        padding: 18px 24px;
        border-bottom: none;
        vertical-align: middle;
        font-size: 0.95rem;
        color: #333;
        position: relative;
    }

    /* Estados de estudiantes */
    .estado-badge {
        padding: 6px 12px;
        border-radius: 20px;
        font-size: 0.8rem;
        font-weight: 600;
        text-transform: uppercase;
        letter-spacing: 0.5px;
        display: inline-flex;
        align-items: center;
        gap: 5px;
    }

    .estado-proceso {
        background: linear-gradient(135deg, #fef3c7 0%, #fde68a 100%);
        color: #92400e;
        border: 1px solid #f59e0b;
    }

    .estado-pendiente {
        background: linear-gradient(135deg, #fecaca 0%, #fca5a5 100%);
        color: #991b1b;
        border: 1px solid #ef4444;
    }

    .estado-finalizado {
        background: linear-gradient(135deg, #d1fae5 0%, #a7f3d0 100%);
        color: #065f46;
        border: 1px solid #10b981;
    }

    /* Botones modernos */
    .btn-primary {
        background: linear-gradient(135deg, #dc2626 0%, #b91c1c 100%);
        border: none;
        padding: 10px 20px;
        border-radius: 8px;
        color: white;
        font-size: 0.9rem;
        font-weight: 600;
        cursor: pointer;
        text-decoration: none;
        display: inline-flex;
        align-items: center;
        gap: 8px;
        transition: all 0.3s ease;
        box-shadow: 0 2px 8px rgba(220, 38, 38, 0.3);
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }

    .btn-primary:hover {
        background: linear-gradient(135deg, #b91c1c 0%, #991b1b 100%);
        transform: translateY(-2px);
        box-shadow: 0 4px 15px rgba(220, 38, 38, 0.4);
        color: white;
        text-decoration: none;
    }

    .btn-primary:active {
        transform: translateY(0);
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

    @keyframes slideInLeft {
        from {
            opacity: 0;
            transform: translateX(-30px);
        }
        to {
            opacity: 1;
            transform: translateX(0);
        }
    }

    .table tbody tr:nth-child(1) { animation-delay: 0.1s; }
    .table tbody tr:nth-child(2) { animation-delay: 0.2s; }
    .table tbody tr:nth-child(3) { animation-delay: 0.3s; }
    .table tbody tr:nth-child(4) { animation-delay: 0.4s; }
    .table tbody tr:nth-child(5) { animation-delay: 0.5s; }

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
            position: static;
        }
        
        .header h1 {
            font-size: 18px;
            position: static;
            transform: none;
            margin: 10px 0;
        }

        .header-left, .header-right {
            width: 100%;
            justify-content: center;
            flex: none;
        }

        .header-right {
            flex-direction: row;
            gap: 10px;
        }

        .main-content h2 {
            font-size: 22px;
        }

        .stats-container {
            grid-template-columns: 1fr;
        }

        .table thead th,
        .table tbody td {
            padding: 12px 16px;
            font-size: 0.85rem;
        }

        .btn-primary {
            padding: 8px 16px;
            font-size: 0.8rem;
        }
    }

    /* Scrollbar personalizado */
    ::-webkit-scrollbar {
        width: 8px;
        height: 8px;
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

    /* Indicadores de carga */
    .loading {
        display: inline-block;
        width: 20px;
        height: 20px;
        border: 3px solid #f3f3f3;
        border-top: 3px solid #dc2626;
        border-radius: 50%;
        animation: spin 1s linear infinite;
    }

    @keyframes spin {
        0% { transform: rotate(0deg); }
        100% { transform: rotate(360deg); }
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
        <i class="fas fa-arrow-left"></i> Regresar al Inicio
      </a>
      <a href="../logout.php" class="logout-btn">
        <i class="fas fa-sign-out-alt"></i> Cerrar Sesión
      </a>
    </div>
  </header>

  <div class="container">
    <!-- Contenido principal sin sidebar -->
    <div class="main-content">
      <h2><i class="fas fa-users"></i> Listado de Tutorados</h2>
      
      <!-- Estadísticas rápidas -->
      <div class="stats-container">
        <div class="stat-card">
          <i class="fas fa-user-graduate"></i>
          <h3>3</h3>
          <p>Total de Estudiantes</p>
        </div>
        <div class="stat-card">
          <i class="fas fa-clock"></i>
          <h3>1</h3>
          <p>En Proceso</p>
        </div>
        <div class="stat-card">
          <i class="fas fa-exclamation-triangle"></i>
          <h3>1</h3>
          <p>Pendientes</p>
        </div>
        <div class="stat-card">
          <i class="fas fa-check-circle"></i>
          <h3>1</h3>
          <p>Finalizados</p>
        </div>
      </div>

      <div class="table-container">
        <div class="table-responsive">
          <table class="table table-bordered table-striped">
            <thead class="table-dark">
              <tr>
                <th><i class="fas fa-user"></i> Nombre del Estudiante</th>
                <th><i class="fas fa-graduation-cap"></i> Programa</th>
                <th><i class="fas fa-info-circle"></i> Estado</th>
                <th><i class="fas fa-cogs"></i> Acciones</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>
                  <div style="display: flex; align-items: center; gap: 10px;">
                    <div style="width: 40px; height: 40px; background: linear-gradient(135deg, #dc2626, #b91c1c); border-radius: 50%; display: flex; align-items: center; justify-content: center; color: white; font-weight: bold; font-size: 14px;">
                      LG
                    </div>
                    <div>
                      <strong>Laura Gómez</strong>
                      <br>
                      <small style="color: #666;">ID: EST-2024-001</small>
                    </div>
                  </div>
                </td>
                <td>
                  <strong>Ingeniería en Sistemas</strong>
                  <br>
                  <small style="color: #666;">Semestre VIII</small>
                </td>
                <td>
                  <span class="estado-badge estado-proceso">
                    <i class="fas fa-spinner"></i>
                    En proceso
                  </span>
                </td>
                <td>
                  <a href="seguimiento.php?estudiante=Laura%20Gómez" class="btn btn-primary">
                    <i class="fas fa-chart-line"></i>
                    Ver Seguimiento
                  </a>
                </td>
              </tr>
              
              <tr>
                <td>
                  <div style="display: flex; align-items: center; gap: 10px;">
                    <div style="width: 40px; height: 40px; background: linear-gradient(135deg, #dc2626, #b91c1c); border-radius: 50%; display: flex; align-items: center; justify-content: center; color: white; font-weight: bold; font-size: 14px;">
                      CM
                    </div>
                    <div>
                      <strong>Carlos Méndez</strong>
                      <br>
                      <small style="color: #666;">ID: EST-2024-002</small>
                    </div>
                  </div>
                </td>
                <td>
                  <strong>Contaduría</strong>
                  <br>
                  <small style="color: #666;">Semestre VI</small>
                </td>
                <td>
                  <span class="estado-badge estado-pendiente">
                    <i class="fas fa-exclamation-triangle"></i>
                    Pendiente de informe
                  </span>
                </td>
                <td>
                  <a href="seguimiento.php?estudiante=Carlos%20Méndez" class="btn btn-primary">
                    <i class="fas fa-chart-line"></i>
                    Ver Seguimiento
                  </a>
                </td>
              </tr>
              
              <tr>
                <td>
                  <div style="display: flex; align-items: center; gap: 10px;">
                    <div style="width: 40px; height: 40px; background: linear-gradient(135deg, #dc2626, #b91c1c); border-radius: 50%; display: flex; align-items: center; justify-content: center; color: white; font-weight: bold; font-size: 14px;">
                      AP
                    </div>
                    <div>
                      <strong>Andrea Pérez</strong>
                      <br>
                      <small style="color: #666;">ID: EST-2024-003</small>
                    </div>
                  </div>
                </td>
                <td>
                  <strong>Diseño Gráfico</strong>
                  <br>
                  <small style="color: #666;">Semestre VII</small>
                </td>
                <td>
                  <span class="estado-badge estado-finalizado">
                    <i class="fas fa-check-circle"></i>
                    Finalizado
                  </span>
                </td>
                <td>
                  <a href="seguimiento.php?estudiante=Andrea%20Pérez" class="btn btn-primary">
                    <i class="fas fa-chart-line"></i>
                    Ver Seguimiento
                  </a>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>

  <div class="footer">
    <p>Sistema de Gestión Documental © 2025 - Instituto Superior</p>
  </div>

  <script>
    document.addEventListener('DOMContentLoaded', function () {
      // Efecto de clic en las filas de la tabla
      const tableRows = document.querySelectorAll('.table tbody tr');
      tableRows.forEach(row => {
        row.addEventListener('click', function(e) {
          // Solo si no se hizo clic en un botón
          if (!e.target.closest('.btn-primary')) {
            const link = this.querySelector('.btn-primary');
            if (link) {
              window.location.href = link.href;
            }
          }
        });
      });

      // Animación de contadores en las estadísticas
      const counters = document.querySelectorAll('.stat-card h3');
      counters.forEach(counter => {
        const target = parseInt(counter.textContent);
        let current = 0;
        const increment = target / 20;
        const timer = setInterval(() => {
          current += increment;
          if (current >= target) {
            counter.textContent = target;
            clearInterval(timer);
          } else {
            counter.textContent = Math.ceil(current);
          }
        }, 50);
      });

      // Confirmación de cerrar sesión
      document.querySelector('.logout-btn').addEventListener('click', function(e) {
        e.preventDefault();
        if (confirm('¿Está seguro que desea cerrar sesión?')) {
          window.location.href = this.href;
        }
      });

      // Filtro de búsqueda en tiempo real (funcionalidad opcional)
      function addSearchFunctionality() {
        const searchInput = document.createElement('input');
        searchInput.type = 'text';
        searchInput.placeholder = 'Buscar estudiante...';
        searchInput.style.cssText = `
          width: 100%;
          max-width: 300px;
          padding: 12px 20px;
          margin-bottom: 20px;
          border: 2px solid #e5e7eb;
          border-radius: 8px;
          font-size: 16px;
          background-color: #fafafa;
          transition: all 0.3s ease;
        `;
        
        const tableContainer = document.querySelector('.table-container');
        tableContainer.parentNode.insertBefore(searchInput, tableContainer);
        
        searchInput.addEventListener('input', function() {
          const searchTerm = this.value.toLowerCase();
          const rows = document.querySelectorAll('.table tbody tr');
          
          rows.forEach(row => {
            const studentName = row.querySelector('td strong').textContent.toLowerCase();
            const program = row.querySelectorAll('td')[1].querySelector('strong').textContent.toLowerCase();
            
            if (studentName.includes(searchTerm) || program.includes(searchTerm)) {
              row.style.display = '';
            } else {
              row.style.display = 'none';
            }
          });
        });
      }
      
      // Descomentar la siguiente línea si quieres activar la funcionalidad de búsqueda
      // addSearchFunctionality();
    });
  </script>
</body>
</html>