<?php
    session_start();
    $nick=$_SESSION['Nick'];
    $nombre = $_POST['Nombre'];
    $descripcion= $_POST['Descripcion'];
    $precio= $_POST['Precio'];
    $dia= $_POST['Dia'];
    $mes= $_POST['Mes'];
    $an= $_POST['Año'];
    $hora= $_POST['Hora'];
    $minuto= $_POST['Minuto'];
    $segundos=$_POST['Segundos'];
    
    $fechaActual=strtotime(date("d-m-Y H:i:00",time()));
    $fechaFin("$dia-$mes-$an $hora:$minuto:$segundos");
    
    if (fechaActual > fechaFin){
        $query= "INSERT INTO usuario SET ";
        $query= $query."nombre='".$nombre."'";
        $query= $query.",apellidos='".$apellidos."'";
        $query= $query.",correoElectronico='".$correo."'";
        $query= $query.",nick='".$nick."'";
        $query= $query.",pass='".$pass."'";
        $resultat=mysqli_query($con,$query);
        echo "<a href='index.php'>Producto registrado! Pulse aquí para seguir navegando </a>";
    } 
    else {
        echo "<a href='subirProducto.php'>Error, fecha no válida, introduzca una de nuevo, por favor </a>";
    }
    
    
    $query= "INSERT INTO usuario SET ";
    $query= $query."nombre='".$nombre."'";
    $query= $query.",apellidos='".$apellidos."'";
    $query= $query.",correoElectronico='".$correo."'";
    $query= $query.",nick='".$nick."'";
    $query= $query.",pass='".$pass."'";
    $resultat=mysqli_query($con,$query);
    echo "<a href='index.php'>Producto registrado! Pulse aquí para seguir navegando </a>";
        
?>