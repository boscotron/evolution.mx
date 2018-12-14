<?php

$var ["guardar"]=$jmy->guardar([
    "TABLA"=>"productos",
    "ID"=>$_POST['ID'],
    "A_D"=>TRUE,
    "FO"=>TRUE,
    "GUARDAR"=>[
        "nombre"=>$_POST['nombre'],
        "precio"=>$_POST['precio'],
        "proveedor"=>$_POST['proveedor'],
        "cantidad"=>$_POST['cantidad'],
        "fecha_compra"=>$_POST['fecha_compra'],
        "fecha_venta"=>$_POST['fecha_venta'],
    ],
                
]);

$var ["ver"]=$jmy->ver([
    "TABLA"=>"productos",
    "ID"=>$_POST['ID'],
    "COL"=>["nombre","precio","proveedor","cantidad","fecha_compra","fecha_venta"],
   
]);


$var["post"]=$_POST;



echo json_encode(
    ["POST"=>$_POST,"GET"=>$_GET,"var"=>$var]
);





?>