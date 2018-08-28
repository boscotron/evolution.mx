<?php
 /*

$out['personal'][]=['nombre'=>'Alfredo',
                    'horario_mat_ini'=>'8',
                    'horario_mat_fin'=>'14',
                    'horario_ves_ini'=>'15',
                    'horario_ves_fin'=>'20',
                    'dias_laborales'=>['lunes','martes','miercoles','jueves','viernes','sabado'],
                    'servicios'=>['cortes']
];

$out['personal'][]=['nombre'=>'Esmeralda',
                    'horario_mat_ini'=>'8',
                    'horario_mat_fin'=>'14',
                    'horario_ves_ini'=>'15',
                    'horario_ves_fin'=>'20',
                    'servicios'=>['cortes','tintes','unas']
];

$out['personal'][]=['nombre'=>'Aida',
                    'horario_mat_ini'=>'8',
                    'horario_mat_fin'=>'14',
                    'horario_ves_ini'=>'15',
                    'horario_ves_fin'=>'20',
                    'dias_laborales'=>['lunes','martes','miercoles','jueves','viernes','sabado'],
                    'servicios'=>['cortes','tintes']
];

$out['personal'][]=['nombre'=>'Rafa',
                    'horario_mat_ini'=>'8',
                    'horario_mat_fin'=>'14',
                    'horario_ves_ini'=>'15',
                    'horario_ves_fin'=>'20',
                    'dias_laborales'=>['lunes','martes','miercoles','jueves','viernes','sabado'],
                    'servicios'=>['tintes']
];

$out['personal'][]=['nombre'=>'Beatris',
                    'horario_mat_ini'=>'8',
                    'horario_mat_fin'=>'14',
                    'horario_ves_ini'=>'15',
                    'horario_ves_fin'=>'20',
                    'dias_laborales'=>['lunes','martes','miercoles','jueves','viernes','sabado'],
                    'servicios'=>['cortes','unas']
];

$out['personal'][]=['nombre'=>'Yoly',
                    'horario_mat_ini'=>'8',
                    'horario_mat_fin'=>'14',
                    'horario_ves_ini'=>'15',
                    'horario_ves_fin'=>'20',
                    'dias_laborales'=>['lunes','martes','miercoles','jueves','viernes','sabado'],
                    'servicios'=>['unas']
];*/
/*
$jmy->db(['personal']);

for ($i=0; $i <count($out['personal']) ; $i++) { 
    
    $jmy->guardar([	"TABLA"=>"personal", // STRING
    //"ID_F"=>[$get['id']], // Array
    "A_D"=>TRUE, 
    "GUARDAR"=>$out['personal'][$i],
    ]);
    
}*/



$out['servicios'][]=['nombre'=>'Cortes',
                     'tiempo_estimado'=>'30'];

 $out['servicios'][]=['nombre'=>'Tintes',
                     'tiempo_estimado'=>'90'];

$out['servicios'][]=['nombre'=>'Mechas',
                     'tiempo_estimado'=>'40'];

$out['servicios'][]=['nombre'=>'Rayos',
                     'tiempo_estimado'=>'50'];

$out['servicios'][]=['nombre'=>'unas',
                     'tiempo_estimado'=>'60'];



/* $jmy->db(['servicio']);    

for ($i=0; $i <count($out['servicios']) ; $i++) { 
    
    $jmy->guardar([ "TABLA"=>"servicio", // STRING
    //"ID_F"=>[$get['id']], // Array
    "A_D"=>TRUE, 
    "GUARDAR"=>$out['servicios'][$i],
    ]);
}*/




switch ($_GET['peticion']) {
    case 'personal':
       $out['respuesta_personal']=$jmy->ver([	
                "TABLA"=>"personal",
                //"ID_D"=>["servicios"], 
                "LIKE_V"=>[$_POST['servicios']],
               // "SALIDA"=>'ID'
            ]);
          $out['respuesta_personal']=$jmy->ver([	
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
       $out['respuesta_servicios']=$jmy->ver([   
                "TABLA"=>"servicio",
                //"ID_D"=>["servicios"], 
                "LIKE_V"=>[$_POST['servicios']],
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