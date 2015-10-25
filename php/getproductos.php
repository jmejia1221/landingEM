<?php
$dbhost="localhost";
$dbname="landingem";
$dbuser="root";
$dbpass="";
$db = new mysqli($dbhost,$dbuser,$dbpass,$dbname);

if (isset($_GET) && count($_GET)>0)
{
	if ($db->connect_errno) 
	{
		die ($db->connect_errno. $db->connect_error);
	}
	else
	{
		$query=$db->query("SELECT * FROM productos");
		$datos=array();
		while ($usuarios=$query->fetch_array())
		{
			$datos[]=array(	"id"=>$usuarios["idProducto"],
							"nombre"=>$usuarios["nombre"],
							"precio"=>$usuarios["precio"],
							"stock"=>$usuarios["stock"],
							"oferta"=>$usuarios["oferta"]
			);
		}
		echo '{"productos": ', json_encode($datos), '}';
	}

}
$query=$db->query("SELECT * FROM productos");
		$datos=array();
		while ($usuarios=$query->fetch_array())
		{
			$datos[]=array(	"id"=>$usuarios["idProducto"],
							"nombre"=>$usuarios["nombre"],
							"precio"=>$usuarios["precio"],
							"stock"=>$usuarios["stock"],
							"oferta"=>$usuarios["oferta"]
			);
		}
		echo '{"productos": ', json_encode($datos), '}';
?>