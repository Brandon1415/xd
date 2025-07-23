<?php
// listado_tutorados.php
require_once __DIR__.'/includes/conexion.php';?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
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
    <div class="main-content">
      <h2><i class="fas fa-users"></i> Listado de Tutorados</h2>

      <div class="table-container">
        <div class="table-responsive">
          <table class="table">
            <thead class="table-dark">
              <tr>
                <th><i class="fas fa-id-card"></i> Cédula</th>
                <th><i class="fas fa-user"></i> Nombre Completo</th>
                <th><i class="fas fa-graduation-cap"></i> Carrera</th>
                <th><i class="fas fa-info-circle"></i> Estado Informe</th>
                <th><i class="fas fa-cogs"></i> Acciones</th>
              </tr>
            </thead>
            <tbody>
              <?php
              try {
                $sql = "
                  SELECT u.cedula, u.nombre, u.apellido, u.carrera,
                         CASE WHEN i.id IS NULL THEN 0 ELSE 1 END AS tiene_informe
                  FROM usuarios u
                  LEFT JOIN informes i ON u.cedula = i.cedula
                  WHERE u.rol COLLATE utf8mb4_general_ci = 'Estudiante' COLLATE utf8mb4_general_ci
                  ORDER BY u.apellido, u.nombre
                ";
                $stmt = $pdo->query($sql);

                while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                  $iniciales = strtoupper(substr($row['nombre'], 0, 1) . substr($row['apellido'], 0, 1));
                  $nombreCompleto = htmlspecialchars($row['nombre'] . ' ' . $row['apellido']);
                  $cedula = htmlspecialchars($row['cedula']);
                  $carrera = htmlspecialchars($row['carrera']);
                  $tieneInforme = (int)$row['tiene_informe'];

                  if ($tieneInforme) {
                    $estadoTexto = 'Informe Subido';
                    $estadoClase = 'estado-finalizado';
                    $icon = 'fa-check-circle';
                  } else {
                    $estadoTexto = 'Pendiente de Informe';
                    $estadoClase = 'estado-pendiente';
                    $icon = 'fa-exclamation-triangle';
                  }

                  echo "
                  <tr>
                    <td>$cedula</td>
                    <td>
                      <div style='display: flex; align-items: center; gap: 10px;'>
                        <div style='width: 40px; height: 40px; background: linear-gradient(135deg, #dc2626, #b91c1c); border-radius: 50%; display: flex; align-items: center; justify-content: center; color: white; font-weight: bold; font-size: 14px;'>
                          $iniciales
                        </div>
                        <div>
                          <strong>$nombreCompleto</strong>
                        </div>
                      </div>
                    </td>
                    <td><strong>$carrera</strong></td>
                    <td>
                      <span class='estado-badge $estadoClase'>
                        <i class='fas $icon'></i> $estadoTexto
                      </span>
                    </td>
                    <td>
                      <a href='seguimiento.php?cedula=" . urlencode($cedula) . "' class='btn-primary'>
                        <i class='fas fa-chart-line'></i> Ver Seguimiento
                      </a>
                    </td>
                  </tr>
                  ";
                }
              } catch (PDOException $e) {
                echo "<tr><td colspan='5'>Error al obtener datos: " . htmlspecialchars($e->getMessage()) . "</td></tr>";
              }
              ?>
            </tbody>
          </table>
        </div>
      </div>

    </div>
  </div>

  <footer class="footer">
    <p>Sistema de Gestión Documental © 2025 - Instituto Superior</p>
  </footer>
</body>
</html>
