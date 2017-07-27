$.post(baseurl+"cGetEmpresas/getEmpresas",
	{
		sitReg:1
	},
	function(data){
		var emp = JSON.parse(data);
		$.each(emp,function(i,item){
			$('#Empresa').append('<option value="'+item.idEmpresa+'">'+item.RazonSocial+'</option>')
			});
	});

$(document).ready(function() {
$('#ListaPersonas').on('click','#btnRealizadaPersonas', function() {
			var Personaid = $(this).val();
              $.ajax({
              type: 'POST',
              url: baseurl+"cPersona/eliminarPersona" ,
              data:{Personaid:Personaid},
              success: function(data) {
              	alert('Persona Eliminada');
              	location.reload(true);
              }
          });
          return true;
    });
});