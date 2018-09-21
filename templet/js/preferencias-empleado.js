jQuery(function ($) {  
    console.log('Preferencias de empleado');
   
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
            sele = sele + ' <button type="button" class="btn btn-secondary toogle">'+e+' <i class="fa fa-toggle-off"></i> </button>';
        });
        $("#botones_dias").html(sele);
        $('.toogle').on('click',function(){
            $(this).toggleClass('btn-secondary','');
            $(this).find("i").toggleClass('fa-toggle-on','fa-toggle-off');
        });
    }
    horario();
    dias();
});