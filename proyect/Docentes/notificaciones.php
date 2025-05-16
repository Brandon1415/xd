
<?php include 'includes/header.php'; ?>
<?php include 'includes/sidebar.php'; ?>
<h2 >Enviar Notificación a Tutorados</h2>
<div class="container mt-5">
    

    <form action="#" method="post">
        <div class="mb-3">
            <label for="estudiante" class="form-label">Seleccionar Estudiante:</label>
            <select class="form-select" name="estudiante" id="estudiante" required>
                <option value="">-- Seleccione --</option>
                <option value="Laura Gómez">Laura Gómez</option>
                <option value="Carlos Méndez">Carlos Méndez</option>
                <option value="Andrea Pérez">Andrea Pérez</option>
            </select>
        </div>

        <div class="mb-3">
            <label for="mensaje" class="form-label">Mensaje:</label>
            <textarea name="mensaje" id="mensaje" rows="5" class="form-control" placeholder="Escribe tu mensaje aquí..." required></textarea>
        </div>

        <button type="submit" class="btn btn-primary">Enviar Notificación</button>
    </form>

    <?php
    // Procesar envío (simulado)
    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        $estudiante = htmlspecialchars($_POST['estudiante']);
        $mensaje = htmlspecialchars($_POST['mensaje']);

        echo "<div class='alert alert-success mt-4'>
                Notificación enviada a <strong>$estudiante</strong>: <br> 
                \"$mensaje\"
              </div>";
    }
    ?>
</div>

<?php include 'includes/footer.php'; ?>
