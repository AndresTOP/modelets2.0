<?php
    include "conexion.php";
?>
<form action="procesarSubidaProducto.php" method="POST">
	<h2>Nombre del producto</h2><input name="Nombre">
	<h2>Descripción</h2><textarea name="Descripcion" rows="10" cols="40">Escribe una descripción</textarea>
	<h2>Precio (€)</h2><input name="Precio">
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
    <input type="submit" name="login" value="Subir">
</form>
