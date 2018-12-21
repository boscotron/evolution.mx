<?php


if(count($_POST)>0){
    $var["ID"]=($_POST['ID']!='')?$_POST['ID']:uniqid();
    if($_POST['cliente']!='' && $_POST['proveedor']!=''&& $_POST['estatus']!=''){
        //$var ["guardar"]=
        $jmy->guardar([
            "TABLA"=>"pedido",
            "ID"=>$_POST['ID'],
            "A_D"=>TRUE,
            "FO"=>TRUE,
            "GUARDAR"=>[
                "dia_pedido"=>$_POST['dia_pedido'],
                "cliente"=>$_POST['cliente'],
                "proveedor"=>$_POST['proveedor'],
                "productos"=>$_POST['productos'],
                "estatus"=>$_POST['estatus'],
                
                ],
                    
            ]);
        }else{
            $var['error'][]="Faltan campos cliente,proveedor,estatus para guardar";
        }
    }

$var ["ver"]=$jmy->ver([
    "TABLA"=>"pedido",
    "ID"=>$_POST['ID'],
    "COL"=>["dia_pedido","cliente","proveedor","productos","estatus"],   
]);


$var["post"]=$_POST;



echo json_encode(
    ["POST"=>$_POST,"GET"=>$_GET,"var"=>$var]
);




?>