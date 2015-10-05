<?


$resultados = array();

require_once("../../admin/conexionabm.php");

if($_GET[usuario])
{
	 


	$reg=mysql_query("select * from usuarios where usuario='".$_GET[usuario]."' or email='".$_GET[email]."'");
	if(mysql_num_rows($reg)>0)
	{
		
	
		$resultados[respuesta] = "Usuario o Mail existente";
		$resultados[validacion] = "error";
			
	}
	else 
	{
		mysql_query("insert into usuarios (usuario,password,nombre,email,telefono,ciudad,domicilio,provincia,pais,activo) values ('".$_GET[usuario]."',md5('".$_GET[pass]."'),'".$_GET[nombre]."','".$_GET[email]."','".$_GET[telefono]."','".$_GET[ciudad]."','".$_GET[domicilio]."','".$_GET[provincia]."','".$_GET[pais]."',1)");
		$id=mysql_insert_id();
			if($id>0)
			{
			$resultados[respuesta] = "Creación Correcta";
			$resultados[validacion] = "ok";
			$resultados[pk_usuario]=$id;
			$resultados[usuario]=utf8_encode($_GET[usuario]);
			$resultados[nombre]=utf8_encode($_GET[nombre]);
			}
		}
	
	
	
}

$resultadosJson = json_encode($resultados);

echo  $_GET[jsoncallback]. '(' . $resultadosJson .');';

?>
