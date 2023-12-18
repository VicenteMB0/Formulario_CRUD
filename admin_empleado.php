<!DOCTYPE html>
<html>
<head>
    <title>Gestión de Tareas</title>
    <link rel = "stylesheet" href = "adminstyle.css">
    <script src = "popup.js"></script>
    <link rel = "stylesheet" href = "fontawesome/fontawesome-free-6.4.0-web/css/all.css">
</head>
<body>

<div class = "container">
    <div class = "sidebar"> 
        <h1>Navegación</h1> <hr> <br>
        <button class = "btn" onclick = "window.location.href = 'admin.php'">
            Gestión de Tareas <i class="fa-solid fa-server"></i>
        </button> <br> <br>

        <button class = "btn" onclick = "window.location.href = 'asistencia.php'">
            Asistencia <i class="fa-solid fa-calendar-days"></i>
        </button> <br> <br>

        <button class = "btn" onclick = "window.location.href = 'admin_empleado.php'">
            Administración <i class="fa-solid fa-lock"></i>
        </button> <br> <br>

        <button class = "btn" onclick = "window.location.href = 'cerrarsesion.php'">
            Cerrar Sesión <i class="fa-solid fa-right-from-bracket"></i>
        </button> 
    </div>

    <div class = "content">
        <button class = "btn-ademp" onclick = "window.location.href = 'agregaradmin.php'">Registrar administrador</button> <br> <br>
        <button class = "btn-ademp" onclick = "window.location.href = 'agregarempleado.php'">Registrar empleado</button>
    </div>
</div>
</body>
</html>