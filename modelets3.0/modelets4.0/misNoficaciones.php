<?php
    session_start();
?>

<head>
    <meta charset= "UTF-8">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
    

</head>


<body>
    
    <div class="alert alert-primary" role="alert" >

            <li class="breadcrumb-item"><a href="index.php">UIB-BAY</a></li>

    </div>
    

    
    <div class = "container" >
        <table class = "table table-bordered table-hover">
        
            
           
         <tr>
                <td class= table-warning>
                   <strong> Novedades</strong>
                </td>
            </tr>
            
            <?php
    
        $nick=$_SESSION['Nick'];
        include "conexion.php";
        date_default_timezone_set('Europe/Madrid');
        $query="SELECT nombreProducto, producto.id as id, fechaFin, horaFin, MAX(puja.precio) as precio FROM puja INNER JOIN producto ON idProd=producto.id WHERE puja.nick='$nick' GROUP BY nombreProducto";
        $resultado=mysqli_query($con,$query);
        $cont = 0;
        while($rec=mysqli_fetch_array($resultado)){
        	$fecha=$rec['fechaFin'];
    	    $hora=$rec['horaFin'];
    	    $producto=$rec['nombreProducto'];
    	    $fechaActual=time();
    	    $fechaFin=strtotime("$fecha $hora");
    	    if ($rec['precio'] !== NULL and $fechaActual > $fechaFin){
    	    	$precioMiPuja=$rec['precio'];
                $idProd=$rec['id'];
                $query="SELECT nick,precio FROM puja WHERE precio=(SELECT max(precio) FROM puja WHERE idProd=$idProd)";
    	    	$resultado=mysqli_query($con,$query);
    	    	$rec=mysqli_fetch_array($resultado);
    	    	if ($precioMiPuja < $rec['precio'] ) {
    	    	}
    	    	else{
    	    	    ?>
    	    	    <tr>
    	    	        <td>
    	    	            <?php echo "Has ganado la subasta del producto '$producto' por un precio de $precioMiPuja €"; 
                            $cont=$cont+1;?>
    	    	        </td>
    	    	    </tr>
    	    		
	    		<?php
	    	    }
	        }
        }
        
     if($cont == 0) {
        ?>
            <div class="alert alert-danger" role="alert">
             <?php echo "No hay ninguna notificación..."; ?>
        </div>
        <?php
    }
    
?>  
        </table>
    </div>
</body>
