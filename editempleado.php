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
    $nombre = $_POST['nombre'];
    $mail = $_POST['mail'];
    $usuario = $_POST['usuario'];
    $contra = $_POST['contra'];

    $sql = "UPDATE registroemp SET `Nombre Completo` = \"$nombre\", Correo = '$mail', Usuario = '$usuario', 
    Contraseña = '$contra' WHERE ID = '$ID'";

    $result = mysqli_query($connection, $sql);

    if ($result) {
        echo "<script> alert('Los datos fueron actualizados correctamente.'); 
            window.location.href = 'agregarempleado.php?';
            </script>";
    }

    mysqli_close($connection);
?>