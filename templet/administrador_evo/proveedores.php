<div class="main">
	<h1>Lista de proveedores</h1>
	<h5>
            <a href="#" id="agregarNuevo"> <i class="fa fa-add"></i> Agregar nuevo proveedor </a>
        </h5>
	<div class="row">
		<div class="col"></div>
		<div class="col-4">
			<table id='listaPROV'></table>
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
					<label for="nombre">Nombre</label>
					<input type="text" class="form-control" id="nombre" aria-describedby="emailHelp" placeholder="Enter email">
					<small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
				</div>

				<div class="form-group">
					<label for="telefono">Teléfono</label>
					<input type="phone" class="form-control" id="telefono" aria-describedby="emailHelp" placeholder="Enter email">
					<small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
				</div>
			
				<button id="guardar" class="btn btn-primary">Guardar</button>
				
			</form>

			</div>
		</div>
	</div>
</div>