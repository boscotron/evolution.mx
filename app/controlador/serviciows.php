<?php
 $out=$jmy->ver([	
    "TABLA"=>"servicio",
    "SALIDA"=>"ARRAY"
   // "SALIDA"=>'ID'
]);
echo  json_encode(['out'=>$out]);
//$jmyWeb ->pre(['p'=>$out,'t'=>'TITULO_ARRAY']);