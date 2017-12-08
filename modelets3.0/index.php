<?php session_start(); ?>
    <html>
<head>
    <meta charset= "UTF-8">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
    

</head>
    <body>
        
            <div class="alert alert-primary" role="alert" >
        <nav aria-label="breadcrumb" role="navigation">
            <li class="breadcrumb-item">UIB-BAY</li>
        </nav>
    </div>



    <?php
        session_start();
        if(isset($_SESSION['Nick']))
        {
            $nick = $_SESSION['Nick'];
            ?>
            <div class="alert alert-success" role="alert">
            Conectado como  <strong> <?php echo $nick ?> </strong>
            </div>
            

            <?php
            $subir = "Subir producto";
            $misProd = "Mis productos";
            $editar = "Editar perfil";
            $cerrar = "Cerrar Sesión";
            $notify = "Notificaciones";
            
            ?>
            
            <div class = "container">
            
                <a href="subirProducto.php" class="badge badge-primary">
                    <big>Subir producto</big> 
                </a>
        
            
                <a href="misProductos.php" class="badge badge-primary">
                    <big> Mis productos</big> 
                </a>
                
                <a href= "misNotificaciones.php" class = "badge badge-primary">
                    <big> Notificaciones</big>
                    
                </a>
                
            

            
                <a href="modificarUsuario.php" class="badge badge-primary">
                    <big> Editar perfil</big> 
                </a>     

                <a href="cerrarSesion.php" class="badge badge-danger">
                    <big> Cerrar sesión </big> 
                </a> 
            </div>
            
            

            
            <?php
        }
        else {
            
            $registro="Registrarse";
            $inicioS="Iniciar sesión";
            ?>
            <div class = "container">
            
                <a href="register.htm" class="badge badge-primary">
                    <big>Registrarse</big> 
                </a>
                
                <a href="login.htm" class="badge badge-primary">
                    <big>Iniciar sesión</big> 
                </a>
            </div>
            <?php
        }
        
        ?> 
            <div class="mt-2 col-md-12"></div>
            <div class="mt-2 col-md-12"></div>
        <?php
        include "conexion.php";
    ?> 
    
    
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
        </body>
    </html>
        
    <html>
    <head>
    </head>
    <body>
    
<div class ="container">
    <form action="procesarBusqueda.php" method="GET">
        <p>Nombre producto: <input type="text" name="Name" placeholder="Buscar producto"> <?php if (isset($REQUEST['Name'])) echo $_REQUEST['Nombre producto']; ?> </p>
        <input type="submit" name="Buscar producto" value="Buscar producto">
    </form>
    
    <form action="procesarBusquedaTipo.php" method="GET">
        <br>Tipo:
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
          <input name="Buscar producto por tipo" value="Buscar producto" type="submit">
        </select>
    </form>
    <?php
    mysqli_close($con);
    ?>
    
    </div>
    
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
    </body>
    </html>