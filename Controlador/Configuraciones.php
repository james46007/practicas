<?php

function getConfigurar(){
	$db=new MYSQL();//crear conexion con la base de datos
	$tbl_configuracion=$db->consulta("SELECT * FROM t_configuracion");//consultar la tabla de usuarios
	return $tbl_configuracion;
}

function setConfigurar($capacidad,$fecha,$valor){
	$db=new MYSQL();//crear conexion con la base de datos
	$tbl_usuario=$db->consulta("INSERT INTO t_configuracion(CON_CAPACIDAD,CON_FECHA,CON_VALORH,CON_ESTADO) VALUES ('{$capacidad}','{$fecha}',{valor},1)");//consultar la tabla de usuarios
	/*while($datosUsuario=$db->fetch_array($tbl_usuario)){//recorre el vector de la consulta de la tabla usuarios	
		$cli_nombres=$datosUsuario['CLI_NOMBRES'];
			$cli_apellidos=$datosUsuario['CLI_APELLIDOS'];
		}
		return $cli_nombres." ".$cli_apellidos;*/
}


?>