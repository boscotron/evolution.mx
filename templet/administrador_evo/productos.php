<div class="main">
	<h1>Lista de productos</h1>
	<h5>
            <a href="#" id="agregarNuevo"> <i class="fa fa-add"></i> Agregar nuevo producto </a>
    </h5>
	<div class="row">
		<div class="col"></div>
		<div class="col-4">
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
					<label for="nombre">Nombre</label>
					<input type="text" class="form-control" id="nombre" aria-describedby="emailHelp" placeholder="Enter nombre">
					<small id="emailHelp" class="form-text text-muted">Datos obligatorios para poder guardar.</small>
				</div>

				<div class="form-group">
					<label for="precio">Precio</label>
					<input type="precio" class="form-control" id="precio" aria-describedby="precioHelp" placeholder="Enter precio">
					<small id="precioHelp" class="form-text text-muted">Datos obligatorios para poder guardar.</small>
				</div>

				<div class="form-group">
					<label for="proveedor">Proveedor</label>
					<input type="proveedor" class="form-control" id="proveedor" aria-describedby="proveedorHelp" placeholder="Enter proveedor">
					<small id="proveedorHelp" class="form-text text-muted">Datos obligatorios para poder guardar.</small>
				</div>

				<div class="form-group">
					<label for="cantidad">Cantidad</label>
					<input type="cantidad" class="form-control" id="cantidad" aria-describedby="cantidadHelp" placeholder="Enter cantidad">
					
				</div>
			
				<div class="form-group">
					<label for="fecha_compra">Fecha de Compra</label>
					<input type="fecha_compra" class="form-control" id="fecha_compra" aria-describedby="fecha_compralHelp" placeholder="Enter fecha de compra">
					
				</div>

				<div class="form-group">
					<label for="fecha_venta">Fecha de Venta</label>
					<input type="fecha_venta" class="form-control" id="fecha_venta" aria-describedby="ventalHelp" placeholder="Enter fecha de venta">
					
				</div>

				<button id="guardar" class="btn btn-primary">Guardar</button>
				
			</form>

			</div>
		</div>
	</div>
</div>