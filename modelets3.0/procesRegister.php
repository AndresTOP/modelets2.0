
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
	    
	        ?>
   	        
   	    <div class="alert alert-success" role="alert">
             <?php echo "<a href='index.php'>Ya estas registrado! Puedes iniciar sesión en cualquier momento a partir de ahora</a>"; ?>
        </div>
 
   	        <?php
	    

    }
	
	else if (ctype_space($nombre) or ctype_space($apellidos) or ctype_space($correo) or ctype_space($nick) or ctype_space($pass)){
	    
	    
	    
	    	        ?>
   	        
   	    <div class="alert alert-danger" role="alert">
             <?php 
            echo "Hay campos vacíos. Rellénelos con al menos un carácter.";
            echo "<a href='register.htm'>Rellenar de nuevo</a>"; ?>
        </div>
 
   	        <?php
    }
    else{
        if ($existe != 0){
            
            	    	        ?>
   	        
   	    <div class="alert alert-danger" role="alert">
             <?php 
            echo "Ya existe un usario con nick "." '$nick'". " ya utilizado.    ";
            echo "<a href='register.htm'>Rellenar de nuevo</a>"; ?>
        </div>
 
   	        <?php
            
        } else {
	    	        ?>
   	        
   	    <div class="alert alert-danger" role="alert">
             <?php 
            echo "Hay campos vacíos. Rellénelos con al menos un carácter.  ";
            echo "<a href='register.htm'>Rellenar de nuevo</a>"; ?>
        </div>
 
   	        <?php
        }
        
    }
}
else {
    die("Error");
}

?>

    </div>
</body>
