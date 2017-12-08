
<html>
<head>
    <meta charset= "UTF-8">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
    

</head>
    <body>
        
    <div class="alert alert-primary" role="alert" >

            <li class="breadcrumb-item"><a href="index.php">UIB-BAY</a></li>

    </div>




<div class = "container">





<?php
session_start();
$nick=$_SESSION['Nick'];
include "conexion.php";
$nombre = $_POST['Nombre'];
$apellidos = $_POST['Apellidos'];
$correo = $_POST['Correo'];
$pass = $_POST['Contraseña'];


    $query= "UPDATE usuario SET ";
	$query= $query."nombre='".$nombre."'";
	$query= $query.",apellidos='".$apellidos."'";
	$query= $query.",correoElectronico='".$correo."'";
	$query= $query.",pass='".$pass. "'";
	$query= $query." WHERE nick='".$nick."'";
	$resultat=mysqli_query($con,$query);
	
	   ?>
   	        
   	    <div class="alert alert-success" role="alert">
             <?php echo "<a href='index.php'>Los cambios se han guardado! Ya puedes seguir navegando!</a>"; ?>
        </div>
 
   	        <?php

    mysqli_close($con);
?>


    </div>
</body>