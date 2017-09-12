$.post(baseurl+"cGetUsuarios/getUsuarios",
	function(data){ 
		var emp = JSON.parse(data);
		$.each(emp,function(i,item){
		if(item.Status=='Inactivo'){}
			else {
			$('#PersonaCargo').append('<option value="'+item.idUsuario+'">'+item.Nombre+'</option>')
			$('#PersonaCargoP').append('<option value="'+item.idUsuario+'">'+item.Nombre+'</option>')}
		if(item.idUsuario===idUsuarioActivo){
        	$('#FiltroObjetivos').append('<option value="'+item.idUsuario+'">Mis Objetivos</option>');
      		}
      		else{
      		$('#FiltroObjetivos').append('<option value="'+item.idUsuario+'">Objetivos de: '+item.Nombre+'</option>')}
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
				$('#EmpresaNegociacion').append('<option value="'+item.idEmpresa+'">'+item.NombreEmpresa+'</option>')
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
						if(item.Status=='Inactivo'){

						}
						else {
						$('#PersonaContacto').append('<option value="'+item.idPersona+'">'+item.Nombre+'</option>')}
						});
				});
	});
});

$(document).ready(function() {
$('#ListaNegociaciones').on('click','#btnRealizadaNegociacion', function() {
      var Negociacionid = $(this).val();
          $.confirm({
        title: 'Eliminar Objetivo!',
        content: 'El objetivo será marcado como inactivo, ¿Desea continuar?',
        buttons: {
            Continuar: function () {
                // $.alert('Confirmed!');
              $.ajax({
              type: 'POST',
              url: baseurl+"cNegociacion/EliminarNegociacion" ,
              data:{Negociacionid:Negociacionid},
              success: function(data) {
              	location.reload();
              }
          });
          return true;
            },
            Cancelar: function () {
            }
        }
    });
    });
});
$(document).ready(function(){
$.post(baseurl+"cNegociacion/ActualizarAvance",
	function(data){
		var tar = JSON.parse(data);
		// alert(data);
		$.each(tar,function(i,item){
			var idNeg = item.idNegociacion;
			var cont = item.cont;
			var Status = item.StatusTarea;
			$.ajax({
				type:'POST',
				url:baseurl+"cNegociacion/Actualizar"+Status,
				data:{idNeg:idNeg,cont:cont},
				success:function(data){

				}
			});
		});
	});
});
filtrarObjetivos = function(){
  var FObjetivos = $('#FiltroObjetivos').val();
  $('.Todas').addClass('hidden');

	var x = document.getElementById("tab_Empresas");
	var y = x.getElementsByClassName("trObjetivo"+FObjetivos);
	var i;
	for (i = 0; i < y.length; i++) {
	  y[i].classList.remove('hidden');
	}
	var x = document.getElementById("tab_Personas");
	var y = x.getElementsByClassName("trObjetivo"+FObjetivos);
	var i;
	for (i = 0; i < y.length; i++) {
	  y[i].classList.remove('hidden');
	}

	if (FObjetivos==='Todas') {
		$('.Todas').removeClass('hidden');
	}
	
} 