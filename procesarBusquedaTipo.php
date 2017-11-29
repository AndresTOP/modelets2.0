<?php
	include "conexion.php";

	$tipo = $_POST['Tipo'];

	$query= "SELECT * FROM producto WHERE tipo = '%.$tipo.%'";
	$resultado=mysqli_query($con,$query);
	$existe= mysqli_num_rows($resultat);
	echo $existe;
	if ($existe == 1) {
    	$rec = mysqli_fetch_array($resultat);
    	$resultado=mysqli_query($con,$query);
    	while ($rec = mysqli_fetch_array($resultado)){
        	echo "<div>";
        	echo $rec['nombre'];
        	echo "<br>";
        	echo "</div>";
    	}
   	}

?>