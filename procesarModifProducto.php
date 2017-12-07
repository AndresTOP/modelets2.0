<?php
    session_start();
    $nick=$_SESSION['Nick'];
    include "conexion.php";
    $id = $_GET['id'];
    $nombre = $_POST['Nombre'];
    $descripcion= $_POST['Descripcion'];
    $precio= $_POST['Precio'];
    $fecha= $_POST['Fecha'];
    $hora= $_POST['Hora'];
    $tipo=$_POST['Tipo'];


    date_default_timezone_set('Europe/Madrid');
    $fechaActual=time();
    $fechaFin=strtotime("$fecha $hora");
    if ($fechaActual > $fechaFin){
        echo "<a href='subirProducto.php'>Fecha no válida. Inténtelo de nuevo, por favor </a>";
    } 
    else {
        $query= "UPDATE producto SET ";
        $query= $query. "nombreProducto='".$nombre."'";
        $query= $query. ",descripcion='".$descripcion."'";
        $query= $query. ",precio=$precio";
        $query= $query. ",fechaFin='$fecha'";
        $query= $query. ",tipo='".$tipo."'";
        $query= $query. ",nick='".$nick."'";
        $query= $query. ",horaFin='$hora'";
        $query= $query. " WHERE id=$id";
        $pos=strpos($precio,'-');
        if  (!empty($nombre) and !empty($fecha) and !empty($hora) and $pos === false){
            if (!ctype_space($nombre)){
                
                $resultado=mysqli_query($con,$query);
                if (!$resultado){
                    echo "hola";
                    echo "<a href='subirProducto.php'>Hay algunos campos incorrectos, corrígalos por favor </a>";
                } 
                else {
                    echo "Cambios realizados. Ahora los usuarios podrán pujar por él.";
                    echo "<a href='index.php'> Seguir navegando aquí</a>";
                }
            }
            else {
                echo "<a href='subirProducto.php'>Campos incorrectos, pruebe de nuevo por favor </a>";
            }
            
        }
        else{
            echo "<a href='subirProducto.php'>Hay algunos campos incorrectos, corrígalos por favor </a>";
        }
        
        
    }
?>