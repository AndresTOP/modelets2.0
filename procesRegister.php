<?php
include "conexion.php";
$nombre = $_POST['Nombre'];
$apellidos = $_POST['Apellidos'];
$correo = $_POST['Correo'];
$nick = $_POST['Nick'];
$pass = $_POST['Contraseña'];

$query= "SELECT * FROM usuario WHERE nick= '".$nick."'";
$query=$query. "or (nombre= ' ' and apellidos= ' ' and nick= ' ' and pass= ' ')";

$resultado=mysqli_query($con,$query);
if (!$resultado){
    $query= "INSERT INTO usuario SET ";
	$query= $query."nombre='".$nombre."'";
	$query= $query.",apellidos='".$apellidos."'";
	$query= $query.",correoElectronico='".$correo."'";
	$query= $query.",nick='".$nick."'";
	$query= $query.",pass='".$pass."'";
	$resultat=mysqli_query($con,$query);
	echo "<a href='index.php'>Ya estas registrado! Puedes iniciar sesión en cualquier momento a partir de ahora</a>";
}
else if ($nick=' ' or $nombre=' ' or $correu=' ' or $pass= ' ' or $apellidos= ' '){
    echo "Hay campos vacíos. Rellénelos con al menos un carácter.";
	echo "<a href='register.htm'>Rellenar de nuevo</a>";
}
else{
    echo "Ya existe un usario con nick ".'$nick'." ya utilizado";
    echo "<a href='register.htm'>Intentar de nuevo, por favor</a>";
}
?>