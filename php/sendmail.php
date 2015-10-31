<?php
	$destino = $_POST["mail"];
	$contenido = "te has suscrito a la tienda de cosas 3D";
	//mail($destino, subject, $contenido);
	mail("l.david1929@gmail.com", "titulo", "mensaje");
	echo 'correo '. $_POST["mail"] .' recibido';
?>