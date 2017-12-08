<head>
    <meta charset= "UTF-8">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
    

</head>


<body>
    
    <div class="alert alert-primary" role="alert" >

            <li class="breadcrumb-item"><a href="index.php">UIB-BAY</a></li>

    </div>
    

    
    <div class = "container" >
        <table class = "table">
                

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
	while ($rec=mysqli_fetch_array($resultat)) {
            echo "<br>";
          ?><tr>
                <td>Producto</td>
                <td> <?php echo "".$rec['nombreProducto']."" ?> <td>
            </tr> 
            
            <tr>
                <td>Descripción</td>
                <td> <?php echo "".$rec['descripcion']."" ?> <td>
            </tr> 
            <tr>
                <td>Vendedor</td>
                <td> <?php echo "".$rec['nick']."" ?> <td>
            </tr> 
            <tr>
                <td>Precio original</td>
                <td> <?php echo "".$rec['precio']." €" ?> <td>
            </tr> 
            <tr>
                <td>Fecha final de subasta</td>
                <td> <?php echo "".$rec['fechaFin']."" ?> <td>
             </tr>
             <tr>
                <td>Hora final</td>
                <td> <?php echo "".$rec['horaFin']."" ?> <td>                    
            </tr>             
            
            
    </table>
</div>

      	
	
      		<?php


 
        
	}
} 
else {
    
    ?>
    <div class="alert alert-danger" role="alert">
        <?php echo "No se encuentra disponible"; ?>
    </div>
        
        <?php
}
?>

    <div class = "container" >
        <table>
<?php if (isset($_SESSION['Nick'])){ 
        $query = "SELECT nick , MAX(precio) AS precio FROM puja WHERE idProd=$id";
            $resultado = mysqli_query($con,$query);
            $nrows= mysqli_num_rows($resultado);
            $rec=mysqli_fetch_array($resultado);
            if ($rec['nick'] !== NULL and $rec['precio'] !== NULL) {
                echo "Mejor puja hasta el momento: ";
                echo "<br>";
                echo "\t Usuario: ".$rec['nick'];
                echo "<br>";
                echo "\t Precio: ".$rec['precio']. " €";
            }
            else {
                echo "Ninguna puja sobre este producto.";
            }?>
            
    
    </div>
    <div = class ="container">        
        <form action="procesarPuja.php" method="GET">
    	<h2>Precio a pujar (€)</h2><input name="Precio">
    	<button class="btn btn-primary" type="submit">Pujar</button>
    	<input type="hidden" name="Id" value="<?php echo $_GET['id'];?>" />
        </form>
<?php    } ?>

</div>






<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
</body>