<?php
if($_SESSION['JMY3WEB'][DOY]){
	$jmyWeb->cargar(["pagina"=>"cita"]);
	$jmyWeb->cargar_js(["url"=>BASE_TEMPLET."js/cita.js?d=".date('U'),"unico"=>true]);
	$jmyWeb ->cargar_vista(["url"=>"cita.php"]);
}else{
	$jmyWeb->cargar(["pagina"=>"iniciocita"]);
	$jmyWeb ->cargar_vista(["url"=>"iniciocita.php"]);
}

?> 