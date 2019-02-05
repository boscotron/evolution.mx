<div class="main">
	<h1>Lista de pedidos</h1>
	<h5>
            <a href="#" id="agregarNuevo"> <i class="fa fa-add"></i> Agregar nuevo pedido </a>
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
					<label for="sucursal">Sucursal</label>
					<input type="text" class="form-control" id="sucursal" aria-describedby="sucursallHelp" placeholder="Enter sucursal">
					<small id="sucursal" class="form-text text-muted">Datos obligatorios para poder guardar</small>
				</div>

				<div class="form-group">
					<label for="proveedor">Proveedor</label>
					<input type="text" class="form-control" id="proveedor" aria-describedby="responsablelHelp" placeholder="Enter Proveedor">
					<small id="proveedor" class="form-text text-muted">Datos obligatorios para poder guardar</small>
				</div>

                <div class="form-group">
					<label for="productos">Productos</label>
					<input type="text" class="form-control" id="productos" aria-describedby="responsablelHelp" placeholder="Enter Productos">
					<small id="productos" class="form-text text-muted">Datos obligatorios para poder guardar</small>
				</div>

                 <div class="form-group">
					<label for="estatus">Estatus</label>
					<input type="text" class="form-control" id="estatus" aria-describedby="responsablelHelp" placeholder="Enter Estatus">
					<small id="estatus" class="form-text text-muted">Datos obligatorios para poder guardar</small>
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