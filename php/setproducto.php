<?php
include 'conexion.php';
$precio = floatval($_POST['precio']);
$stock = intval($_POST['stock']);
$oferta = floatval($_POST['oferta']);
$categoria = intval($_POST['categoria']);

if ($_FILES["imagen"]["error"] > 0){
	echo "ha ocurrido un error";
} else {

	$permitidos = array("image/jpg", "image/jpeg", "image/gif", "image/png");

	if (in_array($_FILES['imagen']['type'], $permitidos)){
		$ruta = "../images/" . $_FILES['imagen']['name'];
		$resultado = @move_uploaded_file($_FILES["imagen"]["tmp_name"], $ruta);
		if ($resultado){
			$imagen = $_FILES['imagen']['name'];
			$sql = ("INSERT INTO productos (nombre, precio, stock, oferta, imagen, categorias_idCategorias) VALUES ('$_POST[nombre]', '$precio', '$stock', '$oferta', '$imagen', '$categoria')");
			if(mysqli_query($conexion, $sql, MYSQLI_STORE_RESULT)){
                echo 'insertado correctamente';
            } else {
            	echo 'error'.mysqli_error($conexion);;  
        	}        
		} else {
			echo "ocurrio un error al mover el archivo.";
		}
		
	} else {
		echo "archivo no permitido, es tipo de archivo prohibido o excede el tamaño";
	}
}
mysqli_close($conexion);
?>