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

    $ID = $_GET['ID'];
    $sql = "SELECT * FROM empleados WHERE ID = '$ID'";
    $result = mysqli_query($connection, $sql);

    if ($result === false) {
        echo "Error en la consulta: " . mysqli_error($conexion);
    } else {

        if (mysqli_num_rows($result) > 0) {
            echo "<title>Actualizar</title>";
            echo "<link rel = 'stylesheet' href = 'adminstyle.css'>";
            echo "<body>";
    
                echo "<h2 class = 'bln-tittle'>Actualice los datos</h2>";
                echo "<form action = 'editar.php' method = 'post'>";
                    echo "<table>";
                    echo "<tr>
                            <th>#</th>
                            <th>Tarea</th>
                            <th>Empleado</th>
                            <th>Hora Inicial</th>
                            <th>Hora Final</th>
                            <th>Estado</th>
                            <th>Acciones</th></tr>";
    
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<tr>";
                        echo "<td> <input type = 'hidden' name = 'ID' value = '" . $row['ID'] . "'></td>";
                        echo "<td> <input type = 'text' name = 'tarea' value = '" . $row['Tarea'] . "'></td>";
                        echo "<td> <select name = 'empleado' id = 'empleado'>
                                    <option value = 'jorge'>Jorge del Rio</option>
                                    <option value = 'Matias'>Matías Tito</option>
                                    <option value = 'Veronica'>Verónica Carmona</option>
                                    <option value = 'sanchezjd'>Javier Sánchez</option>
                                    <option value = 'matilde'>Matilde Cereceda</option>
                                    </select></td>";
                        echo "<td> <input type = 'datetime-local' name = 'inicial' value = '" . $row['Hora Inicial'] . "'></td>";
                        echo "<td> <input type = 'datetime-local' name = 'final' value = '" . $row['Hora Final'] . "'></td>";
                        echo "<td> <select name = 'estado'>
                                        <option value = 'Incompleto'>Incompleto</option>
                                        <option value = 'En progreso'>En Progreso</option>
                                        <option value = 'Completo'>Completado</option>
                                    </select> </td>";
                        echo "<td> <input type = 'submit' class = 'btn-reg' value = 'Guardar'>";
                        echo "</tr>";
                    }
                    echo "</table>";   
                echo "</form>"; 
                echo "<br>";
                echo "<center>";
                echo "<button class = 'btn-reg'><a href = 'admin.php'>Regresar</a></button>";
                echo "</center>";
        }
    }
    mysqli_close($connection);
?>
</body>
</html>