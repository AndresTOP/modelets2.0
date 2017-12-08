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
    <table class = "table table-bordered table-hover">
    

<?php
	include "conexion.php";
    session_start();
    $tipo = $_GET['Tipo'];
    if (isset($_SESSION['Nick'])){
        $miNick= $_SESSION['Nick'];
        $query= "SELECT * FROM producto WHERE tipo= '$tipo' and nick='$miNick'";
    }
    else {
        $query= "SELECT * FROM producto WHERE tipo= '$tipo'";
    }
	
	$resultado=mysqli_query($con,$query);
	if (!$resultado) {
        die("Error");
    }
    else {
        $existe= mysqli_num_rows($resultado);
	    if ($existe != 0) {
    	    $reg = mysqli_fetch_array($resultado);
    	    $resultado=mysqli_query($con,$query);
    	    
    	    ?>
    	    <tr>
    	        <td class = "table-warning">
    	            <strong><?php echo "Productos tipo "." '$tipo' "; ?> </strong>
    	        </td>
    	    </tr>
    	    <?php 
    	    while ($rec = mysqli_fetch_array($resultado)) {
    	        $fecha=$rec['fechaFin'];
    	        $hora=$rec['horaFin'];
    	        $fechaActual=strtotime(date("d-m-Y H:i:00",time()));
                $fechaFin=strtotime("$fecha $hora");
                $fechaActual=$fechaActual+3600;
                if ($fechaActual < $fechaFin){
        	        $idProducto = $rec['id'];
        	        $nombreProducto = $rec['nombreProducto'];
        	        
        	        ?>
        	        <tr>
        	            
            	     <td><?php echo "<a href=mostrarProducto.php?id=$idProducto>$nombreProducto</a>"; ?></td>
            	     
            	    </tr>
            	    <?php
                }
    	    }
   	    }
   	    else {
   	        ?>
   	        
   	    <div class="alert alert-danger" role="alert">
             <?php echo "No hemos encontrado ningún producto de tipo "." '$tipo' "; ?>
        </div>
 
   	        <?php
   	        
   	    }
    }
    mysqli_close($con);

?>
        </table>
    </div>
</body>