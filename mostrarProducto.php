<?php
session_start();
if (isset($_SESSION['Nick'])){
    $miNick=$_SESSION['Nick'];
}
include "conexion.php";

$id = $_GET['id'];

$query= "SELECT * FROM producto WHERE id= ".$id;

$resultat=mysqli_query($con,$query);
$existeix= mysqli_num_rows($resultat);

if ($existeix >= 1){
	while ($rec=mysqli_fetch_array($resultat)) {
            echo "<br>";
      		echo "Nombre: ".$rec['nombreProducto'];
      		echo "<br>";
      		echo "Descripción: ".$rec['descripcion'];
      		echo "<br>";
      		echo "Vendedor: ".$rec['nick'];
      		echo "<br>";
      		echo "Precio original: ".$rec['precio']. " €";
      		echo "<br>";
      		echo "Fecha de final de subasta: ".$rec['fechaFin']. " Hora final : ".$rec['horaFin'];
      		echo "<br>";
        
	}
} 
else {
	echo "No se encuentra disponible";
}
?>
<?php if (isset($_SESSION['Nick'])){ 
        $query = "SELECT nick , MAX(precio) AS precio FROM puja WHERE idProd=$id";
            $resultado = mysqli_query($con,$query);
            $nrows= mysqli_num_rows($resultado);
            $rec=mysqli_fetch_array($resultado);
            if ($rec['nick'] !== NULL and $rec['precio'] !== NULL) {
                echo "Mejor puja hasta el momento: ";
                echo "<br>";
                echo "\t Usuario: ".$rec['nick'];
                echo "<br>";
                echo "\t Precio: ".$rec['precio']. " €";
            }
            else {
                echo "Ninguna puja sobre este producto.";
            }?>
        <form action="procesarPuja.php" method="GET">
    	<h2>Precio a pujar (€)</h2><input name="Precio">
    	<input type="hidden" name="Id" value="<?php echo $_GET['id'];?>" />
    	<input type="submit" name="Puja" value="Puja">
        </form>
<?php    } ?>
    