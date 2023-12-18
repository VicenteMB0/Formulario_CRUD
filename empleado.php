<!DOCTYPE html>
<html>
<head>
    <title>Gestión de Tareas</title>
    <link rel = "stylesheet" href = "adminstyle.css">
    <script src = "popup.js"></script>
    <link rel = "stylesheet" href = "fontawesome/fontawesome-free-6.4.0-web/css/all.css">
</head>
<body>

<?php 
    /* VALIDA EL SESSION | NO PUEDE ENTRAR DIRECTO DESDE LA URL */
    session_start();
    if (!isset($_SESSION["usuario"]) && !isset($_SESSION["contraseña"])) {
        echo '
            <script>
                alert("Debes iniciar sesión para poder acceder a este sitio.");
                window.location = "loginadmin.html";
            </script>
        ';
        exit();
    }
    $usuario = $_SESSION['usuario'];
    $contraseña = $_SESSION['contraseña'];
?>

<div class = "container">
    <div class = "sidebar"> 
        <h1>Navegación</h1> <hr> <br>
        <button class = "btn" onclick = "window.location.href = 'empleado.php'">
            Gestión de Tareas <i class = "fa-solid fa-server"></i>
        </button> <br> <br>

        <button class = "btn" onclick = "window.location.href = 'asistenciaempleado.php'">
            Asistencia <i class = "fa-solid fa-calendar-days"></i>
        </button> <br> <br>

        <button class = "btn" onclick = "window.location.href = 'cerrarsesion.php'">
            Cerrar Sesión <i class = "fa-solid fa-right-from-bracket"></i>
        </button> 
    </div>

    <div class = "content">

        <!-- TAREAS DEL EMPLEADO -->
        <h2 class = "bln-tittle">TAREAS A REALIZAR</h2>
        <hr>
        <table id = "tabla-tareas">
            <tr>
                <th>#</th>
                <th>Tarea</th>
                <th>Empleado Asignado</th>
                <th>Hora Inicial</th>
                <th>Hora Final</th>
                <th>Estado</th>
                <th>Acciones</th>
            </tr>
            <?php include 'listemp.php'; ?>
        </table>
    </div>

</div>
</body>
</html>