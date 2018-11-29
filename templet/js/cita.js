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

    function mostrarPersonal(data){
        console.log(data);
        
    	$.ajax({
            url: location.origin + '/personalws/',
            type: 'post',
            dataType: 'json',
            success: function(res) {
                console.log(res);
                $("#personal").html('');
                personal = res.out.ResultadoNombre.otFm;
                ServicioPersonal = res.out.resultado.otFm;

                console.log(personal);
                console.log(ServicioPersonal);
                if(personal!=undefined)
                    for (var i = 0 ; i < personal.length ; i++) {
                        $("#personal").append(new Option(personal[i].nombre, personal[i].perfil_principal));
                        //console.log(personal[i]);
                        //personal[i];
                    }
            },
            error: function(res) {
                console.log(res);
            },
            data: data
        });
    }
    function verPersonaHorario(data){
    	$.ajax({
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
        });
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