<?php 
if(file_exists('config_administrador.php'))
    require_once('config_administrador.php');
$peticion = explode('/',$_GET['peticion']);
//$jmyWeb ->pre(['p'=>$peticion,'t'=>'peticion']);
$out['session'] =$jmyWeb->session();

$out['error'] = '';
switch($peticion[0]):
    case 'instalar':
        $jmyWeb->guardar_session(['instalar'=>true]);
    break;
    case 'sesion':
        $p=$_POST['data'];
        if($p['u']!='' && $p['t']!=''){
            $session = $jmyWeb->session([$p['u'],$p['t']]);
            $jmyWeb->guardar_session();
        }
        $out['post'] =$_POST;
        $out['session'] =[
            "u"=>$out['session']["user"]["user_id"],
            "t"=>$out['session']["user"]["token"]
        ];
    break;
    case 'productos':
        $out['productos'] = $jmy->ver([
            "TABLA"=>'productos',
            "COL"=>['nombre','foto_producto'],
            "SALIDA"=>'ARRAY',
            ]);
    break;
    case 'usuarios':    
        $out['usuarios'] = $jmy->ver([
            "TABLA"=>TABLA_USUARIOS."_".$out['session']['body']['api_web']['ID_F'],
            "COL"=>['nombre','tipo','proveedor','foto_perfil'],
            "SALIDA"=>'ARRAY',
            ]);
    break;
    case 'modulos-guardar':
        $out['guardar'] =$_POST['data']['guardar'];
        $out['id'] =$_POST['data']['id_perfil'];
        if($out['id']){
            $out['guardar_out'] = $jmy->guardar([
                "TABLA"=>TABLA_USUARIOS."_".$out['session']['body']['api_web']['ID_F'],
                "ID"=>$out['id'],
                "A_D"=>true,
                "FO"=>true,
                "GUARDAR"=>["modulos"=>json_encode( $out['guardar'])]
            ]);
        }
    case 'modulos':        
        $out['menu'] =(is_array($menu))?$menu:[ "administrador"=>[
                "nombre"=>"Administrdor",
                "url"=>"#",
                "class"=>"",
        ]];
        $out['modulos'] =$jmyWeb->modulos();
        $out['id']=($out['id']!='')?$out['id']:$peticion[1];
        $out['modulos'] =$jmyWeb->modulos();
        $out['usuarios'] = $jmy->ver([
            "TABLA"=>TABLA_USUARIOS."_".$out['session']['body']['api_web']['ID_F'],
            "ID"=>$out['id'],
            "COL"=>['modulos'],
            "SALIDA"=>'ARRAY',
            ]);
        $moduloKey = (is_array($out['modulos']['modulos'])) ? array_keys($out['modulos']['modulos']):[];
        $out['modulos']['modulos_key'] =$moduloKey;
        for ($i=0; $i < count($moduloKey); $i++) { 
            if($out['modulos']['modulos'][$moduloKey[$i]]==1){
                $out['lista'][] = [
                    $moduloKey[$i],
                    0,// Tipo de permisos 0 oculto, 1 ver, 2 editor, 3 moderador , 4 admin
                ];
            }
        }
    break;
    case 'ver-usuario':
        if($_POST['id']!=''){
            $out['tabla'] = TABLA_USUARIOS."_".$out['session']['body']['api_web']['ID_F'];
            $out['usuarios'] = $jmy->ver([
            "TABLA"=>TABLA_USUARIOS."_".$out['session']['body']['api_web']['ID_F'],
            "ID"=>$_POST['id'],
            //"COL"=>['nombre'],
            "SALIDA"=>'ARRAY',
            ]);}else{
                $out['error'] = 'Sin ID';
            }
    break;
    default:
        $url_marco = 'administrador_dashboard.php';         
endswitch;
echo json_encode($out);