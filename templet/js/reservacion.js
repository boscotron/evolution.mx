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


// $("#reservacion_cita").click(function(){
//     $("inf").each(function(){
//          displaying = $(this).css("display");
//         if(displaying == "block") {
//           $(this).fadeOut('slow',function() {
//            $(this).css("display","none");
//           });
//         } else {
//           $(this).fadeIn('slow',function() {
//             $(this).css("display","block");
//           });
//         }
//     })
// })


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

    $("#inf").show(100);
});

$(document).click(function(e){
    var div_inf = $("#reservacion_cita");
    if (!div_inf.is(e.target) && !div_inf.has(e.target).length === 0) { 
        $("#inf").hide(50);              
    }
});

$("#adultos").change(function(){
    $("#reservacion_cita").html('');
    var adultos = $("#adultos option:selected").val();
    var ninos = $("#ninos option:selected").val();
    var habitacion = $("#habitaciones option:selected").val();
    $("#reservacion_cita").val(adultos + ((adultos<2)?' Adulto - ':' Adultos - ') + ninos + ((ninos==1)?' Niño -':' Niños -')+habitacion+((habitacion<2)?' Habitación':' Habitaciones'));
    console.log('adultos',adultos,"ninos",ninos,"habi",habitacion);
});
$("#ninos").change(function(){
    $("#reservacion_cita").html('');
    var adultos = $("#adultos option:selected").val();
    var ninos = $("#ninos option:selected").val();
    var habitacion = $("#habitaciones option:selected").val();
    $("#reservacion_cita").val(adultos + ((adultos<2)?' Adulto - ':' Adultos - ') + ninos + ((ninos==1)?' Niño -':' Niños -')+habitacion+((habitacion<2)?' Habitación':' Habitaciones'));
    console.log('adultos',adultos,"ninos",ninos,"habi",habitacion);

});

$("#habitaciones").change(function(){
    $("#reservacion_cita").html('');
    var adultos = $("#adultos option:selected").val();
    var ninos = $("#ninos option:selected").val();
    var habitacion = $("#habitaciones option:selected").val();
    $("#reservacion_cita").val(adultos + ((adultos<2)?' Adulto - ':' Adultos - ') + ninos + ((ninos==1)?' Niño -':' Niños -')+habitacion+((habitacion<2)?' Habitación':' Habitaciones'));
    console.log('adultos',adultos,"ninos",ninos,"habi",habitacion);

});

});