<link href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/themes/base/jquery-ui.css" rel="stylesheet" type="text/css"/>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.6.2/jquery.min.js"></script>
<script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/jquery-ui.min.js"></script>
<style type="text/css">
    #inf{
        position: relative;
        background: rgba(201, 76, 76, 0.3);
        width: 150px;
        height: 200px;
        border-color: blue;
    };

</style>

<div id="main"><!-- Main -->
        	<div class="hr-invisible-small"></div>
        	<section class="fullwidth-background">
        		<div class="breadcrumb-wrapper">
                    <div class="container">
                        <h4> Hotel X </h4>
                        <h6><a href="index.html">Inicio</a></h6>
                    </div>
                </div>  
              
            </section>
            <div class="hr-invisible-very-small"></div>
            <div class="clear"></div>
            <section id="primary" class="content-full-width"><!-- Primary Section -->
            	<h2 class="aligncenter">Realiza tú reservación.</h2>
                <div class="clear"></div>
                <div class="hr-invisible-medium"></div>
                <div class="container">
<!-- Parte uno -->
                    <div class="column dt-sc-three-third form-group" id="div_paso_1">
                        <h3 class="border-title">Reserva tú habitación</h3>
                        <div class="box" >
                            <!-- entrada -->
                            
                            <div class="column dt-sc-one-half first ">                                        
                                <div class="form-group">
                                    <p><input type="text"  autocomplete="off" placeholder="Entrada" id="txtCheckin" /><span class="icons fa fa-calendar"></span></p>                
                                </div>                        
                            </div> 
                            <!-- salida -->                            
                             <div class="column dt-sc-one-half">
                                <div class="form-group">
                                    <p><input type="text"  autocomplete="off" placeholder="Salida" id="txtCheckout" /><span class="icons fa fa-calendar"></span></p>              
                                </div> 
                             </div>
                            <!-- adultos,niños y habitaciones --> 
                             <div class="column dt-sc-one-half">
                                <div class="form-group">

                                        <p><input id="reservacion_cita" type="text" value="1 Adulto - 0 Niños - 1 Habitación" ><span class="icons fa fa-users"></span></p>
                                        <div id="inf" style="display:none;">
                                            Adultos <select id="adultos"></select>
                                            Niños <select id="ninos"></select>
                                            Habitaciones <select id="habitaciones"></select>
                                        </div> 
                                </div> 
                             </div>                             
                                          
                        </div>                                                                                             
                            <div class="form-row aligncenter " data-delay="7 00" data-animation="fadeIn">
                                <button type="button" id="btn_paso_1">Buscar</button>
                            </div>
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
