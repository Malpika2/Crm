// $.post(baseurl+"cGetPersonas/getContactos",
// 	{ 
// 		Cargo:'Contacto'
// 	},
// 	function(data){
// 		var emp = JSON.parse(data);
// 		$.each(emp,function(i,item){
// 						if(item.Status=='Inactivo'){}
// 			else {
// 			$('#Contacto').append('<option value="'+item.idPersona+'">'+item.Nombre+'</option>')}
// 			});
// 	});

$.post(baseurl+"cTareasInternas/getTareasInternasPorUsuarioActivo",
	{
		idUsuarioActivo:idUsuarioActivo
	},
	function(data){
		var emp = JSON.parse(data);
		$.each(emp,function(i,item){
		$('#ListaTareasInternas').append(
			'<li><div class="col-md-12" style="border-top:3px solid green;"><a href="'+baseurl+'/cPersona/verTarea/'+item.idTarea+'"><b class="col-md-6" style="padding:0px;">'+item.TituloTarea+'</b></a><b class="col-md-6" style="padding: 0px;">'+item.FechaFin+'</b></div></li>')
       });
	});