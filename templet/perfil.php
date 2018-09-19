<div class="container">
  <div class="row">
    <div class="hr-invisible-very-very-small"></div>
      <div class="column dt-sc-one-fourth first">
          <div class="dt-sc-team type1">
              <div class="image">
                  <img src="<?php echo RUTA_ACTUAL.BASE_TEMPLET; ?>images/productos2/iconotecitaly.fw.png" alt="" title="">
                  <div class="image-overlay">
                      <div class="team-details-social-icons">
                          <a class="fa fa-facebook" href="#"> </a>
                          <a class="fa fa-twitter" href="#"> </a>
                      </div>
                  </div>
              </div>
              <h4><a href="#"> Angel Sienna </a></h4>
              <h5>Professional Hairstylist</h5>
          </div>
                </div>
                     <div class"row"> 
                         <div class="jmy_web_contador" data-page="inicio" id="numero_de_carrusel" data-value="<?php
                    $this->pnt('numero_de_carrusel','3'); 
                    ?>" data-titulo="Inica el número de páginas a mostrar"></div>
                     </div>
                            <?php 
                            $paginas = $this->pnt('numero_de_carrusel','3',["return"=>true]); 
                            
                            $flechas =$paginas;
                            
                            $contador = 0;
                            for($i=0;$i<$paginas;$i++){ ?>
                    <div class="column dt-sc-three-fourth   jmy_web_slider" id="grupo_slider_<?php echo $i;?>" data-page="inicio"                data-tabla="vistaweb" data-marco="works-container" 




                          <?php  $va=[];	$va[] = [ "type"=>"imagen",
                           "id"=>"carr_imagen",
                            "width"=>"356",
                            "height"=>"480",
                            "url"=>$this->url_templet(["return"=>true])."images/img1.jpg"];
                        
                $va[] =["type"=>"text",
                           "id"=>"carr_titulo",
                           "value"=>$this->pnt("carr_titulo","",["return"=>true]),
                            "placeholder"=>"TituloH3"];

                $va[] =	["type"=>"text",
                           "id"=>"carr_text",
                           "value"=>$this->pnt("carr_text","",["return"=>true]),
                            "placeholder"=>"parrafo"];  ?>  data-var='<?php echo json_encode($va); ?>' >
 
        <div class="dt-sc-special-services-carousel-wrapper">
<<<<<<< HEAD
            <div class="dt-sc-special-services-carousel"> 
=======

           <div class="jmy_web_contador" data-page="perfil" id="numero_de_carrusel" data-value="<?php
        $this->pnt('numero_de_carrusel','3'); 
        ?>" data-titulo='Minimo puedes ver 3 imagenes, máximo "n" números '></div>

            <div class="dt-sc-special-services-carousel">

           <?php 
         $paginas = $this->pnt('numero_de_carrusel','3',["return"=>true]); 
         
         $flechas =$paginas;                     
         
                $contador = 0;
                for($i=0;$i<$paginas;$i++){ ?>


>>>>>>> 1700b684412567b7acf64c4d95d1ee61b5993677
                  <div class="column dt-sc-one-third">
                      <div class="dt-sc-service type2">
                          <figure class="gallery-thumb">
                              <a href="#">
                                  <img class="dt-sc-filter" title="" alt="" src="<?php echo RUTA_ACTUAL.BASE_TEMPLET; ?>images/productos2/iconotecitaly.fw.png">
                              </a>
                          </figure>
                          <div class="hr-invisible-very-small"></div>
                          <h3><a href="#"> Cutting & Styling </a></h3>
                          <h4>Lorem ipsum dolor sit amet consectetur adipiscing</h4>
                      </div>
                  </div>
<<<<<<< HEAD
               
            </div> 
               
           <!-- <div class="bx-controls bx-has-controls-direction">
=======
                 <?php } ?>
                  
            </div><!--  
            <div class="bx-controls bx-has-controls-direction">
>>>>>>> 1700b684412567b7acf64c4d95d1ee61b5993677
              <div class="bx-controls-direction">
                <a class="bx-prev" href="">Prev</a>
                <a class="bx-next" href="">Next</a>
              </div>
<<<<<<< HEAD
            </div>  --> 

        </div>  <?php  } ?> <!-- Fotos termina carruzel --> 
=======
            </div>    --> 
        </div> <!-- Fotos -->
>>>>>>> 1700b684412567b7acf64c4d95d1ee61b5993677
      </div>
  </div>
</div>

<div class="container">
  <div class="row">
    <div class="hr-invisible"></div>
    <div class="hr-invisible-very-very-small"></div>
    <div class="column dt-sc-one-sixth first">
        <div class="column dt-sc-one-third">
            <div class="dt-sc-ico-content type1">
                <div class="icon">
                    <span class="fa fa-desktop"> </span>
                </div>
                <h5>
                    <a href="#"> Puntos <br/> Evolution  </a>
                </h5>
            </div>
        </div>
    </div>

    <div class="col-lg-2">

    </div>

    <div class="col-lg-8">
      <nav class="navbar navbar-expand-lg navbar-dark bg-success">
          <a class="navbar-brand" href="#">Descubre</a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>

          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
              <li class="nav-item active">
                <a class="nav-link" href="#">Mis puntos <span class="sr-only">(current)</span></a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">Promociones</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">Nuevo</a>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  Hoy 
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                  <a class="dropdown-item" href="#">Lavado gratis</a>
                  <a class="dropdown-item" href="#">uñas</a>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item" href="#">corte</a>
                </div>
              </li>
            </ul>
          </div>
        </nav>
    </div>

  </div>
</div> 

<?php include $data['carga_centro']; ?>

<div class="hr-invisible"></div>