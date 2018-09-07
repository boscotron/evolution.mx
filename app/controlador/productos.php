<?php 
/* config tabla */
switch ($_GET['peticion']) {
    
    /*
    case instalar
    $jmy->db

    */


    default:
        $jmyWeb->cargar(["pagina"=>"productos"]); //agregar tabla 
        $jmyWeb ->cargar_js(["url"=>"templet/js/productos.js?d=".date('U')]);
        $jmyWeb ->cargar_vista(["url"=>"productos.php"]);
    break;
}


?>