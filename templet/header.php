<!doctype html>
<!--[if IE 7 ]>    <html lang="en-gb" class="isie ie7 oldie no-js"> <![endif]-->
<!--[if IE 8 ]>    <html lang="en-gb" class="isie ie8 oldie no-js"> <![endif]-->
<!--[if IE 9 ]>    <html lang="en-gb" class="isie ie9 no-js"> <![endif]-->
<!--[if (gt IE 9)|!(IE)]><!--> <html lang="en-gb" class="no-js"> <!--<![endif]-->

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">	
    <!--[if lt IE 9]> 
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <![endif]-->
    
	<title>Salon Evolution</title> 
	
	<meta name="description" content="">
	<meta name="author" content="">
    
    <!--[if lt IE 9]>
        <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->    
	<!--[if lte IE 8]>
		<script type="text/javascript" src="http://explorercanvas.googlecode.com/svn/trunk/excanvas.js"></script>
	<![endif]-->
    
    <!-- **Favicon** -->
    <link rel="shortcut icon" href="<?php $this->url_templet();?>favicon.ico" type="image/x-icon" />
    
    <!-- **CSS - stylesheets** -->
    <link id="default-css" href="<?php $this->url_templet();?>style.css" rel="stylesheet" media="all" />
    <link href="<?php $this->url_templet();?>css/shortcode.css" rel="stylesheet" type="text/css" />
 
    <!-- **Additional - stylesheets** -->
    <link rel="stylesheet" href="<?php $this->url_templet();?>css/responsive.css" type="text/css" media="all"/>
    <link href="<?php $this->url_templet();?>css/animations.css" rel="stylesheet" media="all" />
    <link id="skin-css" href="<?php $this->url_templet();?>skins/red/style.css" rel="stylesheet" media="all" />
    <link rel="stylesheet" href="<?php $this->url_templet();?>css/meanmenu.css" type="text/css" media="all"/>
    <link rel="stylesheet" type="text/css" href="<?php $this->url_templet();?>css/pace-theme-loading-bar.css" />
        
    <!-- **Font Awesome** -->
    <link rel="stylesheet" href="<?php $this->url_templet();?>css/font-awesome.min.css">
    
    <!-- **Google - Fonts** -->
    <link href='http://fonts.googleapis.com/css?family=Raleway' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,500,300,700,900' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=PT+Serif:400,700' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700' rel='stylesheet' type='text/css'>
    <link href='https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css' rel='stylesheet' type='text/css'>

     <!-- fullcalendar -->
    <link rel="stylesheet" href="<?php $this->url_templet();?>css/fullcalendar.min.css">

    <?php  $this->llamar_css(); ?> 

    
    <!--[if IE 7]>
    <link rel="stylesheet" href="css/font-awesome-ie7.min.css" />
    <![endif]-->
    
    <!-- jQuery -->
    <script src="<?php $this->url_templet();?>js/modernizr.custom.js"></script>

  

     <!-- SweetAlert 2 -->
    <script src="<?php $this->url_templet();?>js/sweetalert2.all.js"></script>

   

    
    
</head>

<body>
<div id="jmy_web"></div>
    <div id="jmy_web_tools"></div>

<div id="loader-wrapper"><!-- PreLoader -->
    <div class="loader">
        <div class="inner one"></div>
        <div class="inner two"></div>
        <div class="inner three"></div>
    </div>
    <h3 class="loader-text">
    	SalonEvolution
    </h3>
