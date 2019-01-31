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

$("#inf").hide(50);

$("#reservacion_cita").click(function(){
    $("#adultos").html('');
    $("#ninos").html('');
    $("#habitaciones").html('');
    for (var i = 0; i <= 8; i++) {
        if(i != 0){
            $("#adultos").append('<option value="'+i+'">'+i+'</option>');
        }
        if(i<4){
            $("#ninos").append('<option value="'+i+'">'+i+'</option>');
        }
        if (i != 0 && i < 6) {
             $("#habitaciones").append('<option value="'+i+'">'+i+'</option>');
        }

    }
    var adultos = $("#adultos option:selected").val();
    var ninos = $("#ninos option:selected").val();
    var habitacion = $("#habitaciones option:selected").val();
    console.log(adultos,ninos,habitacion);
    
    console.log("hola");
    $("#inf").show(100);
    $("#inf").toggle();
});

$(".cerrar").click(function(){
   $("#inf").hide(50); 
})

$(".enviar").on("click",function(){
    console.log("hola");
    guardarReservacion();
    $("#reservacion_cita").val('1 Adulto - 0 Niños - 1 Habitación');
    $("#txtCheckin").val('Fecha de Entrada');
    $("#txtCheckout").val('Fecha de Salida');
   
});

$("#adultos").change(function(){
    $("#reservacion_cita").html('');
    seleccionar();
});
$("#ninos").change(function(){
    $("#reservacion_cita").html('');
    seleccionar();

});

$("#ninos").change(function(){
    $('#edad_ninos').html('');
    seleccionar();
    var cantidad_ninos = Number($("#ninos option:selected").val());
    console.log(cantidad_ninos);
    for (var i = 1; i <= cantidad_ninos ; i++) {
        $('#edad_ninos').append('<p>Menor '+i+'</p><select class="menores" id="menor_'+i+'"></select>');
        for (var x = 0 ; x <= 17 ; x++) {
            $('#menor_'+i).append('<option>'+((x==0)?'<1':x)+'</option>');
        }
    }
});

$("#habitaciones").change(function(){
    $("#reservacion_cita").html('');
    seleccionar();
});

function seleccionar(){
    $("#reservacion_cita").html('');
    var adultos = $("#adultos option:selected").val();
    var ninos = $("#ninos option:selected").val();
    var habitacion = $("#habitaciones option:selected").val();
    $("#reservacion_cita").val(adultos + ((adultos<2)?' Adulto - ':' Adultos - ') + ninos + ((ninos==1)?' Niño -':' Niños -')+habitacion+((habitacion<2)?' Habitación':' Habitaciones'));
    console.log('adultos',adultos,"ninos",ninos,"habi",habitacion);
    $("#reservacion_cita").val(adultos + ((adultos<2)?' Adulto - ':' Adultos - ') + ninos + ((ninos==1)?' Niño - ':' Niños - ')+habitacion+((habitacion<2)?' Habitación':' Habitaciones'));
    console.log('adultos',adultos,"ninos",ninos,"habi",habitacion); 
}

function guardarReservacion(){
    console.log("Datos a guardar");
    let datosReservacion = {
        fechaI:$("#txtCheckin").val(),
        fechaF:$("#txtCheckout").val(),
        adultos: $("#adultos option:selected").val(),
        nino:  $("#ninos option:selected").val(),
        habitacion: $("#habitaciones option:selected").val()
    }
    $.ajax({
        url:location.origin + '/reservacionws',
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

});