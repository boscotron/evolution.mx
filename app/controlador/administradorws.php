<?php 

$peticion = explode('/',$_GET['peticion']);
//$jmyWeb ->pre(['p'=>$peticion,'t'=>'peticion']);
switch($peticion[0]):
    case 'instalar':
        $jmyWeb->guardar_session(['instalar'=>true]);
    break;

    case 'usuarios':
        $out['session'] =$jmyWeb->session();
        $out['usuarios'] = $jmy->ver([
            "TABLA"=>"clientes_".$out['session']['body']['api_web']['ID_F'],
            "COL"=>['nombre'],
            "SALIDA"=>'ARRAY',
            ]);
    break;
    default:
        $url_marco = 'administrador_dashboard.php';
         
endswitch;
echo json_encode($out);