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

    $ID = $_GET['ID'];
    $sql = "SELECT * FROM registroemp WHERE ID = '$ID'";
    $result = mysqli_query($connection, $sql);

    if ($result === false) {
        echo "Error en la consulta: " . mysqli_error($conexion);
    } else {

        if (mysqli_num_rows($result) > 0) {
            echo "<title>Actualizar</title>";
            echo "<link rel = 'stylesheet' href = 'adminstyle.css'>";
            echo "<body>";
    
                echo "<h2 class = 'bln-tittle'>Actualice los datos</h2>";
                echo "<form action = 'editempleado.php' method = 'post'>";
                    echo "<table>";
                    echo "<tr>
                            <th>#</th>
                            <th>Nombre Completo</th>
                            <th>Correo</th>
                            <th>Usuario</th>
                            <th>Contraseña</th>
                            <th>Acciones</th></tr>";
    
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<tr>";
                        echo "<td> <input type = 'hidden' name = 'ID' value = '" . $row['ID'] . "'></td>";
                        echo "<td> <input type = 'text' name = 'nombre' value = '" . $row['Nombre Completo'] . "'></td>";
                        echo "<td> <input type = 'email' name = 'mail' value = '" . $row['Correo'] . "'></td>";
                        echo "<td> <input type = 'text' name = 'usuario' value = '" . $row['Usuario'] . "'></td>";
                        echo "<td> <input type = 'number' name = 'contra' value = '" . $row['Contraseña'] . "'></td>";
                        echo "<td> <input type = 'submit' class = 'btn-reg' value = 'Guardar'>";
                        echo "</tr>";
                    }
                    echo "</table>";   
                echo "</form>"; 
                echo "<br>";
                echo "<center>";
                echo "<button class = 'btn-reg'><a href = 'agregarempleado.php'>Regresar</a></button>";
                echo "</center>";
        }
    }
    mysqli_close($connection);
?>
</body>
</html>