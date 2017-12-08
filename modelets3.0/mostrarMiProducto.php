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
    

    
    

<?php
session_start();
if (isset($_SESSION['Nick'])){
    $miNick=$_SESSION['Nick'];
}
include "conexion.php";

$id = $_GET['id'];

$query= "SELECT * FROM producto WHERE id= ".$id;

$resultat=mysqli_query($con,$query);
$existeix= mysqli_num_rows($resultat);

if ($existeix >= 1){
    ?>
    <div class = "container" >
        <table class = "table">
            
            <?php
            
	while ($rec=mysqli_fetch_array($resultat)) {
	    
	    ?>
	    <tr>
                <td>Producto</td>
                <td> <?php echo "".$rec['nombreProducto']."" ?> <td>
        </tr> 
        
        <tr>
                <td>Descripción</td>
                <td> <?php echo "".$rec['descripcion']."" ?> <td>
        </tr> 
        <tr>
                <td>Precio original</td>
                <td> <?php echo "".$rec['precio']."" ?> <td>
        </tr> 
        
            
            <?php
	    
  		putenv('TZ=Europe/Madrid'); 
  		$fechaActual=strtotime(date("Y-m-d H:i:s",time()));
  		$fechaActual=$fechaActual+3600; 
        $fechaFin=strtotime($rec['fechaFin']." ".$rec['horaFin']);
        if ($fechaActual > $fechaFin){
            echo "<br>";
            echo "<br>";
            echo "<a href='modifProducto.php?id=$id'>Modificar producto </a>";
        } 
        else {
            
            ?>
            <tr>
                <td>Fecha final de subasta</td>
                <td> <?php echo "".$rec['fechaFin']."" ?> <td>
            </tr> 
            <tr>
                <td>Hora final</td>
                <td> <?php echo "".$rec['horaFin']."" ?> <td>
        </tr> 
        <?php

            $query = "SELECT nick , MAX(precio) AS precio FROM puja WHERE idProd=$id";
            $resultado = mysqli_query($con,$query);
            $nrows= mysqli_num_rows($resultado);
            $rec=mysqli_fetch_array($resultado);
            if ($rec['nick'] !== NULL and $rec['precio'] !== NULL){
                echo "Mejor puja hasta el momento: ";
                echo "<br>";
                echo "\t Usuario: ".$rec['nick'];
                echo "<br>";
                echo "\t Precio: ".$rec['precio']. " €";
                echo "<br>";
            }
        }
	}
	?>
	
	</table>
	</div>
	
	<?php
} 
else {
    ?>
    <div class="alert alert-danger" role="alert">
        <?php echo "No se encuentra disponible"; ?>
    </div>
        
        <?php
}



?>

</body>