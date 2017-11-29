<?php
    session_start();
    session_destroy();
    echo "<a href='index.php'>Se ha cerrado la sesión. Pulse aquí para volver a la página principal.</a>";
?>