<?php
include "conexion.php";
$nombre = $_POST['Nombre'];
$apellidos = $_POST['Apellidos'];
$correo = $_POST['Correo'];
$nick = $_POST['Nick'];
$pass = $_POST['Contraseña'];

$query= "SELECT * FROM usuario WHERE nick= '".$nick."'";

$resultado=mysqli_query($con,$query);
if ($resultado){
    $existe=mysqli_num_rows($resultado);
    if ($existe == 0 and ctype_print($correo) and ctype_alpha ($nombre) and ctype_alnum($nick) and ctype_alnum($pass)){
        $query= "INSERT INTO usuario SET ";
	    $query= $query."nombre='".$nombre."'";
	    $query= $query.",apellidos='".$apellidos."'";
	    $query= $query.",correoElectronico='".$correo."'";
	    $query= $query.",nick='".$nick."'";
	    $query= $query.",pass='".$pass."'";
	    $resultat=mysqli_query($con,$query);
	    echo "<a href='index.php'>Ya estas registrado! Puedes iniciar sesión en cualquier momento a partir de ahora</a>";
    }
	
	else if (ctype_space($nombre) or ctype_space($apellidos) or ctype_space($correo) or ctype_space($nick) or ctype_space($pass)){
        echo "Hay campos vacíos. Rellénelos con al menos un carácter.";
	    echo "<a href='register.htm'>Rellenar de nuevo</a>";
    }
    else{
        if ($existe != 0){
            echo "Ya existe un usario con nick ".'$nick'." ya utilizado";
            echo "<a href='register.htm'>Intentar de nuevo, por favor</a>";
        } else {
            echo "Hay campos vacíos o incorrectos.";
            echo "<a href='register.htm'>Intentar de nuevo, por favor</a>";
        }
        
    }
}
else {
    die("Error");
}

?>