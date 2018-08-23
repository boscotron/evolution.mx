<?php 
switch ($_GET['peticion']) {


    default:
        $jmyWeb->cargar(["pagina"=>"productos"]);
        $jmyWeb ->cargar_js(["url"=>"templet/js/productos.js?d=".date('U')]);
        $jmyWeb ->cargar_vista(["url"=>"productos.php"]);
    break;
}


?>