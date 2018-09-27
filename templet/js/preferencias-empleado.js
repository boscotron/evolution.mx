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
                let data = res.preferencias.ver.ot[res.preferencias.ver.otKey[0]];
                console.log('data',data);
                
                servicios({select:JSON.parse(data.servicios)});
                horario({
                    horario_mat_ini:data.horario_mat_ini,
                    horario_ves_fin:data.horario_ves_fin,
                    horario_mat_fin:data.horario_mat_fin,
                    horario_ves_ini:data.horario_ves_ini,
                });
                dias({select:JSON.parse(data.dias_laborables)});
            },
            error: function(res) {
                console.log(res);
            },
            data: {guardar:d.guardar}
        });
    }

    cargar_preferencias();

    function guardar_preferencias(){
        let dias_laborables = [];
        $(".dias_laborables").each(function(){
            const d = $(this).data('dia');
            console.log('que día quiero guardar',d);
            dias_laborables.push(d);
        });
        let servicios = [];
        $(".servicios_activos").each(function(){
            const s = $(this).data('servicio');
            console.log('servicio',s);
            servicios.push(s);
        });

        let guardar ={
            horario_mat_ini:$("#horario_mat_ini option:selected").val(),
            horario_mat_fin:$("#horario_mat_fin option:selected").val(),
            horario_ves_ini:$("#horario_ves_ini option:selected").val(),
            horario_ves_fin:$("#horario_ves_fin option:selected").val(),
            dias_laborables:dias_laborables,
            servicios:servicios,
        };
        cargar_preferencias({
            url:'-guardar',
            guardar:guardar
        });
    }
    $("#boton_guardar").on('click',function(){
        guardar_preferencias();
    });
    function servicios(d=[]){
        const id = (d.id!=undefined)?d.id:'';
        $.ajax({
            url: location.origin + '/serviciows/'+id,
            type: 'post',
            dataType: 'json',
            success: function(res) {
                console.log(res);
                let servicios = res.out.lista.otFm;
                let sele ='<button type="button" class="btn btn-secondary nuevo_servicio" >Nuevo servicio <i class="fa fa-toggle-off"></i> </button>';
                console.log(d.select);
                
                
                let selec=(d.select!=undefined)?d.select:[];
                servicios.forEach(e => {
                    let impSelect = {
                        class:"btn-secondary",
                        icon:"fa-toggle-off",
                    };
                    selec.forEach(sel => {                
                        impSelect = (e.ID_F==sel) ?{
                            class:"",
                            icon:"fa-toggle-on",
                        }:impSelect;
                    });
                    sele = sele + ' <button type="button" class="btn '+impSelect.class+'  toogle_servicios" data-servicio="'+e.ID_F+'">'+e.nombre+' - '+e.tiempo_estimado+'  <i class="fa '+impSelect.icon+'"></i> </button>';
                });
                $("#botones_servicios").html(sele);
                $('.nuevo_servicio').on('click',function(){
                    swal({
                        type: "info",
                        title: 'Nuevo Servicio<p>Indica el nombre del nuevo servicio</p><p> <input id="nuevo_servicio" type="text" placeholder="Nombre del nuevo servicio"></p><p>Indica la duración de servicio</p><p> <input id="nuevo_tiempo_estimado" type="text" placeholder="Duración de servicio"></p>',
                        showConfirmButton: true,
                        confirmButtonText: "Guardar",
                        closeOnConfirm: true
                        }).then((result)=>{
                            if(result.value){
                                console.log('swal',result);
                                let nombre = $('#nuevo_servicio').val();
                                if(nombre!=''){
                                    servicios_guardar({
                                        id:'nuevo',
                                        nombre:$('#nuevo_servicio').val(),
                                        tiempo_estimado:$('#nuevo_tiempo_estimado').val(),
                                            });
                                    //window.location = "cita";
                                    }
                                }
                       });
                });
                $('.toogle_servicios').on('click',function(){
                    $(this).toggleClass('btn-secondary','');
                    $(this).toggleClass('servicios_activos','');
                    $(this).find("i").toggleClass('fa-toggle-on','fa-toggle-off');
                });
         
            },
            error: function(res) {
                console.log(res);
            },
            data: d.guardar
        });
    }
    function servicios_guardar(d=[]){
        console.log('servicios_guardar',d);
        servicios({
            id:'nuevo',
            guardar:{
                nombre:d.nombre,
                tiempo_estimado:d.tiempo_estimado
            }
        });
    }
    function horario(d=[]) {
       // console.log('horario',d);
        let horamat =[8,9,10,11,12,13,14,15];
        let horaves =[14,15,16,17,18,19,20];
        let sele1,sele2,sele3,sele4 ='';
        horamat.forEach(e => {
            sele1=sele1+' <option value="'+e+'" '+((d.horario_mat_ini==e) ? 'selected' : '' )+'>'+e+'</option> ';
            sele2=sele2+' <option value="'+e+'" '+((d.horario_mat_fin==e) ? 'selected' : '' )+'>'+e+'</option> ';
        });
        horaves.forEach(e => {
            sele3=sele3+' <option value="'+e+'" '+((d.horario_ves_ini==e) ? 'selected' : '' )+'>'+e+'</option> ';
            sele4=sele4+' <option value="'+e+'" '+((d.horario_ves_fin==e) ? 'selected' : '' )+'>'+e+'</option> ';
        });
        $("#horario_mat_ini").html(sele1);
        $("#horario_mat_fin").html(sele2);
        $("#horario_ves_ini").html(sele3);
        $("#horario_ves_fin").html(sele4);
    }
    function dias(d=[]){
        //console.log('dias',d);
        let dias =['lunes','martes','miercoles','jueves','viernes','sabado','domingo'];
        let sele ='';
        let selec=(d.select!=undefined)?d.select:[];
        dias.forEach(e => {
            let impSelect = {
                class:"btn-secondary",
                icon:"fa-toggle-off",
            };
            selec.forEach(sel => {                
                impSelect = (e==sel) ?{
                    class:"",
                    icon:"fa-toggle-on",
                }:impSelect;
            });
            sele = sele + ' <button type="button" class="btn '+impSelect.class+'   toogle_dias" data-dia="'+e+'" >'+e+' <i class="fa '+impSelect.icon+'"></i> </button>';
        });
        $("#botones_dias").html(sele);
        $('.toogle_dias').on('click',function(){
            $(this).toggleClass('btn-secondary','');
            $(this).toggleClass('dias_laborables','');
            $(this).find("i").toggleClass('fa-toggle-on','fa-toggle-off');
        });
    }
});