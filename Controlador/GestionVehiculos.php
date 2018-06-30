<?php

function GetVehiculos(){
	$db=new MYSQL();//crea una conexion con la base de datos
	$consulta=$db->consulta("SELECT * FROM t_vehiculos");//consulta toda la tabla de productos
	return $consulta;//retorna el vector de la consulta
}

function SetVehiculos(){
	
}


?>