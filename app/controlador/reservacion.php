<?php 
$jmyWeb ->cargar_vista([
		"url"=>"reservacion.php"
		
	]);
$jmyWeb->cargar(["pagina"=>"reservacion"]);
$jmyWeb->cargar_js(["url"=>BASE_TEMPLET."js/reservacion.js?d=".date('U'),"unico"=>true]);