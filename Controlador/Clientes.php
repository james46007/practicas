<?php 

include("../Modelo/Conectar.php");//Llamar a hoja conectar
$db=new MYSQL();//hacer una conexion con la base de datos

$placa=$_GET["placa"];
$cedula=$_POST['cedula'];//recibe el id del producto a eliminar
$tabla_cliente=$db->consulta("SELECT * FROM t_cliente WHERE CLI_CEDULA='{$cedula}'");

while($vehiculo=$db->fetch_array($tabla_cliente)){
	$idCliente=$vehiculo["CLI_ID"];
	$nombres=$vehiculo["CLI_NOMBRES"];
	$apellidos=$vehiculo["CLI_APELLIDOS"];
	$direccion=$vehiculo["CLI_DIRECCION"];
	$telefono=$vehiculo["CLI_TELEFONO"];
}

if(is_null($idCliente)){
	$dir="../Vista/Facturacion?opcion=3&c=".$cedula."&id=".$placa;//almacena la ruta nueva
	header(sprintf("location: %s",$dir));//redirecciona la ruta
}else{	
	$dir="../Vista/Facturacion?opcion=2&n=".$nombres."&a=".$apellidos."&c=".$cedula."&d=".$direccion."&t=".$telefono."&id=".$placa."&cli=".$idCliente;
	header(sprintf("location: %s",$dir));//redirecciona la ruta
}


 ?>