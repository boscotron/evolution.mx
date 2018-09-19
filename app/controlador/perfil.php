<?php 
$peticion = explode("/",$_GET['peticion']);
$session = $jmyWeb->session(); 
$carga_centro = '';
if($peticion[0]=='entrar'){
    $session = $jmyWeb->session([$peticion[1],$peticion[2]]);
    $jmyWeb->guardar_session();
}
$jmyWeb ->pre(['p'=>$session,'t'=>'SESSION']);
$idUsuario = $session['user']['user_id'];
if($idUsuario!=''){
    $perfiles['principal']=$jmy->ver([
        "TABLA"=>"clientes_".$session['body']['api_web']['ID_F'],
        "ID"=>$idUsuario,
    ]);
    $perfiles['principal'] = (is_array($perfiles['principal']['ot'][$idUsuario]))?$perfiles['principal']['ot'][$idUsuario]:["error"=>"No existe usuario"];
    $jmyWeb ->pre(['p'=>$perfiles,'t'=>'perfiles']);


    switch ($peticion[0]) {
        case 'editar':    
            $jmyWeb->cargar_js(["url"=>$jmyWeb->url_templet(['return'=>1])."js/perfil.js"]);
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
    $pagina_marco="perfil.php";
}else{
    $pagina_marco="login.php";
    $carga_centro = "error_perfil.php";
}
/*$jmy->guardar([ "TABLA"=>"juans", // STRING
    "ID_F"=>[$get['id']], // Array
    "A_D"=>TRUE, 
    "GUARDAR"=>$out['juans'][$i],
    ]);*/


//$jmyWeb ->pre(['p'=>$carga_centro,'t'=>'peticion']);

$jmyWeb ->cargar_vista(["url"=>$pagina_marco,
                        "data"=>[
                                "carga_centro"=>$carga_centro,
                                "perfiles"=>$perfiles,
                                "user_id"=>$idUsuario,
                                "id_perfil"=>$peticion[1],
                            ]
                        ]);
?>