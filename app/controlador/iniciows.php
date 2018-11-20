<?php

$peticion = explode('/',$_GET['peticion']);

switch ($peticion[0]) {
    case 'servicios':
        $salida=$jmy->catalogos(["id"=>"lista_de_servicios"]);
        $salida= $salida['otFm'];
    break;
    
    default:
        # code...
        break;
}

echo json_encode($salida);

$peticion1 = explode('/',$_GET['peticion1']);

switch ($peticion1[0]) {
    case 'servicios1':
        $salida1=$jmy->catalogos(["id"=>"lista_de_servicios"]);
        $salida1= $salida1['otFm'];
    break;
    
    default:
        # code...
        break;
}

echo json_encode($salida1);


$peticion2 = explode('/',$_GET['peticion2']);

switch ($peticion2[0]) {
    case 'servicios2':
        $salida2=$jmy->catalogos(["id"=>"lista_de_testimonios"]);
        $salida2= $salida2['otFm'];
    break;
    
    default:
        # code...
        break;
}

echo json_encode($salida2);