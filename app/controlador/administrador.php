<?php 

$peticion = explode('/',$_GET['peticion']);
//$jmyWeb ->pre(['p'=>$peticion,'t'=>'peticion']);
switch($peticion[0]):
    case 'instalar':
        $jmyWeb->guardar_session(['instalar'=>true]);
    break;

    case 'usuarios':      
        $jmyWeb->cargar_js(["url"=>$jmyWeb->url_templet(["return"=>true])."js/administrador_usuarios.js?f=".date('U')]);
        //$jmyWeb->cargar_js(["url"=>$jmyWeb->url_templet(['return'=>1])."js/perfil.js?d=".date('U')]);
        $url_marco = 'administrador_usuarios.php';
        $url_sub_marco = 'perfil_detalle.php';

    break;
    default:
        $url_marco = 'administrador_dashboard.php';
        
endswitch;

$jmyWeb->cargar_vista([
    "url"=>"administrador_marco.php",
    "data"=>[ 
        "url_marco" => 'templet/'.$url_marco,
        "url_sub_marco" => 'templet/'.$url_sub_marco
 ],

]);