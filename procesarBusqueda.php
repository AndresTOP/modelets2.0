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
            	    echo "<a href=mostrarProducto.php?id=$idProducto>$nombreProducto</a>";
            	    echo "<br>";
                }
    	    }
   	    }
   	    else{
   	        echo "No existe ningún producto con "."'$name'";
   	    }
    }
	

?>