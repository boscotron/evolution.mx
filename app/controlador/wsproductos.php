
<?php

    $config=[
        "tabla"=>'PRODUCTOS'
    ];
    switch ($_GET['peticion']) {
        case 'instalar':
            if($jmyWeb->modoEditor()){
                $jmyWeb->pre(['p'=>$jmy->db([$config['tabla']]),'t'=>'Instalación DB']);
            }else{
                $out['error']='Sessión no iniciada';
            }        
            break;
        case 'marcas-lista':
            $out['ver'] = $jmy->ver([	
                        "TABLA"=>$config['tabla'],
                        "SALIDA"=>'ARRAY',
                    ]);
        break;
        case 'marcas':
            if($jmyWeb->modoEditor()){
                if($_POST['nombre']!=''){
                    $out['id']=($_POST['id']!='')?$_POST['id']:uniqid();
                    $out['g']= $jmy->guardar([	"TABLA"=>$config['tabla'], 
                            "ID_F"=>$out['id'], 
                            "A_D"=>TRUE, 
                            "GUARDAR"=>['nombre_marca'=>$_POST['nombre']],
                        ]);
                }
                if($out['id']){
                    $out['ver'] = $jmy->ver([	
                        "TABLA"=>$config['tabla'],
                        "ID_F"=>$out['id'], 
                    ]);
                }
            }else{
                $out['error']='Sessión no iniciada';
            }
            break;        
        default:
            # code...
            break;
    }



echo json_encode([  
    'POST'=>$_POST,
    'GET'=>$_GET,
    'out'=>$out
    ]);
    ?>
