<?


$resultados = array();

require_once("../../admin/conexionabm.php");

if($_GET[usuario])
{
	 


	$reg=mysql_query("select * from usuarios where pk_usuario=".$_GET[usuario]);
	if(mysql_num_rows($reg)>0)
	{
		$usuario=mysql_fetch_array($reg);
		mysql_query("insert into pedidos ( `forma_envio`, `forma_pago`, `nombre`, `telefono`, `email`, `pais`, `provincia`, `ciudad`, `codigo_postal`, `domicilio`, `estado`, `observaciones`,  `usuario_pk`) values (".$_GET[retiro].",".$_GET[pago].",'".$usuario[nombre]."','".$usuario[telefono]."','".$usuario[email]."','".$usuario[pais]."','".$usuario[provincia]."','".$usuario[ciudad]."','".$usuario[codigo_postal]."','".$usuario[domicilio]."',1,'".$_GET[observaciones]."',".$_GET[usuario].")");
		$id=mysql_insert_id();
			if($id>0)
			{
			$resultados[respuesta] = "Creación Correcta";
			$resultados[validacion] = "ok";
			$resultados[pk_pedido]=$id;
			}
	
			
	}
	else 
	{
		
		$resultados[respuesta] = "Usuario o Mail existente";
		$resultados[validacion] = "error";	
	}
	
	
	
}

$resultadosJson = json_encode($resultados);

echo  $_GET[jsoncallback]. '(' . $resultadosJson .');';

?>
