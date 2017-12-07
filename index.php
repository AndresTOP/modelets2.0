<?php
    session_start();
    if(isset($_SESSION['Nick']))
    {
        $nick = $_SESSION['Nick'];
        echo "Conectado como ";
        echo $nick;
        echo "                   ";
        $subir = "Subir producto";
        echo "<a href=subirProducto.php>$subir</a>";
        echo "                   ";
        $misProd = "Mis productos";
        echo "<a href=misProductos.php>$misProd</a>";
        echo "                   ";
        $notify = "Notificaciones";
        echo "<a href=misNotificaciones.php>$notify</a>";
        echo "                   ";
        $editar = "Editar perfil";
        echo "<a href=modificarUsuario.php>$editar</a>";
        echo "                   ";
        $cerrar = "Cerrar Sesión";
        echo "<a href=cerrarSesion.php>$cerrar</a>";
    }
    else {
        $registro="Registrarse";
        echo "<a href=register.htm>$registro</a>";
        echo " ";
        $inicioS="Iniciar sesión";
        echo "<a href=login.htm>$inicioS</a>";
        echo "                    ";
        
    }
    include "conexion.php";
    
?> 
    
<html>
<head>
    <meta charset="UTF-8"/>
</head>
<body>

<form action="procesarBusqueda.php" method="GET">
    <meta http-equiv="Content-Type" content="text/php; charset=utf8" />
    <p>Nombre producto: <input type="text" name="Name" value="Buscar producto"> <?php if (isset($REQUEST['Name'])) echo $_REQUEST['Nombre producto']; ?> </p>
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
</body>
</html>