<style>
.preferencias-empledo, .form-group{
    width: 20%;
    float: left;
    margin: 0 15%;
    min-width: 60px;
}
.borde-redondeado{
    border-radius:5px;
    padding:20px;
}
.fondo-amanecer{
    /* Permalink - use to edit and share this gradient: http://colorzilla.com/gradient-editor/#e1ffff+0,e1ffff+7,e1ffff+12,fdffff+12,e6f8fd+30,c8eefb+54,bee4f8+75,b1d8f5+100;Blue+Pipe+%232 */
background: rgb(225,255,255); /* Old browsers */
background: -moz-linear-gradient(top, rgba(225,255,255,1) 0%, rgba(225,255,255,1) 7%, rgba(225,255,255,1) 12%, rgba(253,255,255,1) 12%, rgba(230,248,253,1) 30%, rgba(200,238,251,1) 54%, rgba(190,228,248,1) 75%, rgba(177,216,245,1) 100%); /* FF3.6-15 */
background: -webkit-linear-gradient(top, rgba(225,255,255,1) 0%,rgba(225,255,255,1) 7%,rgba(225,255,255,1) 12%,rgba(253,255,255,1) 12%,rgba(230,248,253,1) 30%,rgba(200,238,251,1) 54%,rgba(190,228,248,1) 75%,rgba(177,216,245,1) 100%); /* Chrome10-25,Safari5.1-6 */
background: linear-gradient(to bottom, rgba(225,255,255,1) 0%,rgba(225,255,255,1) 7%,rgba(225,255,255,1) 12%,rgba(253,255,255,1) 12%,rgba(230,248,253,1) 30%,rgba(200,238,251,1) 54%,rgba(190,228,248,1) 75%,rgba(177,216,245,1) 100%); /* W3C, IE10+, FF16+, Chrome26+, Opera12+, Safari7+ */
filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#e1ffff', endColorstr='#b1d8f5',GradientType=0 ); /* IE6-9 */
}
.fondo-atardecer{
    /* Permalink - use to edit and share this gradient: http://colorzilla.com/gradient-editor/#f1e767+0,feb645+100&0.5+0,0.5+100;Yellow+3D */
background: -moz-linear-gradient(top, rgba(241,231,103,0.5) 0%, rgba(254,182,69,0.5) 100%); /* FF3.6-15 */
background: -webkit-linear-gradient(top, rgba(241,231,103,0.5) 0%,rgba(254,182,69,0.5) 100%); /* Chrome10-25,Safari5.1-6 */
background: linear-gradient(to bottom, rgba(241,231,103,0.5) 0%,rgba(254,182,69,0.5) 100%); /* W3C, IE10+, FF16+, Chrome26+, Opera12+, Safari7+ */
filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#80f1e767', endColorstr='#80feb645',GradientType=0 ); /* IE6-9 */
}

.btn-group-vertical-dias {
    width:40%;
}

.btn-group-vertical-servicios {
    width:60%;
}
.btn-group-vertical .btn{
    text-align: left;
}
.btn-group-vertical i{
    position: absolute;
    right: 10px;
    top: 12px;
}
</style>

<div class="row">
    <div class="col-md-12">
       
    <div class="container">
    <input type = "text" id="id_perfil" value="<?php echo $data['id_perfil']; ?>">
    <div class="row">
        <div class="col-lg-12">
            <h2>Horario y habilidades</h2>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <center>
            <form class="contact-form" method="post" name="enqform" action="php/send.php">
            
                <div class="col-lg-10">
                    <div  data-delay="300" data-animation="fadeIn">
                       
                        <div class="row">
                            <div class="col-md-6 fondo-amanecer borde-redondeado">
                                <h4>Matutino</h4>
                                <div class="form-group">
                                    <label for="horario_mat_ini">Inicio</label>
                                    <select class="form-control form-control-sm" id="horario_mat_ini">
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="horario_mat_fin">final</label>
                                    <select class="form-control form-control-sm" id="horario_mat_fin">
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6 fondo-atardecer borde-redondeado">
                                <h4>Vespertino</h4>
                                <div class="form-group">
                                    <label for="horario_ves_ini">Inicio</label>
                                    <select class="form-control form-control-sm" id="horario_ves_ini">
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="horario_ves_fin">final</label>
                                    <select class="form-control form-control-sm" id="horario_ves_fin">
                                    </select>
                                </div>
                        
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <h3>Dias laborables</h3>
                                <div class="btn-group-vertical btn-group-vertical-dias " role="group" id="botones_dias" aria-label="Basic example">
                               
                                </div>
                            </div>
                            <div class="col-md-6">
                                <h3>Servicios</h3>
                                <div class="btn-group-vertical btn-group-vertical-servicios" role="group" id="botones_servicios" aria-label="Basic example">
                               
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-10">
                    
                </div>
                
                <div class="col-lg-10">
                    <button type="button" id="boton_guardar" class="btn btn-success">Guardar</button>
                </div>
            </form>
            </center>
            <div id="ajax_contactform_msg"> </div>	
        </div>
        
    </div>
</div>
</div>
</div>