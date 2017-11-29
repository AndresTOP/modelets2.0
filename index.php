<html>
<head>
</head>
<body>
<?php
    include "conexion.php";
    
?>
<?php
    $registro="Registrarse";
    echo "<a href=register.php>$registro</a>";
?>

<form action="procesarBusqueda.php" method="POST">
    <p>Name: <input type="text" name="Name" value="Buscar producto"> <?php if (isset($REQUEST['Name'])) echo $_REQUEST['Name']; ?> </p>
    <input type="submit" name="Buscar" value="Buscar">
</form>

<?php // Hola que tal cabrones ?>
</body>
</html>