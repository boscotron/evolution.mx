<div class="container mt-0 py-1 ">
	<div class="row ">
		<div class="col-12 pb-3">
			<h1 class="display-3 text-center">Proveedores</h1>
		</div>
	</div>
	<div class="row">
		<div class="col-3">
		</div>
		<div class="col-6 color_ text-center">
			<a href="#formulario_" id="agregarNuevo"> <i class="fa fa-add"></i> Agregar nuevo proveedor </a>
		</div>
		<div class="col-4">
		</div>
	</div>	

	<div class="row">
		<div class="row">
			<div class="main">
				<div class="col-6">
					<table id='listaPROV'></table>
				</div>
				<div class="col-6"></div>
			</div>
		</div>
	</div>	

</div>

<div class="main">
	<div class="row">
		<div class="col"></div>
		<div class="col-6">
			<!-- <table id='listaPROV'></table> -->
		</div>
		<div class="col"></div>
	</div>
	<div class="row">
		<div class="col">
			<div id="resultado">
				
			</div>
			
			<div id="formulario">	
				<form id="formulario_">

					<div class="form-group">
						<label for="nombre">Nombre</label>
						<input type="text" class="form-control" id="nombre" aria-describedby="nombre" placeholder="Enter Nombre">
						<small id="nombreHelp" class="form-text text-muted">Datos obligatorios para poder guardar</small>
					</div>

					<div class="form-group">
						<label for="telefono">Teléfono</label>
						<input type="text" class="form-control" id="telefono" aria-describedby="phonelHelp" placeholder="Enter Telefono">
						<small id="phoneHelp" class="form-text text-muted">Datos obligatorios para poder guardar</small>
					</div>

					<div class="form-group">
						<label for="direccion">Dirección</label>
						<input type="text" class="form-control" id="direccion" aria-describedby="addresslHelp" placeholder="Enter Dirección">
						
					</div>

					<div class="col-sm-4">
						<div class="form-group">
								<p>Dia de pedido <input type="text" id="dia_pedido"></p>         
						</div> 
					</div>
				
					<button id="guardar" class="btn btn-primary">Guardar</button>
					
				</form>

			</div>
		</div>
	</div>
</div>