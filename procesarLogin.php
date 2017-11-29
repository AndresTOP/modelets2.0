<?php
    include "conexion.php";

    $nick = $_POST['Nick'];
    $pass = $_POST['Contraseña'];
    
    $query= "SELECT * FROM usuario WHERE nick= '".$nick."' AND pass= '$pass'";
    $resultado=mysqli_query($con,$query);
    if ($resultado){
        $existe=mysqli_num_rows($resultado);
        if ($existe != 0){
             $rec = mysqli_fetch_array($resultado);
             session_start();
             $_SESSION['Nick']=$nick;
             $_SESSION['Contraseña']=$pass;
             header('Location: index.php?' . SID );
        }
        else {
            echo "Los datos introducidos son incorrectos";
            echo "<a href='login.htm'>Intentar de nuevo, por favor</a>";
        }
        
    }
    else{
        die("Error");
    }

?>