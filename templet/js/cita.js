jQuery(function ($) {  
    //console.log('hola');
    let fecha = "";
    let servicios = [];
    let personal = [];
    $(".hidden").hide(0);
 
    $("#btn_paso_1").click(function(){
        console.log('paso 2');
        mostrarServicios();
        $("#div_paso_1").hide(50);
        $("#div_paso_2").show(200);
    });

    $("#btn_paso_r1").click(function(){
        console.log('regresar al paso 1');
        $("#div_paso_2").hide(50);
        $("#div_paso_1").show(200);
        
    });

    $("#btn_paso_2").click(function(){
        console.log('paso 3');
        mostrarPersonal();
        $("#div_paso_2").hide(50);
        $("#div_paso_3").show(200);
    });

    $("#btn_paso_r2").click(function(){
        console.log('regresar al paso 2');
        $("#div_paso_3").hide(50);
        $("#div_paso_2").show(200);
    });

    function mostrarServicios(){
        $.ajax({
            url: location.origin + '/citaws/servicios',
            type: 'post',
            dataType: 'json',
            success: function(res) {
                console.log(res);
                $("#servicios").html('');
                servicios = res.out.respuesta_servicios.otFm;
                console.log(servicios);
                
                /*servicios.forEach(element => {
                    $("#servicios").append(new Option(element, element));
                });*/

                for (var i = 0 ; i < servicios.length ; i++) {
                     $("#servicios").append(new Option(servicios[i].nombre, servicios[i].ID_F));
                }

            },
            error: function(res) {
                console.log(res);
            },
            data: {}
        });
    }
 
    function mostrarPersonal(){
    	$.ajax({
            url: location.origin + '/citaws/personal',
            type: 'post',
            dataType: 'json',
            success: function(res) {
                console.log(res);
                $("#personal").html('');
                personal = res.out.respuesta_personal.otFm;
                console.log(personal);
                for (var i = 0 ; i < personal.length ; i++) {
                	 $("#personal").append(new Option(personal[i].nombre, personal[i].ID_F));
                	//console.log(personal[i]);
                	//personal[i];
                }

            },
            error: function(res) {
                console.log(res);
            },
            data: {servicios:$("#servicios").val()}
        });
    }



    function mostrarHorario(){
        let data = {
            personal:$("#personal option:selected").val(),
            fecha:$("#dpt").val(),
            servicio:$("#servicios option:selected").val()
        };
        console.log(data);
        if(data.personal!="" && data.fecha!="" && data.servicio!="" ){
            $.ajax({
                url: location.origin + '/citaws/horario',
                type: 'post',
                dataType: 'json',
                success: function(res) {
                    console.log(res);
                
                },
                error: function(res) {
                    console.log(res);
                },
                data: data
            });
        }
    }
  /*  function selectHorario(inicio,fin){
        for ( i = inicio ; i < fin; i++) {
            $("#horario").append(new Option(i+"Hrs",i));
           console.log(i+"Hrs");
           //personal[i];
       }
    }*/
    function verPersonaHorario(data){
    	$.ajax({
            url: location.origin + '/citaws/verPersonaHorario',
            type: 'post',
            dataType: 'json',
            success: function(res) {
                console.log(res);
                $("#horario").html('');
                let horario = res.out.verPersonaHorario.otFm[0];
                //console.log(horario);
                let i,j;
                //let h_m_i = horario.horario_mat_ini;
                //let h_v_f = horario.horario_ves_fin;
                 for ( i = 8 ; i <= horario.horario_mat_fin; i++) {
                         $("#horario").append(new Option(i+"Hrs",i));
                            console.log(i+"Hrs");
                         //personal[i];
                        }
                     /*console.log(horario.horario_mat_ini);
                    console.log(horario.horario_mat_fin);
                    console.log(horario.horario_ves_ini);
                    console.log(horario.horario_ves_fin);*/

                   for ( j = horario.horario_ves_ini ; j < horario.horario_ves_fin; j++) {
                         $("#horario").append(new Option(j+"Hrs",j));
                            console.log(j+"Hrs");
                        }


                //selectHorario(h_m_i,h_v_f);
               //selectHorario(horario.horario_ves_ini,horario.horario_ves_fin);
             

            },
            error: function(res) {
                console.log(res);
            },
            data: data
        });
    }

    $( "#personal" ).change(function() {
        console.log('hola');
        verPersonaHorario({
            persona:$("#personal option:selected").val()
        });

    });

    function guardarCita(){

           let data = { servicios:$("#servicios option:selected").val(),
            persona:$("#personal option:selected").val(),
            horario:$("#horario option:selected").val(),
            fecha:$("#dpt").val()}

    	$.ajax({
            url: location.origin + '/citaws/guardarCita',
            type: 'post',
            dataType: 'json',
            success: function(res) {
                console.log(res);
          
            },
            error: function(res) {
                console.log(res);
            },
            data: data
        });
    }

    $("#btn_guardar").click(function(){
       
       guardarCita();
        // mostrarHorario();
        //console.log(fecha);
    });



    /*("#dpt").datepicker({
        dateFormat: "D, M d, yy",
        altField: "#altField",
        altFormat: "yy-mm-dd"
    });
    $('#dpt').on('change', function() {
        fecha =  $("#altField").val(); 
    });*/
});