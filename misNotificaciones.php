<?php
	session_start();
    $nick=$_SESSION['Nick'];
    include "conexion.php";
    date_default_timezone_set('Europe/Madrid');
    $query="SELECT producto.nombreProducto, producto.id, producto.fechaFin, producto.horaFin, MAX(puja.precio) as precio FROM puja INNER JOIN producto ON puja.idProd=producto.id WHERE puja.nick='$nick' GROUP BY producto.nombreProducto";
    $resultado=mysqli_query($con,$query);
    while($rec=mysqli_fetch_array($resultado)){
    	$fecha=$rec['fechaFin'];
	    $hora=$rec['horaFin'];
	    $producto=$rec['nombreProducto'];
	    $fechaActual=time();
	    $fechaFin=strtotime("$fecha $hora");
	    if ($rec['precio'] !== NULL and $fechaActual > $fechaFin){
	    	$precioMiPuja=$rec['precio'];
	    	$query="SELECT nick , MAX(precio) AS precio FROM puja WHERE idProd=".$rec['id'];
	    	$resultado=mysqli_query($con,$query);
	    	$rec=mysqli_fetch_array($resultado);
	    	if ($precioMiPuja < $rec['precio'] ) {
	    	}
	    	else{
	    		echo "Has ganado la subasta del producto '$producto' por un precio de $precioMiPuja €";
	    	}

	    }
    }
    

?>