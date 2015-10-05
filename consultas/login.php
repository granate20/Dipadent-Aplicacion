<?
$usuarioEnviado = $_GET[usuario];
$passwordEnviado =str_replace('%25','%',$_GET[password]);

$resultados = array();

require_once("../../admin/conexionabm.php");

if($_GET[usuario])
{
	$registro=mysql_query("select * from usuarios where usuario='".$usuarioEnviado."' and password=md5('".$passwordEnviado."') and activo=1");
	  

 
	
	$usuario=mysql_fetch_array($registro);
	$aux=0;
	if($usuario["pk_usuario"]>0)
	{
		
		$resultados[respuesta] = "Validacion Correcta";
		$resultados[validacion] = "ok";
		$resultados[pk_usuario]=$usuario[pk_usuario];
		$resultados[usuario]=utf8_encode($usuario[login]);
		$resultados[acceso]=$usuario[acceso];
		$resultados[nombre]=utf8_encode($usuario[nombre]);
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
