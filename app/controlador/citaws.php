<?php

$out['personal'][]=['nombre'=>'Alfredo',
                    'horario_mat_ini'=>'8',
                    'horario_mat_fin'=>'14',
                    'horario_ves_ini'=>'15',
                    'horario_ves_fin'=>'20',
                    'dias_laborales'=>['lunes','martes','miercoles','jueves','viernes','sabado'],
                    'servicios'=>['cortes','tintes']
];

$out['personal'][]=['nombre'=>'Esmeralda',
                    'horario_mat_ini'=>'8',
                    'horario_mat_fin'=>'14',
                    'horario_ves_ini'=>'15',
                    'horario_ves_fin'=>'20',
                    'servicios'=>['cortes','tintes']
];

$out['personal'][]=['nombre'=>'Aida',
                    'horario_mat_ini'=>'8',
                    'horario_mat_fin'=>'14',
                    'horario_ves_ini'=>'15',
                    'horario_ves_fin'=>'20',
                    'dias_laborales'=>['lunes','martes','miercoles','jueves','viernes','sabado'],
                    'servicios'=>['cortes','tintes']
];

$out['personal'][]=['nombre'=>'Beatris',
                    'horario_mat_ini'=>'8',
                    'horario_mat_fin'=>'14',
                    'horario_ves_ini'=>'15',
                    'horario_ves_fin'=>'20',
                    'dias_laborales'=>['lunes','martes','miercoles','jueves','viernes','sabado'],
                    'servicios'=>['cortes','tintes']
];

$out['servicios']=['Cortes','Tintes','Mechas'];

//$respuesta=
//$_POST['fecha']

echo json_encode(['POST'=>$_POST,'GET'=>$_GET,'out'=>$out,'respuera'=>$respuesta]);

?>