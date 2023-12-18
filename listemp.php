<!DOCTYPE html>
<html lang = "es">
<head>
    <meta charset="UTF-8">
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
    $sql = "SELECT * FROM empleados";
    $result = mysqli_query($connection, $sql);

    if ($result === false) {
        echo "Error en la consulta: " . mysqli_error($conexion);
    } else {

    // GENERO LAS FILAS CON LOS DATOS OBTENIDOS EN CASO DE QUE HAYAN INGRESOS
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr>";
                echo "<td>" . $row['ID'] . "</td>";
                echo "<td>" . $row['Tarea'] . "</td>";
                echo "<td>" . $row['Empleado'] . "</td>";
                echo "<td>" . $row['Hora Inicial'] . "</td>";
                echo "<td>" . $row['Hora Final'] . "</td>";
                echo "<td>" . $row['Estado'] . "</td>";
                echo "<td> <a tittle = 'Editar' class = 'btn-edit' href = 'actualizaremp.php?ID=" . $row['ID'] ."'>
                <i class = 'fa-sharp fa-solid fa-pen-to-square' style = 'color: #ffffff;'></i></a>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='7'>No se encontraron tareas registradas</td></tr>";
            }
    } 

    mysqli_close($connection);
?>
</body>
</html>