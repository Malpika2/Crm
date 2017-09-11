$(document).ready(function() {
//Genera Calendario
	$('#calendar').fullCalendar({
	header: {
		left: 'prev,next today',
		center: 'title',
		right: 'month,agendaWeek,agendaDay,listWeek'
	},
		defaultDate: new Date(),
		locale: 'es',
		editable: false,
		eventLimit: true, // allow "more" link when too many events
		events:[{}]
	});

	$.post(baseurl+"cCalendario/getEventosTareas",
		function(data){
			var datos = $.parseJSON(data);
			$.each(datos,function(i,item){
			var a = item.Asignados.indexOf(idUsuarioActivo); 
			if (a>=1) {
				var event={id:item.id , title:item.title, start:item.start};
				$('#calendar').fullCalendar('renderEvent',event,true);
			}
		})
	});
	$.post(baseurl+"cCalendario/getEventosObjetivos",
		function(data){
			var datos = $.parseJSON(data);
			$.each(datos,function(i,item){
			if (item.PersonaCargo===idUsuarioActivo) {
				var event={id:item.id , title:item.title, start:item.start};
				$('#calendar').fullCalendar('renderEvent',event,true);
			}
		})
	});
});