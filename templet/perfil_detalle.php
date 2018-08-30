<div class="col-lg-6">
	<form class="contact-form" method="post" name="enqform" action="php/send.php">
        <div class="col-lg-6">
        	<div data-delay="100" data-animation="fadeIn">
                <p><input type="text" name="username" placeholder="Nombre (requerido)" required/> </p>
            </div>
        </div>
        <div class="col-lg-6">
        	<div  data-delay="300" data-animation="fadeIn">
        		<p><input type="text" required name="txtname" placeholder="Telefono (requerido)"/></p>
                <p><input type="text" name="txtedad" placeholder="Edad (requerido)" required/></p>
                <p><input id="datepicker" type="text" placeholder="Fecha de Nacimiento" value="" name="datepicker"><span class="icons fa fa-calendar"></span></p>
            </div>
        </div>
	    <div class="col-lg-6">
	    	<div class="input-group mb-3">
				<div class="input-group-prepend">
				<label class="input-group-text" for="inputGroupSelect01">Genero</label>
				</div>
				<select class="custom-select" id="inputGroupSelect01">
					<option value="Seleccionarar">Seleccionar</option>
                    <option value="Personal">Hombre</option>
                    <option value="Hijo">Mujer</option>
				</select>
			</div>
        	        </div>
    </form>
	<div id="ajax_contactform_msg"> </div>	
</div>

	<div class="row">
		<div class="col-lg-10">
			<div class="input-group mb-3">
				<div class="input-group-prepend">
				<label class="input-group-text" for="inputGroupSelect01">Perfiles</label>
				</div>
				<select class="custom-select" id="inputGroupSelect01">
					<option selected>Selecciona...</option>
					<option value="Hijo">Hijo</option>
                    <option value="Amigo">Amigo</option>
                    <option value="Esposo">Esposo(a)</option>
				</select>
			</div>
            <button type="button" class="btn btn-success">Historial</button>
        </div>
	    <div class="col">
	      
	    </div>
	    <div class="col">
	     
	    </div>
	    
	</div>

<div class="hr-invisible"></div>

<div class="container">
	<div class="row">
	    <div class="col">
	      
	    </div>
	    <div class="col">
	     
	    </div>
	    <div class="col">
		      <div data-animation="fadeIn">
			    <input type="submit" value="Hacer cita" name="submit">
			</div>
	    </div>
	</div>
</div>