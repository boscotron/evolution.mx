<?php 



$out['servicios'][]=['nombre'=>'Cortes',
                     'tiempo_estimado'=>'30'];

 $out['servicios'][]=['nombre'=>'Tintes',
                     'tiempo_estimado'=>'90'];

$out['servicios'][]=['nombre'=>'Mechas',
                     'tiempo_estimado'=>'40'];

$out['servicios'][]=['nombre'=>'Rayos',
                     'tiempo_estimado'=>'50'];

$out['servicios'][]=['nombre'=>'unas',
                     'tiempo_estimado'=>'60'];



 $jmy->db(['servicio']);    

for ($i=0; $i <count($out['servicios']) ; $i++) { 
    
    $prueba[]= $jmy->guardar([ "TABLA"=>"servicio", // STRING
    //"ID_F"=>[$get['id']], // Array
    "A_D"=>TRUE, 
    "GUARDAR"=>$out['servicios'][$i],
    ]);
}






$jmyWeb->cargar(["pagina"=>"servicios"]);
$jmyWeb ->cargar_vista(["url"=>"servicios.php"]);
?>