<?php 
$jmyWeb->cargar(["pagina"=>"cita"]);
$jmyWeb->cargar_js(["url"=>BASE_TEMPLET."js/cita.js?d=".date('U'),"unico"=>true]);
$jmyWeb ->cargar_vista(["url"=>"cita.php"]);
?>