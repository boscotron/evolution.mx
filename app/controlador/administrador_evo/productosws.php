<?php

$productos=$jmy->ver([
    "TABLA"=>TABLA_PRODUCTOS.'_'.$jmyWeb->sesion(["return"=>"db"]),
    "COL"=>["nombre","cantidad"],
]); 


$salida=[
    "hola"=>"que hace",
    "post"=>$_POST,
    "productos"=>$productos
];



$out = $salida;
?>