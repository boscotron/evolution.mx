


<div class="column dt-sc-one-third">
                    	
	<form class="contact-form" method="post" name="enqform" action="php/send.php">
        <div class="column dt-sc-two-half first">
        	<div class="animate" data-delay="100" data-animation="fadeIn">
                <p><input type="text" name="username" placeholder="Nombre (requerido)" required/> </p>
                <p><input type="email" name="txtemail" placeholder="Email (requerido)" required/></p>                                                        
            </div>
        </div>
        <div class="column dt-sc-one-half">
        	<div class="animate" data-delay="300" data-animation="fadeIn">
                <p><input type="text" required name="txtname" placeholder="Your Phone (requerido)"/></p>
                <p><input id="datepicker" type="text" placeholder="Date of Appointment" value="" name="datepicker"><span class="icons fa fa-calendar"></span></p>
            </div>
        </div>
        <div class="column dt-sc-one-column">
        	<div class="animate" data-delay="500" data-animation="fadeIn">
            	<p><textarea class="message" required rows="10" placeholder="Comments(required)" cols="5" name="txtmessage"></textarea></p>
            </div>
        </div>                                                                                             
        <div class="form-row aligncenter animate" data-delay="7 00" data-animation="fadeIn">
            <input type="submit" value="submit" name="submit">
        </div>
    </form>
	<div id="ajax_contactform_msg"> </div>
</div>