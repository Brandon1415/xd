</div> <!-- Cierra main-content -->
</div> <!-- Cierra container -->

<div class="footer">
  <p>Sistema de Gestión Documental © 2025 - Instituto Superior</p>
</div>

<script>
  document.addEventListener('DOMContentLoaded', function () {
    const menuSections = document.querySelectorAll('.menu-section h2');
    menuSections.forEach(section => {
      section.addEventListener('click', function () {
        const parent = this.parentElement;
        parent.classList.toggle('active');
        this.classList.toggle('collapsed');
      });
    });

    document.querySelector('.menu-section').classList.add('active');

    document.querySelector('.logout-btn').addEventListener('click', function () {
      if (confirm('¿Está seguro que desea cerrar sesión?')) {
        alert('Sesión cerrada correctamente');
        // window.location.href = 'login.html';
      }
    });
  });
</script>
</body>
</html>
