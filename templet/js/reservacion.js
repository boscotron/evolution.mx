jQuery(function($){
    $(document).ready(function () {
     // $("#txtCheckin").datepicker({minDate:0});
            $("#txtCheckin").datepicker({
                minDate:0,
                language: 'es',
                dateFormat: "dd-M-yy",
                onSelect: function (date) {
                    var date2 = $('#txtCheckin').datepicker('getDate');
                    date2.setDate(date2.getDate());
                    $('#txtCheckout').datepicker('setDate', date2);
                    //sets minDate to dateofbirth date + 1
                    $('#txtCheckout').datepicker('option', 'minDate', date2);
                }
            });
            $('#txtCheckout').datepicker({
                dateFormat: "dd-M-yy",
                onClose: function () {
                    var dt1 = $('#txtCheckin').datepicker('getDate');
                    console.log(dt1);
                    var dt2 = $('#txtCheckout').datepicker('getDate');
                    if (dt2 <= dt1) {
                        var minDate = $('#txtCheckout').datepicker('option', 'minDate');
                        $('#txtCheckout').datepicker('setDate', minDate);
                    }
                }
            });
    });
    mostrarHabitaciones();
    function mostrarHabitaciones(){
        var hab_unicas = [];
        $.ajax({
            url:location.origin + '/reservacionws/verHabitacion',
            type:'post',
            dataType:'json',
            success:function(respuesta){
                let hab = respuesta.out.tipo_hab.otFm;

                console.log(hab);
                if(hab!=undefined){
                    $('#habitaciones').html('');
                    $('#habitaciones').append('<option>Seleccionar</option>');
                    hab.forEach(element => {
                        hab_unicas.push(element.habitacion);  
                    });

                    let sinRepetir = hab_unicas.filter((valor, indiceActual, arreglo) => arreglo.indexOf(valor) === indiceActual);

                    sinRepetir.forEach(ele=>{
                         $('#habitaciones').append('<option>'+ele+'</option>');
                    });
                }else{
                    $('#habitaciones').html('');
                    $('#habitaciones').append('<option>No hay habitaciones</option>');
                }

            },error: function(res) {
                console.log(res);
            },
            data:{}
        });
    }
    $("#adultos").html('');
    $("#ninos").html('');
    for (var i = 0; i <= 8; i++) {
        if(i != 0){
            $("#adultos").append('<option value="'+i+'">'+i+'</option>');
        }
        if(i<4){
            $("#ninos").append('<option value="'+i+'">'+i+'</option>');
        }
    }

    $("#inf").hide(50);

    $("#reservacion_cita").click(function(){
        var adultos = $("#adultos option:selected").val();
        var ninos = $("#ninos option:selected").val();
        var habitacion = $("#habitaciones option:selected").val();
        console.log(adultos,ninos,habitacion);
        
        $("#inf").show(100);
        //$("#inf").toggle();
    });

    $(".enviar").click(function() {
       $("filtro_habitacion").html("");
       mostrarTodasHabitaciones();

    });

    $(".cerrar").click(function(){
       $("#inf").hide(50); 
    })

    /*$(".enviar").on("click",function(){
        //console.log("hola");
        guardarReservacion();
        $("#reservacion_cita").val('1 Adulto - 0 Niños - 1 Habitación');
        $("#adultos option:selected").val("1");
        $("#ninos option:selected").val("0");
        $("#habitaciones option:selected").val("1");
        //$('#edad_ninos').html('');
        $("#txtCheckin").val('Fecha de Entrada');
        $("#txtCheckout").val('Fecha de Salida');   
    });*/

    $("#adultos").change(function(){
        $("#reservacion_cita").html('');
        seleccionar();
    });

    $("#ninos").change(function(){
        $("#reservacion_cita").html('');
        $('#edad_ninos').html('');
        seleccionar();
        var cantidad_ninos = Number($("#ninos option:selected").val());
        console.log(cantidad_ninos);
        for (var i = 1; i <= cantidad_ninos ; i++) {
            $('#edad_ninos').append('Menor '+i+'<select class="menores" id="menor_'+i+'" data-menor="menor'+i+'"></select>');
            for (var x = 0 ; x <= 17 ; x++) {
                $('#menor_'+i).append('<option>'+((x==0)?'<1':x)+'</option>');
            }
        }
    });

   /* $("#habitaciones").change(function(){
        $("#disponibilidad").html('');
        let hab = $('#habitaciones option:selected').val();
        let num_hab = 0;
        if(hab=="Individual"){
            num_hab = 5;
        }else if(hab=="Doble"){
            num_hab = 10;
        }else if(hab=="Suite"){
            num_hab = 3;
        }
        if(num_hab!=0){
            for (var i = 1; i <= num_hab; i++) {
                $("#disponibilidad").append('<div><label class="checkbox-inline"><input type="checkbox" value=""> Cuarto '+i+'</label></div>');
            }
        }
    });*/

    function seleccionar(){
        $("#reservacion_cita").html('');
        var adultos = $("#adultos option:selected").val();
        var ninos = $("#ninos option:selected").val();
        $("#reservacion_cita").val(adultos + ((adultos<2)?' Adulto - ':' Adultos - ') + ninos + ((ninos==1)?' Niño':' Niños'));
        console.log('adultos',adultos,"ninos",ninos);
    }

    function guardarReservacion(){  
        console.log("Datos a guardar");
        let edad_menores = [];
        $(".menores").each(function(){
            let edadM = $("option:selected",this).val();
            let data = $(this).data("menor");
            //console.log(data,edad);
            let m = {menor:data,edad:edadM};
            edad_menores.push(m);
        });
        console.log(edad_menores);
        let datosReservacion = {
            fechaI: $("#txtCheckin").val(),
            fechaF: $("#txtCheckout").val(),
            adultos: $("#adultos option:selected").val(),
            nino: ((edad_menores.length>0)?edad_menores:0),
            habitacion: $("#habitaciones option:selected").val()
        }
        $.ajax({
            url:location.origin + '/reservacionws/guardarReservacion',
            type:'post',
            dataType:'json',
            success:function(respuesta){
                console.log(respuesta);  
            },error: function(res) {
                console.log(res);
            },
            data:{
                "datosReservacion":datosReservacion
            }
        });
        console.log(datosReservacion);
    }

    function mostrarTodasHabitaciones(){
        let datoHabitacion = {
            // fechaI: $("#txtCheckin").val(),
            // fechaF: $("#txtCheckout").val(),
            habitacion: $("#habitaciones option:selected").val()
        }
        // let datoFechaI = {
        //     fechaI: $("#txtCheckin").val()
        // }
        console.log(datoHabitacion);
         $.ajax({
            url:location.origin + '/reservacionws/mostrarHabitacion',
            type:'post',
            dataType:'json',
            success:function(respuesta){
                console.log("respuesta",respuesta);
                var datosHabitacion = respuesta.out.t_habitacion.otFm;
                datosHabitacion.forEach(ele=>{
                    $(".filtro_habitacion").append('<button class="text-capitalize agendar"style ="height: 50px; width: 40px;margin: 15px 10px; float:left; background: #03cbf8d1; border: none; border-radius:10px;">'+ele.habitacion+'</button>');
                });
            $("filtro_habitacion").html("");      
            },error: function(res) {
                console.log(res);
            },
            data:{"datoHabitacion":datoHabitacion}
        }); 

    }

});

// <div class="btn-group btn-group-toggle" data-toggle="buttons">
//   <label class="btn btn-secondary active">
//     <input type="radio" name="options" id="option1" autocomplete="off" checked> Active
//   </label>