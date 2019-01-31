<div class="main">
	<h1>Lista de sucursales</h1>
	<h5>
            <a href="#" id="agregarNuevo"> <i class="fa fa-add"></i> Agregar nueva sucursal </a>
    </h5>
	<div class="row">
		<div class="col"></div>
		<div class="col-4
		">
			<table id='lista'></table>
		</div>
		<div class="col"></div>
	</div>
	<div class="row">
		<div class="col">
			
			<div id="resultado">

			</div>
			<div id="formulario">	
			<form>

				<div class="form-group">
					<label for="direccion">Dirección</label>
					<input type="adreess" class="form-control" id="direccion" aria-describedby="addresslHelp" placeholder="Enter Dirección">
					<small id="phoneHelp" class="form-text text-muted">Datos obligatorios para poder guardar</small>
				</div>

				<div class="form-group">
					<label for="telefono">Teléfono</label>
					<input type="phone" class="form-control" id="telefono" aria-describedby="phonelHelp" placeholder="Enter Telefono">
					<small id="phoneHelp" class="form-text text-muted">Datos obligatorios para poder guardar</small>
				</div>

				<div class="form-group">
					<label for="responsable">Responsable</label>
					<input type="responsable" class="form-control" id="responsable" aria-describedby="responsablelHelp" placeholder="Enter Responsable">
					<small id="responsableHelp" class="form-text text-muted">Datos obligatorios para poder guardar</small>
				</div>
			
				<button id="guardar" class="btn btn-primary">Guardar</button>
				
			</form>

			</div>
		</div>
	</div>
</div>