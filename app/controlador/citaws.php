<?php
 
/*
$out['personal'][]=['nombre'=>'Alfredo',
                    'horario_mat_ini'=>'8',
                    'horario_mat_fin'=>'14',
                    'horario_ves_ini'=>'15',
                    'horario_ves_fin'=>'20',
                    'dias_laborales'=>['lunes','martes','miercoles','jueves','viernes','sabado'],
                    'servicios'=>['5b858452f1162']
];

$out['personal'][]=['nombre'=>'Esmeralda',
                    'horario_mat_ini'=>'8',
                    'horario_mat_fin'=>'14',
                    'horario_ves_ini'=>'15',
                    'horario_ves_fin'=>'20',
                    'servicios'=>['5b858452f1162','5b858453026ac','5b8584530512a']
];

$out['personal'][]=['nombre'=>'Aida',
                    'horario_mat_ini'=>'8',
                    'horario_mat_fin'=>'14',
                    'horario_ves_ini'=>'15',
                    'horario_ves_fin'=>'20',
                    'dias_laborales'=>['lunes','martes','miercoles','jueves','viernes','sabado'],
                    'servicios'=>['5b858452f1162','5b858453026ac']
];

$out['personal'][]=['nombre'=>'Rafa',
                    'horario_mat_ini'=>'8',
                    'horario_mat_fin'=>'14',
                    'horario_ves_ini'=>'15',
                    'horario_ves_fin'=>'20',
                    'dias_laborales'=>['lunes','martes','miercoles','jueves','viernes','sabado'],
                    'servicios'=>['5b858453026ac']
];

$out['personal'][]=['nombre'=>'Beatris',
                    'horario_mat_ini'=>'8',
                    'horario_mat_fin'=>'14',
                    'horario_ves_ini'=>'15',
                    'horario_ves_fin'=>'20',
                    'dias_laborales'=>['lunes','martes','miercoles','jueves','viernes','sabado'],
                    'servicios'=>['5b858452f1162','5b8584530512a']
];

$out['personal'][]=['nombre'=>'Yoly',
                    'horario_mat_ini'=>'8',
                    'horario_mat_fin'=>'14',
                    'horario_ves_ini'=>'15',
                    'horario_ves_fin'=>'20',
                    'dias_laborales'=>['lunes','martes','miercoles','jueves','viernes','sabado'],
                    'servicios'=>['5b8584530512a']
];
/*
$jmy->db(['personal']);

for ($i=0; $i <count($out['personal']) ; $i++) { 
    
    $jmy->guardar([	"TABLA"=>"personal", // STRING
    //"ID_F"=>[$get['id']], // Array
    "A_D"=>TRUE, 
    "GUARDAR"=>$out['personal'][$i],
    ]);
    
}*/






switch ($_GET['peticion']) {
    case 'personal':
       $out['respuesta_personal'][]=$jmy->ver([	
                "TABLA"=>"personal",
                //"ID_D"=>["servicios"], 
                "LIKE_V"=>[strtolower($_POST['servicios'])],
               // "SALIDA"=>'ID'
            ]);
          $out['respuesta_personal'][]=$jmy->ver([	
                "TABLA"=>"personal",
                "ID"=>$out['respuesta_personal']['otKey'], 
                "SALIDA"=>'ARRAY'
            ]);
        break;
    case 'servicios':
       $out=$jmy->ver([   
                "TABLA"=>"servicio",
                //"ID_D"=>["servicios"], 
                //"LIKE_V"=>[$_POST['servicios']],
                "SALIDA"=>'ARRAY' 
            ]);
         /* $out['respuesta_servicios']=$jmy->ver([    
                "TABLA"=>"servicio",
                "ID"=>$out['respuesta_servicios']['otKey'], 
                "SALIDA"=>'ARRAY'
            ]);*/
        break;
    case 'verPersonaHorario':
        $out['verPersonaHorario']=$jmy->ver([   
            "TABLA"=>"personal",
            "ID"=>[$_POST['persona']], 
            "SALIDA"=>'ARRAY'
        ]);
        $out['verPersonaHorario'] = $out['verPersonaHorario']['ot'][$_POST['persona']];
        //CONSULTA DE SERVICIOS
        $out['servicio']=$jmy->ver([   
            "TABLA"=>"servicio",
            "ID"=>[$_POST['servicios']], 
            //"SALIDA"=>'ARRAY'
        ]);
        $out['servicio'] = $out['servicio']['ot'][$_POST['servicios']];
        $out['tiempo_servicio'] = $out['servicio']['tiempo_estimado']*60;
        /// VER CITAS SI EXISTEN
        $out['agendarcita']=$jmy->ver([   
            "TABLA"=>"agendarcita",
            "V"=>[$_POST['fecha']], 
            //"SALIDA"=>'ARRAY'
        ]); 
        $out['agendarcita2']=$jmy->ver([   
            "TABLA"=>"agendarcita",
            "ID"=>$out['agendarcita']['otKey'], 
            "V"=>[$_POST['persona']]
            //"SALIDA"=>'ARRAY'
        ]); 
        $out['quitarHora'] = [];
        if(count($out['agendarcita2']['otKey'])>0){
            $out['infoCitaExistente']=$jmy->ver([   
                "TABLA"=>"agendarcita",
                "COL"=>["horario"],
                "ID"=>$out['agendarcita2']['otKey'],
                "SALIDA"=>'ARRAY'
            ]);             
            $out['infoCitaExistente'] = $out['infoCitaExistente']['otFm'];
            for ($i=0; $i < count($out['infoCitaExistente']) ; $i++) { 
                
                $out['quitarHora'][] = $out['infoCitaExistente'][$i]['horario'];
            }
        }else{
            $out['infoCitaExistente'] = false;
        }

        // generar Horario
        for ($i=$out['verPersonaHorario']['horario_mat_ini']; $i<=$out['verPersonaHorario']['horario_mat_fin'] ; $i++) { 
            if(!in_array($i,$out['quitarHora']))
                $out['horario'][] = $i;
        }
        for ($i=$out['verPersonaHorario']['horario_ves_ini']; $i<=$out['verPersonaHorario']['horario_ves_fin'] ; $i++) { 
            if(!in_array($i,$out['quitarHora']))
                $out['horario'][] = $i;
        }



    break;

    case 'guardarCita':
           #$jmy->db(['agendarCita']);
    
          //  $out['mostrarCitas']$jmy->ver(["TABLA"=>"agendarcita"])
   
            $out['agendarcita'] = $jmy->guardar(["TABLA"=>"agendarcita",
                                "A_D"=>TRUE,
                                "GUARDAR"=>["nombre"=>$_POST['servicios'],
                                            "persona"=>$_POST['persona'],
                                            "horario"=>$_POST['horario'],
                                            "fecha"=>$_POST['fecha']
                                        ]
                                ]);
    break;

    default:
        # code...
        break;
}

echo json_encode(['POST'=>$_POST,'GET'=>$_GET,'out'=>$out,'respuesta'=>$respuesta]);
 #crear una funcion que filtre las fecha,hora y muestre 


?>