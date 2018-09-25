jQuery(function ($) {  
    console.log('Preferencias de empleado');
   
    function cargar_preferencias(d=[]){
        console.log('cargar_preferencias',d);
        
        let id_perfil = $("#id_perfil").val();
        console.log('cargar_preferencias',id_perfil);
        let agregarUrl = (d.url!=undefined) ? d.url: '';
        $.ajax({
            url: location.origin + '/perfilws/preferencias-empleado'+agregarUrl+'/'+id_perfil,
            type: 'post',
            dataType: 'json',
            success: function(res) {
                console.log(res);
         
            },
            error: function(res) {
                console.log(res);
            },
            data: d.guardar
        });
    }

    cargar_preferencias();

    function guardar_preferencias(){
        let dias_laborables = [];
        $(".dias_laborables").each(function(){
            const d = $(this).data('dia');
            console.log('dia',d);
            dias_laborables.push(d);
        });
        let servicios = [];
        $(".servicios_activos").each(function(){
            const s = $(this).data('servicio');
            console.log('servicio',s);
            dias_laborables.push(s);
        });

        let guardar ={
            horario_mat_ini:$("#horario_mat_ini option:selected").val(),
            horario_mat_fin:$("#horario_mat_fin option:selected").val(),
            horario_ves_ini:$("#horario_ves_ini option:selected").val(),
            horario_ves_fin:$("#horario_ves_fin option:selected").val(),
            dias_laborables:dias_laborables,
        };
        cargar_preferencias({
            url:'-guardar',
            guardar:guardar
        });
    }
    $("#boton_guardar").on('click',function(){
        guardar_preferencias();
    });
    function servicios(){
        let servicios =['corte_mujer','corte_hombre','corte_infante','tinte','pedicure','manicure','alaciado','permanente'];
        let sele ='';
        servicios.forEach(e => {
            sele = sele + ' <button type="button" class="btn btn-secondary  toogle" data-servicio="'+e+'">'+e+' <i class="fa fa-toggle-off"></i> </button>';
        });
        $("#botones_servicios").html(sele);
        $('.toogle').on('click',function(){
            $(this).toggleClass('btn-secondary','');
            $(this).toggleClass('servicios_activos','');
            $(this).find("i").toggleClass('fa-toggle-on','fa-toggle-off');
        });
    }
    function horario() {
        let horamat =[8,9,10,11,12,13,14,15];
        let horaves =[14,15,16,17,18,19,20];
        let sele1,sele2,sele3,sele4 ='';
        
        horamat.forEach(e => {
            sele1=sele1+' <option value="'+e+'">'+e+'</option> ';
            sele2=sele2+' <option value="'+e+'">'+e+'</option> ';
        });
        
        horaves.forEach(e => {
            sele3=sele3+' <option value="'+e+'">'+e+'</option> ';
            sele4=sele4+' <option value="'+e+'">'+e+'</option> ';
        });

        $("#horario_mat_ini").html(sele1);
        $("#horario_mat_fin").html(sele2);
        $("#horario_ves_ini").html(sele3);
        $("#horario_ves_fin").html(sele4);
    }

    
    function dias(){
        let dias =['lunes','martes','miercoles','jueves','viernes','sabado','domingo'];
        let sele ='';
        dias.forEach(e => {
            sele = sele + ' <button type="button" class="btn btn-secondary  toogle" data-dia="'+e+'">'+e+' <i class="fa fa-toggle-off"></i> </button>';
        });
        $("#botones_dias").html(sele);
        $('.toogle').on('click',function(){
            $(this).toggleClass('btn-secondary','');
            $(this).toggleClass('dias_laborables','');
            $(this).find("i").toggleClass('fa-toggle-on','fa-toggle-off');
        });
    }
    servicios();
    horario();
    dias();
});