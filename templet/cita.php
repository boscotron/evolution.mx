<link href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/themes/base/jquery-ui.css" rel="stylesheet" type="text/css"/>
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.6.2/jquery.min.js"></script>
    <script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/jquery-ui.min.js"></script>
    
    <script type="text/javascript">
	$(document).ready(function() {
		$("#datepicker").datepicker();
	});
	</script>
<div id="main"><!-- Main -->
        	<div class="hr-invisible-small"></div>
        	<section class="fullwidth-background">
        		<div class="breadcrumb-wrapper">
                    <div class="container">
                        <h4> Our contact details </h4>
                        <h6><a href="index.html">Home</a> / Contact</h6>
                    </div>
                </div>                
            </section>
            <div class="hr-invisible-very-small"></div>
            <div class="clear"></div>
            <section id="primary" class="content-full-width"><!-- Primary Section -->
            	<h2 class="border-title aligncenter"> Our Salon Location </h2>
                <div class="clear"></div>
                <div class="hr-invisible-medium"></div>
                <div class="container">
                    <div class="column dt-sc-one-third first">
                        <h3 class="border-title"> Opening <span>Time</span> </h3>
                        <ul class="opening-time branch_details">
                            <li class="close"><span>Paso 1</span><h5>Elige para quien es el servicio</h5></li>
                            <li><span>Paso 2</span><h5>Elige el servicio</h5></li>
                            <li><span>Paso 3</span><h5>Elige la hora y fecha</h5></li>
                          
                        </ul>
                    </div>


                    <div class="column dt-sc-two-third" id="div_paso_1">
                    	<h3 class="border-title">Paso <span>Uno</span></h3>
                    	<div class="contact-form" >
                            <div class="column dt-sc-one-half first">
                            	<div class="" data-delay="100" data-animation="fadeIn">
                                    <p>Para quien es el servicio</p>                                                        
                                </div>
                            </div>
                            <div class="column dt-sc-one-half">
                            	<div class="" data-delay="300" data-animation="fadeIn">
                                    <p><select>
                                            <option value="Seleccionarar">Seleccionar</option>
                                            <option value="Personal">Personal</option>
                                            <option value="Hijo">Hijo(a)</option>
                                            <option value="Pareja">Pareja</option>
                                            <option value="Amigos">Amigos</option>
                                        </select></p>
                                </div>
                            </div>                                                                                             
                            <div class="form-row aligncenter " data-delay="7 00" data-animation="fadeIn">
                                <button type="button" id="btn_paso_1">Paso 2</button>
                            </div>
                        </div>
                    	<div id="ajax_contactform_msg"> </div>
                    </div>



                    <div class="column dt-sc-two-third hidden" id="div_paso_2">
                    	<h3 class="border-title">Paso <span>Dos</span></h3>
                    	<div class="contact-form" >
                            <div class="column dt-sc-one-half first">
                                <div class="" data-delay="100" data-animation="fadeIn">
                                    <p>Selecciona el servicio</p>                                                        
                                </div>
                            </div>
                            <div class="column dt-sc-one-half">
                                <div class="" data-delay="300" data-animation="fadeIn">
                                    <p><select id="servicios">
                                            <!--<option value="">Seleccionar</option>
                                            <option value="">Cortes</option>
                                            <option value="">Tintes</option>
                                            <option value="">Mechas</option>
                                            <option value="">Rayos</option>
                                            <option value="">Manicure</option>
                                            <option value="">Pedicure</option>
                                            <option value="">Maquillaje</option>
                                            <option value="">Tratamientos </option>-->
                                        </select></p>
                                </div>
                            </div>                                                                                             
                            <div class="form-row aligncenter " data-delay="7 00" data-animation="fadeIn">
                                <div class="column dt-sc-one-half first">
                                    <div class="" data-delay="100" data-animation="fadeIn">
                                        <button type="button" id="btn_paso_r1">Regresar</button>  
                                    </div>
                                </div>
                                <div class="column dt-sc-one-half">
                                    <div class="" data-delay="300" data-animation="fadeIn">
                                        <button type="button" id="btn_paso_2">Paso 3</button>                
                                    </div>
                                </div>
                            </div>
                        </div>
                    	<div id="ajax_contactform_msg"> </div>
                    </div>


                    <div class="column dt-sc-two-third hidden" id="div_paso_3">
                        <h3 class="border-title">Paso <span>Tres</span></h3>
                        <div class="contact-form" >
                            <div class="column dt-sc-one-half first">
                                <div class="" data-delay="100" data-animation="fadeIn">
                                    
                                    <p>
                                    <input id="altField" type="hidden" />
                                    <input id="dpt" type="text" placeholder="Fecha de la cita" value="" name="dpt"><span class="icons fa fa-calendar"></span></p>
                                    <p>Quien quieres que te atienda</p>
                                    <p><select id="personal">
                                            <option value="">Seleccionar</option>
                                            <option value="Cualquiera">Cualquiera</option>
                                            <option value="Alfredo">Alfredo</option>
                                            <option value="Esmeralda">Esmeralda</option>
                                            <option value="Aida">Aida</option>
                                            <option value="Beatris">Beatris</option>
                                        </select></p>
                                </div>
                            </div>
                            <div class="column dt-sc-one-half">
                                <div class="" data-delay="300" data-animation="fadeIn">
                                    <!-- <p>Hora <input type="time" name="hora" value="00:00:00" step="1"></p>--><p>Horario: 
                                        <select id="horario">
                                            <option value="">09:00 am</option>
                                            <option value="">10:00 am</option>
                                            <option value="">11:00 am</option>
                                            <option value="">12:00 pm</option>
                                            <option value="">13:00 pm</option>
                                            <option value="">14:00 pm</option>
                                            <option value="">15:00 pm</option>
                                            <option value="">16:00 pm</option>
                                            <option value="">17:00 pm</option>
                                            <option value="">18:00 pm</option>
                                            <option value="">19:00 pm</option>
                                            <option value="">20:00 pm</option>
                                        </select></p>

                                </div>
                            </div>

                            <div class="form-row aligncenter " data-delay="7 00" data-animation="fadeIn">
                                <div class="column dt-sc-one-half first">
                                    <div class="" data-delay="100" data-animation="fadeIn">
                                        <button type="button" id="btn_paso_r2">Regresar</button>  
                                    </div>
                                </div>
                                <div class="column dt-sc-one-half">
                                    <div class="" data-delay="300" data-animation="fadeIn">
                                        <button type="button" id="btn_guardar">Ver disponibilidad</button>                
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="ajax_contactform_msg"> </div>
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
        </div><!-- End of Main -->