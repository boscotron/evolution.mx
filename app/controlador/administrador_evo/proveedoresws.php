<?php

$usuarios=$jmy->ver([
    "TABLA"=>TABLA_PROVEEDOR.'_'.$jmyWeb->sesion(["return"=>"db"]),
    "COL"=>["nombre","telefono"],
]); 


$salida=[
    "ola"=>"k ace",
    "post"=>$_POST,
    "proveedores"=>$proveedores
];



$out = $salida;
?>