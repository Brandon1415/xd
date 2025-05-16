<?php include 'includes/header.php'; ?>
<?php include 'includes/sidebar.php'; ?>

<style>
.table {
  width: 200%;
  max-width: none;       /* para que no limite el ancho máximo */
  margin-left: 10;        /* que se alinee a la izquierda */
  border-collapse: separate;
  border-spacing: 0 8px;
  font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
  background-color: #fff;
  border-radius: 8px;
  overflow: hidden;
  box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
}


.table thead.table-dark {
  background-color: #2c3e50;
  color: #ecf0f1;
  font-weight: 600;
  font-size: 1rem;
}

.table thead th {
  padding: 14px 20px;
  text-align: left;
  border-bottom: none;
  user-select: none;
}

.table tbody tr {
  background-color: #f9f9f9;
  transition: background-color 0.3s ease, box-shadow 0.3s ease;
  border-radius: 6px;
  box-shadow: 0 1px 3px rgb(0 0 0 / 0.1);
}

.table tbody tr:hover {
  background-color: #d0e6ff;
  box-shadow: 0 4px 12px rgb(0 123 255 / 0.3);
}

.table tbody tr:nth-child(even) {
  background-color: #ffffff;
}

.table tbody td {
  padding: 14px 20px;
  border-bottom: none;
  vertical-align: middle;
  font-size: 0.95rem;
  color: #333;
}

.table .btn-primary {
  background-color: #007bff;
  border: none;
  padding: 8px 16px;
  border-radius: 25px;
  color: white;
  font-size: 0.9rem;
  cursor: pointer;
  text-decoration: none;
  display: inline-block;
  transition: background-color 0.3s ease, transform 0.2s ease;
  box-shadow: 0 2px 6px rgb(0 123 255 / 0.4);
}

.table .btn-primary:hover {
  background-color: #0056b3;
  transform: translateY(-2px);
  box-shadow: 0 6px 12px rgb(0 86 179 / 0.6);
}




</style>
<h2>Listado de Tutorados</h2>
<div class="container">
    
    
    <div class="table-responsive">
        <table class="table table-bordered table-striped">
            <thead class="table-dark">
                <tr>
                    <br> </br>
                    <th>Nombre del Estudiante</th>
                    <th>Programa</th>
                    <th>Estado</th>
                    <th>Acción</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $tutorados = [
                    ["nombre" => "Laura Gómez", "programa" => "Ingeniería en Sistemas", "estado" => "En proceso"],
                    ["nombre" => "Carlos Méndez", "programa" => "Contaduría", "estado" => "Pendiente de informe"],
                    ["nombre" => "Andrea Pérez", "programa" => "Diseño Gráfico", "estado" => "Finalizado"]
                ];

                foreach ($tutorados as $t) {
                    echo "<tr>
                            <td data-label='Nombre del Estudiante'>{$t['nombre']}</td>
                            <td data-label='Programa'>{$t['programa']}</td>
                            <td data-label='Estado'>{$t['estado']}</td>
                            <td data-label='Acción'><a href='seguimiento.php?estudiante=" . urlencode($t['nombre']) . "' class='btn btn-sm btn-primary'>Ver Seguimiento</a></td>
                          </tr>";
                }
                ?>  
            </tbody>
        </table>
    </div>
</div>

<?php include 'includes/footer.php'; ?>
