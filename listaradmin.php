<!DOCTYPE html>
<html lang = "es">
<head>
    <meta charset="UTF-8">
    <link rel = "stylesheet" href = "fontawesome/fontawesome-free-6.4.0-web/css/all.css">
</head>
<body>

<?php
    if (isset ($_POST['usuario']) &&
        isset ($_POST['contraseña']) 

    ) {
        $nombre = $_POST['usuario'];
        $contraseña = $_POST['contraseña'];

    } else {
        $usuario = '';
        $contraseña = '';
    }
    
    /* CONEXION A LA BASE DE DATOS */
    $url = 'localhost';
    $user = 'root';
    $passwd = '';
    $db = 'gestion';
    $connection = mysqli_connect ($url, $user, $passwd, $db);
    $sql = "SELECT * FROM Administrador";
    $result = mysqli_query($connection, $sql);

    if ($result === false) {
        echo "Error en la consulta: " . mysqli_error($conexion);
    } else {

    // GENERO LAS FILAS CON LOS DATOS OBTENIDOS EN CASO DE QUE HAYAN INGRESOS
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr>";
                echo "<td>" . $row['ID'] . "</td>";
                echo "<td>" . $row['Usuario'] . "</td>";
                echo "<td>" . $row['Contraseña'] . "</td>";
            }
        } else {
            echo "<tr><td colspan='7'>No se encontraron administradores registrados</td></tr>";
            }
    } 

    mysqli_close($connection);
?>
</body>
</html>