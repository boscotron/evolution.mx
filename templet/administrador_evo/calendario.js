
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
          



            
        },error:function (e) {
          
        }

    });
    
});
}

