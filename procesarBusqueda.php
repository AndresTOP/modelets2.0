<?php
	include "conexion.php";

	$name = $_POST['Name'];

	$query= "SELECT * FROM producto WHERE nombre LIKE  '%$name%'";
	$resultado=mysqli_query($con,$query);
	if (!$resultado) {
         echo "No hemos encontrado ningún producto con "." '$name' ";
    }
    else {
        $existe= mysqli_num_rows($resultado);
	    if ($existe != 0) {
    	    $reg = mysqli_fetch_array($resultado);
    	    $resultado=mysqli_query($con,$query);
    	    while ($rec = mysqli_fetch_array($resultado)) {
    	        $idProducto = $rec['id'];
    	        $nombreProducto = $rec['nombre'];
        	    echo "<a href=mostrarProducto.php?id=$idProducto>$nombreProducto</a>";
        	    echo "<br>";
    	    }
   	    }
    }
	

?>