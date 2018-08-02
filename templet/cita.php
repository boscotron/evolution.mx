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
                            <li class="close">Instrucciones</li>
                            <li><span>Paso 1</span><h5>1.Elige para quien es el corte.</h5></li>
                            <li><span>Paso 2</span><h5>2.Elige el servicio a realizar.</h5></li>
                            <li><span>Paso 3</span><h5>3.Coloca la fecha y la hora.</h5></li>
                        </ul>
                    </div>


                    <div class="column dt-sc-two-third" id="div_paso_1">
                    	<h3 class="border-title">Paso <span>Uno</span></h3>
                    	<div class="contact-form" >
                         
                            <div class="column dt-sc-one-half">
                            	<div class="" data-delay="300" data-animation="fadeIn">
                                    <p><input id="datepicker" type="text" placeholder="Date of Appointment" value="" name="datepicker"><span class="icons fa fa-calendar"></span></p>
                                </div>
                            </div>          
                            <div class="form-row aligncenter" data-delay="7 00" data-animation="fadeIn">
                                <button type="button" id="btn_paso_1">Paso 2</button>
                            </div>
                        </div>
                    	<div id="ajax_contactform_msg"> </div>
                    </div>


                    <div class="column dt-sc-two-third hidden" id="div_paso_2">
                    	<h3 class="border-title">Paso <span>Dos</span></h3>
                    	<div class="contact-form" >
                            <div class="column dt-sc-one-half first">
                                Instrucciones paso 2
                            </div>  
                                                                                                                     
                            <div class="form-row aligncenter " data-delay="7 00" data-animation="fadeIn">
                                <button type="button" id="btn_paso_2">Paso 3</button>
                            </div>
                            <div class="form-row alignleft " data-delay="7 00" data-animation="fadeIn">
                                <button type="button" id="btn_atras_2">atras</button>
                            </div>  
                        </div>
                    	<div id="ajax_contactform_msg"> </div>
                    </div>

                    <div class="column dt-sc-two-third hidden" id="div_paso_3">
                        <h3 class="border-title">Paso <span>Tres</span></h3>
                        <div class="contact-form" >
                            <div class="column dt-sc-one-half first">
                                <div class="" data-delay="300" data-animation="fadeIn">
                                   




                                </div>
                            </div>                                                                                             
                            <div class="form-row aligncenter " data-delay="7 00" data-animation="fadeIn">
                                <button type="button" id="btn_paso_2">Agendar cita</button>
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