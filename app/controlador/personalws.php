<?php


$out['busqueda']=$jmy->ver([	
    "TABLA"=>"personal",
    "LIKE_V"=>[$_POST['servicios']],
]);


 $out['resultado']=$jmy->ver([	
    "TABLA"=>"personal",
    "ID_F"=>$out['busqueda']['otKey'], 
   // "LIKE_V"=>[strtolower($_POST['servicios'])],
    "SALIDA"=>'ARRAY'
]);
echo  json_encode(['out'=>$out,'post'=>$_POST]);
//$jmyWeb ->pre(['p'=>$out,'t'=>'TITULO_ARRAY']);