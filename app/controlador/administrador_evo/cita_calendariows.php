<?php 

$citas = $jmy->ver([
    "TABLA"=>"agendarcita",
    "COL"=>["V"],
]);

$salida=[
    "dato"=>"dato",
    "post"=>$_POST,
    "cita"=>$citas
];

$out = $salida;
?>