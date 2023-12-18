<?php

session_start();
session_unset();
session_destroy();
echo '<script>
        alert("Has cerrado sesión exitosamente");
        window.location = "login.html";
    </script>';
exit();

?>