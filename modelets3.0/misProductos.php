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
    
    

    <div class = "container">
        <table class= "table table-bordered table-hover"
        
    



<?php
    session_start();
    $miNick=$_SESSION['Nick'];
    include "conexion.php";
    $query="SELECT * FROM producto WHERE nick='$miNick'";
    $resultado=mysqli_query($con,$query);
        
        ?>
        <tr>
            <td class="table-warning">
                <strong>Tus productos </strong>
            </td>
        </tr>
        <?php
        
        
    while ($rec=mysqli_fetch_array($resultado)){
        
        $idProducto= $rec['id'];
        $nombreProducto = $rec['nombreProducto'];
        
        ?>
        <tr>
        <td> <?php echo "<a href=mostrarMiProducto.php?id=$idProducto>$nombreProducto</a>"; ?> </td>
        </tr>
        <?php
        
    }
?>
    </table>
    </div>
</body>