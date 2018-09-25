<div class="row">
    <div class="col-md-12">
       <h1>Usuarios Administrador</h1>
    </div>
</div>

<div class="row">
    <div class="col-sm-6" id="lista">
       <h2>Lista de usuarios</h1>
       <div class="list-group" id="listado_usuario" >
     Cargando usuario...
</div>
    </div>
    <div class="col-sm-6" id="datos">
        <h2 onclick="ver_perfil()">Editar usuario</h1>
        <div class="row">


            <div class="container">
                <input type = "hidden" id="id_perfil" value="<?php echo $data['id_perfil']; ?>">
                <div class="row">
                    <div class="col-lg-12">
                        <center>
                        <form class="contact-form" method="post" name="enqform" action="php/send.php">
                            <div class="col-lg-10">
                                <div data-delay="100" data-animation="fadeIn">
                                    <p><input type="text" id="perfil_nombre" name="username" placeholder="Nombre (requerido)" required/> </p>
                                </div>
                            </div>
                            <div class="col-lg-10">
                                <div  data-delay="300" data-animation="fadeIn">
                                    <p><input type="text" id="perfil_telefono"  required name="txtname" placeholder="Telefono (requerido)"/></p>
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
                            <div class="col-lg-10" id="div_tipo_de_usuario">
                            <h4>Tipo de usuario <div id="tipo_de_usuario"></div> </h4>
                                 <div class="btn-group" role="group">
                                    <button type="button" id="btn_tipo_usuario_cliente" class="btn btn-secondary cambiar_tipo" data-tipo="cliente">Cliente</button>
                                    <button type="button" id="btn_tipo_usuario_empledo" class="btn btn-secondary cambiar_tipo" data-tipo="empleado">Empledos</button>
                                    <button type="button" id="btn_tipo_usuario_admin" class="btn btn-secondary cambiar_tipo" data-tipo="admin">Administrador</button>
                                </div>
                          
                                 <div class="btn-group" role="group" id="opciones_empleado">
                                    <a type="button" href="<?php echo $this->url_inicio();?>perfil/preferencias-empledo/" id="btn_preferencias_empledo" class="btn btn-secondary cambiar_tipo" data-tipo="cliente">Editar preferencias</a>
                                </div>
                            </div>
                            <div class="col-lg-10">
                                <button type="button" id="boton_guardar" class="btn btn-success">Guardar</button>
                                <button type="button" id="boton_historial" class="btn btn-success">Historial</button>
                            </div>
                        </form>
                        </center>
                        <div id="ajax_contactform_msg"> </div>	
                    </div>
                    
                </div>
            </div>

            <div class="hr-invisible"></div>


   
        </div>
    </div>
</div>

