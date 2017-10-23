$(document).ready(function() {
//Genera Calendario
	$('#calendar').fullCalendar({
		    eventClick: function(calEvent, jsEvent, view) {

$('#Tarea').html('');
$('#Categoria').html('');
$('#Prioridad').html('');
$('#StatusTarea').html('');
$('#Descripcion').html('');
$('#Motivo').html('');
$link='';
// $('#Tarea').html(calEvent.title);
$('#Categoria').html(calEvent.categoria);
$('#Prioridad').html(calEvent.prioridad);
$('#StatusTarea').html(calEvent.status);
$('#Descripcion').html(calEvent.descripcion);
$('#Motivo').html(calEvent.motivo);
$clase = calEvent.className;
$('#divTitleTarea').removeClass('evtObjetivos');
$('#divTitleTarea').removeClass('evtTareas');
$('#divTitleTarea').addClass(''+$clase);
if ($clase=='evtObjetivos'){
	$('#Tarea').html('<a href="'+baseurl+'cPersona/VerNegociacion/'+calEvent.id+'">'+calEvent.title+'</a>');
}if ($clase=='evtTareas'){
	$('#Tarea').html('<a href="'+baseurl+'cPersona/VerTarea/'+calEvent.id+'">'+calEvent.title+'</a>');
}




    },
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
		if (item.StatusTarea!=='Rechazada') {
			if (item.StatusTarea!=='Pendiente Aceptar') {
			var a = item.Asignados.indexOf(idUsuarioActivo); 
			if (a>=1) {
				var event={id:item.idTarea , title:item.TituloTarea, start:item.FechaFin, allDay:true, className:'evtTareas', prioridad:item.Prioridad ,status:item.StatusTarea, categoria:item.Categoria, descripcion:item.Descripcion};
				$('#calendar').fullCalendar('renderEvent',event,true);
			}
		}
		}
		})
	});
	$.post(baseurl+"cCalendario/getEventosObjetivos",
		function(data){
			var datos = $.parseJSON(data);
			$.each(datos,function(i,item){

			if (item.PersonaCargo===idUsuarioActivo) {
				var event={id:item.idNegociacion , title:item.NombreNegociacion, start:item.FechaLimite, allDay:true, className:'evtObjetivos', motivo:item.Motivo, prioridad:item.Prioridad, status:item.Status, descripcion:item.Detalles};
				$('#calendar').fullCalendar('renderEvent',event,true);
			}
		})
	});
});