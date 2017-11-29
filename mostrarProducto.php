<?php
include "conexion.php";

$id = $_GET['id'];

$query= "SELECT * FROM producto WHERE id= ".$id;

$resultat=mysqli_query($con,$query);
$existeix= mysqli_num_rows($resultat);

if ($existeix >= 1){
	while ($rec=mysqli_fetch_array($resultat)) {
  		echo "<br>";
  		echo "Nombre".$rec['nombre'];
  		echo "<br>";
  		echo "id".$rec['id'];
  		echo "<br>";
	}
} 
else {
	echo "No se encuentra disponible";
}


?>
    <form action="mostrarProducto.php" method="POST">
    	<h2>Precio a pujar</h2><input name="Precio a pujar (€)">
    	<input type="submit" name="puja" value="Puja">
	</form>