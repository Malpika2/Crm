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
                    if (NombreUsuarioActivo==='Anthony') {
                      $('#item'+item.idComentario+'').append(
                        '<button type="button" onclick="VistoComent(\'Visto\','+item.idComentario+');" id="btnVistoComent" name="btnVistoComent" class="pull-right fa fa-check btn btn-info btn-xs" value="Realizado">'+
                        'Visto</button>'+
                        '<button type="button" onclick="VistoComent(\'Pendiente\','+item.idComentario+');" id="btnPendienteComent" name="btnPendienteComent" class="pull-right fa fa-check btn btn-warning btn-xs" value="pendiente">'+
                        'Pendiente</button>'+
                        '<button type="button" onclick="VistoComent(\'Realizado\','+item.idComentario+');" id="btnVistoComent" name="btnVistoComent" class="pull-right fa fa-check btn btn-success btn-xs" value="Visto">'+
                        'Realizado</button>')}
                    if (item.Visto=='1') {
                      $('#divCheck'+item.idComentario).append('<small class="bg-blue label">Visto</small>');
                    }
                    if (item.Visto=='2') {
                      $('#divCheck'+item.idComentario).append('<small class="bg-yellow label">Pendiente</small>');
                    }
                    if (item.Visto=='3') {
                      $('#divCheck'+item.idComentario).append('<small class="bg-green label">Realizado</small>');
                    }            
                    if (item.Visto!=='3'){
                      $('#item'+item.idComentario+'').append('<button type="button" onclick="AddTareaForo('+item.idComentario+');" id="btn_addTareaForo'+item.idComentario+'" name="btn_addTareaForo'+item.idComentario+'" class="pull-right fa fa-share-square-o btn btn-primary btn-xs" value="Realizado">'+
                        'Generar Tarea</button>');
                    }

              	});

          	}
          });
}

AddTareaForo = function($idComentario){
  $comentario= $('#Comentario'+$idComentario).val();
    $.ajax({
      type:'POST',
      url:baseurl+'cForo/AddTareaForo',
      data:{idComentario:$idComentario,comentario:$comentario},
      success:function(data){
        alert ('Tarea agregada');
        VistoComent('Visto',$idComentario);
        $('#btn_addTareaForo'+$idComentario).addClass('hidden');
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
function VistoComent(valor2,valor){
  $.ajax({
    type:'POST',
    url:baseurl+"cForo/ActualizarVisto",
    data:{valor:valor,valor2:valor2},
    success:function(data){
  if (valor2==='Visto'){
      $('#divCheck'+valor).html('<small class="bg-blue label">Visto</small>');
  }
  if (valor2==='Pendiente'){
      $('#divCheck'+valor).html('<small class="bg-yellow label">Pendiente</small>');
  }
  if (valor2==='Realizado'){
      $('#divCheck'+valor).html('<small class="bg-green label">Realizado</small>');
  }
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
$.post(baseurl+'cForo/getTareaForo',
  function(data){
    $tareas = JSON.parse(data);
    $.each($tareas,function(i,item){
      if (item.status=='pendiente'){
        $clase='btn-danger';
      }
      if (item.status=='En proceso'){
        $clase='btn-warning';
      }
      if (item.status=='Realizada'){
        $clase='btn-success';
      }
      $('#bodyTareasForo').append('<tr><td>'+item.descripcion+'</td>'+
        '<td><select onChange="actTareaForo('+item.idTareaForo+')" id="selectTareasForo'+item.idTareaForo+'" class="btn '+$clase+'"></select></td>');
      if (item.status=='pendiente'){
        $('#selectTareasForo'+item.idTareaForo).append('<option class="" value="'+item.status+'" selected>'+item.status+'</option>'+
          '<option value="En proceso">En proceso</option>'+
          '<option value="Realizada">Realizada</option>')
      }
      if (item.status=='En proceso'){
        $('#selectTareasForo'+item.idTareaForo).append('<option value="'+item.status+'" selected>'+item.status+'</option>'+
          '<option value="pendiente">pendiente</option>'+
          '<option value="Realizada">Realizada</option>')
      }
      if (item.status=='Realizada'){
        $('#selectTareasForo'+item.idTareaForo).append('<option value="'+item.status+'" selected>'+item.status+'</option>'+
          '<option value="En proceso">En proceso</option>'+
          '<option value="pendiente">pendiente</option>')
      }
    });
  });

actTareaForo = function($idTareaForo){
  $status = $('#selectTareasForo'+$idTareaForo).val();
    $.post(baseurl+'cForo/actTareaForo',
      {idTareaForo:$idTareaForo,status:$status},
      function(data){

      });
}
