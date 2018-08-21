<?php 
switch ($_GET['peticion']) {


    default:
        $jmyWeb->cargar(["pagina"=>"productos"]);
        $jmyWeb ->cargar_vista(["url"=>"productos.php"]);
    break;
}


?>