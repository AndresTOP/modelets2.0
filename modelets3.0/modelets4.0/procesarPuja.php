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
    $nick=$_SESSION['Nick'];
    include "conexion.php";
    $puja=$_GET['Precio'];
    $id=$_GET['Id'];
    $pos=strpos($puja,'-');
    if ($pos === false ){
        $query = "SELECT nick,precio FROM puja WHERE precio=(SELECT max(precio) FROM puja WHERE idProd=$id)";
        $resultado=mysqli_query($con,$query);
        $nrows=mysqli_num_rows($resultado);
        $rec=mysqli_fetch_array($resultado);
        if ($nrows != 0){
            if ($puja > $rec['precio'] ){
                $query="INSERT INTO puja SET nick='$nick' , precio=$puja , idProd=$id ";
                $resultado=mysqli_query($con,$query);
            ?>
                <div class="alert alert-success" role="alert">
                 <?php 
                 echo "Puja realizada!";
                 echo "<a href='index.php'>Pulse aquí para seguir navegando </a>"; ?>
            </div>

            <?php
            }

            else {
            ?>
                <div class="alert alert-danger" role="alert">
                 <?php 
                 echo "<a href='mostrarProducto.php?id=$id'>Precio incorrecto, pruebe de nuevo por favor </a>"; ?>
            </div>
                <?php
            }
        }
        else {
            $query="SELECT precio FROM producto WHERE id=$id";
            $resultado=mysqli_query($con,$query);
            $rec=mysqli_fetch_array($resultado);
            if ($puja > $rec['precio'] ){
                $query="INSERT INTO puja SET nick='$nick' , precio=$puja , idProd=$id ";
                $resultado=mysqli_query($con,$query);
                ?>
                <div class="alert alert-success" role="alert">
                 <?php 
                 echo "Puja realizada!";
                 echo "<a href='mostrarProducto.php?id=$id'> Pulse aquí para seguir navegandod</a>"; ?>
            </div>
                <?php
                
            }
            else {
                ?>
                    <div class="alert alert-danger" role="alert">
                     <?php 
                     echo "<a href='mostrarProducto.php?id=$id'>Precio por debajo del máximo, pruebe de nuevo por favor </a>"; ?>
                </div>
                    <?php
            }
            
        }
        
    }
    else {
        ?>
                    <div class="alert alert-danger" role="alert">
                     <?php 
                     echo "<a href='mostrarProducto.php?id=$id'>Precio incorrecto (valor negativo o carácteres incorrectos) </a>"; ?>
                </div>
                    <?php
    }
    
?>
