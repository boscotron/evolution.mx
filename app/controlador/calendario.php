<?php 

$jmyWeb ->cargar_vista(["url"=>"calendario.php"]);
$jmyWeb->cargar_js(["url"=>BASE_TEMPLET."js/calendario.js?d=".date('U'),"unico"=>true]);
?>