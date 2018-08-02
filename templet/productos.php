<?php $page= "productos"; ?>
<link href="<?php $this->url_templet();?>css/prettyPhoto.css" rel="stylesheet" type="text/css" /> 

<div id="main"><!-- Main -->
    <div class="hr-invisible-small"></div>
    <section class="fullwidth-background">
        <div class="breadcrumb-wrapper">
            <div class="container">
                <h4 class="jmy_web_div" data-page="<?php echo $page; ?>" id="titulo_galeria" data-editor="no"><?php $this->pnt('titulo_galeria','Galaría'); ?></h4>
                <h6><a href="index.html">Home</a> / Gallery</h6>
            </div>
        </div>                
    </section>
    <div class="hr-invisible-very-small"></div>
    <div class="clear"></div>
    <section id="primary" class="content-full-width"><!-- Primary Section -->
        <div class="fullwidth-section">
            <h2 class="border-title aligncenter"> Our Beauty Gallery </h2>
            <div class="jmy_web_categorias" data-tabla="vistaweb" data-page="<?php echo $page; ?>" id="marcas" data-value="<?php
                    $categorias = ["TOP","TOP2"];
                    $categorias = $this->pnt('marcas',implode(',', $categorias),['return'=>true]); 
                    echo $categorias;
                    $categorias = explode("," , $categorias); ?>" data-titulo=" Indica el nombre de categoría separado por comas"></div>
            <div class="hr-invisible-very-small"></div>
            <div class="container">
                <div class="dt-sc-sorting-container">
                    
                    <?php 
                    for ($i=0; $i <count($categorias) ; $i++) { 
                        echo '<a data-filter=".'.$categorias[$i].'"  href="#"  class="btn-eff3  active-sort jmy_web_div" data-page="'.$page.'" id="titulo_categoria_'.$i.'" data-editor="no">'.$this->pnt('titulo_categoria_'.$i,$categorias[$i],['return'=>true]).' </a> ';
                    }?>
                </div>
            </div>
            <div class="clear"></div>
            <?php
                for ($i=0; $i < count($categorias) ; $i++) { ?>

                     <div class="jmy_web_contador" data-page="<?php echo $page; ?>" id="no_imagenes_<?php echo $i; ?>" data-value="<?php $this->pnt('no_imagenes_'.$i,'2'); ?>" data-titulo="Número de productos en la categoría <?php echo $categorias[$i]; ?>"></div>

                <?php } ?>
            <div class="dt-sc-portfolio-container isotope no-space"> <!-- **dt-sc-portfolio-container Starts Here** -->
                <?php
                for ($i=0; $i < count($categorias) ; $i++) {                     
                    for ($o=0; $o <  $this->pnt('no_imagenes_'.$i,'2',['return'=>true]) ; $o++) { ?>
                    <div class="portfolio dt-sc-one-fourth column no-space todos <?php echo $categorias[$i]; ?>">
                        <figure>
                            <img src="<?php $this->url_templet();?>images/portfolio-images/portfolio-img1.jpg" alt="portfolio1" title="">
                            <figcaption>
                                <div class="fig-content">
                                    <ul class="cart-whislist">
                                        <li><a href="images/portfolio-images/portfolio-img1.jpg" data-gal="prettyPhoto[gallery]" class="button wpshop-cart-button add_to_cart_button product_type_simple"><i class="fa fa-search-plus"></i></a></li>
                                        <li><a href="portfolio-details.html" ><i class="fa fa-external-link"></i></a></li>
                                    </ul>
                                </div>
                            </figcaption>
                        </figure>
                    </div>
                <?php } }  ?>

            </div> <!-- **dt-sc-portfolio-container Ends Here** -->      
        </div>
        <div class="clear"></div>
        <div class="fullwidth-section dt-sc-parallax-section appointment-parallax dark-bg">
            <div class="fullwidth-bg">
                <div class="parallax-spacing">
                    <div class="container">
                        <h3 class="border-title">Lorem ipsum dolor sit amet, consectetur <span>Adipiscing elit</span></h3>
                        <div class="aligncenter">
                            <a class="appointment-btn btn-eff2" href="#">Book an <span>Appointment</span></a>
                        </div>
                    </div>
                </div>
            </div>
        </div> 
        <div class="clear"></div>
        <div class="hr-invisible"></div>
        <div class="container">
            <h2 class="border-title aligncenter"> Client Testimonials </h2>
            <div class="dt-sc-testimonial-carousel-wrapper">
                <ul class="dt-sc-testimonial-carousel">
                    <li>
                        <div class="dt-sc-testimonial"> 
                            <div class="author">
                                <img alt="" src="<?php $this->url_templet();?>images/testimonial-img1.jpg">
                            </div>
                            <div class="hr-invisible-small"></div>
                            <blockquote> Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut <br>labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation<br> ullamco laboris nisi ut aliquip ex ea commodo consequat uis aute irure dolor </blockquote>
                            <div class="author-detail">
                                Jos Buttler <span>Duis aute irure</span>
                            </div>
                        </div>
                    </li>
                    <li>
                        <div class="dt-sc-testimonial"> 
                            <div class="author">
                                <img alt="" src="<?php $this->url_templet();?>images/testimonial-img2.jpg">
                            </div>
                            <div class="hr-invisible-small"></div>
                            <blockquote> Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut <br>labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation<br> ullamco laboris nisi ut aliquip ex ea commodo consequat uis aute irure dolor </blockquote>
                            <div class="author-detail">
                                Sarah Taylor <span>Duis aute irure</span>
                            </div>
                        </div>
                    </li>
                    <li>
                        <div class="dt-sc-testimonial"> 
                            <div class="author">
                                <img alt="" src="<?php $this->url_templet();?>images/testimonial-img3.jpg">
                            </div>
                            <div class="hr-invisible-small"></div>
                            <blockquote> Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut <br>labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation<br> ullamco laboris nisi ut aliquip ex ea commodo consequat uis aute irure dolor </blockquote>
                            <div class="author-detail">
                                Lydia Greenway <span>Duis aute irure</span>
                            </div>
                        </div>
                    </li>
                    <li>
                        <div class="dt-sc-testimonial"> 
                            <div class="author">
                                <img alt="" src="<?php $this->url_templet();?>images/testimonial-img4.jpg">
                            </div>
                            <div class="hr-invisible-small"></div>
                            <blockquote> Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut <br>labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation<br> ullamco laboris nisi ut aliquip ex ea commodo consequat uis aute irure dolor </blockquote>
                            <div class="author-detail">
                                Steve Smith <span>Duis aute irure</span>
                            </div>
                        </div>
                    </li>
                    <li>
                        <div class="dt-sc-testimonial"> 
                            <div class="author">
                                <img alt="" src="<?php $this->url_templet();?>images/testimonial-img2.jpg">
                            </div>
                            <div class="hr-invisible-small"></div>
                            <blockquote> Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut <br>labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation<br> ullamco laboris nisi ut aliquip ex ea commodo consequat uis aute irure dolor </blockquote>
                            <div class="author-detail">
                                Sarah Taylor <span>Duis aute irure</span>
                            </div>
                        </div>
                    </li>
                </ul>
                <div class="carousel-arrows">
                    <a href="#" class="carousel-prev"></a>
                    <a href="#" class="carousel-next"></a>
                </div>
            </div>  
        </div>  
        <div class="clear"></div>                 
        <div class="hr-invisible"></div>
    </section><!-- End of Primary Section -->   
</div><!-- End of Main -->