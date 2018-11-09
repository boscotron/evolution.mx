<?php 
$out = $jmy->ver([	
			"TABLA"=>"blog", 		
			"COLUMNAS"=>["titulo","subtitulo","imagen","url","fecha"],
			//"FO"=>true
			//"ID_F"=>'blog'
		]);
$jmyWeb->cargar(["pagina"=>"inicio"]);

$jmyWeb->cargar_js(["url"=>"../app/js/jmy/contacto.js"]); // carga de funciones de cotnacto

$jmyWeb ->cargar_vista(["url"=>"inicio.php","data"=>["blog"=>$out]]);

?>