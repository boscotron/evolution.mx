<?php
$session = $jmyWeb->session(); 
$idUsuario = $session['user']['user_id'];
$peticion = explode("/",$_GET['peticion']);
if($idUsuario!='' && $peticion[0]!=''){
    $id=($peticion[0]=='nuevo')?uniqid():$peticion[0];
    $out['post']=$_POST;
    $out['guardar']=$jmy->guardar([	
        "TABLA"=>"servicio",
        "A_D"=>true,
        "ID"=>$id,
        "GUARDAR"=>[
            "nombre"=>$_POST['nombre'],
            "tiempo_estimado"=>$_POST['tiempo_estimado']
        ]
    ]);
}
 $out['lista']=$jmy->ver([	
    "TABLA"=>"servicio",
    "SALIDA"=>"ARRAY"
]);
echo  json_encode(['out'=>$out]);
//$jmyWeb ->pre(['p'=>$out,'t'=>'TITULO_ARRAY']);