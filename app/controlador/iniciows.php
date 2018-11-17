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