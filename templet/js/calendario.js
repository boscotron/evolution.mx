jQuery(function ($) {
	//muestra el calendario
	$('#calendar').fullCalendar({
	 	header: { 
	  		left : 'today,prev,next',
	  		center: 'title',
	  		right : 'month,agendaWeek,agendaDay'
	  	},
	  	dayClick:function(date,jsEvent,view){
	  		$(this).css('background-color','blue');
	  	},
	  	eventSources:[{
		  	events: [
				    {
				      title  : 'event1',
				      start  : '2018-12-01',
				      color:"blue",
					  textColor:"white"	
				    },
				    {
				      title  : 'event2',
				      start  : '2018-12-05',
				      end    : '2018-12-07',
				      color:"green",
					  textColor:"white"	
				    },
				    {
				      title  : 'event3',
				      start  : '2018-12-09T12:30:00',
				      allDay : false,
				      color:"black",
					  textColor:"white"	
				    }
			],
			
	  	}]
	  	 
	});

});