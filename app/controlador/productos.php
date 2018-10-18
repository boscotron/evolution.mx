<?php 
/* config tabla */
switch ($_GET['peticion']) {
    
    /*
    case instalar
    $jmy->db

    */


    default: 
        $jmyWeb->cargar(["pagina"=>"productos"]); //agregar tabla 
       // $jmyWeb ->cargar_css(["url"=>$jmyWeb->url_templet(['return'=>true])."css/prettyPhoto.css","unico"=>true]);

        

        $jmyWeb ->cargar_js(["url"=>"templet/js/productos.js?d=".date('U')]);
        
        //$jmyWeb ->cargar_js(["url"=>"https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"]);
        //$jmyWeb ->cargar_js(["url"=>"https://static.codepen.io/assets/common/stopExecutionOnTimeout-41c52890748cd7143004e05d3c5f786c66b19939c4500ce446314d1748483e13.js"]);
        $jmyWeb ->cargar_vista(["url"=>"productos.php"]);
    break;
}


?>