</div><!-- PreLoader -->
<div class="wrapper"><!-- Wrapper -->
    <div class="inner-wrapper"><!-- Inner-Wrapper -->
    	<div class="top-bar"><!-- Top Bar -->
        	<div class="container">
                <p class="jmy_web_div"  id="slogan" data-editor="no" data-tabla="vistaweb" data-page="header"><?php 
						$this->pnt('slogan','Lorem ipsum dolor sit amet consectetur',["secundario"=>"header"]);
						 ?>
                </p>
                <div class="top-right">
                	<ul>
                        <li>
                            <span class="jmy_web_div fa fa-phone-square"  id="numeros" data-tabla="vistaweb" data-editor="no" data-page="header"><?php $this->pnt('numeros','1 (800) 567 8765',["secundario"=>"header"]);
                            ?>
                             </span>
                            
                            
                        </li>
                        <li>
                            <span class="fa fa-envelope"></span>
                            <a href="mailto:yourname@somemail.com">name@somemail.com</a>
                        </li>
                        <span class="jmy_web_div fa fa-phone-square"  id="numeros" data-tabla="vistaweb" data-editor="no" data-page="header"><?php $this->pnt('numeros','1 (800) 567 8765',["secundario"=>"header"]);
                            ?>
                         </span>
                            
                            
                        </li>
                        
                        <li class="alignright prod">&nbsp;&nbsp;<span class="fa fa-user"></span>
                           
                        </li>                       
                           

                	</ul>  <ul align="right"> <li>
                                <?php
                                    echo ($SESSION['user']['user_id']=='') ?  
                                        '<a href="https://comsis.mx/app/entrar/?re='.$this->url_inicio(['return'=>true]).'perfil/entrar/&api=e2ad454bea7d919f0fc411a8b885580c&api_web='.JMY_API.'&sep=1"> Registrate | Iniciar Sesión</a>':
                                        '<a class="linkprod" href="'.$this->url_inicio(['return'=>true]).'perfil/"><ul><li> Mi perfil</a><li>
                                        <li><a href="'.$this->url_inicio(['return'=>true]).'/entrar/salir">Salir</a></li></ul>
                                    ';
                                ?>
                            </li></ul>       
                </div>
            </div>
        </div><!-- End of Top Bar -->
        <header id="header" class="dt-sticky-menu type2"><!-- Header -->
        	<div id="logo" class="jmy_web_slider" data-page="header"  data-tabla="vistaweb" id="logo_topmarco" data-marco="logo_topmarco" <?php 
										  $va[] = [ "type"=>"imagen",
											"id"=>"logo_top_img",
											 "width"=>"209",
											 "height"=>"48",
											 "url"=>$this->url_templet(["return"=>true]).'images/logoblanco3.fw.png' ];  ?>  data-var='<?php echo json_encode($va); ?>'>
											 
											 <a href="<?php $this->url_inicio(); ?>"><img alt="" title="" id="logo_top_img" src="<?php $this->pnt('logo_top_img',$this->url_templet(['return'=>true]).'images/logoblanco3.fw.png',
                                          ["secundario"=>"header"] ); ?>"/></a>
            </div><!-- End of Logo -->
            <div id="menu-container">
            	<div class="container">
                    <nav id="main-menu"><!-- Nav - Starts -->
                        <div id="dt-menu-toggle" class="dt-menu-toggle">
                            Menu
                            <span class="dt-menu-toggle-icon"></span>
                        </div>
                        <a title="TrendSalon" href="index.html" class="sticky-logo"><img title="TrendSalon" alt="Trendy" src="<?php echo RUTA_ACTUAL.BASE_TEMPLET; ?>images/logo.png"></a>
                        <ul class="menu">
                            <li class="current_page_item menu-item-simple-parent"><a class="jmy_web_div" data-page="header" id="enlace_inicio" data-editor="no" href="<?php echo RUTA_ACTUAL; ?>inicio"><?php $this->pnt('enlace_inicio','Inicio ',["secundario"=>"header"]); ?></a>

                            	<!-- <ul class="sub-menu">
                                    <li><a href="index-v2.html">Home 2</a></li>
                                    <li><a href="index-v3.html">Home 3</a></li>
                                    <li><a href="index-v4.html">Home 4</a></li>
                                    <li><a href="index-v5.html">Home 5</a></li>
                                </ul>
                                <a class="dt-menu-expand">+</a> -->
                            </li>
                            <li class="menu-item-simple-parent"><a class="jmy_web_div" data-page="header" id="enlace_page" data-editor="no" href="<?php echo RUTA_ACTUAL; ?>promociones"><?php $this->pnt('enlace_page','Promociones',["secundario"=>"header"]); ?></a>
                            	<!-- <ul class="sub-menu">
                                    <li><a href="about-us.html">About Us</a></li>
                                    <li><a href="shortcodes.html">Shortcodes</a></li>
                                    <li><a href="404.html">404</a></li>
                                    <li><a href="header2.html">Header Types</a>
                                    	<ul class="sub-menu">
                                            <li><a href="header2.html">Header2</a></li>
                                            <li><a href="header3.html">Header3</a></li>
                                            <li><a href="header4.html">Header4</a></li>
                                            <li><a href="header5.html">Header5</a></li>
                                        </ul>
                                		<a class="dt-menu-expand">+</a>
                                    </li>
                                </ul>
                                <a class="dt-menu-expand">+</a> -->
                            </li>
                            <li class=""><a class="jmy_web_div" data-page="header" id="enlace_servicio" data-editor="no" href="<?php echo RUTA_ACTUAL; ?>servicio"><?php $this->pnt('enlace_servicio','Servicios',["secundario"=>"header"]); ?></a></li>

                            <li class="menu-item-simple-parent"><a class="jmy_web_div" data-page="header" id="enlace_tienda" data-editor="no" href="<?php echo RUTA_ACTUAL; ?>tienda"><?php $this->pnt('enlace_tienda','Tienda',["secundario"=>"header"]); ?></a>
                                <!-- <ul class="sub-menu">
                                    <li><a href="shop-cart.html">Cart</a></li>
                                    <li><a href="shop-checkout.html">CheckOut</a></li>
                                </ul>
                                <a class="dt-menu-expand">+</a> -->
                            </li>
                            <li class="menu-item-simple-parent"><a class="jmy_web_div" data-page="header" id="enlace_blog" data-editor="no" href="<?php echo RUTA_ACTUAL; ?>blog"><?php $this->pnt('enlace_blog','Blog',["secundario"=>"header"]); ?></a>
                                <!-- <ul class="sub-menu">
                                    <li><a href="blog-details.html">Blog Details</a></li>
                                    <li><a href="blog-details-rhs.html">Blog Details With RHS</a></li>
                                    <li><a href="blog-details-lhs.html">Blog Details With LHS</a></li>
                                </ul>
                                <a class="dt-menu-expand">+</a> -->
                            </li>
                            <li class="menu-item-simple-parent"><a class="jmy_web_div" data-page="header" id="enlace_galeria" data-editor="no" href="<?php echo RUTA_ACTUAL; ?>galeria"><?php $this->pnt('enlace_galeria','Galeria',["secundario"=>"header"]); ?></a>
                            	<!-- <ul class="sub-menu">
                                    <li><a href="portfolio-details.html">Gallery Details</a></li>
                                    <li><a href="portfolio-details-rhs.html">Gallery Details With RHS</a></li>
                                    <li><a href="portfolio-details-lhs.html">Gallery Details With LHS</a></li>
                                </ul>
                                <a class="dt-menu-expand">+</a> -->
                            </li>
                            <li class="menu-item-simple-parent"><a class="jmy_web_div" data-page="header" id="enlace_contacto" data-editor="no" href="<?php echo RUTA_ACTUAL; ?>contacto"><?php $this->pnt('enlace_contacto','Contacto',["secundario"=>"header"]); ?></a>
                            	<!-- <ul class="sub-menu">
                                    <li><a href="contact.html">Contact</a></li>
                                    <li><a href="contact2.html">Contact 2</a></li>
                                </ul>
                                <a class="dt-menu-expand">+</a> -->
                            </li>
                        </ul>
                    </nav><!-- End of Nav -->
                </div>
            </div>
        </header>