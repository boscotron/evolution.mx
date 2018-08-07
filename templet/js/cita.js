jQuery(function ($) { 
    console.log('hola');
    let fecha = "";
    let servicios = [];
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
        $("#div_paso_2").hide(50);
        $("#div_paso_3").show(200);
    });

    $("#btn_paso_r2").click(function(){
        console.log('regresar al paso 2');
        $("#div_paso_3").hide(50);
        $("#div_paso_2").show(200);
    });

      $("#btn_paso_2").click(function(){
        console.log('paso 3');
        $("#div_paso_2").hide(50);
        $("#div_paso_3").show(200);
    });

    function mostrarServicios(){
        $.ajax({
            url: location.origin + '/citaws',
            type: 'post',
            dataType: 'json',
            success: function(res) {
                console.log(res);
                $("#servicios").html('');
                servicios = res.out.servicios;
                console.log(servicios);
                
                servicios.forEach(element => {
                    $("#servicios").append(new Option(element, element));
                });

            },
            error: function(res) {
                console.log(res);
            },
            data: {}
        });
    }
    function mostrarPersonal(){}



    function mostrarHorario(){
        let data = {
            personal:$("#personal option:selected").val(),
            fecha:fecha,
            servicio:$("#servicios option:selected").val()
        };
        console.log(data);
        if(data.personal!="" && data.fecha!="" && data.servicio!="" ){
            $.ajax({
                url: location.origin + '/citaws',
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
    $("#btn_guardar").click(function(){
        mostrarHorario();
    });
    $("#dpt").datepicker({
        dateFormat: "D, M d, yy",
        altField: "#altField",
        altFormat: "yy-mm-dd"
    });
    $('#dpt').on('change', function() {
        fecha =  $("#altField").val(); 
    });
});