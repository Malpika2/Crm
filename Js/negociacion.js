$.post(baseurl+"cGetUsuarios/getUsuarios",
	function(data){ 
		var emp = JSON.parse(data);
		$.each(emp,function(i,item){
		if(item.Status=='Inactivo'){}
			else {
			$('#PersonaCargo').append('<option value="'+item.idUsuario+'">'+item.Nombre+'</option>')
			$('#PersonaCargoP').append('<option value="'+item.idUsuario+'">'+item.Nombre+'</option>')}
			});
	});
$.post(baseurl+"cGetPersonas/getPersonas",
	function(data){
		var emp = JSON.parse(data);
		$.each(emp,function(i,item){
		if(item.Status=='Inactivo'){}
			else {
		$('#PersonaNegociacion2').append('<option value="'+item.idPersona+'">'+item.Nombre+'</option>')}
		});
	});
$.post(baseurl+"cGetPersonas/getRepresentantes",
	{
		Cargo:'Representante'
	},
	function(data){
		var emp = JSON.parse(data);
		$.each(emp,function(i,item){
		if(item.Status=='Inactivo'){}
			else {
			$('#PersonaNegociacion').append('<option value="'+item.idPersona+'">'+item.Nombre+'</option>')
			$('#PersonaContacto').append('<option value="'+item.idPersona+'">'+item.Nombre+'</option>')
			$('#Participantes').append('<option value="'+item.idPersona+'">'+item.Nombre+'</option>')}
			});


	});
$.post(baseurl+"cGetPersonas/getContactos",
	{
		Cargo:'Contacto'
	},
	function(data){
		var emp = JSON.parse(data);
		$.each(emp,function(i,item){
			if(item.Status=='Inactivo'){}
			else {
			$('#PersonaContacto').append('<option value="'+item.idPersona+'">'+item.Nombre+'</option>')}
			});
	});

$.post(baseurl+"cGetEmpresas/getEmpresas",
	{
		sitReg:1
	},
	function(data){
		var emp = JSON.parse(data);
		$.each(emp,function(i,item){
			if(item.sitReg=='1'){
				$('#EmpresaNegociacion').append('<option value="'+item.idEmpresa+'">'+item.RazonSocial+'</option>')
			}
			else {
			}
			});
	});

$('#EmpresaNegociacion').change(function(){
	$('#EmpresaNegociacion option:selected').each(function(){
		var id = $('#EmpresaNegociacion').val();
		$('#PersonaContacto').html('');
		$.post(baseurl+"cGetPersonas/getPersonasPorEmpresa",
				{
					idEmpresa:id
				},
				function(data){
					var emp = JSON.parse(data);
					$.each(emp,function(i,item){
						if(item.Status=='Inactivo'){}
						else {
						$('#PersonaContacto').append('<option value="'+item.idPersona+'">'+item.Nombre+'</option>')}
						});
				});
	});
});
$(document).ready(function() {
$('#ListaNegociaciones').on('click','#btnRealizadaNegociacion', function() {
      var Negociacionid = $(this).val();
      alert(Negociacionid);
              $.ajax({
              type: 'POST',
              url: baseurl+"cNegociacion/EliminarNegociacion" ,
              data:{Negociacionid:Negociacionid},
              success: function(data) {
              	location.reload();
              }
          });
          return true;
    });
});
