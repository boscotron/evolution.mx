<?php 
$peticion = explode("/",$_GET['peticion']);
$carga_centro = '';
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
        $carga_centro = "error_perfil.php";
    break;
}
/*$jmy->guardar([ "TABLA"=>"juans", // STRING
    "ID_F"=>[$get['id']], // Array
    "A_D"=>TRUE, 
    "GUARDAR"=>$out['juans'][$i],
    ]);*/
$jmyWeb->cargar(["pagina"=>"perfil"]);
//$jmyWeb ->pre(['p'=>$carga_centro,'t'=>'peticion']);
$jmyWeb ->cargar_vista(["url"=>"perfil.php",
                        "data"=>[
                                "carga_centro"=>$carga_centro
                            ]
                        ]);
?>