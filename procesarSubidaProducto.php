<?php
    session_start();
    $nick=$_SESSION['Nick'];
    include "conexion.php";
    $nombre = $_POST['Nombre'];
    $descripcion= $_POST['Descripcion'];
    $precio= $_POST['Precio'];
    $dia= $_POST['Dia'];
    $mes= $_POST['Mes'];
    $an= $_POST['Año'];
    $hora= $_POST['Hora'];
    $minuto= $_POST['Minuto'];
    $segundos=$_POST['Segundos'];
    $tipo=$_POST['Tipo'];
    
    $fechaActual=strtotime(date("d-m-Y H:i:00",time()));
    $fechaFin=strtotime("$dia-$mes-$an $hora:$minuto:$segundos");
    
    if ($fechaActual > $fechaFin){
        echo "<a href='subirProducto.php'>Fecha no válida. Inténtelo de nuevo, por favor </a>";
    } 
    else {
        $query= "INSERT INTO producto SET ";
        $query= $query. "nombreProducto='".$nombre."'";
        $query= $query. ",descripcion='".$descripcion."'";
        $query= $query. ",precio=".$precio;
        $query= $query. ",fechaFin='".$an."-".$mes."-".$dia."'";
        $query= $query. ",tipo='".$tipo."'";
        $query= $query. ",subasta='Si'";
        $query= $query. ",nick='".$nick."'";
        $query= $query. ",horaFin='".$hora.":".$minuto.":".$segundos."'";
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