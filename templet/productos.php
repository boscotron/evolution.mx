<?php $page= "productos"; ?>
<?php echo ($this->modoEditor())?'<input type="hidden" value="1" id="modoEditor"><input type="hidden" value="" id="id_marca">':''; ?>
<link href="<?php $this->url_templet();?>css/prettyPhoto.css" rel="stylesheet" type="text/css" /> 

<div id="marcas_ventana" style="position: fixed;
    z-index: 10000;
    width: 60%;
    margin: 0 20%;">
    <div class="card " style="width: 100%;">
        <div class="card-body">
            <h5 class="card-title">Marcas</h5>
            <p class="card-text">
                <div class="row">
                    <div class="col-md-4">
                    Nombre de la Marca  
                    </div>
                    <div class="col-md-8">
                        <input type="text" id="nombre_marca" value="">
                        <input type="hidden" id="id_marca" value="">
                    </div>
                </div>
            </p>
            <a href="#" class="btn btn-primary" id="marca_cerrar">Cerrar</a>
            <a href="#" class="btn btn-warning" id="marca_borrar">Borrar marca</a>
            <a href="#" class="btn btn-primary" id="marca_guardar">Guardar cambios</a>
        </div>
    </div>
</div>

<div class="bsk_editar_producto editor_ventana" style="    position: fixed;
    z-index: 10000;
    width: 40%;
    margin: 0 20%;" id="productos_ventana">
<div class="card " style="width: 100%;">
  <div class="card-body">
    <h5 class="card-title" id="pnt_nombre_producto">Editando el producto {NOMBRE}</h5>
    <p class="card-text">
        <div class="row" id="cel_formulario">
            <div class="row">
                <div class="col-3">
                    Nombre de Producto
                </div>
                <div class="col-6">
                    <input type="text" name="NomP" id="NomP" size="25">
                </div>
                <div class="col-3">
                <label for="NomPestado"><input type="checkbox" name="NomPestado" id="NomPestado" value="visible">Visible</label>
                </div>
                <div class="col-3">
                            Codigo de Producto
                        </div>
                        <div class="col-6">
                            <input type="text" name="CodP" id="CodP" size="25">
                        </div>
                        <div class="col-3">
                        <label for="CodPestado"><input type="checkbox" name="CodPestado" id="CodPestado" value="visible">Visible</label>
                        </div>
                        </div> 
                        <div class="col-3">
                            Precio
                        </div>
                        <div class="col-6">
                            <input type="text" name="PreP" id="PreP" size="25">
                        </div>
                        <div class="col-3">
                        <label for="PrePestado"><input type="checkbox" name="PrePestado" id="PrePestado" value="visible">Visible</label>
                        </div>
                        <div class="col-3">
                            Descripción
                        </div>
                        <div class="col-6">
                            <input type="text" name="DesP" id="DesP" size="25">
                        </div>
                        <div class="col-3">
                        <label for="DesPestado"><input type="checkbox" name="DesPestado" id="DesPestado" value="visible">Visible</label>
                        </div>
            </div>
            </div>

            <div class="row" id="productos_detalles_editar" >
                <div class="column dt-sc-one-third">
                    <div id="pnt_foto_producto">
                    </div>
                <br />
                <img id="foto_producto" width="100%" height="100%" src="" />
                </div>
 
            </div>

        </div>
    </p>
    <a href="#" class="btn btn-primary" id="editor_cerrar">Cerrar</a>
    <a href="#" class="btn btn-warning" id="producto_borrar" data-idproducto="">Borrar producto</a>
    <a href="#" class="btn btn-primary" id="editor_guardar">Guardar cambios</a>
  </div>
</div>
</div>



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

<?php echo ($this->modoEditor())?'<button class="marca_abrir">Nueva Marcas</button><button class="actualizar_productos"><i class="fa fa-refresh"></i> </button>':''; ?>
            
           
            <div class="hr-invisible-very-small"></div>
            <div class="container">
                <div class="dt-sc-sorting-container" id="botones_marcas">
                    
                   
                </div>
            </div>

            <div class="clear"></div>
            <?php
                /*for ($i=0; $i < count($categorias) ; $i++) { ?>

                     <div class="jmy_web_contador" data-page="<?php echo $page; ?>" id="no_imagenes_<?php echo $i; ?>" data-value="<?php $this->pnt('no_imagenes_'.$i,'2'); ?>" data-titulo="Número de productos en la categoría <?php echo $categorias[$i]; ?>"></div>

                <?php }*/ ?>
            <div class="dt-sc-portfolio-container isotope no-space" id="listado_productos"> <!-- **dt-sc-portfolio-container Starts Here** -->
                

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

