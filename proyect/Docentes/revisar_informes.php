<?php
require_once __DIR__.'/includes/conexion.php';
session_start();

// Verificar si el usuario es docente
// if ($_SESSION['rol'] !== 'Docente') {
//     header('Location: ../index.php');
//     exit;
// }

try {
    // Consulta para obtener los informes con datos del estudiante
    $sql = "SELECT i.id, i.cedula, u.nombre, u.apellido, u.carrera,
                   i.nombre_archivo, i.fecha_subida, i.estado, i.observaciones
            FROM informes i
            JOIN usuarios u ON i.cedula = u.cedula
            ORDER BY i.estado ASC, i.fecha_subida DESC";
    
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    $informes = $stmt->fetchAll(PDO::FETCH_ASSOC);

} catch (PDOException $e) {
    die("Error al obtener los informes: " . $e->getMessage());
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Revisión de Informes - Gestión Académica</title>
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
        z-index: 2;
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

    /* Título de página */
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

    /* Contenedor de tabla */
    .table-container {
        background: white;
        border-radius: 15px;
        overflow: hidden;
        box-shadow: 0 8px 25px rgba(0, 0, 0, 0.1);
        border: 1px solid rgba(220, 38, 38, 0.1);
    }

    /* Estilos de tabla */
    .custom-table {
        width: 100%;
        border-collapse: collapse;
        margin: 0;
        font-size: 16px;
    }

    .custom-table thead {
        background: linear-gradient(135deg, #1a1a1a 0%, #000000 100%);
        color: white;
    }

    .custom-table th {
        padding: 18px 15px;
        text-align: left;
        font-weight: 600;
        letter-spacing: 0.5px;
        border-bottom: 2px solid #dc2626;
    }

    .custom-table td {
        padding: 15px;
        border-bottom: 1px solid #e5e7eb;
        vertical-align: middle;
    }

    .custom-table tbody tr {
        transition: all 0.3s ease;
    }

    .custom-table tbody tr:hover {
        background: linear-gradient(90deg, rgba(220, 38, 38, 0.05) 0%, transparent 100%);
        transform: translateX(2px);
    }

    .custom-table tbody tr:nth-child(even) {
        background-color: #f8f9fa;
    }

    .custom-table tbody tr:nth-child(even):hover {
        background: linear-gradient(90deg, rgba(220, 38, 38, 0.08) 0%, rgba(248, 249, 250, 0.8) 100%);
    }

    /* Botones de acción */
    .btn {
        display: inline-block;
        padding: 8px 16px;
        margin: 2px;
        border: none;
        border-radius: 6px;
        cursor: pointer;
        font-size: 14px;
        font-weight: 500;
        text-decoration: none;
        transition: all 0.3s ease;
        text-align: center;
    }

    .btn-primary {
        background: linear-gradient(135deg, #3b82f6 0%, #2563eb 100%);
        color: white;
        box-shadow: 0 2px 8px rgba(59, 130, 246, 0.3);
    }

    .btn-primary:hover {
        background: linear-gradient(135deg, #2563eb 0%, #1d4ed8 100%);
        transform: translateY(-2px);
        box-shadow: 0 4px 12px rgba(59, 130, 246, 0.4);
    }

    .btn-success {
        background: linear-gradient(135deg, #10b981 0%, #059669 100%);
        color: white;
        box-shadow: 0 2px 8px rgba(16, 185, 129, 0.3);
    }

    .btn-success:hover {
        background: linear-gradient(135deg, #059669 0%, #047857 100%);
        transform: translateY(-2px);
        box-shadow: 0 4px 12px rgba(16, 185, 129, 0.4);
    }

    .btn-warning {
        background: linear-gradient(135deg, #f59e0b 0%, #d97706 100%);
        color: white;
        box-shadow: 0 2px 8px rgba(245, 158, 11, 0.3);
    }

    .btn-warning:hover {
        background: linear-gradient(135deg, #d97706 0%, #b45309 100%);
        transform: translateY(-2px);
        box-shadow: 0 4px 12px rgba(245, 158, 11, 0.4);
    }

    .btn i {
        margin-right: 5px;
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
        .header {
            padding: 10px 15px;
            flex-direction: column;
            gap: 10px;
            position: relative;
        }
        
        .titulo-centro {
            position: static;
            transform: none;
            font-size: 18px;
            margin: 10px 0;
            order: 2;
        }

        .header-left, .header-right {
            width: 100%;
            justify-content: center;
        }

        .header-left {
            order: 1;
        }

        .header-right {
            order: 3;
        }

        .main-content {
            margin: 10px;
            padding: 20px;
        }

        .page-title {
            font-size: 24px;
        }

        .table-container {
            overflow-x: auto;
        }

        .custom-table {
            min-width: 600px;
        }

        .btn {
            padding: 6px 12px;
            font-size: 12px;
            margin: 1px;
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

    /* Indicadores de estado */
    .status-badge {
        display: inline-block;
        padding: 4px 8px;
        border-radius: 12px;
        font-size: 12px;
        font-weight: 500;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }

    .status-pending {
        background-color: #fef3c7;
        color: #92400e;
    }

    .status-approved {
        background-color: #d1fae5;
        color: #065f46;
    }

    .status-rejected {
        background-color: #fee2e2;
        color: #991b1b;
    }

    /* Agregamos estilos para los estados */
    .estado-pendiente {
        background-color: #fef3c7;
        color: #92400e;
        padding: 3px 8px;
        border-radius: 12px;
        font-size: 12px;
        font-weight: 500;
    }
    .estado-aprobado {
        background-color: #d1fae5;
        color: #065f46;
        padding: 3px 8px;
        border-radius: 12px;
        font-size: 12px;
        font-weight: 500;
    }
    .estado-rechazado {
        background-color: #fee2e2;
        color: #991b1b;
        padding: 3px 8px;
        border-radius: 12px;
        font-size: 12px;
        font-weight: 500;
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
      <button onclick="goBack()" class="back-btn">
        <i class="fas fa-arrow-left"></i> Regresar
      </button>
      <a href="../logout.php" class="logout-btn">
        <i class="fas fa-sign-out-alt"></i> Cerrar Sesión
      </a>
    </div>
  </header>

  <div class="main-content">
    <h2 class="page-title">
      <i class="fas fa-file-alt"></i> Revisión de Informes
    </h2>

    <div class="table-container">
      <table class="custom-table">
        <thead>
          <tr>
            <th><i class="fas fa-user"></i> Estudiante</th>
            <th><i class="fas fa-graduation-cap"></i> Carrera</th>
            <th><i class="fas fa-file-text"></i> Archivo</th>
            <th><i class="fas fa-calendar"></i> Fecha</th>
            <th><i class="fas fa-info-circle"></i> Estado</th>
            <th><i class="fas fa-download"></i> Descargar</th>
            <th><i class="fas fa-cogs"></i> Acciones</th>
          </tr>
        </thead>
        <tbody>
          <?php if (count($informes) > 0): ?>
            <?php foreach ($informes as $informe): ?>
              <tr>
                <td>
                  <strong><?= htmlspecialchars($informe['nombre'] . ' ' . htmlspecialchars($informe['apellido'])) ?></strong>
                  <br><small><?= htmlspecialchars($informe['cedula']) ?></small>
                </td>
                <td><?= htmlspecialchars($informe['carrera']) ?></td>
                <td><?= htmlspecialchars($informe['nombre_archivo']) ?></td>
                <td><?= date('d/m/Y H:i', strtotime($informe['fecha_subida'])) ?></td>
                <td>
                  <span class="estado-<?= strtolower($informe['estado']) ?>">
                    <?= htmlspecialchars($informe['estado']) ?>
                  </span>
                </td>
                <td>
                  <a href="descargar_informe.php?id=<?= $informe['id'] ?>" 
                     class="btn btn-primary">
                    <i class="fas fa-download"></i> Descargar
                  </a>
                </td>
                <td>
                  <?php if ($informe['estado'] === 'Pendiente'): ?>
                    <button class="btn btn-success" 
        onclick="aprobarInforme(<?= $informe['id'] ?>, '<?= htmlspecialchars($informe['nombre'] . ' ' . $informe['apellido']) ?>')">
  <i class="fas fa-check"></i> Aprobar
</button>
<button class="btn btn-warning" 
        onclick="observarInforme(<?= $informe['id'] ?>, '<?= htmlspecialchars($informe['nombre'] . ' ' . $informe['apellido']) ?>')">
  <i class="fas fa-eye"></i> Observar
</button>
                  <?php else: ?>
                    <small><?= htmlspecialchars($informe['observaciones'] ?? 'Sin observaciones') ?></small>
                  <?php endif; ?>
                </td>
              </tr>
            <?php endforeach; ?>
          <?php else: ?>
            <tr>
              <td colspan="7" style="text-align: center;">No hay informes subidos</td>
            </tr>
          <?php endif; ?>
        </tbody>
      </table>
    </div>
  </div>

  <div class="footer">
    <p>Sistema de Gestión Documental © 2025 - Instituto Superior</p>
  </div>

  <script>
    // Función para aprobar informe con AJAX
    function aprobarInforme(id, estudiante) {
      if (confirm(`¿Está seguro de aprobar el informe de ${estudiante}?`)) {
        fetch(`procesar_revision.php`, {
          method: 'POST',
          headers: {
            'Content-Type': 'application/x-www-form-urlencoded',
          },
          body: `id=${id}&accion=aprobar`
        })
        .then(response => response.json())
        .then(data => {
          if (data.success) {
            alert(`Informe de ${estudiante} aprobado exitosamente.`);
            location.reload();
          } else {
            alert(`Error: ${data.message}`);
          }
        })
        .catch(error => {
          console.error('Error:', error);
          alert('Ocurrió un error al procesar la solicitud');
        });
      }
    }

    // Función para observar/rechazar informe con AJAX
    function observarInforme(id, estudiante) {
      const observacion = prompt(`Ingrese sus observaciones para el informe de ${estudiante}:`);
      if (observacion && observacion.trim() !== '') {
        fetch(`procesar_revision.php`, {
          method: 'POST',
          headers: {
            'Content-Type': 'application/x-www-form-urlencoded',
          },
          body: `id=${id}&accion=rechazar&observacion=${encodeURIComponent(observacion)}`
        })
        .then(response => response.json())
        .then(data => {
          if (data.success) {
            alert(`Observaciones enviadas a ${estudiante}`);
            location.reload();
          } else {
            alert(`Error: ${data.message}`);
          }
        })
        .catch(error => {
          console.error('Error:', error);
          alert('Ocurrió un error al procesar la solicitud');
        });
      }
    }

    // Función para el botón regresar
    function goBack() {
      if (window.history.length > 1) {
        window.history.back();
      } else {
        window.location.href = '../index.php';
      }
    }

    // Efectos de animación al cargar la página
    document.addEventListener('DOMContentLoaded', function() {
      const rows = document.querySelectorAll('.custom-table tbody tr');
      rows.forEach((row, index) => {
        row.style.opacity = '0';
        row.style.transform = 'translateY(20px)';
        
        setTimeout(() => {
          row.style.transition = 'all 0.5s ease';
          row.style.opacity = '1';
          row.style.transform = 'translateY(0)';
        }, index * 100);
      });
    });
  </script>
</body>
</html>