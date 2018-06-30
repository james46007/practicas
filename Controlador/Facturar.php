<?php

include("../Modelo/Conectar.php");//Llamar a hoja conectar
$db=new MYSQL();//hacer una conexion con la base de datos
session_start();

$idVehiculo=$_GET["veID"];
$idCliente=$_GET['cli'];
$idUsuario=$_GET['usu'];//recibe el id del producto a eliminar
$valHora=$_GET["fracHora"];
$horas=$_GET["tiempo"];
$subT=$_GET["subT"];
$iva=$_GET["iva"];
$pagar=$_GET["pagar"];
$fecha= date('Y-m-d');

$db->consulta("INSERT INTO t_detallefac(DET_VALORHORA,DET_HORAS,DET_SUBTOTAL,DET_IVA,DET_TOTAL) VALUES ({$valHora},'{$horas}',{$subT},{$iva},{$pagar})");
$detalle=$db->consulta("SELECT DISTINCT LAST_INSERT_ID() FROM t_detallefac");
while($vehiculo=$db->fetch_array($detalle)){
	$idDetalle=$vehiculo["LAST_INSERT_ID()"];
}
echo "el id".$idDetalle;
echo "la fecha es".$fecha;

$db->consulta("INSERT INTO t_encabezadofac(VEH_ID,CLI_ID,ENC_FECHA,USU_ID,DET_ID) VALUES ({$idVehiculo},{$idCliente},'{$fecha}',{$idUsuario},{$idDetalle})");
$db->consulta("UPDATE t_vehiculos SET VEH_ESTADO=0 WHERE VEH_ID={$idVehiculo}");

/////////////////////////////////////////////////
$tbl_usuario=$db->consulta("SELECT * FROM t_usuario WHERE USU_ID='{$idUsuario}'");//consultar la tabla de usuarios
while($datosUsuario=$db->fetch_array($tbl_usuario)){//recorre el vector de la consulta de la tabla usuarios	
	$con_id=$datosUsuario['CON_ID'];
}
$tbl_configuracion=$db->consulta("SELECT * FROM t_configuracion WHERE CON_ID='{$con_id}'");//consultar la tabla de usuarios
while($datos=$db->fetch_array($tbl_configuracion)){//recorre el vector de la consulta de la tabla usuarios	
	$plazas=$datos['CON_CAPACIDAD'];
}
$plazas+=1;
$db->consulta("UPDATE t_configuracion SET CON_CAPACIDAD={$plazas} WHERE CON_ID='{$con_id}'");//consultar la tabla de usuarios

////////////////////////////////////////////////////////////////
$encabezado=$db->consulta("SELECT DISTINCT LAST_INSERT_ID() FROM t_encabezadofac");
while($vehiculo=$db->fetch_array($encabezado)){
	$idEncabezado=$vehiculo["LAST_INSERT_ID()"];
}
$idCierre=$_SESSION['cierreID'];
$db->consulta("INSERT INTO t_facturascierre(ENC_ID,CIER_ID) VALUES ({$idEncabezado},{$idCierre})");



echo "<script lenguaje=\JavaScript\>window.close();</script>";
//$tabla_cliente=$db->consulta("SELECT * FROM t_cliente WHERE CLI_CEDULA='{$cedula}'");







?>

