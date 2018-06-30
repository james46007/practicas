<?php 
try{	
	include("../Modelo/Conectar.php");//Llamar a pagina conectar
	$db=new MYSQL();//crear conexion con la base de datos
	session_start();//iniciar variable de session
	$usuario=$_POST['usuario'];//almacenar variable de la cedula que envia el index
	$clave=$_POST['clave'];//almacenar variable de contraseña que envia el index
	$tbl_usuario=$db->consulta("SELECT * FROM t_usuario WHERE USU_USUARIO='{$usuario}' AND USU_CONTRASENIA='{$clave}'");//consultar la tabla de usuarios
	while($datosUsuario=$db->fetch_array($tbl_usuario)){//recorre el vector de la consulta de la tabla usuarios	
		$cli_id=$datosUsuario['CLI_ID'];	
		$Comparar=$datosUsuario['USU_USUARIO'];//almacena el cedula que se esta intentando acceder
		$Comparar2=$datosUsuario['USU_CONTRASENIA'];//almacena el id que se esta intentando acceder
		$log_estado=$datosUsuario['USU_ESTADO'];//almacena el estado del usuario que intenta acceder
	}
	if ($Comparar==""||$Comparar2=="") {//compara si id existe o si los campos de usuario y contraseña estan vacios
		header(sprintf("location: %s",".."));//si estan vacios se redirige a la pagina index
	}else{
		if($log_estado==1){//si el estado es 1 esta habilitado para acceder a la sistema
			if($Comparar == $usuario && $Comparar2 == $clave){//compara si los campos de usuario y contraseña son correctos
				$_SESSION['usuario_id'] = $cli_id;//almacena la variable de session del usuario que ingreso
				$horaActual = date('H:i:s');
				$fechaActual = date('Y-m-d');				
				$db->consulta("INSERT INTO t_cierracaja(USU_ID,CIER_HORADES,CIER_HORAHAS,CIER_FECHA) VALUES ({$cli_id},'{$horaActual}','{horaActual}','{$fechaActual}')");
				$detalle=$db->consulta("SELECT DISTINCT LAST_INSERT_ID() FROM t_cierracaja");
				while($vehiculo=$db->fetch_array($detalle)){
					$idDetalle=$vehiculo["LAST_INSERT_ID()"];
				}
				$_SESSION['cierreID'] = $idDetalle;
				header(sprintf("location: %s","../Vista/Menu.php"));//redirecciona a la pagina de roles
			}else{
				header(sprintf("location: %s",".."));//caso contrario a la pagina de index
			}
		}else{
			header(sprintf("location: %s",".."));//caso contrario a la pagina de index
		}
	}	
}catch(Exception $e){
	echo "EL ERROR CACHADO ES ".$e;
}

?>