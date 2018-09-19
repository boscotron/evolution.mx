<?php
$peticion = explode("/",$_GET['peticion']);
$session = $jmyWeb->session(); 
$carga_centro = '';
if($peticion[0]=='entrar'){
    $session = $jmyWeb->session([$peticion[1],$peticion[2]]);
    $jmyWeb->guardar_session();
}

$idUsuario = $session['user']['user_id'];
if($idUsuario!=''){

	if($peticion[0]=='editar'){
		$editar = $jmy->ver([
			"TABLA"=>"agendarcita",
			"ID"=>$peticion[1],

		]);
		$editar = $editar['ot'][$peticion[1]];
		//$jmyWeb ->pre(['p'=>$editar,'t'=>'editar']);
	}

	$jmyWeb->cargar(["pagina"=>"cita"]);
	$jmyWeb->cargar_js(["url"=>BASE_TEMPLET."js/cita.js?d=".date('U'),"unico"=>true]);
	$jmyWeb ->cargar_vista([
		"url"=>"cita.php",
		"data"=>[
			"id_perfil"=>$peticion[1],
			"editar"=>$editar,
		]
	]);
}else{
	$jmyWeb->cargar(["pagina"=>"iniciocita"]);
	$jmyWeb ->cargar_vista(["url"=>"iniciocita.php"]);
}

?> 