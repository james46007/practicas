<?php
include("../Modelo/Conectar.php");//Llamar a hoja conectar
$db=new MYSQL();//hacer una conexion con la base de datos

$capacidad=$_POST['capacidad'];//recibe el id del producto a eliminar
$fecha = $_POST['fecha'];
$valor = $_POST['valor'];//fecha actual que realiza el cambio

echo "fecha: ".$fecha;
$db->consulta("INSERT INTO t_configuracion(CON_CAPACIDAD,CON_FECHA,CON_VALORH,CON_ESTADO) VALUES ({$capacidad},'{$fecha}',{$valor},0)");

echo "<script lenguaje=\JavaScript\>window.close();</script>";
?>