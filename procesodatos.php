<!DOCTYPE html>
<html lang = "es">
<head>
    <meta charset="UTF-8">
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

    /* DATOS EMPLEADOS */
    if (isset ($_POST['tarea']) &&
        isset ($_POST['empleado']) &&
        isset ($_POST['inicial']) &&
        isset ($_POST['final']) &&
        isset ($_POST['estado'])

    ) {
        $tarea = $_POST['tarea'];
        $empleado = $_POST['empleado'];
        $inicial = $_POST['inicial'];
        $final = $_POST['final'];
        $estado = $_POST['estado'];

    } else {
        $tarea = '';
        $empleado = '';
        $inicial = '';
        $final = '';
        $estado = '';
    }
    
    /* CONEXION A LA BASE DE DATOS */
    $url = 'localhost';
    $user = 'root';
    $passwd = '';
    $db = 'gestion';
    $connection = mysqli_connect ($url, $user, $passwd, $db);
    $sql = "INSERT INTO empleados (Tarea, Empleado, `Hora Inicial`, `Hora Final`, Estado)
    VALUES ('$tarea', '$empleado', '$inicial', '$final', '$estado')";
    $result = mysqli_query($connection, $sql);

    header("Location: admin.php");
    exit();

    mysqli_close($connection);
?>
</body>
</html>