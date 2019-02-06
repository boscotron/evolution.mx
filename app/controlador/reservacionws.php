<?php 
// $jmy->db(['reservacion_hotel']);

if ($peticion[1]=='') {
    switch ($_GET['peticion']) {
        case 'verHabitacion':
            $out['tipo_hab'] = $jmy->ver([
                "TABLA"=>"habitacion",
                "SALIDA"=>"ARRAY",
            ]);
        break;
        case 'guardarReservacion':
            $out['reservacion'] = $jmy->guardar([
                "TABLA"=>"reservacion_hotel",
                "A_D"=>true,
                "GUARDAR"=>['fechaInicio'=>$_POST["datosReservacion"]["fechaI"],
                            'fechaFin'=>$_POST["datosReservacion"]["fechaF"],
                            'adulto'=>$_POST["datosReservacion"]["adultos"],
                            'niño'=>$_POST["datosReservacion"]["nino"],
                            'habitacion'=>$_POST["datosReservacion"]["habitacion"]
                ]
            ]);
        break;
        
        default:
            # code...
        break;
    }
	
}


echo json_encode(['POST'=>$_POST,'GET'=>$_GET,'out'=>$out,'respuesta'=>$respuesta]);



?>