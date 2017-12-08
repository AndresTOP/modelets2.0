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
    include "conexion.php";

    $nick = $_POST['Nick'];
    $pass = $_POST['Contraseña'];
    
    $query= "SELECT * FROM usuario WHERE nick= '".$nick."' AND pass= '$pass'";
    $resultado=mysqli_query($con,$query);
    if ($resultado){
        $existe=mysqli_num_rows($resultado);
        if ($existe != 0){
             $rec = mysqli_fetch_array($resultado);
             session_start();
             $_SESSION['Nick']=$nick;
             $_SESSION['Contraseña']=$pass;
             header('Location: index.php?' . SID );
             
              ?> 
   	        
   	        <div class="alert alert-success" role="alert">
             <?php 
             echo "<a href='index.php'>Se ha logeado con éxito </a> ";
             ?>
        </div>
        
        <?php
             
             
             
        }
        else {
            
               	        ?> 
   	        
   	        <div class="alert alert-danger" role="alert">
             <?php 
             echo "Los datos introducidos son incorrectos.  ";
             echo "<a href='login.htm'>Intentar de nuevo, por favor</a>";
             
             ?>
        </div>
        
        <?php
            
        }
        
    }
    else{
        die("Error");
    }

?>

</div>
</body>