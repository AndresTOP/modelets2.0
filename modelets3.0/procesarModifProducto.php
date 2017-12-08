<?php session_start(); ?>

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
    $nick=$_SESSION['Nick'];
    include "conexion.php";
    $id = $_GET['id'];
    $nombre = $_POST['Nombre'];
    $descripcion= $_POST['Descripcion'];
    $precio= $_POST['Precio'];
    $fecha= $_POST['Fecha'];
    $hora= $_POST['Hora'];
    $tipo=$_POST['Tipo'];


    $fechaActual=strtotime(date("d-m-Y H:i:00",time()));
    $fechaFin=strtotime("$fecha $hora");
    $fechaActual=$fechaActual+3600;
    if ($fechaActual > $fechaFin){
        echo "<a href='subirProducto.php'>Fecha no válida. Inténtelo de nuevo, por favor </a>";
    } 
    else {
        $query= "UPDATE producto SET ";
        $query= $query. "nombreProducto='".$nombre."'";
        $query= $query. ",descripcion='".$descripcion."'";
        $query= $query. ",precio='$precio'";
        $query= $query. ",fechaFin='$fecha";
        $query= $query. ",tipo='".$tipo."'";
        $query= $query. ",nick='".$nick."'";
        $query= $query. ",horaFin='$hora'";
        $query= $query. " WHERE id=$id";
        $pos=strpos($precio,'-');
        if  (!empty($nombre)  and $pos === false){
            if (!ctype_space($nombre)){
                
                $resultado=mysqli_query($con,$query);
                if (!$resultado){
                    
                               	        ?> 
   	        
   	        <div class="alert alert-danger" role="alert">
             <?php echo "<a href='subirProducto.php'>Precio incorrecto, introduzca uno de nuevo, por favor </a>"; ?>
        </div>
        <?php
                    
                }
            }
            else {
                
                           	        ?> 
   	        
   	        <div class="alert alert-danger" role="alert">
             <?php echo "<a href='subirProducto.php'>Campos incorrectos, pruebe de nuevo por favor </a>"; ?>
        </div>
        <?php
                
            }
            
        }
        else{
                       	        ?> 
   	        
   	        <div class="alert alert-danger" role="alert">
             <?php echo "<a href='subirProducto.php'>Precio incorrecto, introduzca uno de nuevo, por favor </a>"; ?>
        </div>
        <?php
            
            
            
        }
        
        
    }
?>
</div>
</body>