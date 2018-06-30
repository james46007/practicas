<?php
include("../Modelo/Conectar.php");//Llamar a hoja conectar
$db=new MYSQL();//hacer una conexion con la base de datos

$id=$_POST['id'];
$capacidad=$_POST['capacidad'];//recibe el id del producto a eliminar
$fecha = $_POST['fecha'];
$valor = $_POST['valor'];//fecha actual que realiza el cambio
$estado= $_POST['estado'];
$var2="si";

if(strcmp($estado, $var2) == 0){
	$db->consulta("UPDATE t_configuracion SET CON_CAPACIDAD={$capacidad},CON_FECHA='{$fecha}',CON_VALORH={$valor},CON_ESTADO=1 WHERE CON_ID={$id}");
}else{
	$db->consulta("UPDATE t_configuracion SET CON_CAPACIDAD={$capacidad},CON_FECHA='{$fecha}',CON_VALORH={$valor},CON_ESTADO=0 WHERE CON_ID={$id}");
}


$dir="../Vista/Configuraciones?opcion=3";//almacena la ruta nueva
header(sprintf("location: %s",$dir));//redirecciona la ruta



?>