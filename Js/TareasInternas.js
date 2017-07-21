$.post(baseurl+"cGetUsuarios/getUsuarios",
	function(data){ 
		var emp = JSON.parse(data);
		$.each(emp,function(i,item){
			$('#UsuarioTareaInterna').append('<option value="'+item.idUsuario+'">'+item.Nombre+'</option>')
			});
});

$('#form, #fat, #formTareasInternas').submit(function() {
          $.ajax({
              type: 'POST',
              url: $(this).attr('action'),
              data: $(this).serialize(),
              success: function(data) {
                $("#formTareasInternas")[0].reset();
                $("#formTareasInternas").val(null).trigger("change");
                $("#ModalTarea").modal("hide");
              }
          });
          
          return true;
      });

$(document).ready(function() {
$('#ListaTareasInternas').on('click','#btnRealizada', function() {
      var Tareaid = $(this).val();
              $.ajax({
              type: 'POST',
              url: baseurl+"cTareasInternas/btnRealizadaNegociacion" ,
              data:{Tareaid:Tareaid},
              success: function(data) {
              	alert('Tarea Eliminada');
              	location.reload();
              }
          });
          return true;
    });
});
// $.post(baseurl+"cTareasInternas/getTareasInternas",
// 	{
// 		idUsuarioActivo:idUsuarioActivo
// 	},
// 	function(data){
// 		var emp = JSON.parse(data);
// 		$.each(emp,function(i,item){
// 		$('#ListaTareasInternas').append(
//         '<tr><td>'+item.TituloTarea+'</td>'+
//         '<td>'+item.Descripcion+'</td>'+
//         '<td>'+item.Nombre+' '+item.Paterno+'</td>'+
//         '<td>'+item.Prioridad+'</td>'+
//         '<td>'+item.FechaFin+'</td></tr>')
//        });
// 	});
