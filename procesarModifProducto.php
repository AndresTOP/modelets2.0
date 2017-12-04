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


    $fechaActual=strtotime(date("d-m-Y H:i:00",time()));
    $fechaFin=strtotime("$fecha $hora");
    $fechaActual=$fechaActual+3600;
    if ($fechaActual > $fechaFin){
        echo "<a href='subirProducto.php'>Fecha no válida. Inténtelo de nuevo, por favor </a>";
    } 
    else {
        $query= "UPDATE producto SET ";
        $query= $query. "nombreProducto='".$nombre."'";
        $query= $query. ",descripcion='".$descripcion."'";
        $query= $query. ",precio='$precio'";
        $query= $query. ",fechaFin='$fecha";
        $query= $query. ",tipo='".$tipo."'";
        $query= $query. ",nick='".$nick."'";
        $query= $query. ",horaFin='$hora'";
        $query= $query. " WHERE id=$id";
        $pos=strpos($precio,'-');
        if  (!empty($nombre)  and $pos === false){
            if (!ctype_space($nombre)){
                
                $resultado=mysqli_query($con,$query);
                if (!$resultado){
                    echo "<a href='subirProducto.php'>Precio incorrecto, introduzca uno de nuevo, por favor </a>";
                }
            }
            else {
                echo "<a href='subirProducto.php'>Campos incorrectos, pruebe de nuevo por favor </a>";
            }
            
        }
        else{
            echo "<a href='subirProducto.php'>Precio incorrecto, introduzca uno de nuevo, por favor </a>";
        }
        
        
    }
?>