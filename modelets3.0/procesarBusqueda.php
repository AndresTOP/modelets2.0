<head>
    <meta charset= "UTF-8">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
    

</head>


<body>
    
    <div class="alert alert-primary" role="alert" >

            <li class="breadcrumb-item"><a href="index.php">UIB-BAY</a></li>

    </div>
    
    
    <div class = "container">
        <table class ="table table-bordered table-hover">



    <?php
    session_start();
    include "conexion.php";
    $name = $_GET['Name'];
    if (isset($_SESSION['Nick'])){
        $miNick=$_SESSION['Nick'];
        $query= "SELECT * FROM producto WHERE nombreProducto LIKE  '%$name%' and nick!='$miNick'";
    }
    else {
        $query= "SELECT * FROM producto WHERE nombreProducto LIKE  '%$name%'";
    }
    
	$resultado=mysqli_query($con,$query);
	if (!$resultado) {
         die("Error");
    }
    else {
        $existe= mysqli_num_rows($resultado);
	    if ($existe != 0) {
	        ?>
	        <tr class = "info">
	            
	            <td class = "table-warning"> <strong>Productos</strong></td>
	        </tr>
	        <?php
    	    $rec = mysqli_fetch_array($resultado);
    	    $resultado=mysqli_query($con,$query);
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
            	    <td><?php echo "<a href=mostrarProducto.php?id=$idProducto>$nombreProducto</a>" ?></td>
            	    
            	</tr>
                <?php
                }
    	    }
   	    }
   	    else{
   	        ?> 
   	        
   	        <div class="alert alert-danger" role="alert">
             <?php echo "No existe ningún producto con "."'$name'"; ?>
        </div>
        <?php
   	    }
   	    
    }
	

    ?>
  
    </table>
  </div> 
  
  
  
  
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>

    
</body>