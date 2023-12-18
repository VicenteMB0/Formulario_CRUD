<!DOCTYPE html>
<html lang = "es">
<head>
    <meta charset="UTF-8">
    <link rel = "stylesheet" href = "fontawesome/fontawesome-free-6.4.0-web/css/all.css">
</head>
<body>

<?php

    $fechaingr = date("Y-m-d h-i-s");

    if (isset ($_POST['nombre']) &&
        isset ($_POST['mail']) &&
        isset ($_POST['usuario']) &&
        isset ($_POST['contra']) 

    ) {
        $nombre = $_POST['nombre'];
        $mail = $_POST['mail'];
        $usuario = $_POST['usuario'];
        $contra = $_POST['contra'];

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
    $sql = "SELECT * FROM asistencia";
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
                echo "<td>" . $row['Hora Ingreso'] . "</td>";
                echo "<td>" . $row['Hora Salida'] . "</td>";
                echo "<td>" . $row['Contraseña'] . "</td>";
                echo "<td> <button class = 'btn-exit'> Salida </button></td>";
                echo "<td><a tittle = 'Eliminar' class = 'btn-delete' href = 'deltempleado.php?ID=" . $row['ID'] ."'>
                <i class = 'fa-solid fa-trash-can' style = 'color: #ffffff;'></i></a></td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='7'>No se encontraron tareas registradas</td></tr>";
            }
    } 
    echo '<script src = "eliminar.js"></script>';

    mysqli_close($connection);
?>
</body>
</html>