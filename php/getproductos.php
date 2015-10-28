<?php
include 'conexion.php';
if ($db->connect_errno) 
{
	die ($db->connect_errno. $db->connect_error);
}
else
{
	$query = $db->query('SELECT * FROM productos');
	$query2 = $db->query('SELECT * FROM categorias');
	$datos = array();
	$categorias = array();
	while ($fila = $query2->fetch_array()) {
		$categorias[]= array("id" => $fila["idCategoria"],
							 "nombre" => $fila["nombre"]
							);
	}
	while ($fila = $query->fetch_array())
	{
		for ($i = 0; $i < count($categorias); $i++) { 
			$categoria = array_search($fila["categorias_idCategorias"], $categorias[$i]);
			if ($categoria != false) {
				$categoria = $i;
				break;
			}
		}

		if ($fila["oferta"] > 0) {
			$precioventa = $fila["precio"] - ($fila["precio"] * $fila["oferta"] / 100);
		} else {
			$precioventa = $fila["precio"];
		}

		$datos[]=array(	"id"=>$fila["idProducto"],
						"nombre" => $fila["nombre"],
						"precio" => $fila["precio"],
						"stock" => $fila["stock"],
						"oferta" => $fila["oferta"],
						"imagen" => $fila["imagen"],
						"idcategoria" => $fila["categorias_idCategorias"],
						"categoria" => $categorias[$categoria]["nombre"],
						"preciod" => $precioventa
		);
	}
	echo '{"productos": ', json_encode($datos), '}';
}
?>