Recargar();
function Recargar(){
 $.post(baseurl+"cForo/getTemas",
	function(data){
		var tema = JSON.parse(data);
		$.each(tema,function(i,item){
			$('#TemasForo').append('<div class="box box-success">'+
            '<div class="box-header">'+
              '<i class="fa fa-comments-o">TEMA:&nbsp;&nbsp;&nbsp;<b>'+item.TituloTema+'</b></i>'+
              '<br><i>Seccion:&nbsp;&nbsp;&nbsp;<b>'+item.seccion+'</b></i>'+              '<h3 class="box-title"></h3>'+
              '<div class="box-tools pull-right" data-toggle="tooltip" title="Status">'+
                '<div class="btn-group" data-toggle="btn-toggle">'+
                  '<button type="button" class="btn btn-default btn-sm active"><i class="fa fa-square text-green"></i>'+
                  '</button>'+
                  '<button type="button" class="btn btn-default btn-sm"><i class="fa fa-square text-red"></i></button>'+
                '</div>'+
              '</div>'+
            '</div>'+
            '<div class="box-body chat">'+
              '<div class="item">'+
              '<br>'+
                '<p class="message">'+
                  '<label class=" h3 name">'+
                    '<small class="text-muted pull-right"><i class="fa fa-clock-o"></i>'+item.FechaCreacion+'</small>'+
                    'Asunto:'+
                  '</label>'+
                  ''+item.AsuntoTema+''+
                '</p>'+
              '</div>'+
              '<hr>'+
              '<div class="col-md-12" id="ListaComentariosTema'+item.idTemasForo+'">'+
              '</div>'+
            '</div>'+
    		'<form name="formComentarioTema" id="formComentarioTema" method="POST" action="#">'+
            '<div class="box-footer">'+
              '<div class="input-group">'+
                '<input type="text" id="Comentario" name="Comentario" class="form-control" placeholder="Type message...">'+
                '<input type="hidden" id="idUsuarioc" name="idUsuarioc" value="'+idUsuarioActivo+'">'+
                '<input type="hidden" id="idTema" name="idTema" value="'+item.idTemasForo+'">'+
                '<div class="input-group-btn">'+
                  '<button type="submit" class="btn btn-success"><i class="fa fa-plus"></i></button>'+
                '</div>'+
              '</div>'+
            '</div>'+
            '</form>'+
          '</div>');
			comentariosPorTema(item.idTemasForo);
		});
	});
}
function comentariosPorTema(idTemaForo){
	          $.ajax({
              type: 'POST',
              url: baseurl+"cForo/getComentariosPorTema",
              data:{idTemaForo:idTemaForo},
              success: function(data) { 
				var tema = JSON.parse(data);
				$.each(tema,function(i,item){
					$('#ListaComentariosTema'+idTemaForo+'').append('<div class="item">'+
		                '<img src="<?php echo base_url();?>assets/dist/img/silueta_user.png" alt="user" class="offline">'+
		                '<p class="message">'+
		                  '<a href="#" class="name">'+
		                    '<small class="text-muted pull-right"><i class="fa fa-clock-o"></i>'+item.Fecha_Creacion+'</small>'+
		                    ''+item.Nombre+'  '+item.Paterno+'' +
		                  '</a>'+
		                  ''+item.Comentario+''+
		                '</p>'+
		              '</div>');
              	});
          	}
          });
}
$(document).ready(function(){
$('#TemasForo').on('submit','#formComentarioTema',function(){
          $.ajax({
              type: 'POST',
              url: baseurl+"cForo/guardarComentario",
              data: $(this).serialize(),
              success: function(data) { 
              	$('#TemasForo').empty();
                Recargar();
              }
          });
          
          return false;
      });
});
$('#form, #fat, #formAgregarTema').submit(function() {
          $.ajax({
              type: 'POST',
              url: $(this).attr('action'),
              data: $(this).serialize(),
              success: function(data) { 
                $("#formAgregarTema")[0].reset();
                $('#TemasForo').empty();
                $('#mbtnCerrarModal').click();
                 Recargar();
              }
          });
          
          return false;
});

