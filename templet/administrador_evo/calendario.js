
let eventos = [];
    jQuery(function($){
        $(document).ready(function () {
           lista();
           console.log('eventos',eventos);
        });
    });
function lista(d=[]) {
    jQuery(function ($) {    
        $.ajax({
            url: location.origin+"/administradorws/citas",
            type:"post",
            dataType:"json",
            data:{dato:"dato"},
            success:function(respuesta){
                console.log('hola',respuesta);
                var idioma = 'es';
                var calendarEl = document.getElementById('calendar');
                var f = new Date();
                var calendar = new FullCalendar.Calendar(calendarEl, {
                  header:{
                     left: 'prev,next today',
                    center: 'title',
                    right: 'month,agendaWeek,agendaDay,listWeek'
                  },
                  defaultDate:f,
                  locale:idioma,
                  navLinks: true,
                  editable: false,
                  eventLimit: true,
                  events: respuesta.propiedad,
                  eventClick: function(info) {
                    console.log('Event: ' + info.event.id);
                    console.log('Coordinates: ' + info.jsEvent.pageX + ',' + info.jsEvent.pageY);
                    console.log('View: ' + info.view.type);
                    detalles({
                      id:info.event.id
                    });
                    // change the border color just for fun
                    info.el.style.borderColor = 'red';
                  }
                });          
                calendar.render();
            },error:function (e) {
              swal({
                type:"error",
                text:"Upss a pasado algo",
                 confirmButtonText: 'Cerrar'
              })
            }
        });
        
    });
}
function detalles(d=[]){
  jQuery(function ($) {    
    $.ajax({
        url: location.origin+"/administradorws/citas/"+((d.id!=undefined)?d.id:''),
        type:"post",
        dataType:"json",
        data:{dato:"dato"},
        success:function(respuesta){
            console.log('Detalles de la cita',respuesta);
            // let fecha = respuesta.detalles[0]["fecha"];
            // console.log(fecha);
            $("#detalle").show();
            swal({
                  title: '<h1><b>Detalles de la cita.</b></h1><p>Fecha: '+respuesta.detalles[0]["fecha"]+'</p><p>Servicio: '+respuesta.detalles[0]["servicio"]+'</p><p>horario: '+respuesta.detalles[0]["horario"]+':00:00</p><p>Cliente: '+respuesta.detalles[0]["usuario"]+'</p><p>Empleado: '+respuesta.detalles[0]["empleado"]+'</p>',
                  confirmButtonColor: '#3885d6',
                  confirmButtonText: 'Cerrar'
                })

        },error:function (e) {
          
        }

    });
    
});
}

