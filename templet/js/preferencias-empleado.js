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

                if(data!=undefined){
                    servicios({select:JSON.parse(data.servicios)});
                    horario({
                        horario_mat_ini:data.horario_mat_ini,
                        horario_ves_fin:data.horario_ves_fin,
                        horario_mat_fin:data.horario_mat_fin,
                        horario_ves_ini:data.horario_ves_ini,
                    });
                    dias({select:JSON.parse(data.dias_laborables)});
                }else{
                    servicios();
                    horario();
                    dias();
                }
            },
            error: function(res) {
                console.log(res);
            },
            data: {guardar:d.guardar}
        });
    }

    cargar_preferencias();
    function ver_horarios(d=[]) {
        let horarios = [];
        $('.horarios').each(function () {
            let dia = $(this).data('dia');
            let tipo = $(this).data('tipo');
            horarios.push({
                dia:dia,
                tipo:tipo,
                valor:$('option:selected',this).val()

            });
        });
        console.log('horarios',horarios);
        
    }
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
        let empleado = $("#id_perfil").val();


        let horarios = [];
        let d =[]
        $(".horario_entrada").each(function () {
            let id =$(this).data('id');

            d .push( {
                id : id,
                h_entrada : Number($('option:selected',this).val()),
                h_salida : (!isNaN(Number($('#'+id+'_salida option:selected').val())))?Number($('#'+id+'_salida option:selected').val()):0,
                tipo : $(this).data('tipo'),
                dia : $(this).data('dia')  
            });
            
            //horarios[dia].push({""});
            
        });
        console.log(d);

        let guardar ={
            horario_mat_ini:$("#horario_mat_ini option:selected").val(),
            horario_mat_fin:$("#horario_mat_fin option:selected").val(),
            horario_ves_ini:$("#horario_ves_ini option:selected").val(),
            horario_ves_fin:$("#horario_ves_fin option:selected").val(),
            dias_laborables:dias_laborables,
            servicios:servicios,
            empleado:empleado
        };

        console.log(guardar);
        
        /*ver_horarios();
        cargar_preferencias({
            url:'-guardar',
            guardar:guardar
        });*/
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
                console.log(selec);
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
    function select_dias(d=[]){ /*({dia:'lunes',id:'',salida:6})*/
       console.log(d);
        
        let horas_entrada = '';
        let horas_salida = '';
        let hora_max_salida = d.salida;
        let entrada_select = Number(d.entrada_select);
            entrada_select = (!isNaN(entrada_select))?entrada_select:0;
        for (let i = 1; i <= 24; i++) {
            horas_entrada = horas_entrada  + '<option value="'+i+'" '+((entrada_select==i)?'selected':'')+'>'+i+' Hrs. </option>';
            horas_salida = (hora_max_salida<=i)? horas_salida  + '<option value="'+i+'">'+i+' Hrs. </option>':'';
        }
        let h = (!d.sin_grupo)?'<div id="'+d.id+'_grupo" >':'';
        h=h+'<div class="form-group"> <label for="horario_mat_ini">Entrada</label><select data-id="'+d.id+'" id="'+d.id+'_entrada" class="form-control horario horario_'+d.dia+' horario_'+d.dia+' horario_'+d.dia+'_entrada horario_entrada form-control-sm valid" data-dia="'+d.dia+'" data-tipo="entrada" >'+horas_entrada+'</select></div> <div class="form-group"><label for="horario_mat_ini">Salida</label><select  data-id="'+d.id+'" id="'+d.id+'_salida" class="form-control horario_salida horario_'+d.dia+'  horario_'+d.dia+'_salida form-control-sm valid"  data-dia="'+d.dia+'" data-tipo="salida"  >'+horas_salida+' </select></div>';
        
        h=(!d.sin_grupo)?h+'</div>':h;
        
        return h;
    }
    function cambio_horario(){
        let h_max = 0;
        $(".horario").change(function () {
            let h_min = Number($('option:selected',this).val());   
            //console.log($('option:selected',this).val());
            let d = $(this).data('dia');
            let id = $(this).data('id');
           // console.log(id);
            
            $(".horario_"+d).each(function () {
                let h = Number($('option:selected',this).val());   
                if( !isNaN(h) ){
                    if( h_max<h ){
                            console.log(h);
                            h_max=h;
                    }
                }
            });
                let sel = select_dias({
                    dia:d,
                    id:id,
                    sin_grupo:true,
                    salida:h_min,
                    entrada_select:h_min
                });
                //console.log(sel);
                 
                $("#grupo_fechas_"+d).html(sel);
                cambio_horario();
        });
    }
    function dias(d=[]){
        //console.log('dias',d);
        let dias =['lunes','martes','miercoles','jueves','viernes','sabado','domingo'];
        let diasTexto ={'lunes':'Lunes','martes':'Martes','miercoles':'Miércoles','jueves':'Jueves','viernes':'Viernes','sabado':'Sábado','domingo':'Domingo'};
        /*https://color.adobe.com/es/create/color-wheel/?base=2&rule=Shades&selected=4&name=Mi%20tema%20de%20Color&mode=rgb&rgbvalues=0.386680992607556,0.62,0.41045057530504037,0.3367866709807746,0.54,0.3574892107495513,0.27637540901109314,0.44313725490196076,0.2933644213122679,0.23699802772721174,0.38,0.2515664816385731,0.21205086691382105,0.34,0.2250857993608286&swatchOrder=0,1,2,3,4*/
        let colores = ['#639E69','#46714B','#639E69','#568A5B','#365739','#568A5B','#3C6140'];
        let sele ='';
        let selec=(d.select!=undefined)?d.select:[];
        $("#botones_dias").html('');
        let count = 0;
        dias.forEach(e => {
            let impSelect = {
                class:"btn-secondary",
                icon:"fa-toggle-off",
                fechasClass:"oculto",
                activo:false
            };
            selec.forEach(sel => {                
                impSelect = (e==sel) ?{
                    class:"",
                    icon:"fa-toggle-on",
                    fechasClass:"visible",
                    activo:true
                }:impSelect;
            });
            sele = ' <button type="button" data-activo="'+impSelect.activo+'" class="btn  color_'+e+' '+impSelect.class+'   toogle_dias" data-dia="'+e+'" >'+diasTexto[e]+' <i class="fa '+impSelect.icon+'"></i> </button>';
            
            $("#botones_dias").append(sele);

            $("#botones_horas").append('<input type="hidden" id="min_'+e+'" value=""><input type="hidden" id="max_'+e+'" value=""> ');
            $("#botones_horas").append('<div class=" horarios div_fechas_'+e+' verde div_fechas '+impSelect.fechasClass+' color_'+e+'"><h3>'+diasTexto[e]+'</h3><div class="grupo_fechas" id="grupo_fechas_'+e+'">'+select_dias({dia:e,id:'algo'+count})+'</div><button class="btn btn-flat btn-sm btn-warning " id="agregar_turno_'+e+'" style="left: 0px;"><i class="fa fa-add"></i> &nbsp;Agregar turno</button> </div>');
            /*
            .change
            */
            $(".color_"+e).css('background-color',colores[count]);
            $('#agregar_turno_'+e).on('click',function(){
                console.log('agregar_turno');                
                $('#grupo_fechas_'+e).append(select_dias({dia:e}));
            });
            cambio_horario();
            count++;
        });
       
        $(".div_fechas").hide();
        $('.toogle_dias').on('click',function(){
            $(".div_fechas").hide();
            let div = $(this).data('dia');
            $(".div_fechas_"+div).show(100);

            $(this).toggleClass('btn-secondary','');
            $(this).toggleClass('dias_laborables','');
            let act = $(this).data('activo');
            console.log(act);
            
            if(act){
                $(this).find("i").toggleClass('fa-toggle-off');
                $(this).find("i").toggleClass('fa-toggle-on');
            }else
            $(this).find("i").toggleClass('fa-toggle-on','fa-toggle-off');
        });
    }
});