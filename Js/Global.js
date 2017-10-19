$(document).ready(function() {
var options = {
	url: baseurl+"cGetEmpresas/autoCompletado/",
	getValue:"NombreEmpresa",
	list: {
		maxNumberOfElements: 5,
		match: {
			enabled: true
		},
		showAnimation: {
			type: "fade", //normal|slide|fade
			time: 400,
			callback: function() {}
		},
		hideAnimation: {
			type: "slide", //normal|slide|fade
			time: 100,
			callback: function() {}
		},		
		onClickEvent: function() {
			var idEmpresa = $('#BuscadorHeader').getSelectedItemData().idEmpresa;
			location.href=baseurl+"cEmpresa/verEmpresa/"+idEmpresa;
		}
	},
	    theme: "round"
};
$("#BuscadorHeader").easyAutocomplete(options); 
});

$(document).ready(function() {
var options = {
	url: baseurl+"cGetEmpresas/autoCompletadoPersonas/",
	getValue:"Nombre",
	list: {
		maxNumberOfElements: 5,
		match: {
			enabled: true
		},
		showAnimation: {
			type: "fade", //normal|slide|fade
			time: 400,
			callback: function() {}
		},
		hideAnimation: {
			type: "slide", //normal|slide|fade
			time: 100,
			callback: function() {}
		},		
		onClickEvent: function() {
			var idPersona = $('#BuscadorHeaderP').getSelectedItemData().idPersona;
			location.href=baseurl+"cPersona/verPersona/"+idPersona;
		}
	},
	    theme: "round"
};
$("#BuscadorHeaderP").easyAutocomplete(options); 
});
//Notificaciones
$(document).ready(function() {
    function Notificaciones(){
    	// alert('1234');
    }

    // setInterval(Notificaciones, 3000);
});

$(document).ready(function(){
  function getNotificaciones(){
 	$.post(baseurl+'cNotificaciones/getNotificaciones/',
 		{idUsuarioActivo:idUsuarioActivo},
 		function(data){
  			$('#notificaciones_menu').html('');
 			var num_notificaciones=0;
 			var Notificaciones = JSON.parse(data);
 			$.each(Notificaciones,function(i,item){
 				num_notificaciones++;
 				$('#notificaciones_menu').append(
 					'<li class="col-md-12" style="padding:0px; margin:0px;" id="item2'+item.idNotificaciones+'">'+
 							'<a href="'+baseurl+'cPersona/verTarea/'+item.idTarea+'" class="col-md-10">'+
								'<i class="fa fa-file-text-o text-green col-md-1" style="padding:0px; margin:0px;"></i>'+
								'<div style="overflow:hidden; text-overflow:ellipsis; padding:0px;">'+item.TituloTarea+''+
								'</div>'+
 					 		'</a>'+
 					 		'<button onClick="NotifVisto('+item.idNotificaciones+')" class=" btn btn-danger btn-xs"><i class="fa  fa-minus-square"></i></button>'+
 					'</li>')

 			});
 			if (num_notificaciones===0){
 				$('#notificaciones_menu').append('<li class="text-center">No hay notificaciones nuevas</li>');
 			}
 			$('#ContadorNotificaciones').html(num_notificaciones);

 		});
 }
 getNotificaciones();

NotifVisto =  function($idNotificaciones){
  	$('#notificaciones_menu').html('');
	var idNotificacion=$idNotificaciones;
	$.post(baseurl+'cNotificaciones/actNotificaciones/',
		{idNotificacion:idNotificacion},
		function(data){
			getNotificaciones();
		});
}
});