// Recargar();
Recargar2();
comentariosPorTema();
function Recargar2(){
 $.post(baseurl+"cForo/getTemas",
  function(data){
    var tema = JSON.parse(data);
    $.each(tema,function(i,item){
      var Titulo = item.TituloTema;
      $('#bodyTablaForo').append('<tr>'+
        '<td class="text-right"><i class="fa fa-comments-o fa-2x"></i></td>'+
        '<td><a href='+baseurl+'cForo/verTemaForo/'+item.idTemasForo+'><b>'+Titulo.toUpperCase()+'</b></a><p>'+item.AsuntoTema+'</p>'+
        '</td>'+
        '<td>'+item.seccion+'</td>'+
        '<td>'+item.Status+'</td>'+        
        '<td>'+item.FechaCreacion+'</td></tr>');
    });
  });
}
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
              '<div class="col-md-12" id="ListaComentariosTema'+item.idTemasForo+'" style="max-height:300px; overflow-y:scroll;">'+
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
function comentariosPorTema(){
  var idTemaForo = idTemasForo;
	          $.ajax({
              type: 'POST',
              url: baseurl+"cForo/getComentariosPorTema",
              data:{idTemaForo:idTemaForo},
              success: function(data) { 
				var tema = JSON.parse(data);
				$.each(tema,function(i,item){
					$('#ListaComentariosTema'+idTemaForo+'').append('<hr><div class="item">'+
		                '<img src="<?php echo base_url();?>assets/dist/img/silueta_user.png" alt="" class="offline">'+
		                '<p class="message">'+
		                  '<a href="#" class="name">'+
		                    '<small class="text-muted pull-right"><i class="fa fa-clock-o"></i>'+item.Fecha_Creacion+'</small>'+
		                    '<div class="pull-left" id="divCheck'+item.idComentario+'"></div>'+item.Nombre+'  '+item.Paterno+''+
		                  '</a>')
                      $('#ListaComentariosTema'+idTemaForo+'').append('<div id="item'+item.idComentario+'">'+
		                  '<textarea  onblur="ActualizarComentario('+item.idComentario+');" id="Comentario'+item.idComentario+'" disabled class="pasive form-control" type="text" style="resize:none; border:none; margin-bottom:5px; ">'+item.Comentario+'</textarea>'+
                       '</div>'+
		                '</p>'+
		              '</div>');
                  if (item.idUsuarioc==idUsuarioActivo){
                    $('#item'+item.idComentario+'').append(
                        '<button type="button" onclick="funcionclick('+item.idComentario+');" id="btnEditarComent" name="btnEditarComent" class="pull-right fa fa-edit" value="'+item.idComentario+'">'+
                        '</button>')}
                    if (NombreUsuarioActivo==='Yasser') {
                      $('#item'+item.idComentario+'').append(
                        '<button type="button" onclick="VistoComent('+item.idComentario+');" id="btnVistoComent" name="btnVistoComent" class="pull-right fa fa-check" value="'+item.idComentario+'">'+
                        'Visto</button>')}
                    if (item.Visto=='1') {
                      $('#divCheck'+item.idComentario).append('<i class="fa fa-check text-success"></i><i class="fa fa-check text-success"></i>');
                    }
              	});

          	}
          });
}

function ActualizarComentario(idComentario){
  $('#Comentario'+idComentario).prop('disabled', true);
  $('#Comentario'+idComentario).toggleClass('EnEdicion');

  var comentario = $('#Comentario'+idComentario).val();
  $.ajax({
      type:'POST',
      url:baseurl+"cForo/ActualizarComentario",
      data:{valor:idComentario,comentario:comentario},
      success: function(data){
          alert('Actualizacion correcta');
      }
  });
  return false;
}

function funcionclick(valor){
  $('#Comentario'+valor).prop('disabled', false);
  // $('#Comentario'+valor).classList.remove('pasive');
  $('#Comentario'+valor).addClass('EnEdicion');
  $('#Comentario'+valor).focus();
}
function VistoComent(valor){
  $.ajax({
    type:'POST',
    url:baseurl+"cForo/ActualizarVisto",
    data:{valor:valor},
    success:function(data){
      $('#divCheck'+valor).append('<i class="fa fa-check text-success"></i><i class="fa fa-check text-success"></i>');
    }
  });
}

$(document).ready(function(){//Guarda comentarios
$('#ComentariosTemaForo').on('submit','#formComentarioTema',function(){
          $.ajax({
              type:'POST',
              url: baseurl+"cForo/guardarComentario",
              data: $(this).serialize(),
              success: function(data) { 
              	$('#ListaComentariosTema'+idTemasForo).empty();
               //  Recargar();
               comentariosPorTema();
               $('#Comentario').val('');
              }
          });
          
          return false;
      });
});
$('#form, #fat, #formAgregarTema').submit(function() {
      $(this).preventDefault();
          $.ajax({
              type:'POST',
              url:$(this).attr('action'),
              data:$(this).serialize(),
              success: function(data) { 
                $('#formAgregarTema')[0].reset();
                $('#bodyTablaForo').empty();
                $('#mbtnCerrarModal').click();
                 Recargar2();
              }
          });
        return false;
});

