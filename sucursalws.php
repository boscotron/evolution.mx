<?php
if(count($_POST)>0){
    $var["ID"]=($_POST['ID']!='')?$_POST['ID']:uniqid();
    if($_POST['direccion']!=''&& $_POST['responsable']!=''){
        $jmy->guardar([
            "TABLA"=>"sucursal",
            "ID"=>$var['ID'],
            "A_D"=>TRUE,
            "FO"=>TRUE,
            "GUARDAR"=>[
                "direccion"=>$_POST['direccion'],
                "responsable"=>$_POST['responsable'],
                "telefono"=>str_replace(trim($_POST['telefono']),"",["-","_","#"]),

            ],
        ]);
    }else{
        $var['error'][]="Faltan campos: dirección, responsable; para poder guardar"
    }
}
$var ["ver"]=$jmy->ver([
    "TABLA"=>"sucursal",
    "ID"=>$var['ID'],
    "COL"=>["direccion","responsable","telefono"],
]);

$var["post"]=$_POST;



echo json_encode(
    ["POST"=>$_POST,"GET"=>$_GET,"var=>$var"]
);




?>