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
					<input type="text" class="form-control" id="precio" aria-describedby="precioHelp" placeholder="Enter precio">
					<small id="precioHelp" class="form-text text-muted">Datos obligatorios para poder guardar.</small>
				</div>

				<div class="form-group">
					<label for="proveedor">Proveedor</label>
					<input type="text" class="form-control" id="proveedor" aria-describedby="proveedorHelp" placeholder="Enter proveedor">
					<small id="proveedorHelp" class="form-text text-muted">Datos obligatorios para poder guardar.</small>
				</div>

				<div class="form-group">
					<label for="cantidad">Cantidad</label>
					<input type="text" class="form-control" id="cantidad" aria-describedby="cantidadHelp" placeholder="Enter cantidad">
					
				</div>
			
				<div class="col-sm-4">
                    <div class="form-group">
							<p>Fecha de Compra <input type="text" id="fecha_compra"></p>         
                    </div> 
                </div>

				<div class="col-sm-4">
                    <div class="form-group">
							<p>Fecha de Venta <input type="text" id="fecha_venta"></p>         
                    </div> 
                </div>

				<button id="guardar" class="btn btn-primary">Guardar</button>
				
			</form>

			</div>
		</div>
	</div>
</div>