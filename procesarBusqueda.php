<?php
	include "conexion.php";

	$name = $_POST['Name'];

	$query= "SELECT * FROM producto WHERE nombre LIKE  '%$name%'";
	$resultado=mysqli_query($con,$query);
	$existe= mysqli_num_rows($resultado);
	echo $existe;
	if ($existe >= 1) {
    	$reg = mysqli_fetch_array($resultado);
    	$resultado=mysqli_query($con,$query);
    	while ($rec = mysqli_fetch_array($resultado)){
        	echo "<div>";
        	echo $rec['nombre'];
        	echo "<br>";
        	echo "</div>";
    	}
   	}

?>
