jQuery(function ($) {  
    //console.log('hola');
    let fecha = "";
    let servicios = [];
    let personal = [];
    let ServicioPersonal = [];
    $(".hidden").hide(0);
 

    function select_lista_perfiles(){
        let id_perfil = $("#id_perfil").val();
        console.log(id_perfil);
        if(id_perfil!=undefined && id_perfil!=''){
            $.ajax({
                url: location.origin + '/perfilws/lista_perfiles/',
                type: 'post',
                dataType: 'json',
                success: function(res) {
                    console.log(res);
                    
                    let lista = res.perfil.otFm;
                    console.log(lista);
                    let selec = $("#cita_id_perfil").val();
                    let h = '<option value="sinSeleccion" selected>Selecciona...</option>';
                    lista.forEach(e => {
                        let s = (selec==e.ID_F)?'selected':'';
                        h = h + '<option  value="'+e.ID_F+'" '+s+'>'+e.nombre+'</option>';
                    });
                    $("#select_lista_perfiles").html(h);

                
                },
                error: function(res) {
                    console.log(res);
                },
                data: {}
            });
        }else{
            swal({
                type: "error",
                title: "Error al solicitar perfiles",
                showConfirmButton: true,
                confirmButtonText: "Cerrar",
                closeOnConfirm: true
                }).then((result)=>{
                if(result.value){
                   window.location = "cita";
                   }
               });
        }
    }
    select_lista_perfiles();


    $("#btn_paso_1").click(function(){
        console.log('paso 2');
        let valor = $("#select_lista_perfiles option:selected").val();
        console.log(valor);

        if (valor !== 'sinSeleccion') {
           
            mostrarServicios();
            $("#div_paso_1").hide(50);
            $("#div_paso_2").show(200);
        }else{
            swal(
              'Debes seleccionar para quien es el servicio!',
              'Pulsa el botón para continuar!',
              'warning'
            )

            }
    });

    $("#btn_paso_r1").click(function(){
        console.log('regresar al paso 1');
        $("#div_paso_2").hide(50);
        $("#div_paso_1").show(200);
        
    });

    $("#btn_paso_2").click(function(){
        console.log('paso 3');
        let fecha = $("#dpt").val();
        console.log(fecha);
        let servicios_seleccionados = [];
        $('.servicios_seleccionados').each(function(){

            servicios_seleccionados.push($("option:selected",this).val());

        });
        console.log('servicios_seleccionados',servicios_seleccionados);
            
        if(fecha!=''){
            mostrarPersonal({
                servicios:servicios_seleccionados,
                fecha:fecha
            });
            $("#div_paso_2").hide(50);
            $("#div_paso_3").show(200);
        }else{
            swal({
                type: "warning",
                title: "Selecione una fecha",
                showConfirmButton: true,
                confirmButtonText: "Cerrar",
                closeOnConfirm: true
                }).then((result)=>{
               
               });
        }
        
    });

    $("#btn_paso_r2").click(function(){
        console.log('regresar al paso 2');
        $("#div_paso_3").hide(50);
        $("#div_paso_2").show(200);
    });



    function mostrarServicios(){
        var fn_select = function (d=[]) {
            $(".servicios_p").each(function(e){
                let h = $(this).html();
                if(h.trim()===''){
                    $(".servicios_p").html('<select class="servicios_seleccionados"><option value="">Seleccionar</option></select>');
                    for (var i = 0 ; i < d.servicios.length ; i++) {
                        let selected  = (d.id==d.servicios[i].ID_F) ? true:false;
                        $(this).find('select').append(new Option(d.servicios[i].nombre, d.servicios[i].ID_F,0,selected));
                    }  
                    $(".servicios_p").addClass('servicios_final');
                    $(".servicios_final").removeClass('servicios_p');
                }
            });
        }
        $.ajax({
            url: location.origin + '/serviciows/',
            type: 'post',
            dataType: 'json',
            success: function(res) {
                console.log(res);
                $("#servicios").html('');
                servicios = res.out.lista.otFm;
                console.log(servicios);
                if(servicios!=null){
                    $("#lista_servicios").html('<div id="listado"><p class="servicios_p"></p></div><p><button class="btn btn-info btn-sm btn-flat" id="agregar_servicio">Agregar servicio</button></p>');
                    
                    $("#agregar_servicio").on('click', function(){
                        $.when($("#listado").append('<p class="servicios_p"></p>')).done(function () {
                            fn_select({servicios:servicios,id:id});
                        });   

                    });
                    let id = $("#cita_nombre").val();
                    fn_select({servicios:servicios,id:id});
                }else{ 
                    swal({
                        type: "warning",
                        title: "Selecione una fecha",
                        showConfirmButton: true,
                        confirmButtonText: "Cerrar",
                        closeOnConfirm: true
                        }).then((result)=>{
                       
                       });
                }

            },
            error: function(res) {
                console.log(res);
            },
            data: {}
        });
    }
 


  /*  function selectHorario(inicio,fin){
        for ( i = inicio ; i < fin; i++) {
            $("#horario").append(new Option(i+"Hrs",i));
           console.log(i+"Hrs");
           //personal[i];
       }
    }*/

    function listaDias(d=[]) {
        let dias =d.dia;
        let ID_F =d.ID_F;
        let horas_dia =[0,1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23];
        let horasOcupadas ={0:0,1:0,2:0,3:0,4:0,5:0,6:0,7:0,8:0,9:0,10:0,11:0,12:0,13:0,14:0,15:0,16:0,17:0,18:0,19:0,20:0,21:0,22:0,23:0};
        let total_horas = 0;
        let temp_horas = 0;
        let hora_entrada = 0;
        let hora_salida = 0;
        let ciclo = 0;
        let porcentaje = 100 / 24;
        
        let hora_ocupada = '<div class="progress-bar bg-success" role="progressbar" style="width: '+porcentaje+'%" aria-valuenow="'+porcentaje+'" aria-valuemin="0" aria-valuemax="100"></div>';
        let hora_libre = '<div class="progress-bar bg-dark" role="progressbar" style="width: '+porcentaje+'%" aria-valuenow="'+porcentaje+'" aria-valuemin="0" aria-valuemax="100"></div>';
        
        dias.forEach(e => {
            if(diasActivos[e]==1){
                $("#listado_dias").append(
                ' <div class="row"><div class="col-md-4">SERVICIO</div><div class="col-md-4"><div class="" data-delay="100" data-animation="fadeIn"><p>Quien quieres que te atienda</p><p><select id="personal_'+ID_F+'"></select></p></div></div><div class="col-md-4"><div class="" data-delay="300" data-animation="fadeIn"><p>Horario: <select id="horario_'+ID_F+'"></select></p></div></div></div>');
                if(horario_general[e]!=''&&horario_general[e]!=undefined){
                    console.log("d",d);
                    
                    let turnos = horario_general[e].length;
                    //console.log('turnos '+e+':',turnos);
                    if(turnos==1){
                        hora_entrada = horario_general[e][0].h_entrada;
                        console.log('hora_entrada['+e+']',hora_entrada);
                        hora_salida = horario_general[e][0].h_salida;
                        console.log('hora_salida['+e+']',hora_salida);
                        temp_horas = hora_salida - hora_entrada;
                        horas_dia.forEach(element => {
                            //console.log(horasOcupadas[element]);
                            if(horas_dia[element]<hora_entrada-1){
                                horasOcupadas[element] = 0;
                            }else if(horas_dia[element]>hora_salida-1){
                                horasOcupadas[element] = 0;
                            }else{
                                horasOcupadas[element] = 1;
                            }
                            let progress = (horasOcupadas[element]==1)?hora_ocupada:hora_libre;
                            //$('#progress_horas_'+e).append(progress);
                        });
                        //console.log('horas ocupadas '+e+'',horasOcupadas);
                    }else{
                        for(ciclo = 0 ; ciclo < turnos ; ciclo++){
                            hora_entrada = horario_general[e][ciclo].h_entrada;
                            console.log('hora_entrada['+e+']',hora_entrada);
                            hora_salida = horario_general[e][ciclo].h_salida;
                            console.log('hora_salida['+e+']',hora_salida);
                            temp_horas = hora_salida - hora_entrada;
                            total_horas += temp_horas;
                            horas_dia.forEach(element => {
                                //console.log(horasOcupadas[element]);
                                if(horas_dia[element]<hora_entrada-1){
                                    //horasOcupadas[element] = 0;
                                }else if(horas_dia[element]>hora_salida-1){
                                    //horasOcupadas[element] = 0;
                                }else{
                                    horasOcupadas[element] = 1;
                                }
                            });
                        }
                      
                        horas_dia.forEach(element => {
                            if(horasOcupadas[element]==1){
                                $("#horario_"+ID_F).append('<option value="'+element+'">'+element+' hrs</option>');
                                $("#horario_"+ID_F).append('<option value="'+element+'">'+element+' hrs</option>');
                            }
                        });
                        horasOcupadas = {};
                    }
                    console.log('horas ocupadas '+e+'',horasOcupadas);
                    let t_horas = (turnos==1)?temp_horas:total_horas;
                   // $("#totalHoras_"+e).append('<small>'+t_horas+' horas en total</small>');
                    total_horas = 0;
                
                }
            }
        });
    }
    let diasActivos = [];
    let horario_general = [];
    function mostrarPersonal(data){
        console.log(data,location.origin + '/citaws/verPersonaHorario');
        
    	$.ajax({
            url: location.origin + '/citaws/verPersonaHorario',
            type: 'post',
            dataType: 'json',
            success: function(res) {
                console.log(res);
                $("#personal").html('');
                diasActivos =res.out.empleado[0].diasActivos;
                horario_general =res.out.empleado[0].dias;
                let servicios = res.out.catalogo_servicios.otFm;
                console.log(servicios);
                
                console.log(diasActivos);
                console.log(horario_general);
                $("#listado_dias").html('');
                if(servicios!=undefined)
                    servicios.forEach(e => {
                        listaDias({
                            ID_F:e.ID_F,
                            nombre:e.nombre,
                            servicio:e,
                            foto_perfil:e.foto_perfil,
                            dia:[res.out.dia_semana_nombre]
                        });
                    });
                
             /*   personal = res.out.ResultadoNombre.otFm;
                ServicioPersonal = res.out.resultado.otFm;

                console.log(personal);
                console.log(ServicioPersonal);
                if(personal!=undefined)
                    for (var i = 0 ; i < personal.length ; i++) {
                        $("#personal").append(new Option(personal[i].nombre, personal[i].perfil_principal));
                        //console.log(personal[i]);
                        //personal[i];
                    }
                    */
            },
            error: function(res) {
                console.log(res);
            },
            data: data
        });
    }
    function verPersonaHorario(data){
    	/*$.ajax({
            url: location.origin + '/citaws/verPersonaHorario',
            type: 'post',
            dataType: 'json',
            success: function(res) {
                console.log(res);
                
                let horario = res.out.horario;
                console.log(horario);
                $("#horario").html('');
                
                for ( let i = 0 ; i < horario.length; i++) {
                    $("#horario").append(new Option(horario[i]+" Hrs",horario[i]));
                    //console.log(i+"Hrs");
                }                
            },
            error: function(res) {
                console.log(res);
            },
            data: data
        });*/
    }

    $( "#personal" ).click(function() {
        //console.log('hola');
      
        verPersonaHorario({
            servicios:$("#servicios option:selected").val(),
            fecha:$("#dpt").val(),
            persona:$("#personal").val(),
        });

    });

    $( "#dpt" ).change(function() {
        console.log('hola');
        
    });

    function guardarCita(){

           let data = { servicios:$("#servicios option:selected").val(),
            persona:$("#personal option:selected").val(),
            horario:$("#horario option:selected").val(),
            id_perfil:$("#select_lista_perfiles option:selected").val(),
            fecha:$("#dpt").val()}

    	$.ajax({
            url: location.origin + '/citaws/guardarCita',
            type: 'post',
            dataType: 'json',
            success: function(res) {
                console.log(res);
                if(res.out.error!=''){
                    swal({
                        type: "error",
                        title: res.out.error,
                        showConfirmButton: true,
                        confirmButtonText: "Cerrar",
                        closeOnConfirm: true
                        }).then((result)=>{
                        if(result.value){
                            verPersonaHorario({
                                servicios:$("#servicios option:selected").val(),
                                fecha:$("#dpt").val(),
                                persona:$("#personal").val(),
                            });
                           //window.location = "cita";
                           }
                       });
                }else{
                    $.when(swal({
                        type: "success",
                        title: "¡Cita agendada!",
                        showConfirmButton: true,
                        confirmButtonText: "Cerrar",
                        closeOnConfirm: true
                        }).then((result)=>{
                            if(result.value){
                                window.location = location.origin+"/cita";
                            }
                       })).done(function (){
                           $(".swal2-container ").on("click",function () {
                            window.location = location.origin+"/cita";
                           });
                       });      

                }
            },
            error: function(res) {
                console.log(res);
            },
            data: data
        });
    }



	/*$("#dpt").datepicker({
        minDate:0,
    });*/
   


    $("#btn_guardar").click(function(){
       
       guardarCita();

    });

    function alerta(d=[]){
        //window.location:cita;
         swal({
             type: "success",
             title: "¡Cita agendada!",
             showConfirmButton: true,
             confirmButtonText: "Cerrar",
             closeOnConfirm: true
             }).then((result)=>{
             if(result.value){
                window.location = "cita";
                }
            });
    }






    /*("#dpt").datepicker({
        dateFormat: "D, M d, yy",
        altField: "#altField",
        altFormat: "yy-mm-dd"
    });
    $('#dpt').on('change', function() {
        fecha =  $("#altField").val(); 
    });*/
});