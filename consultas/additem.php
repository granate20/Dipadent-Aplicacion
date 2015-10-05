<?


$resultados = array();

require_once("../../admin/conexionabm.php");

if($_GET[pedido])
{
	 

	
		mysql_query("insert into itemsXpedido ( `codigo`, `item`, `cantidad`, `pedido_pk`) values ('".$_GET[codigo]."','".$_GET[nombre]."','".$_GET[cantidad]."',".$_GET[pedido].") ");
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
	
	
	


$resultadosJson = json_encode($resultados);

echo  $_GET[jsoncallback]. '(' . $resultadosJson .');';

?>
