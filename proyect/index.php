<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Director de Unidad - Gestión Académica</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        /* Estilos generales */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Arial', sans-serif;
        }

        body {
            background-color: #f5f5f5;
            display: flex;
            min-height: 100vh;
            flex-direction: column;
        }

        .container {
            display: flex;
            flex: 1;
        }

        /* Cabecera - AHORA MÁS GRANDE */
        .header {
            background-color: rgb(182, 28, 28);
            color: white;
            padding: 15px 25px; /* Ajuste de padding */
            box-shadow: 0 3px 10px rgba(0,0,0,0.2);
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .header-left {
            display: flex;
            align-items: center;
        }

        .logo {
            height: 50px;
            margin-right: 15px;
            background-color: white;
            padding: 5px;
            border-radius: 5px;
        }

        .header h1 {
            font-size: 24px; /* Ajustado el tamaño de fuente */
            text-align: center;
        }

        .header-right {
            display: flex;
            align-items: center;
        }

        .logout-btn {
            background-color: rgba(0, 0, 0, 0.2);
            color: white;
            border: 1px solid rgba(255, 255, 255, 0.3);
            padding: 8px 15px;
            border-radius: 5px;
            cursor: pointer;
            display: flex;
            align-items: center;
            transition: all 0.3s;
        }

        .logout-btn:hover {
            background-color: rgba(0, 0, 0, 0.4);
        }

        .logout-btn i {
            margin-right: 5px;
        }

        /* Menú lateral */
        .sidebar {
            width: 280px;
            background-color: white;
            box-shadow: 2px 0 5px rgba(0,0,0,0.1);
            padding: 20px 0;
            flex-shrink: 0;
        }

        /* Secciones de menú desplegables */
        .menu-section {
            margin-bottom: 5px;
        }

        .menu-section h2 {
            color: rgb(80, 44, 44);
            font-size: 16px;
            padding: 12px 20px;
            border-bottom: 1px solid #eee;
            background-color: #f8f9fa;
            cursor: pointer;
            display: flex;
            justify-content: space-between;
            align-items: center;
            transition: background-color 0.3s;
        }

        .menu-section h2:hover {
            background-color: #f0f0f0;
        }

        /* Estilo para el ícono de expandir/colapsar */
        .menu-section h2 .expand-icon {
            transition: transform 0.3s;
        }

        .menu-section h2.collapsed .expand-icon {
            transform: rotate(-90deg);
        }

        .menu-section ul {
            list-style: none;
            max-height: 0;
            overflow: hidden;
            transition: max-height 0.3s ease-out;
        }
        
        .menu-section.active ul {
            max-height: 300px; /* Altura máxima al expandir */
        }

        .menu-section li {
            padding: 10px 20px 10px 30px;
            color: #555;
            cursor: pointer;
            transition: all 0.3s;
        }

        .menu-section li:hover {
            color: rgb(182, 28, 28);
            background-color: #f5f5f5;
            border-left: 4px solid rgb(182, 28, 28);
        }

        /* Contenido principal */
        .main-content {
            flex: 1;
            padding: 20px;
        }

        /* Barra de búsqueda */
        .search-bar {
            display: flex;
            margin-bottom: 20px;
        }

        .search-bar input {
            flex: 1;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 5px 0 0 5px;
        }

        .search-bar button {
            background-color: rgb(0, 0, 0);
            color: white;
            border: none;
            padding: 10px 15px;
            border-radius: 0 5px 5px 0;
            cursor: pointer;
        }

        /* Notificaciones */
        .notifications {
            background-color: #f8f9fa;
            border-left: 4px solid rgb(182, 28, 28);
            padding: 15px;
            margin-bottom: 20px;
            border-radius: 0 5px 5px 0;
        }

        .notifications h3 {
            color: rgb(80, 44, 44);
            margin-bottom: 10px;
        }

        .notifications ul {
            list-style: none;
        }

        .notifications li {
            padding: 8px 0;
            color: #555;
        }

        /* Panel de control */
        .dashboard-panel {
            background-color: white;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
        }

        .dashboard-panel h2 {
            color: rgb(80, 44, 44);
            margin-bottom: 15px;
        }

        .dashboard-panel p {
            color: #555;
            margin-bottom: 15px;
        }

        /* Pie de página */
        .footer {
            background-color: #2c3e50;
            color: white;
            padding: 10px;
            text-align: center;
            font-size: 14px;
        }

        /* Iconos */
        .fas {
            margin-right: 8px;
            width: 16px;
        }
    </style>
</head>
<body>
    <!-- Barra superior -->
    <header class="header">
        <div class="header-left">
            <!-- Logo (usa una imagen placeholder) -->
            <img src=logo.jpg alt="Logo INT" class="logo">
            <h1><i class="fas fa-building"></i> SISTEMA DE GESTIÓN ACADÉMICA - INT</h1>
        </div>
        <div class="header-right">
            <!-- Botón de cerrar sesión -->
            <button class="logout-btn">
                <i class="fas fa-sign-out-alt"></i> Cerrar Sesión
            </button>
        </div>
    </header>

    <div class="container">
        <!-- Menú lateral (pestañas a la izquierda) -->
                <div class="sidebar"> 
                <div class="menu-section">
                <h2><i class="fas fa-user-graduate estudiante-icono"></i> Estudiantes <i class="fas fa-chevron-down expand-icon"></i></h2>
                <ul>
                    <li><i class="fas fa-pen"></i> xd</li>
                    <li><i class="fas fa-file-alt"></i> xd</li>
                    <li><i class="fas fa-exclamation-triangle"></i> xd</li>
                </ul>
            </div>

            <div class="menu-section">
                <h2><i class="fas fa-chalkboard-teacher docente-icono"></i> Docentes <i class="fas fa-chevron-down expand-icon"></i></h2>
                <ul>
                    <li><i class="fas fa-pen"></i> xd</li>
                    <li><i class="fas fa-file-alt"></i> xd</li>
                    <li><i class="fas fa-exclamation-triangle"></i> xd</li>
                </ul>
            </div>

            <div class="menu-section">
                <h2><i class="fas fa-tools practicas-icono"></i> Area de Practicas <i class="fas fa-chevron-down expand-icon"></i></h2>
                <ul>
                    <li><i class="fas fa-ruler"></i>xd </li>
                    <li><i class="fas fa-clock"></i> xd</li>
                    <li><i class="fas fa-asterisk"></i>xd</li>
                </ul>
            </div>
        </div>
        
        <!-- Contenido principal -->
        <div class="main-content">
            <!-- Barra de búsqueda -->
            <div class="search-bar">
                <input type="text" placeholder="Buscar proyectos, convenios, tutores...">
                <button><i class="fas fa-search"></i> Buscar</button>
            </div>

        <!-- Panel de control -->
            <div class="dashboard-panel">
                <h2>Panel de Control</h2>
                <p>Bienvenido al Sistema de Gestión Académica. Seleccione una opción del menú lateral para comenzar.</p>
            </div>
        </div>
    </div>

    <div class="footer">
        <p>Sistema de Gestión Académica © 2025 - Instituto Superior</p>
    </div>

    <script>
        // JavaScript para el funcionamiento del menú desplegable
        document.addEventListener('DOMContentLoaded', function() {
            const menuSections = document.querySelectorAll('.menu-section h2');
            
            menuSections.forEach(section => {
                section.addEventListener('click', function() {
                    const parent = this.parentElement;
                    
                    // Toggle active class for the clicked section
                    parent.classList.toggle('active');
                    
                    // Toggle the collapsed class for the icon rotation
                    this.classList.toggle('collapsed');
                });
            });
            
            // Por defecto, mostrar la primera sección expandida
            document.querySelector('.menu-section').classList.add('active');
            
            // Funcionalidad para el botón de cerrar sesión
            document.querySelector('.logout-btn').addEventListener('click', function() {
                if(confirm('¿Está seguro que desea cerrar sesión?')) {
                    alert('Sesión cerrada correctamente');
                    // Aquí se podría redirigir a la página de inicio de sesión
                    // window.location.href = 'login.html';
                }
            });
        });
    </script>
</body>
</html>