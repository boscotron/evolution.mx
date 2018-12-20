<?php 
 $citas = $jmy->ver([
    "TABLA"=>"agendarcita",
]);
$jmyWeb ->cargar_vista(["url"=>"calendario.php","data"=>["citas"=>$citas]]);
$jmyWeb->cargar_js(["url"=>BASE_TEMPLET."js/calendario.js?d=".date('U'),"unico"=>true]);
?>