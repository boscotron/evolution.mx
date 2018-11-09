jQuery(function ($) {  
    console.log('Preferencias de empleado');
    let horario_general = {
        lunes:[{h_entrada: 1, h_salida: 0}],
        martes:[{h_entrada: 1, h_salida: 0}],
        miercoles:[{h_entrada: 1, h_salida: 0}],
        jueves:[{h_entrada: 1, h_salida: 0}],
        viernes:[{h_entrada: 1, h_salida: 0}],
        sabado:[{h_entrada: 1, h_salida: 0}],
        domingo:[{h_entrada: 1, h_salida: 0}],
    };
    let diasActivos =[];

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

    //cargar_preferencias();
    
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


        guardar_dias();

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
        guardar();
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
    function select_dias(d=[]){ /*({dia:'lunes',id:'',entrada_select:'',salida_select:''})*/
       console.log(d);
        
        let horas_entrada = '';
        let horas_salida = '';
        let hora_max_salida = d.salida;
        let entrada_select = Number(d.entrada_select);
        let salida_select = Number(d.salida_select);
            entrada_select = (!isNaN(entrada_select))?entrada_select:0;
            salida_select = (!isNaN(salida_select))?salida_select:0;
        for (let i = 1; i <= 24; i++) {
            horas_entrada = horas_entrada  + '<option value="'+i+'" '+((entrada_select==i)?'selected':'')+'>'+i+' Hrs. </option>';

            horas_salida = (entrada_select>=i)? '<option value="'+i+'" '+((salida_select==i)?'selected':'')+'>'+i+' Hrs. </option>':'';
        }
        let h = (!d.sin_grupo)?'<div id="'+d.id+'_grupo" >':'';
        h=h+'<div class="form-group"> <label for="horario_mat_ini">Entrada</label><select data-id="'+d.id+'" id="'+d.id+'_entrada" class="form-control horario horario_'+d.dia+' horario_'+d.dia+' horario_'+d.dia+'_entrada horario_entrada form-control-sm valid" data-dia="'+d.dia+'" data-tipo="entrada" >'+horas_entrada+'</select></div> <div class="form-group"><label for="horario_mat_ini">Salida</label><select  data-id="'+d.id+'" id="'+d.id+'_salida" class="form-control horario_salida horario_'+d.dia+'  horario_'+d.dia+'_salida form-control-sm valid"  data-dia="'+d.dia+'" data-tipo="salida"  >'+horas_entrada+' </select></div>';
        
        h=(!d.sin_grupo)?h+'</div>':h;
        
        return h;
    }
    function cambio_horario(d=[]){
        let h_max = 0;
        /*$(".horario").change(function () {
           
            let h_min = Number($('option:selected',this).val());   
            console.log(h_min);
            let dia = $(this).data('dia');
            let id = $(this).data('id');
           // console.log(id);
            
            $(".horario_"+dia).each(function () {
                if( !isNaN(h_min) ){
                    if( h_max<h_min ){
                            console.log(h_min);
                            h_max=h_min;
                    }
                }
            });

            $.when(guardar_dias()).done(function(res){
                console.log(res);
                
                console.log( 'horario_general',horario_general );
                let horario  = res[dia];
                $("#grupo_fechas_"+dia).html('');
                horario.forEach(element => {
                    $("#grupo_fechas_"+dia).append(
                        select_dias({
                        dia:dia,
                        id:element.id,
                        sin_grupo:true,
                        salida:element.h_entrada,
                        entrada_select:element.h_salida
                    }));
                });
                cambio_horario({dias:d.dias});
            });
        });*/
    }
    function obetner_dias(){
        let gdias= guardar_dias();
        console.log('guardar_dias()',gdias);
        return gdias;
    }
    function wsperfil(d=[]) {   
        console.log('diasActivos',diasActivos);
        
        let guardar = (d.g!=undefined)?{
            dias:d.g,
            diasActivos:{
                lunes:diasActivos.lunes,
                martes:diasActivos.martes,
                miercoles:diasActivos.miercoles,
                jueves:diasActivos.jueves,
                viernes:diasActivos.viernes,
                sabado:diasActivos.sabado,
                domingo:diasActivos.domingo,
            }
        }:undefined; // MANDAR A GUARDAR ALGO
        let id_perfil =$("#id_perfil").val();
        $.ajax({
            url: location.origin + '/administradorws/usuarios/perfil/'+id_perfil,
            type: 'post',	
            dataType: 'json',
            success: function(res) {
                console.log(res);
                let datos = res.usuarios.ot[id_perfil];
                
                if(datos!=''&&datos!=undefined){
                    console.log('datos',datos);
                    let dias=(datos.dias!=''&&datos.dias!=undefined)?JSON.parse(datos.dias):horario_general;
                    diasActivos=(datos.diasActivos!=''&&datos.diasActivos!=undefined)?JSON.parse(datos.diasActivos):{
                        lunes:0,
                        martes:0,
                        miercoles:0,
                        jueves:0,
                        viernes:0,
                        sabado:0,
                        domingo:0,
                    };
                    console.log('dias',dias);
                    horario_general.lunes=(dias.lunes!=undefined)?dias.lunes:horario_general.lunes;
                    horario_general.martes=(dias.martes!=undefined)?dias.martes:horario_general.martes;
                    horario_general.miercoles=(dias.miercoles!=undefined)?dias.miercoles:horario_general.miercoles;
                    horario_general.jueves=(dias.jueves!=undefined)?dias.jueves:horario_general.jueves;
                    horario_general.viernes=(dias.viernes!=undefined)?dias.viernes:horario_general.viernes;
                    horario_general.sabado=(dias.sabado!=undefined)?dias.sabado:horario_general.sabado;
                    horario_general.domingo=(dias.domingo!=undefined)?dias.domingo:horario_general.domingo;
                    console.log('horario_general',horario_general);
                    
                }
                dias();

            },
            error: function(res) {
                console.log(res);
            },
            data: guardar
        });
    }
    wsperfil();
    function guardar(d=[]) {   
        
        if(id_perfil!=undefined&&id_perfil!=''){
            $.when(obetner_dias()).done(function(element){
               console.log('element',element);
               let g = {
                   lunes:element['lunes'],
                   martes:element['martes'],
                   miercoles:element['miercoles'],
                   jueves:element['jueves'],
                   viernes:element['viernes'],
                   sabado:element['sabado'],
                   domingo:element['domingo']
               };
               wsperfil({g:g});
            });

        }else{
            console.log('error, no hay id_perfil');
        }
    }
    function guardar_dias(d=[]) {   
        console.log(d);
        let guardar = [];
        let horarios = [];
        let dias =[];
        jQuery(function ($) {  
            
            $(".horario_entrada").each(function () {
                let id =$(this).data('id');

                dias.push( {
                    id : id,
                    h_entrada : Number($('option:selected',this).val()),
                    h_salida : (!isNaN(Number($('#'+id+'_salida option:selected').val())))?Number($('#'+id+'_salida option:selected').val()):0,
                    tipo : $(this).data('tipo'),
                    dia : $(this).data('dia')  
                });
                
                //horarios[dia].push({""});
                
            });
        });
        dias.forEach(element => {
            if(!jQuery.inArray(element.dia,guardar))
                guardar.push(element.dia);
            if(guardar[element.dia]==undefined||guardar[element.dia]=='')
                guardar[element.dia]=[];
            let activo = $("#dia_campo_"+element.dia).val();

            if(!jQuery.inArray(element.dia,diasActivos))
                if(!jQuery.isArray(diasActivos[element.dia]))
                    diasActivos.push(element.dia);

            if(diasActivos[element.dia]==undefined||diasActivos[element.dia]=='')
                    diasActivos[element.dia]=0;

            if(activo=='activo'){
                diasActivos[element.dia]=1;
                guardar[element.dia].push(element);
            }else{
                diasActivos[element.dia]=0;
            }
        });
        horario_general=guardar;
        console.log(guardar);
        console.log('diasActivos',diasActivos);
       // console.log(dias);
        return guardar;
        
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
        let countColores = 0;
        $("#botones_horas").html('');
        dias.forEach(e => { /* e = a el nombre del dia */
            let impSelect = {
                class:"btn-secondary",
                icon:"fa-toggle-off",
                fechasClass:"oculto",
                activo:false
            };
            console.log(e);
            console.log(diasActivos);
            impSelect = (diasActivos[e]=="1") ?{
                class:"",
                icon:"fa-toggle-on",
                fechasClass:"visible",
                activo:true
            }:impSelect;
            sele = ' <button type="button" data-activo="'+impSelect.activo+'" class="btn  color_'+e+' '+impSelect.class+'   toogle_dias" data-dia="'+e+'" >'+diasTexto[e]+' <i class="fa '+impSelect.icon+'"></i> </button>';
            
            $("#botones_dias").append(sele);

            //$("#botones_horas").append('<input type="hidden" id="min_'+e+'" value=""><input type="hidden" id="max_'+e+'" value=""> ');
            console.log(horario_general[e]);
            let horarios = '';
            if(horario_general[e]!=''&&horario_general[e]!=undefined){
                horario_general[e].forEach(element => {
                    horarios = horarios + select_dias({
                        dia:e,
                        id:'algo'+count,
                        entrada_select:element.h_entrada,
                        salida_select:element.h_salida
                    });
                    count++;
                });
            }
            $("#botones_horas").append('<div class=" horarios div_fechas_'+e+' verde div_fechas '+impSelect.fechasClass+' color_'+e+'"><h3>'+diasTexto[e]+'</h3><div class="grupo_fechas" id="grupo_fechas_'+e+'">'+horarios+'</div><button class="btn btn-flat btn-sm btn-warning " id="agregar_turno_'+e+'" style="left: 0px;"><i class="fa fa-add"></i> &nbsp;Agregar turno</button> </div>');
            /*
            .change
            */
            $(".color_"+e).css('background-color',colores[countColores]);
            countColores++;
            //console.log('count',count);
            
            $('#agregar_turno_'+e).on('click',function(){
                console.log('count',count);
                console.log('agregar_turno'); 
                count++;
                $('#grupo_fechas_'+e).append(select_dias({dia:e,id:'algo'+count}));
                guardar_dias();
                cambio_horario();
                
            });
            cambio_horario({dias:dias});
            count++;
        });
       
        $(".div_fechas").hide();
        $('.toogle_dias').each(function(){
            let dia = $(this).data('dia');
            let activo = $(this).data('activo');
            $(this).after('<input type="hidden" value="" id="dia_campo_'+dia+'" class="dia_campo"> ');
            $('#dia_campo_'+dia).val(((activo)?'activo':''));
        });
        $('.toogle_dias').on('click',function(){
            $(".div_fechas").hide();
            let dia = $(this).data('dia');

            $(this).toggleClass('btn-secondary','');
            $(this).toggleClass('dias_laborables','');
            let act = $('#dia_campo_'+dia).val();
            console.log(act);
            $('#dia_campo_'+dia).val(((act!='activo')?'activo':''));

            if(act=='activo'){
                
                $(this).find("i").toggleClass('fa-toggle-off');
                $(this).find("i").toggleClass('fa-toggle-on');
            }else{
                $(".div_fechas_"+dia).show(100);
                $(this).find("i").toggleClass('fa-toggle-on','fa-toggle-off');
            }
        });
    }

    /* Seccion para los servicios */

    $("#agregar_servicios").on('click',function(){
        let guardar = {
            "nombre_servicio":$("#servicios option:selected").html(),
            "id_servicio":$("#servicios option:selected").val(),
            "tiempo_servicio":$("#tiempo_servicio").val()
        }
        console.log(guardar);
        $("#mostrar_servicio").append('<li class="list-group-item disabled">'+guardar.nombre_servicio+' tiempo '+guardar.tiempo_servicio+' minutos<i class="fa fa-times"></i></li>');
    });

});


     "language": {

            "sProcessing":     "Procesando...",
            "sLengthMenu":     "Mostrar _MENU_ registros",
            "sZeroRecords":    "No se encontraron resultados",
            "sEmptyTable":     "Ningún dato disponible en esta tabla",
            "sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_",
            "sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0",
            "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
            "sInfoPostFix":    "",
            "sSearch":         "Buscar:",
            "sUrl":            "",
            "sInfoThousands":  ",",
            "sLoadingRecords": "Cargando...",
            "oPaginate": {
            "sFirst":    "Primero",
            "sLast":     "Último",
            "sNext":     "Siguiente",
            "sPrevious": "Anterior"
            },
            "oAria": {
                "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
                "sSortDescending": ": Activar para ordenar la columna de manera descendente"
            }

    }