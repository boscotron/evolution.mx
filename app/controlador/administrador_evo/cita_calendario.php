<?php

$jmyWeb->cargar_js(["url"=>$jmyWeb->url_templet(['return'=>true]).'administrador_evo/calendario.js']);
$jmyWeb->cargar_js(["url"=>$jmyWeb->url_templet(['return'=>true]).'js/superagent.js']);

$citas["cita"] = $jmy->ver([
    "TABLA"=>"agendarcita",
    "SALIDA"=>"ARRAY",
]);


$propiedad = array();

$array = array();
foreach ($citas["cita"]["ot"] as $contador) {
	$hora = strlen($contador["horario"]);
	$newDate = date("Y-m-d", strtotime($contador["fecha"]));
	 $array["title"] = $contador["servicio"];
	 $array["start"] = $newDate."T".(($hora==2)?$contador["horario"].":00:00":"0".$contador["horario"].":00:00");
	 array_push($propiedad, $array);
}

echo json_encode($propiedad);

