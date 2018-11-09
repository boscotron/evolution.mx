<?php 

$jmyWeb->cargar(["pagina"=>"contacto"]); //Carga de datos de la pagina

$jmyWeb->cargar_js(["url"=>"../app/js/jmy/contacto.js"]); // carga de funciones de cotnacto
 
$jmyWeb ->cargar_vista(["url"=>"contacto.php"]);

?>