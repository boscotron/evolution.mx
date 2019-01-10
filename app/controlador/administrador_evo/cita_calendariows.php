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


    $citas['lista']=$jmy->ver([	
	    "TABLA"=>"catalogos",
	    "COL"=>["id_catalogo"],
	    "V"=>"lista_de_servicios"
	    //"SALIDA"=>"ARRAY"
	]);
if(count($citas['lista']['otKey'])>1)
    $citas['lista']=$jmy->ver([	
        "TABLA"=>"catalogos",
        "ID"=>$citas['lista']['otKey'],
        "SALIDA"=>"ARRAY"
    ]);
}

$propiedad = array();

$array = array();
foreach ($citas["cita"]["ot"] as $contador) {
	$ser = "";
	foreach ($citas['lista']["otFm"] as $key) {
		if($contador["servicio"]==$key["ID_F"]){
			$ser = $key["nombre"];
		}
	}
	$hora = strlen($contador["horario"]);
	$newDate = date("Y-m-d", strtotime($contador["fecha"]));
     $array["id"] = $contador["ID_F"];
	 $array["title"] = $ser;
	 $array["start"] = $newDate."T".(($hora==2)?$contador["horario"].":00:00":"0".$contador["horario"].":00:00");
	 array_push($propiedad, $array);
}
unset($out);
//$out['datos']= $citas["cita"];
$out['propiedad']= $propiedad;
$out['detalles']= $citas["detalles"];
$out['lista']= $citas["lista"]["otFm"];

//$out['peticion']= $peticion;

/* Vamos a continuar en lo que estoy en la llamada */