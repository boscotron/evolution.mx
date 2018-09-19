jQuery(function ($) {  
    //console.log('hola');
    let fecha = "";
    let servicios = [];
    let personal = [];
    $(".hidden").hide(0);
 
    $("#btn_paso_1").click(function(){
        console.log('paso 2');
        let valor = $("#sulfuro option:selected").val();
        console.log(valor)

        if (valor === 'Personal' || valor === 'Hijo' || valor === 'Pareja' || valor === 'Amigos') {
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
        
        if(fecha!=''){
            mostrarPersonal({
                servicios:$("#servicios option:selected").val(),
                fecha:fecha
            });
            $("#div_paso_2").hide(50);
            $("#div_paso_3").show(200);
        }else{
           swal(
              'Debes seleccionar una fecha!',
              'Pulsa el botón para continuar!',
              'warning'
            )
        }
        
    });

    $("#btn_paso_r2").click(function(){
        console.log('regresar al paso 2');
        $("#div_paso_3").hide(50);
        $("#div_paso_2").show(200);
    });



    function mostrarServicios(){
        $.ajax({
            url: location.origin + '/serviciows/',
            type: 'post',
            dataType: 'json',
            success: function(res) {
                console.log(res);
                $("#servicios").html('');
                servicios = res.out.otFm;
                console.log(servicios);
                
                /*servicios.forEach(element => {
                    $("#servicios").append(new Option(element, element));
                });*/
                if(servicios!=null){
                    for (var i = 0 ; i < servicios.length ; i++) {
                        $("#servicios").append(new Option(servicios[i].nombre, servicios[i].ID_F));
                    }
                }else{ 
                    alerta('Seleccione una fecha para ver la disponibilidad');
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
    	$.ajax({
            url: location.origin + '/personalws/',
            type: 'post',
            dataType: 'json',
            success: function(res) {
                console.log(res);
                $("#personal").html('');
                personal = res.out.resultado.otFm;
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
            data: data
        });
    }
    function verPersonaHorario(data){
    	$.ajax({
            url: location.origin + '/citaws/verPersonaHorario',
            type: 'post',
            dataType: 'json',
            success: function(res) {
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
        console.log('hola');
      
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
       alerta();

    });

    function alerta(mensaje){
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