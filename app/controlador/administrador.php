<?php 
$peticion = explode("/",$_GET['peticion']);
if($peticion[0]=='salir'){$jmyWeb->session([],1);}
if($peticion[0]=='entrar'){$jmyWeb->session([$peticion[1],$peticion[2]]);$jmyWeb->guardar_session();}
$version = (MODO_DESAROLLADOR)?date('U'):'';
$jmyWeb->cargar_css(["url"=>"https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"]);    
$jmyWeb->cargar_css(["url"=>"https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"]);    
$jmyWeb->cargar_js(["url"=>"https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"]);    
$jmyWeb->cargar_js(["url"=>"https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.bundle.min.js"]); 
if($jmyWeb->session()){  
    $data = [];
    switch($peticion[0]):
        case 'instalar':
            $jmyWeb->guardar_session(['instalar'=>true]);
        break;
        case 'entrar':
            $jmyWeb->guardar_session();
            $url_marco='administrador_dashboard.php';
        break;
        case 'salir':            
            $url_marco='administrador_salida.php';
        break;
        case 'importar':      
            $jmyWeb->cargar_css(["url"=>$jmyWeb->url_app(['return'=>true])."js/jsoneditor/jsoneditor.min.css"]);    
             $jmyWeb->cargar_js(["url"=>$jmyWeb->url_app(['return'=>true])."js/jsoneditor/jsoneditor.min.js"]);    
            $jmyWeb->cargar_css(["url"=>"https://cdn.datatables.net/v/dt/dt-1.10.18/datatables.min.css"]);    
             $jmyWeb->cargar_js(["url"=>"https://cdn.datatables.net/v/dt/dt-1.10.18/datatables.min.js"]);    
             $jmyWeb->cargar_js(["url"=>$jmyWeb->url_templet(["return"=>true])."js/administrador_importar.js?f=".$version]);    
            $s=$jmyWeb->session();
            $t='importar_'.$s['body']['api_web']['ID_F'];
            switch ($peticion[1]) {
                case 'instalar':
                    $jmyWeb ->pre(['p'=>$jmy->db([$t]),'t'=>'DB Instalar importador']);
                break;
                default:
                break;
            }
            $url_marco='administrador_importar.php';
        break;
        case 'modulos':      
            $jmyWeb->cargar_css(["url"=>"https://cdn.datatables.net/v/dt/dt-1.10.18/datatables.min.css"]);    
            $jmyWeb->cargar_js(["url"=>"https://cdn.datatables.net/v/dt/dt-1.10.18/datatables.min.js"]);    
            $jmyWeb->cargar_js(["url"=>$jmyWeb->url_templet(["return"=>true])."js/administrador_modulos.js?f=".$version]);    
            $jmyWeb->cargar_js(["url"=>$jmyWeb->url_templet(["return"=>true])."js/administrador_modulos.js?f=".$version]);    
            $url_marco='administrador_modulos.php';
        break;
        case 'usuarios':      
            $jmyWeb->cargar_css(["url"=>"https://cdn.datatables.net/v/dt/dt-1.10.18/datatables.min.css"]);    
            $jmyWeb->cargar_js(["url"=>"https://cdn.datatables.net/v/dt/dt-1.10.18/datatables.min.js"]); 
            $jmyWeb->cargar_js(["url"=>$jmyWeb->url_templet(["return"=>true])."js/administrador_usuarios.js?f=".$version]);
            //$jmyWeb->cargar_js(["url"=>$jmyWeb->url_templet(['return'=>1])."js/perfil.js?d=".date('U')]);
            $url_marco='administrador_usuarios.php';
            $url_sub_marco='perfil_detalle.php';
        break;
        default:
            if(file_exists('config_administrador.php')){
                require_once('config_administrador.php');                
                $url_marco=(is_array($modulos[$peticion[0]]))?$modulos[$peticion[0]]['url_marco']:'error404.php';
                if(file_exists($modulos[$peticion[0]]['controlador']))
                    require_once($modulos[$peticion[0]]['controlador']);
            }else{ $url_marco = 'administrador_dashboard.php';}
    endswitch;
    $jmyWeb->cargar_js(["url"=>$jmyWeb->url_templet(["return"=>true])."js/administrador.js?f=".$version]);    
    $jmyWeb->cargar_js(["url"=>$jmyWeb->url_templet(["return"=>true])."js/administrador_sesion.js?f=".$version]); 
    $jmyWeb->cargar_vista([
        "url"=>"administrador_marco.php",
        "data"=>[ 
            "url_marco" => 'templet/'.$url_marco,
            "url_sub_marco" => 'templet/'.$url_sub_marco,
            "data" => $data
        ]]);
}else{
    $jmyWeb->cargar_vista([
        "url"=>"administrador_marco.php",
        "data"=>[ 
            "url_marco" => 'templet/administrador_salida.php'
    ]]);
}