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
        <button class = "popup-button" id = "popup-button" onclick = "openPopup()">Agregar Empleado</button>
        
        <div id = "popup" class = "popup">
            <div class = "popup-content">
                <span class = "close" onclick = "closePopup()">&times;</span>

                <h2>Registro de Empleados</h2>
                <form id = "empleado-form" action = "empleadodatos.php" method = "post">

                    <label for = "nombre">Nombre completo:</label> <br>
                    <input class = "adm-input" type = "text" id = "nombre" name = "nombre" required>
                    <br> <br>

                    <label for = "mail">Correo:</label> <br>
                    <input class = "adm-input" type = "email" id = "mail" name = "mail" 
                    placeholder = "Ingrese correo electrónico." required>
                    <br> <br>

                    <label for = "usuario">Usuario:</label> <br>
                    <input class = "adm-input" type = "text" id = "usuario" name = "usuario" required>
                    <br> <br>

                    <label for = "contraseña">Contraseña:</label> <br>
                    <input class = "adm-input" type = "password" id = "contraseña" name = "contraseña" required>
                    <br> <br>

                    <button class = "btn-reg">Agregar Empleado</button>
                </form>
            </div>
        </div>
        <!-- TABLA LISTADO DE EMPLEADOS -->
        <h2 class = "bln-tittle">Administración de Empleados</h2>
        <hr>
        <table id = "tabla-tareas">
            <tr>
                <th>#</th>
                <th>Nombre Completo</th>
                <th>Correo</th>
                <th>Usuario</th>
                <th>Contraseña</th>
                <th>Acciones</th>
            </tr>
            <?php include 'listarempleados.php'; ?>
        </table>

</div>
</body>
</html>