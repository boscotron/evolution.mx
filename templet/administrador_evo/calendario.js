  document.addEventListener('DOMContentLoaded', function() {
    var calendarEl = document.getElementById('calendar');

    var calendar = new FullCalendar.Calendar(calendarEl, {
      defaultDate: '2018-12-12',
      editable: true,
      eventLimit: true, // allow "more" link when too many events
      events: [
        {
          title: 'All Day Event',
          start: '2018-12-01'
        },
        {
          title: 'Long Event',
          start: '2018-12-07',
          end: '2018-12-10'
        },
        {
          groupId: 999,
          title: 'Repeating Event',
          start: '2018-12-09T16:00:00'
        },
        {
          title: 'Dinner',
          start: '2018-12-12T20:00:00'
        },
        {
          title: 'Birthday Party',
          start: '2018-12-13T07:00:00'
        },
        {
          title: 'Click for Google',
          url: 'http://google.com/',
          start: '2018-12-28'
        }
      ]
    });

    calendar.render();
  });

  function lista(d=[]) {
    jQuery(function ($) {    
        $.ajax({
            url: location.origin+"/administradorws/cita_calendario",
            type:"post",
            dataType:"json",
            data:{dato:"dato"},
            success:function(respuesta){
                console.log('respuesta',respuesta);
                

            },error:function (e) {
               // console.log(e);
                
            }

        });
        
    });
}


jQuery(function($){
    $(document).ready(function () {
        lista();

    });
});