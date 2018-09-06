<div class="container">
	<div class="row">
		<div class="col-lg-2">
		</div>
		<div class="col-lg-6">
			<center>
			<form class="contact-form" method="post" name="enqform" action="php/send.php">
		        <div class="col-lg-10">
		        	<div data-delay="100" data-animation="fadeIn">
		                <p><input type="text" name="username" placeholder="Nombre (requerido)" required/> </p>
		            </div>
		        </div>
		        <div class="col-lg-10">
		        	<div  data-delay="300" data-animation="fadeIn">
		        		<p><input type="text" required name="txtname" placeholder="Telefono (requerido)"/></p>
		                <p><input type="text" name="txtedad" placeholder="Edad (requerido)" required/></p>
		                <p><input id="datepicker" type="text" placeholder="Fecha de Nacimiento" value="" name="datepicker"><span class="icons fa fa-calendar"></span></p>
		            </div>
		        </div>
			    <div class="col-lg-10">
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
		    </center>
			<div id="ajax_contactform_msg"> </div>	
		</div>
		<div class="col-lg-4">
			<div class="container">
				<div class="row justify-content-end ">
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
	        </div> 
	        <div class="container"> 
	            <div class="row justify-content-end" >
	            	<div class="hr-invisible"></div>
	            	<div class="hr-invisible"></div>
	            	<div class="hr-invisible"></div>
	            	<div class="btn-container-right" data-animation="fadeIn">
			      		<button type="button" class=" btn btn-success btn-lg"><h4>Reservar cita </h4></button>
					</div>
	            </div>
	        </div>    
		</div>
	</div>
</div>

<div class="hr-invisible"></div>


