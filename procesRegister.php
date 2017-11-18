<?php

$nom = $_POST['Nom']
$llinatges = $_POST['Llinatges']
$correu = $_POST['Correu electrònic']
$nick = $_POST['Nick'];
$pass = $_POST['Pass'];

$query= "SELECT * FROM usuari WHERE nick= '".$nom"; 

$resultat=my
$existeix= mysqli_num_rows($resultat);

if ($existeix >= 1){
	trigger_error("El nick de usuario ya estaba registrado. Utilice uno nuevo, por favor", E_USER_ERROR);
	echo "<a href='register.php'>Por favor escoga otro Nombre</a>
} 
else {
	$query= "INSERT INTO registre SET ";
	$query= $query."Nom='".$nom."'";
	$query= $query.",Llinatges='".$llinatges."'";
	$query= $query.",Correu electrònic='".$correu."'";
	$query= $query.",Nick'".$nick. "'";
	$query= $query.",Pass'".$pass. "'";
	$resultat=mysqli_query($con,$query);
	echo "<a href='index.php'>Ya estas registrado! Puedes iniciar sesión en cualquier momento a partir de ahora</a>
}

?>