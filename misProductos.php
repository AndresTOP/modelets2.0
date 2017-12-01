<?php
    session_start();
    $miNick=$_SESSION['Nick'];
    include "conexion.php";
    $query="SELECT * FROM producto WHERE nick='$miNick'";
    $resultado=mysqli_query($con,$query);
    while ($rec=mysqli_fetch_array($resultado)){
        $idProducto= $rec['id'];
        $nombreProducto = $rec['nombreProducto'];
        echo "<a href=mostrarMiProducto.php?id=$idProducto>$nombreProducto</a>";
	    echo "<br>";
    }
?>