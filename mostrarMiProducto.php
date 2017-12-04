<?php
session_start();
if (isset($_SESSION['Nick'])){
    $miNick=$_SESSION['Nick'];
}
include "conexion.php";

$id = $_GET['id'];

$query= "SELECT * FROM producto WHERE id= ".$id;

$resultat=mysqli_query($con,$query);
$existeix= mysqli_num_rows($resultat);

if ($existeix >= 1){
	while ($rec=mysqli_fetch_array($resultat)) {
  		echo "<br>";
  		echo "Nombre: ".$rec['nombreProducto'];
  		echo "<br>";
  		echo "Descripción: ".$rec['descripcion'];
  		echo "<br>";
  		echo "Precio original: ".$rec['precio']. " €";
  		echo "<br>";
  		echo "<br>";
  		putenv('TZ=Europe/Madrid'); 
  		$fechaActual=strtotime(date("Y-m-d H:i:s",time()));
  		$fechaActual=$fechaActual+3600; 
        $fechaFin=strtotime($rec['fechaFin']." ".$rec['horaFin']);
        if ($fechaActual > $fechaFin){
            echo "<br>";
            echo "<br>";
            echo "<a href='modifProducto.php?id=$id'>Modificar producto </a>";
        } 
        else {
            echo "Fecha de final de subasta: ".$rec['fechaFin']. " Hora final : ".$rec['horaFin'];
  		    echo "<br>";
            $query = "SELECT nick , MAX(precio) AS precio FROM puja WHERE idProd=$id";
            $resultado = mysqli_query($con,$query);
            $nrows= mysqli_num_rows($resultado);
            $rec=mysqli_fetch_array($resultado);
            if ($rec['nick'] !== NULL and $rec['precio'] !== NULL){
                echo "Mejor puja hasta el momento: ";
                echo "<br>";
                echo "\t Usuario: ".$rec['nick'];
                echo "<br>";
                echo "\t Precio: ".$rec['precio']. " €";
                echo "<br>";
            }
        }
	}
} 
else {
	echo "No se encuentra disponible";
}



?>