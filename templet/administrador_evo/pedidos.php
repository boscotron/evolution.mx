<div class="container ">

	<div class="row ">
		<div class="col-12 pb-1 pt-1">
			<h1 class="display-3 text-center">Pedidos</h1>
		</div>
	</div>

	<div class="row py-4 pb-4 my-4">
		<div class="col-4">	
		</div>
		<div class="col-4">
			<button id="agregarNuevo" class="agregarNuevo btn btn-success">Agregar nuevo pedido</button>
		</div>
		<div class="col-4">
		</div>
	</div>

	<div class="row">
		<div class="col-4">
		</div>
		<div class="col-4 color_amarillo" id="color_amarillo">
			<button id="cerrar_form" class="cerrar_form btn btn-success">Cerrar Formulario</button> 
		</div>
		<div class="col-4">
		</div>
	</div>
	
	<div class="row main ">
		
		<div class="col-4">
		</div>
		<div class="col-4 " id="cerrar_form2" >
			<form id="formulario" >
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
		<div class="col-4">
		</div>
		
	</div>
	<div class="row color_">
		<div class="col-12 text-center scroll_p">
			<table class="table enlistar example" id='lista'></table>
		</div>
	</div>	

<hr>


		

</div>



<?php /* 
<div class="main" id="formulario">
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
			
			<div>	
				<form >

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

					<div class="col-sm-4  ">
						<div class="form-group form_date">
								<p>Dia de pedido <input type="text" id="dia_pedido"></p>         
						</div> 
					</div>

					
				
					<button id="guardar" class="btn btn-primary">Guardar</button>
					
				</form>

			</div>
		</div>
	</div>
</div>
*/

