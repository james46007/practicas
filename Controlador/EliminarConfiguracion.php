<?php
include("../Modelo/Conectar.php");//Llamar a hoja conectar
$db=new MYSQL();//hacer una conexion con la base de datos

$id=$_GET['id'];//recibe el id del producto a eliminar
$db->consulta("DELETE FROM t_configuracion WHERE CON_ID={$id}");

$dir="../Vista/Configuraciones?opcion=2";//almacena la ruta nueva
header(sprintf("location: %s",$dir));//redirecciona la ruta

?>