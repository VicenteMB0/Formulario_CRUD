<?php
session_start();

/*Conexion a la BD*/
$url = 'localhost';
$user = 'root';
$passw = '';
$bd = 'gestion';
$connection = mysqli_connect($url, $user, $passw, $bd);

$usuario = $_POST['usuario'];
$contraseña = $_POST['contraseña'];

$validarusuario = mysqli_query($connection, "SELECT * FROM empleados WHERE Usuario = '$usuario' and Contraseña = '$contraseña'");
$validaradmin = mysqli_query($connection, "SELECT * FROM administrador WHERE Usuario = '$usuario' and Contraseña = '$contraseña'");

if (mysqli_num_rows($validaradmin) === 1) {
    $_SESSION['usuario'] = $usuario;
    $_SESSION['contraseña'] = $contraseña;
    header("Location: admin.php");
    exit();
    
} elseif (mysqli_num_rows($validarusuario) === 1) {
    $_SESSION['usuario'] = $usuario;
    $_SESSION['contraseña'] = $contraseña;
    header("Location: empleado.php");
    exit();

} else {
    echo '<script>
        alert("El usuario o la contraseña son incorrectas.");
        window.location = "loginadmin.html";
        </script>';
    exit();
}
?>