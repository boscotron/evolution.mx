
<?php

    $config=[
        "tabla"=>'productos'
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

            $tmp = $jmy->ver([	
                "TABLA"=>$config['tabla'],
                "COL"=>['nombre_marca']
            ]);
        
            $out['ver'] = $jmy->ver([	
                "TABLA"=>$config['tabla'],
                "ID_F"=>$tmp['otKey'], 
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
                if($out['id']!='' ||  $_POST['id']!=''){
                    $out['ver'] = $jmy->ver([	
                        "TABLA"=>$config['tabla'],
                        "ID_F"=>($_POST['id']!='')?$_POST['id']:$out['id'], 
                    ]);
                }
            }else{
                $out['error']='Sessión no iniciada';
            }
        break;  
        case 'producto':
            if($jmyWeb->modoEditor()){
                if($_POST['nombre']!='' && $_POST['id_marca']!=''){
                    $out['id']=($_POST['id']!='')?$_POST['id']:uniqid();
                    $out['g']= $jmy->guardar([	"TABLA"=>$config['tabla'], 
                            "ID_F"=>$out['id'], 
                            "A_D"=>TRUE, 
                            "GUARDAR"=>[
                                'nombre_producto'=>$_POST['nombre'],
                                'id_marca'=>$_POST['id_marca'],
                            ],
                        ]);
                }
                if($out['id']!='' ||  $_POST['id']!=''){
                    $out['ver'] = $jmy->ver([	
                        "TABLA"=>$config['tabla'],
                        "ID_F"=>($_POST['id']!='')?$_POST['id']:$out['id'], 
                    ]);
                }
                if($_POST['nombre']=='' && $_POST['id_marca']!=''){
                    $tmp = $jmy->ver([	
                        "TABLA"=>$config['tabla'],
                        "COL"=>['id_marca'],
                        "V"=>$_POST['id_marca']
                        //"ID_F"=>($_POST['id']!='')?$_POST['id']:$out['id'], 
                    ]);
                
                    $out['ver'] = $jmy->ver([	
                        "TABLA"=>$config['tabla'],
                        "ID_F"=>$tmp['otKey'], 
                    ]);
                    
                }
            }else{
                $out['error']='Sessión no iniciada';
            }
            break;      
             
        case 'producto-editar':
            if($jmyWeb->modoEditor()){
                if($_POST['nombre']!='' && $_POST['id_producto']!=''){
                    




                    $out['g']= $jmy->guardar([	
                            "TABLA"=>$config['tabla'], 
                            "ID_F"=>$_POST['id_producto'], 
                            "A_D"=>TRUE, 
                            "GUARDAR"=>[
                                'nombre_producto'=>$_POST['nombre'],
                                'codigo'=>substr($_POST['codigo'],0,5),  // Corata a 5 caracteres el código

                            ],
                        ]);
                }
                if($out['id']!='' ||  $_POST['id']!=''){
                    $out['ver'] = $jmy->ver([	
                        "TABLA"=>$config['tabla'],
                        "ID_F"=>($_POST['id']!='')?$_POST['id']:$out['id'], 
                    ]);
                }
                if($_POST['nombre']=='' && $_POST['id_marca']!=''){
                    $tmp = $jmy->ver([	
                        "TABLA"=>$config['tabla'],
                        "COL"=>['id_marca'],
                        "V"=>$_POST['id_marca'],
                        //"ID_F"=>($_POST['id']!='')?$_POST['id']:$out['id'], 
                    ]);
                
                    $out['ver'] = $jmy->ver([	
                        "TABLA"=>$config['tabla'],
                        "ID_F"=>$tmp['otKey'], 
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
