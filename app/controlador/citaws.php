<?php



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
    case 'guardarCita':
             //Guardar Cita
    break;
    default:
        # code...
        break;
}

$out['servicios']=['Cortes','Tintes','Mechas'];

//$respuesta=
//$_POST['fecha']

echo json_encode(['POST'=>$_POST,'GET'=>$_GET,'out'=>$out,'respuera'=>$respuesta]);

?>