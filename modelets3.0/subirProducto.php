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
?>
<form action="procesarSubidaProducto.php" method="POST">
	<h4>Nombre del producto</h4><input name="Nombre">
	<div class="mt-2 col-md-12"></div>
	<h4>Descripción</h4><textarea name="Descripcion" rows="8" cols="20">Escribe una descripción</textarea>
	<div class="mt-2 col-md-12"></div>
	<h4>Precio (€)</h4><input name="Precio">
	<div class="mt-2 col-md-12"></div>
	<h4>Fecha final de subasta</h4><input type="date" name="Fecha">
	<div class="mt-2 col-md-12"></div>
	<h4>Hora final de subasta</h4><input type="time" name="Hora">
	<div class="mt-2 col-md-12"></div>
	<h4>Tipo:</h4>
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
    
    <button class="btn btn-primary" type="submit">Subir</button>
</form>


    </div>
</body>