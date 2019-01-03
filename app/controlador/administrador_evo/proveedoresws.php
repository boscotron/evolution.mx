<?php

$usuarios=$jmy->ver([
    "TABLA"=>TABLA_USUARIOS.'_'.$jmyWeb->sesion(["return"=>"db"]),
    "COL"=>["nombre","foto_perfil"],
]); 


$salida=[
    "ola"=>"k ace",
    "post"=>$_POST,
    "usuarios"=>$usuarios
];



$out = $salida;
?>