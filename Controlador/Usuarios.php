<?php 
	
	function nombresUsuario($cliente){
		$db=new MYSQL();//crear conexion con la base de datos
		$tbl_usuario=$db->consulta("SELECT * FROM t_cliente WHERE CLI_ID='{$cliente}'");//consultar la tabla de usuarios
		while($datosUsuario=$db->fetch_array($tbl_usuario)){//recorre el vector de la consulta de la tabla usuarios	
			$cli_nombres=$datosUsuario['CLI_NOMBRES'];
			$cli_apellidos=$datosUsuario['CLI_APELLIDOS'];
		}
		return $cli_nombres." ".$cli_apellidos;
	}

	function capacidad($cliente){
		$db=new MYSQL();//crear conexion con la base de datos
		$tbl_usuario=$db->consulta("SELECT * FROM t_usuario WHERE USU_ID='{$cliente}'");//consultar la tabla de usuarios
		while($datosUsuario=$db->fetch_array($tbl_usuario)){//recorre el vector de la consulta de la tabla usuarios	
			$con_id=$datosUsuario['CON_ID'];
		}
		$tbl_configuracion=$db->consulta("SELECT * FROM t_configuracion WHERE CON_ID='{$con_id}'");//consultar la tabla de usuarios
		while($datos=$db->fetch_array($tbl_configuracion)){//recorre el vector de la consulta de la tabla usuarios	
			$plazas=$datos['CON_CAPACIDAD'];
		}
		return " PLAZAS ".$plazas;
	}


	function fraccionHora($cliente){
		$db=new MYSQL();//crear conexion con la base de datos
		$tbl_usuario=$db->consulta("SELECT * FROM t_usuario WHERE USU_ID='{$cliente}'");//consultar la tabla de usuarios
		while($datosUsuario=$db->fetch_array($tbl_usuario)){//recorre el vector de la consulta de la tabla usuarios	
			$con_id=$datosUsuario['CON_ID'];
		}
		$tbl_configuracion=$db->consulta("SELECT * FROM t_configuracion WHERE CON_ID='{$con_id}'");//consultar la tabla de usuarios
		while($datos=$db->fetch_array($tbl_configuracion)){//recorre el vector de la consulta de la tabla usuarios	
			$con_valor=$datos['CON_VALORH'];
		}

		return $con_valor;

	}
	
?>