<?php

if($peticion[1]!=''){ // si viene con ID despliega detalles
    $citas["detalles"] = $jmy->ver([
        "TABLA"=>"agendarcita",
        "ID"=>$peticion[1],
    ]);
    $citas["detalles"] = $citas["detalles"]["ot"][$peticion[1]];
}else{ // Si no tiene ID depliega lista


    $citas["cita"] = $jmy->ver([
        "TABLA"=>"agendarcita",
        "SALIDA"=>"ARRAY",
    ]);


    $citas["servicio"] = $jmy->ver([
        "TABLA"=>"agendarcita",
        "SALIDA"=>"ARRAY",
    ]);
}

$propiedad = array();

$array = array();

foreach ($citas["cita"]["ot"] as $contador) {
	$hora = strlen($contador["horario"]);
	$newDate = date("Y-m-d", strtotime($contador["fecha"]));
     $array["id"] = $contador["ID_F"];
	 $array["title"] = 'ID SERVICIO:'.$contador["servicio"];
	 $array["start"] = $newDate."T".(($hora==2)?$contador["horario"].":00:00":"0".$contador["horario"].":00:00");
	 array_push($propiedad, $array);
}
unset($out);
//$out['datos']= $citas["cita"];
$out['propiedad']= $propiedad;
$out['detalles']= $citas["detalles"];
//$out['peticion']= $peticion;

/* Vamos a continuar en lo que estoy en la llamada */