<?php include 'includes/header.php'; ?>

<div class="container mt-5">
    <h2 class="mb-4">Revisión de Informes</h2>

    <div class="table-responsive">
        <table class="table table-bordered table-striped align-middle">
            <thead class="table-dark">
                <tr>
                    <th>Estudiante</th>
                    <th>Tipo de Informe</th>
                    <th>Fecha de Entrega</th>
                    <th>Archivo</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // Datos simulados de informes
                $informes = [
                    ["nombre" => "Laura Gómez", "tipo" => "Informe Parcial", "fecha" => "2025-04-10", "archivo" => "informe_parcial_laura.pdf"],
                    ["nombre" => "Carlos Méndez", "tipo" => "Informe Final", "fecha" => "2025-05-01", "archivo" => "final_carlos.pdf"],
                    ["nombre" => "Andrea Pérez", "tipo" => "Plan de Práctica", "fecha" => "2025-03-20", "archivo" => "plan_andrea.pdf"]
                ];

                foreach ($informes as $i) {
                    echo "<tr>
                            <td>{$i['nombre']}</td>
                            <td>{$i['tipo']}</td>
                            <td>{$i['fecha']}</td>
                            <td><a href='uploads/{$i['archivo']}' class='btn btn-sm btn-outline-primary' download>Descargar</a></td>
                            <td>
                                <button class='btn btn-success btn-sm'>Aprobar</button>
                                <button class='btn btn-warning btn-sm'>Observar</button>
                            </td>
                          </tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
</div>

<?php include 'includes/footer.php'; ?>
