<?php
    session_start();
    $nick=$_SESSION['Nick'];
    $id=$_GET['id'];
    include "conexion.php";
    echo $nick;
    $query="SELECT * FROM producto WHERE id="."'$id'";
    $resultado=mysqli_query($con,$query);
    $rec=mysqli_fetch_array($resultado);
    
?>


<html>
<head>
</head>
<body>
<form action="procesarModifProducto.php?id=<?php echo $_GET['id'] ?>" method="POST">
        <h2>Nombre Producto</h2><input name="Nombre" value="<?php echo $rec['nombreProducto'];?>">
        <h2>Descripción</h2><textarea name="Descripcion" rows="10" cols="40"><?php echo $rec['descripcion'];?></textarea>
        <h2>Precio (€)</h2><input name="Precio" value="<?php echo $rec['precio'];?>">
    	<h2>Fecha final de subasta</h2><input type="date" name="Fecha">
	    <h2>Hora final de subasta</h2><input type="time" name="Hora">
    	<h2>Tipo:</h2>
        <select name="Tipo">
          <?php
            $query= "SELECT * FROM tipo";
            $resultado=mysqli_query($con,$query);
            while ($rec=mysqli_fetch_array($resultado)) 
            {
              echo "<OPTION VALUE='".$rec['tipo']."'";
              echo ">".$rec['tipo']."</OPTION>";   
            }
          ?>
          
        </select>
        <input type="submit" name="login" value="Guardar cambios">
</form>