<?php
/* RUTAS DE ACCESO */
define(	"RUTA_ACTUAL","http://local.evolution.mx/");  // URL actual del sistema
define(	"BASE_TEMPLET","templet/"); 			// Ruta donde se aloje el tema o templet
define(	"BASE_APP","app/"); 					// Ruta de la aplicacion
define(	"BASE_ARCHIVO","att/"); 				// Ruta a guardar los archivos 
define(	"BASE_ARCHIVOS_THUMS","att/thums/"); 	// Ruta a guardar los archivos thums
define( "MODO_DESAROLLADOR",false ); 			// Activa o desactiva el editor en todo el sitio para cambios de diseño
/* DEFINICIONES DEL TEMA O TEMPLET */
define(	"TEMPLET_HOME","inicio"); 			// Archivo a cargar de inicio
define(	"TEMPLET_HEADER","header.php"); 	// Define el archivo header
define(	"TEMPLET_FOOTER","footer.php"); 	// Define el archivo de footer
define(	"TEMPLET_MANTENIMIENTO","en_construccion.php"); 
define(	"TEMPLET_404",'error404.php'); 		// Página default de error 404
define(	"ESTADO_WEB","PUBLICO");  			// PUBLICO, MANTENIMIENTO 
/* REGLAS DEL ALMACENAMIENTO DE ARCHIVOS */
define("MAX_UPLOAD",20);			// Tamaño máximo de subida de archivos, expesada en Mb
define("MAX_IMG_WIDTH",0);			// En pixeles, si el valor es 0 no tendra limite
define("MAX_IMG_HEIGHT",0);			// En pixeles, si el valor es 0 no tendra limite
// Cambio automático de tamaño //
// Si configura IMG_RESIZING en true, el script convierte todas las imágenes cargadas exactamente a IMG_RESIZING_WIDTH x IMG_RESIZING_HEIGHT dimension
// Si establece ancho o alto en 0, el script calcula automáticamente la otra dimensión
// Es posible que si sube imágenes muy grandes, la secuencia de comandos no funcione para superar este aumento la configuración de php de la memoria y el límite de tiempo
define("IMG_RESIZING",true);		// Activa o desactiva el cambio de tamaño de la imagen
define("IMG_RESIZING_WIDTH",900);	// Tamaño maximo de ancho a convertir, expesada en px 
define("IMG_RESIZING_HEIGHT",0);	// Tamaño maximo de alto a convertir, expesada en px

/*Licencia JMY CONNECT*/
define(	"JMY_SERVER","https://comsis.mx/api/auth/v1/jmyweb"); 
define(	"JMY_API","010b4cd24e88198f01975a013710a900"); 
define(	"JMY_APIKEY","70e8a5c84d2db77e73ed8973fb62e0c6"); 
/*Configuración JMY */
define(	"DB_JMY_ADD_ID_D",true); //Agregar campos faltantes en la base de datos
define(	"DB_JMY_ADD_TABLA",true); //Agregar Tablas faltantes en la base de datos
/*MySQL*/
define(	"DB_HO","localhost"); //servidor
define(	"DB_US","root"); //usuario
define(	"DB_PA",""); //contrase�a
define(	"DB_DB","evolution"); //Base de datos
define(	"TABLAS_EXTRAS","productos,agendarcita,perfil,servicio,personal"); //Base de datos
define(	"TABLA_USUARIOS","clientes"); //Base de datos


define(	"DB_PX",""); //prefijo de tablas en Base de datos //ACT

define("PAGE_HEADER","header"); // ACT
define("PAGE_FOOTER","footer"); // ACT
define("DOY","amm"); // ACT

/*------ no modificar a partir de este punto ------*/
define("RAIZ_TEMPLET",RUTA_ACTUAL.BASE_TEMPLET);
define("RUTA_APP",BASE_APP);
$_SESSION['session']['TOKEN']="temp001";
 