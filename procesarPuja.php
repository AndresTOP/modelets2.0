<?php
    session_start();
    $nick=$_SESSION['Nick'];
    include "conexion.php";
    $puja=$_GET['Precio'];
    $id=$_GET['Id'];
    $pos=strpos($puja,'-');
    if ($pos === false){
        $query = "SELECT nick , MAX(precio) AS precio FROM puja WHERE idProd=$id";
        $resultado=mysqli_query($con,$query);
        $rec=mysqli_fetch_array($resultado);
        if ($rec['nick'] !== NULL and $rec['precio'] !== NULL){
            echo "holaa";
            if ($puja > $rec['precio'] ){
                $query="INSERT INTO puja SET nick='$nick' , precio='$puja' , idProd='$id' ";
                $resultado=mysqli_query($con,$query);
                if (!$resultado){
                     echo "<a href='mostrarProducto.php?id=$id'>Precio incorrecto, pruebe de nuevo por favor </a>";
                }
                else {
                    echo "No funciona bien";
                }
            }
            else {
                echo "<a href='mostrarProducto.php?id=$id'>Precio por debajo del máximo, pruebe de nuevo por favor </a>";
            }
        }
        else {
            $query="SELECT precio FROM producto WHERE id='$id'";
            $resultado=mysqli_query($con,$query);
            $rec=mysqli_fetch_array($resultado);
            if ($puja > $rec['precio'] ){
                $query="INSERT INTO puja SET nick='$nick' , precio='$puja' , idProd='$id' ";
                $resultado=mysqli_query($con,$query);
                if (!$resultado){
                     echo "<a href='mostrarProducto.php?id=$id'>Precio incorrecto, pruebe de nuevo por favor </a>";
                }
            }
            else {
                echo "<a href='mostrarProducto.php?id=$id'>Precio por debajo del máximo, pruebe de nuevo por favor </a>";
            }
        }
        
    }
    else {
        echo "<a href='mostrarProducto.php?id=$id>Precio incorrecto, pruebe de nuevo por favor </a>";
    }
    
?>