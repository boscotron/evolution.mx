<?php 
$peticion = explode("/",$_GET['peticion']);

$carga_centro = '';
switch ($peticion[0]) {
    case 'editar':
        $carga_centro = "perfil_detalle.php";
    break;
    case 'historial':
        $carga_centro = "perfil_historial.php";
    break;    
    default:
        $carga_centro = "perfil_dashboard.php";
    break;
}

//$jmyWeb ->pre(['p'=>$carga_centro,'t'=>'peticion']);

$jmyWeb ->cargar_vista(["url"=>"perfil.php",
                        "data"=>[
                                "carga_centro"=>$carga_centro
                            ]
                        ]);
?>