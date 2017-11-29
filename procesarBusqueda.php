<?php
	include "conexion.php";

	$name = $_POST['Name'];

	$query= "SELECT * FROM producto WHERE nombreProducto LIKE  '%$name%'";
	$resultado=mysqli_query($con,$query);
	if (!$resultado) {
         die("Error");
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
   	    else{
   	        echo "No existe ningún producto con "."'$name'";
   	    }
    }
	

?>