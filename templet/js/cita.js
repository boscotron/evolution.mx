jQuery(function ($) { 
    console.log('hola');
    $(".hidden").hide(0);

    $("#btn_paso_1").click(function(){
        console.log('paso 2');
        $("#div_paso_1").hide(50);
        $("#div_paso_2").show(200);

    });

      $("#btn_paso_2").click(function(){
        console.log('paso 3');
        $("#div_paso_2").hide(50);
        $("#div_paso_3").show(200);
    });



});