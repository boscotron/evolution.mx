<?php

$var ["guardar"]=$jmy->guardar([
    "TABLA"=>"proveedor",
    "ID"=>$_POST['ID'],
    "A_D"=>TRUE,
    "FO"=>TRUE,
    "GUARDAR"=>[
        "nombre"=>$_POST['nombre'],
        "telefono"=>$_POST['telefono'],
        "direccion"=>$_POST['direccion'],
        "dia_pedido"=>$_POST['dia_pedido'],
    ],
                
]);

$var ["ver"]=$jmy->ver([
    "TABLA"=>"proveedor",
    "ID"=>$_POST['ID'],
    "COL"=>["nombre","telefono","direccion","dia_pedido"],
]);


$var["post"]=$_POST;



echo json_encode(
    ["POST"=>$_POST,"GET"=>$_GET,"var"=>$var]
);





?>