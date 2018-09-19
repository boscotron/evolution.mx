<?php 
$peticion = explode("/",$_GET['peticion']);
$session = $jmyWeb->session(); 
$jmyWeb ->pre(['p'=>$session,'t'=>'SESSION']);
$carga_centro = '';

if($peticion[0]=='entrar'){
    $session = $jmyWeb->session([$peticion[1],$peticion[2]]);
    $jmyWeb->guardar_session();
}
if($session['user']['user_id']!=''){
    switch ($peticion[0]) {
        case 'editar':        
            $carga_centro = "header_perfil.php";
            $carga_centro = "perfil_detalle.php";
        break;
        case 'historial':
            $carga_centro = "perfil_historial.php";
        break;    
        default:
            $carga_centro = "perfil_dashboard.php";
        break;
    }
}else{
    $carga_centro = "error_perfil.php";
}
/*$jmy->guardar([ "TABLA"=>"juans", // STRING
    "ID_F"=>[$get['id']], // Array
    "A_D"=>TRUE, 
    "GUARDAR"=>$out['juans'][$i],
    ]);*/


//$jmyWeb ->pre(['p'=>$carga_centro,'t'=>'peticion']);

$jmyWeb ->cargar_vista(["url"=>"perfil.php",
                        "data"=>[
                                "carga_centro"=>$carga_centro,
                                "perfil"=>$session['user'],
                                "foto_perfil"=>$session['devices']['json']['url_foto'],
                            ]
                        ]);
?>