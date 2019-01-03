<?php 

$citas = $jmy->ver([
    "TABLA"=>"agendarcita",
    "SALIDA"=>"ARRAY",
]);

$salida=[
    "dato"=>"dato",
    "post"=>$_POST,
    "cita"=>$citas
];

$out = $salida;
?>