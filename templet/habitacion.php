<div class="main">
    <div class="hr-invisible-small"></div>
    <section class="fullwidth-background">
        <div class="breadcrumb-wrapper">
            <div class="container">
                <h4> Hotel X </h4>
                <h6><a href="index.html">Habitaciones</a></h6>
            </div>
        </div>
    </section>
    <div class="hr-invisible-very-small"></div>
    <div class="clear"></div>
    <section id="primary" class="content-full-width"><!-- Primary Section -->
        <h2 class="aligncenter">Especificaciones de habitación</h2>
        <div class="clear"></div>
        <div class="hr-invisible-medium"></div>
        <div class="container">
            <div class="row">
                <div class="col-sm-1"></div>
                <div class="col-sm-10">
                    <div class="row">
                        <div class="col-sm-2">
                            <div class="form-group">
                                Número<input type="number">
                            </div> 
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <h5>Tipo de habitación</h5>
                                <div class=" col-md-12">
                                    <div class="input-group">
                                        <select 
                                        type="select" 
                                        class="custom-select  jmy_web_div" 
                                        data-lista-id="lista_de_habitaciones" 
                                        placeholder="Seleccione una habitación" 
                                        data-value="<?php $this->pnt('habitaciones'); ?>"   
                                        data-tabla="<?php echo $tabla; ?>" 
                                        data-page="<?php echo $page; ?>" 
                                        id="habitaciones" 
                                        tabindex="5"></select>
                                    </div>
                                </div>
                            </div> 
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label>Hora entrada</label>
                                <div class='input-group date' id='h_entrada'>
                                    <input type='time' class="form-control" />
                                    <span class="fa fa-clock-o"></span>
                                </div><br>
                                <label>Hora salida</label>
                                <div class='input-group date' id='h_salida'>
                                    <input type='time' class="form-control" />
                                    <span class="fa fa-clock-o"></span>
                                </div>
                            </div> 
                        </div>
                    </div>                                                
                </div>
                <div class="col-sm-1"></div>
            </div>
        </div>

            <div class="clear"></div>
            <div class="hr-invisible-medium"></div>
            <div class="fullwidth-section dt-sc-parallax-section appointment-parallax dark-bg" style="background-position: 20% 3px;">
                <div class="fullwidth-bg">
                    <div class="parallax-spacing">
                        <div class="container">
                            <h3 class="border-title">Lorem ipsum dolor sit amet, consectetur <span>Adipiscing elit</span></h3>
                            <div class="aligncenter">
                                <a href="#" class="appointment-btn btn-eff2">Book an <span>Appointment</span></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>                
            <div class="clear"></div>                
    </section> <!-- End of Primary Section -->   
</div>