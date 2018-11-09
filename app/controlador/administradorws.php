<?php 
if(file_exists('config_administrador.php'))
    require_once('config_administrador.php');
$peticion = explode('/',$_GET['peticion']);
//$jmyWeb ->pre(['p'=>$peticion,'t'=>'peticion']);
$out['session'] =$jmyWeb->session();

$out['error'] = '';
$out['post'] = $_POST;


function obtener_estructura_directorios($ruta){
    $arbol = [];
    $directorio = opendir($ruta); //ruta actual
    while ($archivo = readdir($directorio)) {
            if (!is_dir($archivo))
                $arbol[] =  $archivo;
        }
    return $arbol;
}
switch($peticion[0]):
    case 'instalar':
        $jmyWeb ->pre(['p'=>$jmy->db([TABLA_USUARIOS."_".$out['session']['body']['api_web']['ID_F']]),'t'=>'INSTALADOR Administrador']);
        
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
    case 'importar':
        $p =$_POST;
        $t='importar_'.$out['session']['body']['api_web']['ID_F'];
        $emp=$out['session']['body']['api_web']['ID_F'];
        switch ($peticion[1]) {
            case 'instalar':
                $jmyWeb ->pre(['p'=>$jmy->db([$t]),'t'=>'DB Instalar importador']);
            break;
            case 'guardar':
                $out['i'] = json_decode($_POST['importar'],1);
                $out['c'] = json_decode($_POST['columnas'],1);
                $out['co'] = json_decode($_POST['co'],1);
                $out['log']['actualizar_columnas']=$jmy->col($out['co'],1);
                foreach ($out['c'] as $k => $v) {
                    if(!in_array($v['db'].'_'.$emp,$db))
                        $db[]=$v['db'].'_'.$emp;
                }
                $out['log']['db'] = $jmy->db($db);
                for($i=1; $i < count($out['i']); $i++){
                    
                    $e=$out['i'][$i];
                    $g=[];
                    for($o=0;$o<count($e);$o++){
                        if($e[$o]!=''&&$e[$o]!='NULA'&&$e[$o]!=NULL)
                            switch ($out['c'][$o]['type']):
                                case 'select':
                                    $g[$out['c'][$o]['db']][$out['c'][$o]['id']]=$jmyWeb->URLFriendly(trim($e[$o]),'_');
                                break;
                                case 'numero-decimal2':
                                    $g[$out['c'][$o]['db']][$out['c'][$o]['id']]=number_format($e[$o],2,'.','');
                                break;
                                default:
                                    $g[$out['c'][$o]['db']][$out['c'][$o]['id']]=trim($e[$o]);
                                break;
                            endswitch;                            
                    }                    
                    if(count($g)>0){
                        foreach ($g as $k => $v) {
                            $id=uniqid();
                            $out['g'][$id]=$jmy->guardar([
                                "TABLA"=>$k.'_'.$emp,
                                "ID"=>$id,
                                "GUARDAR"=>$v,
                            ]); 
                        }                        
                    }                    
                }
            break;
            case 'columnas':
                $out = [];
                $out ["comunas"]=1;
                $out['p'] = $_POST;
                $out['lista']=[];
                foreach ($out['p']['lista'] as $k => $v) {
                    $out['lista'][]=$v['id'];
                }
                $out['ver'] = $jmy->col($out['lista'],0);
            break;
            default:
                if($p['url']!=''&&$p['ruta']!=''){ 
                    $a = obtener_estructura_directorios(BASE_ARCHIVO.'importaciones/'.$p['ruta'].'/');
                    $out['id']=($p['id']!='')?$p['id']:uniqid();
                    $jmy->guardar([
                        "TABLA"=>$t,
                        "ID"=>$p['id'],
                        "A_D"=>true,
                        "GUARDAR"=>[
                            "url"=>$p['url'],  
                            "ruta"=>$p['ruta'],  
                            "archivos"=>$a
                        ]
                    ]);
                    $out['base']=BASE_ARCHIVO.'importaciones/'.$p['ruta'].'/';
                    $out['a']=$a;
                }
            break;
        }
    break;
    case 'productos':
        $out['productos'] = $jmy->ver([
            "TABLA"=>'productos',
            "COL"=>['nombre','foto_producto'],
            "SALIDA"=>'ARRAY',
            ]);
    break;
    case 'usuarios': 
        $tabla= TABLA_USUARIOS."_".$out['session']['body']['api_web']['ID_F'];
        $columnas=['nombre','tipo','proveedor','foto_perfil'];
        switch ($peticion[1]) {
            case 'perfil':
                $p=$_POST;
                $out['id']=$peticion[2];
                $out['p']=$p;
                if(is_array($p)){
                    $jmy->guardar([
                        "TABLA"=>$tabla,
                        "A_D"=>true,
                        "ID"=>$out['id'],
                        "GUARDAR"=>$p,
                    ]);
                }
                $columnas=null;
            default:
                $out['usuarios'] = $jmy->ver([
                    "TABLA"=>$tabla,
                    "ID"=>$out['id'],
                    "COL"=>$columnas,
                    "SALIDA"=>'ARRAY',
                    ]);
            break;
        }
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
        if(file_exists('config_administrador.php')){
            require_once('config_administrador.php');                
            if(file_exists($modulos[$peticion[0]]['controlador_ws']))
                require_once($modulos[$peticion[0]]['controlador_ws']);
        }
endswitch;
echo json_encode($out);