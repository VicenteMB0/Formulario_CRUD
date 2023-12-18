<!DOCTYPE html>
<html>
<head>
    <title>Gestión de Tareas</title>
    <link rel = "stylesheet" href = "adminstyle.css">
    <script src = "popup.js"></script>
    <link rel = "stylesheet" href = "fontawesome/fontawesome-free-6.4.0-web/css/all.css">
</head>
<body>

<div class = "container">
    <div class = "sidebar"> 
        <h1>Navegación</h1> <hr> <br>
        <button class = "btn" onclick = "window.location.href = 'admin.php'">
            Gestión de Tareas <i class="fa-solid fa-server"></i>
        </button> <br> <br>

        <button class = "btn" onclick = "window.location.href = 'asistencia.php'">
            Asistencia <i class="fa-solid fa-calendar-days"></i>
        </button> <br> <br>

        <button class = "btn" onclick = "window.location.href = 'admin_empleado.php'">
            Administración <i class="fa-solid fa-lock"></i>
        </button> <br> <br>

        <button class = "btn" onclick = "window.location.href = 'cerrarsesion.php'">
            Cerrar Sesión <i class="fa-solid fa-right-from-bracket"></i>
        </button> 
    </div>

    <div class = "content">
        <button class = "popup-button" id = "popup-button" onclick = "openPopup()">Asignar Tarea</button>

        <div id = "popup" class = "popup">
            <div class = "popup-content">
                <span class = "close" onclick = "closePopup()">&times;</span>

                <h2>Registro de Tareas</h2>
                <form id = "empleado-form" action = "procesodatos.php" method = "post">

                    <label for = "tarea">Tarea:</label> <br>
                    <input class = "adm-input" type = "text" id = "tarea" name = "tarea" 
                    placeholder = "Ingrese la tarea a asignar." required>
                    <br> <br>

                    <label for = "empleado">Empleado:</label> <br>
                    <select name = "empleado" id = "empleado" placeholder = "Seleccione al empleado.">
                        <option value = "Jorge del Rio">Jorge del Rio</option>
                        <option value = "Matías Tito">Matías Tito</option>
                        <option value = "Verónica Carmona">Verónica Carmona</option>
                        <option value = "Javier Sánchez">Javier Sánchez</option>
                        <option value = "Matilde Cereceda">Matilde Cereceda</option>
                    </select>
                    <br> <br>

                    <label for = "inicial">Hora inicial:</label> <br>
                    <input class = "adm-input" type = "datetime-local" id = "inicial" name = "inicial" required>
                    <br> <br>

                    <label for = "final">Hora final:</label> <br>
                    <input class = "adm-input" type = "datetime-local" id = "final" name = "final" required>
                    <br> <br>

                    <label for = "estado">Estado:</label> <br>
                    <select name = "estado" id = "estado" placeholder = "Seleccione el estado de la tarea.">
                        <option value = "Incompleto">Incompleto</option>
                        <option value = "En progreso">En Progreso</option>
                        <option value = "Completo">Completado</option>
                    </select>
                    <br> <br>

                    <button class = "btn-reg">Asignar Tarea</button>
                </form>
            </div>
        </div>

        <!-- TABLA GESTIÓN DE TAREAS -->
        <h2 class = "bln-tittle">Gestión de Tareas</h2>
        <hr>
        <table id = "tabla-tareas">
            <tr>
                <th>#</th>
                <th>Tarea</th>
                <th>Empleado Asignado</th>
                <th>Hora Inicial</th>
                <th>Hora Final</th>
                <th>Estado</th>
                <th>Acciones</th>
            </tr>
            <?php include 'listar.php'; ?>
        </table>

    </div>
</div>
</body>
</html>