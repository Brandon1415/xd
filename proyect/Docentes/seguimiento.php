<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Seguimiento - Gestión Académica</title>
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
    }

    /* Título centrado */
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
        animation: fadeIn 0.6s ease-out;
    }

    /* Título de la página */
    .page-title {
        color: #1a1a1a;
        font-size: 28px;
        font-weight: 600;
        margin-bottom: 30px;
        display: flex;
        align-items: center;
        border-bottom: 3px solid #dc2626;
        padding-bottom: 15px;
    }

    .page-title i {
        margin-right: 15px;
        color: #dc2626;
        font-size: 24px;
    }

    /* Tabla de seguimiento */
    .table-container {
        background: white;
        border-radius: 15px;
        overflow: hidden;
        box-shadow: 0 8px 25px rgba(0, 0, 0, 0.1);
        margin-bottom: 30px;
    }

    .table {
        width: 100%;
        max-width: none;
        margin: 0;
        border-collapse: separate;
        border-spacing: 0;
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        background-color: #fff;
    }

    .table thead {
        background: linear-gradient(135deg, #1a1a1a 0%, #000000 100%);
        color: white;
    }

    .table thead th {
        padding: 20px;
        text-align: left;
        border-bottom: none;
        user-select: none;
        font-weight: 600;
        font-size: 16px;
        letter-spacing: 0.5px;
        position: relative;
    }

    .table thead th::after {
        content: '';
        position: absolute;
        bottom: 0;
        left: 0;
        right: 0;
        height: 2px;
        background: linear-gradient(90deg, #dc2626 0%, #b91c1c 100%);
    }

    .table tbody tr {
        background-color: #f9f9f9;
        transition: all 0.3s ease;
        border-bottom: 1px solid #e9ecef;
    }

    .table tbody tr:hover {
        background: linear-gradient(90deg, rgba(220, 38, 38, 0.05) 0%, rgba(220, 38, 38, 0.02) 100%);
        transform: translateX(5px);
        box-shadow: 0 4px 15px rgba(220, 38, 38, 0.1);
    }

    .table tbody tr:nth-child(even) {
        background-color: #ffffff;
    }

    .table tbody tr:nth-child(even):hover {
        background: linear-gradient(90deg, rgba(220, 38, 38, 0.05) 0%, rgba(220, 38, 38, 0.02) 100%);
    }

    .table tbody td {
        padding: 18px 20px;
        border-bottom: none;
        vertical-align: middle;
        font-size: 15px;
        color: #333;
        position: relative;
    }

    /* Estados con colores */
    .estado-aprobado {
        color: #059669;
        font-weight: 600;
        background: rgba(5, 150, 105, 0.1);
        padding: 6px 12px;
        border-radius: 20px;
        display: inline-block;
        font-size: 14px;
    }

    .estado-observado {
        color: #d97706;
        font-weight: 600;
        background: rgba(217, 119, 6, 0.1);
        padding: 6px 12px;
        border-radius: 20px;
        display: inline-block;
        font-size: 14px;
    }

    .estado-pendiente {
        color: #dc2626;
        font-weight: 600;
        background: rgba(220, 38, 38, 0.1);
        padding: 6px 12px;
        border-radius: 20px;
        display: inline-block;
        font-size: 14px;
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
        
        .titulo-centro {
            position: static;
            transform: none;
            font-size: 18px;
            order: -1;
            margin-bottom: 10px;
        }

        .header-left {
            order: 1;
        }

        .header-right {
            order: 2;
            width: 100%;
            justify-content: center;
        }

        .page-title {
            font-size: 24px;
        }

        .table {
            font-size: 14px;
        }

        .table thead th,
        .table tbody td {
            padding: 12px 10px;
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
    
    <h1 class="titulo-centro">SISTEMA DE GESTIÓN DE ARCHIVOS - INT</h1>
    
    <div class="header-right">
      <a href="tutorados.php" class="back-btn">
        <i class="fas fa-arrow-left"></i> Regresar
      </a>
      <a href="../logout.php" class="logout-btn">
        <i class="fas fa-sign-out-alt"></i> Cerrar Sesión
      </a>
    </div>
  </header>

  <div class="main-content">
    <h2 class="page-title">
      <i class="fas fa-chart-line"></i>
      Seguimiento de Estudiante
    </h2>

    <div class="table-container">
      <table class="table">
        <thead>
          <tr>
            <th><i class="fas fa-calendar-alt"></i> Fecha</th>
            <th><i class="fas fa-tasks"></i> Actividad</th>
            <th class="fas fa-comment"></i> Comentario</th>
            <th><i class="fas fa-flag"></i> Estado</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>2025-03-01</td>
            <td>Entrega de plan</td>
            <td>Bien estructurado</td>
            <td><span class="estado-aprobado">Aprobado</span></td>
          </tr>
          <tr>
            <td>2025-04-10</td>
            <td>Entrega de informe parcial</td>
            <td>Faltan evidencias</td>
            <td><span class="estado-observado">Observado</span></td>
          </tr>
          <tr>
            <td>2025-04-25</td>
            <td>Informe final</td>
            <td>En revisión</td>
            <td><span class="estado-pendiente">Pendiente</span></td>
          </tr>
          <tr>
            <td>2025-05-15</td>
            <td>Presentación oral</td>
            <td>Programada para próxima semana</td>
            <td><span class="estado-pendiente">Pendiente</span></td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>

  <div class="footer">
    <p>Sistema de Gestión Documental © 2025 - Instituto Superior</p>
  </div>

  <script>
    // Efecto de entrada para las filas de la tabla
    document.addEventListener('DOMContentLoaded', function() {
      const rows = document.querySelectorAll('.table tbody tr');
      rows.forEach((row, index) => {
        row.style.opacity = '0';
        row.style.transform = 'translateY(20px)';
        
        setTimeout(() => {
          row.style.transition = 'opacity 0.5s ease, transform 0.5s ease';
          row.style.opacity = '1';
          row.style.transform = 'translateY(0)';
        }, index * 100);
      });
    });
  </script>
</body>
</html>