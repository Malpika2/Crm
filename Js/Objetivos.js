if(typeof(idObjetivos) != "undefined"){ 
	cargarMetasPorObjetivos();
 }
 if(typeof(idMeta) != "undefined"){
 cargarTareasPorMeta(); 
 }
$.post(baseurl+"cGetUsuarios/getUsuarios",
  function(data){     
    var emp = JSON.parse(data);
    $.each(emp,function(i,item){
      $('#UsuarioTareaInterna').append('<option value="'+item.idUsuario+'">'+item.Nombre+' '+item.Paterno+'</option>')
      });
  });
$('#form, #fat, #formObjetivos').submit(function() {
          $.ajax({
              type: 'POST',
              url: $(this).attr('action'),
              data: $(this).serialize(),
              success: function(data) {
                $("#formObjetivos")[0].reset();
                $("#ModalObjetivos").modal("hide");
                location.href=baseurl+"CObjetivos/";
              }
          });
    return false;
});

$('#form, #fat, #formTareasInternas').submit(function() {
          $.ajax({
              type: 'POST',
              url: $(this).attr('action'),
              data: $(this).serialize(),
              success: function(data) {
                $("#formTareasInternas")[0].reset();
                $("#ModalTareaInterna").modal("hide");
                cargarTareasPorMeta();
                $('#ListaTareasMetas').empty();
              }
          });
    return false;
});
$('#form, #fat, #formMeta').submit(function() {
          $.ajax({
              type: 'POST',
              url: $(this).attr('action'),
              data: $(this).serialize(),
              success: function(data) {
                $("#formMeta")[0].reset();
                $("#ModalMeta").modal("hide");
                cargarMetasPorObjetivos();
                $('#ListaMetas').empty();
              }
          });
    return false;
});

function cargarMetasPorObjetivos(){
$.post(baseurl+"cObjetivos/getMetasPorObjetivo",
	{
		idObjetivos:idObjetivos
	},
	function(data){
		var emp = JSON.parse(data);
		$.each(emp,function(i,item){
			$('#ListaMetas').append(
				'<tr>'+
					'<td>'+
						'<a href='+baseurl+'CObjetivos/verMeta/'+item.idMetas+'>'+item.TituloMeta+'</a>'+
					'</td>'+
					'<td>'+
						''+item.Porcentaje+''+
					'</td>'+
					'<td>'+
						''+item.FechaActualizacion+''+
					'</td>'+
				'</tr>');
			});
	});
}
function cargarTareasPorMeta(){
$.post(baseurl+"CObjetivos/getTareasPorMeta",
	{
		idMeta:idMeta
	},
	function(data){
		var emp = JSON.parse(data);
		$.each(emp,function(i,item){
			$('#ListaTareasMetas').append(
				'<tr>'+
					'<td>'+
						'<a href='+baseurl+'cPersona/verTarea/'+item.idTarea+'>'+item.TituloTarea+'</a>'+
					'</td>'+
					'<td>'+
						''+item.Prioridad+''+
					'</td>'+
					'<td>'+
						''+item.FechaFin+''+
					'</td>'+
				'</tr>');
			});
	});
}

