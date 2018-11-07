function archivos(d=[]) {
    let e =  document.getElementById('ifrm');
    if(typeof(e) != 'undefined' && e != null)
        document.getElementById("ifrm").remove();
    let i = document.createElement('iframe');
    i.setAttribute('id', 'ifrm'); 
    i.setAttribute('width', '100%'); 
    i.setAttribute('height', '420'); 
    i.setAttribute('border', '0'); 
    //document.body.appendChild(i);
    let el = document.getElementById('archivos_importador');
    el.parentNode.insertBefore(i, el);
    d.ruta =(d.ruta!=''&&d.ruta!=undefined)?d.ruta:'';
    d.url =(d.ruta!=''&&d.ruta!=undefined)?location.origin+'/archivos/importaciones/'+d.ruta:'';
    document.getElementById("ruta").value = d.ruta;
    document.getElementById("url").value = d.url;
    console.log(d.ruta);
    if(d.url!='')
        i.setAttribute('src', d.url);    
    return (d.url!='')?1:0;
}
jQuery(function ($) { 
    function ws(d=[]){
        let g = d;
        d.pet = (d.pet!=''&&d.pet!=undefined)?location.origin + '/administradorws/importar/'+d.pet:location.origin + '/administradorws/importar/';
        console.log(d.pet);
        $.ajax({
            url: d.pet,
            type: 'post',	
            dataType: 'json',
            success: function(res) {
                console.log(res);
                console.log(d);
                if(d.fn!=undefined)
                    eval(d.fn+'('+JSON.stringify({d:d,r:res})+')');
                $('#id_importador').val((res.id!=undefined)?res.id:'');
            },
            error: function(res) {
                console.log(res);
            },
            data: g
        });
    }
    function leerDatos(d,s=';') {
        d=d.split(/\r\n|\n/);
        let c=d[0];
        let t=[];
        let f=[];    
        c=c.split(s);
        c.forEach(e => {t.push(e.split('.'))});
        c=t;t=[];
        c.forEach(e => {t.push({title:e[0]})});
        d.forEach(e=>{f.push(e.split(s))});
        return {"columnas":c,"columns":t,"filas":f};
    }
   
    function tablas(d=[]){
        $("#tablas").append('<div class="col-md-12"><ul class="list-group list-group-flush" id="'+d.id_tabla+'_lista_columnas"></ul></div><table id="'+d.id_tabla+'_tabla" with="100%" ></table>');
        $('#'+d.id_tabla+'_tabla').DataTable({
            data: d.filas,
            columns: d.columns
        });
        let h = '';
        d.columnas.forEach(e => {   
            let id=jmy_web_url_friendly(e[0],'_');
            let tipo_value = (e[2]!=''&&e[2]!=undefined)?e[2]:'input';
            let lista_value = (e[3]!=''&&e[3]!=undefined)?e[3]:'general';
            h=h+'<li class="list-group-item vrc_lst_col"><div class="d-flex w-100 justify-content-between" id="row_db_'+d.id_tabla+'_'+id+'"><h6 class="mb-1 jmy_web_div" data-page="" id="dbn_'+d.id_tabla+'_'+id+'" data-editor="no">'+e[0]+'</h6><small><div class="jmy_web_div chv_'+d.id_tabla+'" data-tablaimp="'+d.id_tabla+'" data-idd="'+id+'" data-page="" id="dbv_'+d.id_tabla+'_'+id+'" data-editor="no">'+id+'</div><div id="chr_'+d.id_tabla+'_'+id+'"  data-tablaimp="'+d.id_tabla+'" data-idd="'+id+'" class="actualizar_check_col"></div></small><small> <select type="select" class="form-control input-sm btn-mini jmy_web_div" data-lista-id="base_de_datos" placeholder="Seleccione una base datos" data-value="'+e[1]+'" data-tabla="importar" data-page="" id="db_'+d.id_tabla+'_'+id+'"  tabindex="5" ></select><select type="select" class="form-control input-sm btn-mini jmy_web_div selecionador_tipo "  data-tablaimp="'+d.id_tabla+'" data-idd="'+id+'"  data-target="row_db_'+d.id_tabla+'_'+id+'" data-lista-id="tipo_datos" placeholder="Seleccione un tipo de ingreso de datos" data-value="'+tipo_value+'" data-tabla="importar" data-page="" id="dbt_'+d.id_tabla+'_'+id+'"  tabindex="5" ></select><div class="'+((tipo_value!='select')?'no_select':'')+'" id="dsel_'+d.id_tabla+'_'+id+'" ><div class="form-group"><label for="dbc_'+d.id_tabla+'_'+id+'">ID catálogo</label><input type="text" class="form-control lista_value_act"  data-tablaimp="'+d.id_tabla+'" data-idd="'+id+'" id="dbc_'+d.id_tabla+'_'+id+'"  aria-describedby="emailHelp" value="'+lista_value+'" placeholder="Id del catalogo de datos"><small id="emailHelp" class="form-text text-muted"> <div class="jmy_web_recargar_select" data-lista-id="'+lista_value+'" data-id="dbs_'+d.id_tabla+'_'+id+'">Id del catálogo de datos.</div></small></div><select type="select" class="form-control input-sm btn-mini jmy_web_div" data-lista-id="'+lista_value+'" placeholder="Agrege opciones de lista" data-value="" data-tabla="importar" data-page="" id="dbs_'+d.id_tabla+'_'+id+'"  tabindex="5" ></select></div></small></div></li>'; 
        });
        $('#'+d.id_tabla+'_lista_columnas').html(h);
        $(".no_select").hide();
        jmy_web_div_click();
        let chv=[];
        $(".chv_"+d.id_tabla).change(function(){
            rev_c([{
                tabla:$(this).data('tablaimp'),
                id:$('#dbv_'+d.id_tabla+'_'+id).html().trim(),
            }],d.id_tabla);
        });
        $(".selecionador_tipo").change(function(){
            let v = $('option:selected',this).val();
            let g = {
                tabla:$(this).data('tablaimp'),
                id:$(this).data('idd'),
            };
            //console.log(v);
            if(v=='select')
                $("#dsel_"+g.tabla+'_'+g.id).show(200);
            else
                $("#dsel_"+g.tabla+'_'+g.id).hide(100);
        });
        $(".lista_value_act").change(function(){
            let g ={
                id:$(this).data('idd'),
                tabla:$(this).data('tablaimp'),
                v:$(this).val(),
            };
            //console.log('#dbs_'+g.tabla+'_'+g.id);
            $('#dbs_'+g.tabla+'_'+g.id).html('');
           $.when( 
            $('#dbs_'+g.tabla+'_'+g.id+'_select_id_').val(g.v)
           ).done(function(){
            jmy_web_div_click();
           });
            //console.log(g);            
        });
        
        $(".vrc_lst_col").on('click',function(){
            $(".vrc_lst_col").each(function(){

            });
        });
        $(".chv_"+d.id_tabla).each(function(){
            chv.push({
                tabla:$(this).data('tablaimp'),
                id:$(this).data('idd'),
            });
            $('#chr_'+$(this).data('tablaimp')+'_'+$(this).data('idd')).html('No indexado');
        });
        
        rev_c(chv,d.id_tabla);
        //console.log(chv);
        
    }

    function rev_c(d=[],tabla=''){
        let u =location.origin+'/administradorws/casas/columnas';
        //console.log(u);
        //console.log(d);
        $.ajax({
            url:u,
            type: 'post',	
            dataType: 'json',
            success: function(res) {
                //console.log(res);
                let l = res.ver.w;
                //console.log(l);
                if(l!=undefined){
                    l.forEach(e => {
                        //console.log('#chr_'+tabla+'_'+e.NAME);
                        $('#chr_'+tabla+'_'+e.NAME).html('Indexado');
                    });
                    $('.actualizar_check_col').on('click',function () {
                        let g = {
                            tabla:$(this).data('tablaimp'),
                            oldid:$(this).data('idd'),
                            id:$('#dbv_'+$(this).data('tablaimp')+'_'+$(this).data('idd')).html(),
                        };
                        $('#dbv_'+g.tabla+'_'+g.oldid).attr('id','dbv_'+g.tabla+'_'+g.id);
                        $('#chr_'+g.tabla+'_'+g.oldid).attr('id','chr_'+g.tabla+'_'+g.id);
                        $('#chr_'+g.tabla+'_'+g.id).attr('data-idd',g.id);
                        $('#dbv_'+g.tabla+'_'+g.id).attr('data-idd',g.id);
                        jmy_web_div_click();
                        rev_c([g],tabla);
                    });
                }
              
            },
            error: function(res) {
                console.log(res);
            },
            data: {lista:d}
        });
    }
    function rev_v(d=[]){
        console.log('rev_a',d);
        let $a = [];
        for (let i = 0; i < d.r.a.length; i++){
            const e = d.r.a[i];
            let u =location.origin+'/'+d.r.base+e;
            console.log(u);
            $.ajax({
                url:u,
                dataType:'text',
                contentType: "charset=utf-8",
                success: function(r){
                    $("#div_paso_paso1").hide(80);
                    $("#div_paso_paso2").show(70);
                    try{
                        r=decodeURIComponent(escape(r));
                        rev_b(r,i);
                    }catch(e){
                        r=r;
                        rev_b(r,i);
                    }
                },
                error: function(r){
                    console.log(r);
                    
                }
            });
        };
    }
    function rev_a(d=[]){
        console.log('rev_a',d);
        let $a = [];
        for (let i = 0; i < d.r.a.length; i++){
            const e = d.r.a[i];
            let u =location.origin+'/'+d.r.base+e;
            console.log(u);
            $.ajax({
                url:u,
                dataType:'text',
                contentType: "charset=utf-8",
                success: function(r){
                    $("#div_paso_paso1").hide(80);
                    $("#div_paso_paso2").show(70);
                    try{
                        r=decodeURIComponent(escape(r));
                        rev_b(r,i);
                    }catch(e){
                        r=r;
                        rev_b(r,i);
                    }
                },
                error: function(r){
                    console.log(r);
                    
                }
            });
        };
    }
    function rev_b(d=[],i=0){
        console.log('revision',d);
        let l = leerDatos(d);
        l.id_tabla='tab_imp_'+i
        console.log(l);
        tablas(l);
    }
    function paso3(d=[]){
        console.log('paso3',d);
        ws({
            "url":$("#url").val(),
            "ruta":$("#ruta").val(),
            "fn":"rev_a"
        });
    }

    $('#div_paso_paso1').hide();
    $('#div_paso_paso2').hide();
    $('#btn_paso_4').hide();
    $('.paso3').hide();

    $(".paso1").on('click',function () {
        $(this).hide(80);
        $('#div_paso_paso1').toggle(80);
    });
    $(".paso2").on('click',function () {
        const n=$("#nombre_importacion").val();
        if(n!=''&&n!=undefined)
            $.when(archivos({ruta:jmy_web_url_friendly(n)})).done(function (){
                $("#nombre_importacion").prop('disabled', true);
                $(".paso2").hide(80);
                $(".paso3").show(80);
                $(".paso3").on('click',function () {
                    paso3();
                });
            });
        else
            $('#nombre_importacion').css('border','solid red 2px');
    });
    $(document).ready(function () {
        
        
    });
});