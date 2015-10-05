<?
$usuarioEnviado = $_GET[q];

$resultados = array();

require_once("../../admin/conexionabm.php");

if($_GET[q])
{
	$registro=mysql_query("SELECT productos.codigo_stk codigo,detalle_stk nombre
from `productos`
where 1 and detalle_stk like '%".$_GET[q]."%'");
	  

 
	
	if(mysql_num_rows($registro)>0)
	{
		
		$resultados[respuesta] = "Validacion Correcta";
		$resultados[validacion] = "ok";
		while($producto=mysql_fetch_array($registro))
		{
			$prod[codigo]=utf8_encode($producto[codigo]);	
			$prod[nombre]=utf8_encode($producto[nombre]);
		$resultados[productos][]=$prod;	
		}
	}
	else 
	{
		$resultados[respuesta] = "Usuario y password incorrectos ".$usuarioEnviado." ".$passwordEnviado;
		$resultados[validacion] = "error";
		}
	
	
	
}

$resultadosJson = json_encode($resultados);

echo  $_GET[jsoncallback]. '(' . $resultadosJson .');';

?>
