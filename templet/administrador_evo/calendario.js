  document.addEventListener('DOMContentLoaded', function() {
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
      editable: true,
      eventLimit: true,
      eventSources: {
        url: "../../app/controlador/administrador_evo/cita_calendario.php",
      }
    });

    calendar.render();
  });
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
                let algo = respuesta.cita.otFm;
                let inf =[];
                algo.forEach(element => {
                  inf["title"] = element.servicio;
                  inf["start"] = element.fecha+"T"+element.horario+":00:00";
                  //eventos.push(inf);
                  console.log('info',inf);
                });
            },error:function (e) {
              
            }

        });
        
    });
}

