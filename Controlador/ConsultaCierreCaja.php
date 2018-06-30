<?php

function GetCierreCaja($idCierre){
	$db=new MYSQL();//crea una conexion con la base de datos
	$consulta=$db->consulta("SELECT 
  t_usuario.USU_USUARIO,
  t_encabezadofac.ENC_FECHA,
  t_detallefac.DET_TOTAL
  
FROM
  t_cierracaja
  INNER JOIN t_facturascierre ON (t_cierracaja.CIER_ID = t_facturascierre.CIER_ID)
  INNER JOIN t_encabezadofac ON (t_facturascierre.ENC_ID = t_encabezadofac.ENC_ID)
  INNER JOIN t_usuario ON (t_cierracaja.USU_ID = t_usuario.USU_ID)
  INNER JOIN t_cliente ON (t_usuario.CLI_ID = t_cliente.CLI_ID)
  INNER JOIN t_detallefac ON (t_encabezadofac.DET_ID = t_detallefac.DET_ID)
WHERE
  t_cierracaja.CIER_ID = {$idCierre}");//consulta toda la tabla de productos
	return $consulta;//retorna el vector de la consulta
}



?>