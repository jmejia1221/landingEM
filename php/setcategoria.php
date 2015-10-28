<?php
include 'conexion.php';
$sql = ("INSERT INTO categorias (nombre, descripcion) VALUES ('$_POST[nombre]', '$_POST[descripcion]')");
if(mysqli_query($conexion, $sql, MYSQLI_STORE_RESULT)){
    echo 'insertado correctamente';
} else {
	echo 'error'.mysqli_error($conexion); 
}
mysqli_close($conexion);
?>