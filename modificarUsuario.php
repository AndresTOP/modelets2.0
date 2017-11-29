<?php
    session_start();
    $nick=$_SESSION['Nick'];
    include "conexion.php";
    echo $nick;
    $query="SELECT * FROM usuario WHERE nick="."'$nick'";
    $resultado=mysqli_query($con,$query);
    $rec=mysqli_fetch_array($resultado);
?>


<html>
<head>
</head>
<body>
<form action="procesarModifUsuario.php" method="POST">
        <h2>Nombre</h2><input name="Nombre" value="<?php echo $rec['nombre'];?>">
	    <h2>Apellidos</h2><input name="Apellidos" value="<?php echo $rec['apellidos'];?>">
	    <h2>Correo</h2><input name="Correo" value="<?php echo $rec['correoElectronico'];?>">
        <h2>Contraseña</h2><input type="password" name="Contraseña" value="<?php echo $rec['pass'];?>">
        <input type="submit" name="login" value="Guardar cambios">
</form>
</body>
</html>