<?php


$anio=$_POST["combo1"];

$x = array();
if (($fichero = fopen("contaminacion.csv", "r")) !== FALSE) {
    // Lee los nombres de los campos
    $nombres_campos = fgetcsv($fichero, 0, ",", "\"", "\"");
    $num_campos = count($nombres_campos);
    // Lee los registros
    while (($datos = fgetcsv($fichero, 0, ",", "\"", "\"")) !== FALSE) {
        // Crea un array asociativo con los nombres y valores de los campos
        for ($icampo = 0; $icampo < $num_campos; $icampo++) {
            $registro[$nombres_campos[$icampo]] = $datos[$icampo];
        }
        // Añade el registro leido al array de registros
        $x[] = $registro;
    }
    fclose($fichero);
 
    //echo "Leidos " . count($registros) . " registros\n";
 
    for ($i = 0; $i < count($x); $i++) {
        for ($icampo = $anio ; $icampo < $anio+1 ; $icampo++) {
            //echo $x[$i][$nombres_campos[$icampo]] . "\n";
        }
    }
}


$y = array();
if (($fichero = fopen("poblacion.csv", "r")) !== FALSE) {
    // Lee los nombres de los campos
    $nombres_campos = fgetcsv($fichero, 0, ",", "\"", "\"");
    $num_campos = count($nombres_campos);
    // Lee los registros
    while (($datos = fgetcsv($fichero, 0, ",", "\"", "\"")) !== FALSE) {
        // Crea un array asociativo con los nombres y valores de los campos
        for ($icampo = 0; $icampo < $num_campos ; $icampo++) {
            $registro[$nombres_campos[$icampo]] = $datos[$icampo];
        }
        // Añade el registro leido al array de poblacion
        $y[] = $registro;
    }
    fclose($fichero);
 
    //echo "Leidos " . count($registros) . " registros\n";
 
    for ($i = 0; $i < count($y); $i++) {
        for ($icampo = $anio; $icampo < $anio+1; $icampo++) {
            //echo $y[$i][$nombres_campos[$icampo]] . "\n";
        }
    }
}

$num1=$x[0][$nombres_campos[$anio]];
$num2=$y[0][$nombres_campos[$anio]];
$num3=$x[1][$nombres_campos[$anio]];
$num4=$y[1][$nombres_campos[$anio]];

$centroide1=array($num1,$num2);
$centroide2=array($num3,$num4);
$vectorX=array();
$vectorY=array();


$aux=0;

$mediaX1=0;
$mediaY1=0;
$mediaX2=0;
$mediaY2=0;
$contador1=0;
$contador2=0;

$cont1=1;
$cont2=1;


$ex=0;

//$cont1!=$contador1 && $cont1!=$contador2

while($cont2!=$contador1 && $cont2!=$contador2 ){

	$cont1=$contador1;
	$cont2=$contador2;

	$contador1=0;
	$contador2=0;
	$mediaX1=0;
	$mediaY1=0;
	$mediaX2=0;
	$mediaY2=0;

	for ($i=0 ; $i < count($x)-5 ; $i++) { 
		$vectorX[$aux]=sqrt(pow(($centroide1[0]-$x[$i][$nombres_campos[$anio]]), 2)+pow(($centroide1[1]-$y[$i][$nombres_campos[$anio]]), 2));

		$vectorY[$aux]=sqrt(pow(($centroide2[0]-$x[$i][$nombres_campos[$anio]]), 2)+pow(($centroide2[1]-$y[$i][$nombres_campos[$anio]]), 2));

		if($vectorX[$aux]>$vectorY[$aux]){
			$mediaX1+=$x[$i][$nombres_campos[$anio]];
			$mediaY1+=$y[$i][$nombres_campos[$anio]];
			$contador1++;
		}else{
			$mediaX2+=$x[$i][$nombres_campos[$anio]];
			$mediaY2+=$y[$i][$nombres_campos[$anio]];
			$contador2++;
		}
		//echo $vectorX[$aux]."-----".$vectorY[$aux]."<br>";
		$aux++;
	}

	$centroide1[0]=$mediaX1/$contador1;
	$centroide1[1]=$mediaY1/$contador1;
	$centroide2[0]=$mediaX2/$contador2;
	$centroide2[1]=$mediaY2/$contador2;
	$aux=0;


	echo "Iteracion ".$ex."<br>".$contador1."<br>";

	echo $mediaX1/$contador1."----------------";
	echo $mediaY1/$contador1;

	echo "<br>".$contador2."<br>";

	echo $mediaX2/$contador2."----------------";
	echo $mediaY2/$contador2."<br><br>";


	
	$ex++;

}



/*
echo sqrt(pow(($centroide1[0]-$x[0][$nombres_campos[$anio]]), 2)+pow(($centroide1[1]-$y[0][$nombres_campos[$anio]]), 2))."\n"."\n";
echo sqrt(pow(($centroide1[0]-$x[1][$nombres_campos[$anio]]), 2)+pow(($centroide1[1]-$y[1][$nombres_campos[$anio]]), 2))."\n"."\n";
echo sqrt(pow(($centroide1[0]-$x[2][$nombres_campos[$anio]]), 2)+pow(($centroide1[1]-$y[2][$nombres_campos[$anio]]), 2))."\n"."\n";
*/

//echo sqrt(pow(($centroide1[0]-$centroide2[0]), 2)+pow(($centroide1[1]-$centroide2[1]), 2));



?>