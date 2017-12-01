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
  		echo "Vendedor: ".$rec['nick'];
  		echo "<br>";
  		echo "Precio original: ".$rec['precio'];
  		echo "<br>";
	}
} 
else {
	echo "No se encuentra disponible";
}

?>