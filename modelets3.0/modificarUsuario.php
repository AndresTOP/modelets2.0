 <?php session_start(); ?>
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
    
    $query="SELECT * FROM usuario WHERE nick="."'$nick'";
    $resultado=mysqli_query($con,$query);
    $rec=mysqli_fetch_array($resultado);
?>



<form action="procesarModifUsuario.php" method="POST">
        <h3>Nombre</h3><input name="Nombre" value="<?php echo $rec['nombre'];?>">
            <div class="mt-2 col-md-12"></div>
            <div class="mt-2 col-md-12"></div>
	    <h3>Apellidos</h3><input name="Apellidos" value="<?php echo $rec['apellidos'];?>">
	        <div class="mt-2 col-md-12"></div>
	        <div class="mt-2 col-md-12"></div>
	    <h3>Correo</h3><input name="Correo" value="<?php echo $rec['correoElectronico'];?>">
	        <div class="mt-2 col-md-12"></div>
	        <div class="mt-2 col-md-12"></div>
        <h3>Contraseña</h3><input type="password" name="Contraseña" value="<?php echo $rec['pass'];?>">
            <div class="mt-2 col-md-12"></div>
            <div class="mt-2 col-md-12"></div>
        <button class="btn btn-primary" type="submit">Guardar cambios</button>
</form>

    </div>
</body>
