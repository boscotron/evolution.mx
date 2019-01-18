<?php

$sucursales=$jmy->ver([
    "TABLA"=>TABLA_SUCURSAL.'_'.$jmyWeb->sesion(["return"=>"db"]),
    "COL"=>["direccion","responsable"],
]); 


$salida=[
    "hola"=>"que hace",
    "post"=>$_POST,
    "sucursales"=>$sucursales
];



$out = $salida;
?>