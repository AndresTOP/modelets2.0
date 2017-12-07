<?php
session_start();
$nick=$_SESSION['Nick'];
include "conexion.php";
$nombre = $_POST['Nombre'];
$apellidos = $_POST['Apellidos'];
$correo = $_POST['Correo'];
$pass = $_POST['Contraseña'];
if (!empty($correo) and !empty($pass)) {
	if (!ctype_space($correo) and !ctype_space($pass) ){
		$query= "UPDATE usuario SET ";
		$query= $query."nombre='".$nombre."'";
		$query= $query.",apellidos='".$apellidos."'";
		$query= $query.",correoElectronico='".$correo."'";
		$query= $query.",pass='".$pass. "'";
		$query= $query." WHERE nick='".$nick."'";
		$resultat=mysqli_query($con,$query);
		echo "<a href='index.php'>Los cambios se han guardado! Ya puedes seguir navegando!</a>";
	}
	else {
		echo "<a href='modificarUsuario.php'>Hay algunos campos incorrectos, corrígalos por favor </a>";
	}
}
else {
	echo "<a href='modificarUsuario.php'>Hay algunos campos incorrectos, corrígalos por favor </a>";
}

    
?>