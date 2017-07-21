$.post(baseurl+"cGetPersonas/getContactos",
	{ 
		Cargo:'Contacto'
	},
	function(data){
		var emp = JSON.parse(data);
		$.each(emp,function(i,item){
						if(item.Status=='Inactivo'){}
			else {
			$('#Contacto').append('<option value="'+item.idPersona+'">'+item.Nombre+'</option>')}
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
			$('#Contacto').append('<option value="'+item.idPersona+'">'+item.Nombre+'</option>')
			$('#Representante').append('<option value="'+item.idPersona+'">'+item.Nombre+'</option>')
			}
			});

	});

$('#Representante').change(function(){
	$('#Representante option:selected').each(function(){
		var id = $('#Representante').val();
		if (id=='Agregar') {
		 $("#ModalNPersona").modal("show") 
		$('#Representante').html('');
		$('#Contacto').html('');
		$.post(baseurl+"cGetPersonas/getRepresentantes",
	{
		Cargo:'Representante'
	},
	function(data){
		var emp = JSON.parse(data);
		$.each(emp,function(i,item){
			if(item.Status=='Inactivo'){}
			else {
			$('#Contacto').append('<option value="'+item.idPersona+'">'+item.Nombre+'</option>')
			$('#Representante').append('<option value="'+item.idPersona+'">'+item.Nombre+'</option>')
			}
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
			$('#Contacto').append('<option value="'+item.idPersona+'">'+item.Nombre+'</option>')}
			});
	});
		}
		else{
			alert(id);
		}
	});
});

$(document).ready(function() {
$('#ListaEmpresas').on('click','#btnRealizadaEmpresas', function() {
      var Empresaid = $(this).val();
              $.ajax({
              type: 'POST',
              url: baseurl+"cEmpresa/EliminarEmpresa" ,
              data:{Empresaid:Empresaid},
              success: function(data) {
              	location.reload();
              }
          });
          return true;
    });
});
