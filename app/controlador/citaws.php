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

    case 'verPersonaHorario':
                $out['verPersonaHorario']=$jmy->ver([	
                    "TABLA"=>"personal",
                    "ID"=>[$_POST['persona']], 
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
    break;

    case 'guardarCita':
           #$jmy->db(['agendarCita']);
    
          //  $out['mostrarCitas']$jmy->ver(["TABLA"=>"agendarcita"])
   
            $out['agendarcita'] = $jmy->guardar(["TABLA"=>"agendarcita",
                                "A_D"=>TRUE,
                                "GUARDAR"=>["nombre"=>$_POST['servicios'],
                                            "persona"=>$_POST['personal'],
                                            "horario"=>$_POST['horario'],
                                            "fecha"=>$_POST['dpt']
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