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

    if (isset ($_POST['nombre']) &&
        isset ($_POST['mail']) &&
        isset ($_POST['usuario']) &&
        isset ($_POST['contraseña']) 

    ) {
        $nombre = $_POST['nombre'];
        $mail = $_POST['mail'];
        $usuario = $_POST['usuario'];
        $contra = $_POST['contraseña'];

    } else {
        $nombre = '';
        $mail = '';
        $usuario = '';
        $contra = '';
    }
    
    /* CONEXION A LA BASE DE DATOS */
    $url = 'localhost';
    $user = 'root';
    $passwd = '';
    $db = 'gestion';
    $connection = mysqli_connect ($url, $user, $passwd, $db);
    $sql = "INSERT INTO registroemp (`Nombre Completo`, Correo, Usuario, Contraseña)
    VALUES ('$nombre', '$mail', '$usuario', '$contra')";
    $result = mysqli_query($connection, $sql);

    header("Location: agregarempleado.php");
    exit();

    mysqli_close($connection);
?>
</body>
</html>