<div class="row">
    <div class="col-md-12">
       <h1>Administrador de Productos</h1>
    </div>
</div>

<div class="row">
    <div class="col-sm-12 col-md-12 col-lg-6" >
       <h2 class="lista_proveedores">Lista de Productos</h1>
     
       <table id="listado_proveedores_tabla" class="display" style="width:100%">
</table>
    </div>
    <div class="col-sm-12 col-md-12 col-lg-6" id="datos">
        <h2 onclick="ver_perfil()">Editar productos</h1>

        <style>
            .btn_tabs {width:50%;}
        </style>
        <div class="row">
            <div class="col-md-12">
                <div class="btn-group btn-block" role="group" aria-label="Basic example">
                    <button type="button" class="btn btn_tabs btn-secondary active" data-div="perfil">Perfil</button>
                    <button type="button" class="btn btn_tabs btn-secondary" data-div="modulos">Módulos</button>
                </div>
            </div>
        </div>
        <div class="row">


            <div class="container div_tabs" id="div_perfil">
                <input type = "hidden" id="id_perfil" value="<?php echo $data['id_perfil']; ?>">
                <div class="row">
                    <div class="col-lg-12">
                        <center>
                        <form class="contact-form" method="post" name="enqform" action="php/send.php">
                            <div class="col-lg-10">
                                <div data-delay="100" data-animation="fadeIn">
                                    <p><input type="text" id="prod_nombre" name="username" placeholder="Nombre (requerido)" required/> </p>
                                </div>
                            </div>
                            <div class="col-lg-10">
                                <div  data-delay="300" data-animation="fadeIn">
                                    <p><input type="text" id="prod_precio"  required name="txtname" placeholder="Precio (requerido)"/></p>
                                    <p><input type="text" id="prod_provedor"  required name="txtname" placeholder="Proveedor (requerido)"/></p>
                                    <p><input id="datepicker" type="text" placeholder="Dia de Pedido" value="" name="datepicker"><span class="icons fa fa-calendar"></span></p>
                                </div>
                            </div>
                            <div class="col-lg-10" id="div_tipo_de_usuario">
                            <h4>Tipo de usuario <div id="tipo_de_usuario"></div> </h4>
                                 <div class="btn-group" role="group">
                                    <button type="button" id="btn_tipo_usuario_cliente" class="btn btn-secondary cambiar_tipo" data-tipo="cliente">Cliente</button>
                                    <button type="button" id="btn_tipo_usuario_empledo" class="btn btn-secondary cambiar_tipo" data-tipo="empleado">Empledos</button>
                                    <button type="button" id="btn_tipo_usuario_admin" class="btn btn-secondary cambiar_tipo" data-tipo="admin">Administrador</button>
                                </div>
                          
                                 <div class="btn-group" role="group" id="opciones_empleado">
                                    <a type="button" href="<?php echo $this->url_inicio();?>perfil/preferencias-empledo/" id="btn_preferencias_empledo" class="btn btn-secondary" data-tipo="cliente">Editar preferencias</a>
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
            <div class="container div_tabs" id="div_modulos">
                <div id="listado_modulo_tabla">
                </div>
            </div>

            <div class="hr-invisible"></div>


   
        </div>
    </div>
</div>