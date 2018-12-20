<?php


/*

    FINAL DE ARRAY PEDIDOS

     "pedidos": {
            "ot": {
                "5c12fcc33706c": {
                    "dia_pedido": "24-12-2018",
                    "dirigido": "Juan martinez",
                    "Vendedor": "Santa clous",
                    "telefono": "000",
                    "productos": [
                            [
                                "producto"=>"gel",
                                "id"=>"asd5a6d5a6s5da",
                                "cantidad"=>"5",
                            ],[
                                "producto"=>"cera",
                                "id"=>"asd5a6d5a6asdda",
                                "cantidad"=>"1",
                            ],
                    ]
                }
            },
            "otFm": null,
            "otKey": [
                "5c12fcc33706c"
            ]
        },

*/

//if
//id
//if

    if($_POST['proveedor']!=''){
        $var ["proveedor"]=$jmy->ver([
            "TABLA"=>"proveedor",
            "ID"=>$_POST['proveedor'],
            //"COL"=>["nombre","precio","proveedor","cantidad","fecha_compra","fecha_venta"],   

        ]);
}


if(count($_POST)>0){
    $var["ID"]=($_POST['ID']!='')?$_POST['ID']:uniqid();
    if($_POST['nombre']!='' && $_POST['precio']!=''&& $_POST['proveedor']!=''){
        //$var ["guardar"]=
        $jmy->guardar([
            "TABLA"=>"productos",
            "ID"=>$_POST['ID'],
            //"A_D"=>TRUE,
            "FO"=>TRUE,
            "GUARDAR"=>$_POST 
                    
            ]);
        }else{
            $var['error'][]="Faltan campos nombre, precio,proveedor para guardar";
        }
    }

$var ["ver"]=$jmy->ver([
    "TABLA"=>"productos",
    "ID"=>$_POST['ID'],
   // "COL"=>["nombre","precio","proveedor","cantidad","fecha_compra","fecha_venta"],   
]);


$var["post"]=$_POST;



echo json_encode(
    ["POST"=>$_POST,"GET"=>$_GET,"var"=>$var]
);





?>