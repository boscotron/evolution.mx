<?php

$jmyWeb->cargar_js(["url"=>$jmyWeb->url_templet(['return'=>true]).'administrador_evo/calendario.js']);

$citas = $jmy->ver([
    "TABLA"=>"agendarcita",
]);

 

// $jmyWeb ->pre(['p'=>$out,'t'=>'TITULO_ARRAY']);