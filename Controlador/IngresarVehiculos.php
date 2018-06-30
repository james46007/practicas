<?php
include("../Modelo/Conectar.php");//Llamar a hoja conectar
$db=new MYSQL();//hacer una conexion con la base de datos

$usuario=$_GET["usuID"];
$placa=$_POST['placa'];//recibe el id del producto a eliminar
$horaActual = date('H:i:s');
$fechaActual = date('Y-m-d');//fecha actual que realiza el cambio
$vehiculo=$db->consulta("SELECT VEH_PLACA FROM t_vehiculos WHERE VEH_PLACA='{$placa}'");
//echo $vehiculo." Esta es la plcas";
while($fila=$db->fetch_array($vehiculo)){
	$pl=$fila["VEH_PLACA"];
}

if(strcmp($pl, $placa) == 0){
	$db->consulta("UPDATE t_vehiculos SET VEH_ESTADO=1,VEH_HORAENT='{$horaActual}',VEH_HORASAL='{$horaActual}',VEH_FECHAENT='{$fechaActual}',VEH_FECHASAL='{$fechaActual}' WHERE VEH_PLACA='{$placa}'");
}else{
	
	$db->consulta("INSERT INTO t_vehiculos(VEH_PLACA,VEH_HORAENT,VEH_HORASAL,VEH_FECHAENT,VEH_FECHASAL,VEH_ESTADO) VALUES ('{$placa}','{$horaActual}','{$horaActual}','{$fechaActual}','{$fechaActual}',1)");
}
/////////////////////////////////////////////////
$tbl_usuario=$db->consulta("SELECT * FROM t_usuario WHERE USU_ID='{$usuario}'");//consultar la tabla de usuarios
while($datosUsuario=$db->fetch_array($tbl_usuario)){//recorre el vector de la consulta de la tabla usuarios	
	$con_id=$datosUsuario['CON_ID'];
}
$tbl_configuracion=$db->consulta("SELECT * FROM t_configuracion WHERE CON_ID='{$con_id}'");//consultar la tabla de usuarios
while($datos=$db->fetch_array($tbl_configuracion)){//recorre el vector de la consulta de la tabla usuarios	
	$plazas=$datos['CON_CAPACIDAD'];
}
$plazas-=1;
$db->consulta("UPDATE t_configuracion SET CON_CAPACIDAD={$plazas} WHERE CON_ID='{$con_id}'");//consultar la tabla de usuarios





$dir="../Vista/Menu.php";//almacena la ruta nueva
header(sprintf("location: %s",$dir));//redirecciona la ruta

?>