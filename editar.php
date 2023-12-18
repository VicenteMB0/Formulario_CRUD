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

    /* CONEXION A LA BASE DE DATOS */
    $url = 'localhost';
    $user = 'root';
    $passwd = '';
    $db = 'gestion';
    $connection = mysqli_connect ($url, $user, $passwd, $db);

    $ID = $_POST['ID'];
    $tarea = $_POST['tarea'];
    $empleado = $_POST['empleado'];
    $inicial = $_POST['inicial'];
    $final = $_POST['final'];
    $estado = $_POST['estado'];

    $sql = "UPDATE empleados SET Tarea = '$tarea', Empleado = '$empleado', `Hora Inicial` = \"$inicial\", 
    `Hora Final` = \"$final\", Estado = '$estado' WHERE ID = '$ID'";

    $result = mysqli_query($connection, $sql);

    if ($result) {
        echo "<script> alert('Los datos fueron actualizados correctamente.'); 
            window.location.href = 'admin.php?';
            </script>";
    }

    mysqli_close($connection);
?>