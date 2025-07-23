<?php
require_once __DIR__.'/includes/conexion.php';
session_start();

header('Content-Type: application/json');

// Verificar si el usuario es docente
if ($_SESSION['rol'] !== 'Docente') {
    echo json_encode(['success' => false, 'message' => 'No autorizado']);
    exit;
}

$id = $_POST['id'] ?? null;
$accion = $_POST['accion'] ?? '';
$observacion = $_POST['observacion'] ?? '';
$docente = $_SESSION['cedula'];

if (!$id) {
    echo json_encode(['success' => false, 'message' => 'ID de informe no especificado']);
    exit;
}

try {
    if ($accion === 'aprobar') {
        $sql = "UPDATE informes 
                SET estado = 'Aprobado', 
                    observaciones = NULL,
                    revisado_por = :docente,
                    fecha_revision = NOW() 
                WHERE id = :id";
        $params = [':id' => $id, ':docente' => $docente];
    } elseif ($accion === 'rechazar') {
        $sql = "UPDATE informes 
                SET estado = 'Rechazado', 
                    observaciones = :observacion,
                    revisado_por = :docente,
                    fecha_revision = NOW() 
                WHERE id = :id";
        $params = [':id' => $id, ':observacion' => $observacion, ':docente' => $docente];
    } else {
        throw new Exception('Acción no válida');
    }

    $stmt = $pdo->prepare($sql);
    $stmt->execute($params);

    echo json_encode(['success' => true, 'message' => 'Operación realizada con éxito']);

} catch (Exception $e) {
    echo json_encode(['success' => false, 'message' => $e->getMessage()]);
}