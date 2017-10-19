$('#form, #fat, #formComentarios').submit(function() {
          $.ajax({
              type: 'POST',
              url: $(this).attr('action'),
              data: $(this).serialize(),
              success: function(data) { 
                $("#formComentarios")[0].reset();
                $('#ListaTareas').empty();
                 Recargar();
              }
          });
          
          return false;
});
//Mostrar comentarios para las tareas
$.post(baseurl+"cGetComentarios/getComentarios_Por_Tarea",
  {
    idTarea:idTarea
  },
  function(data){
    var emp = JSON.parse(data);
    $.each(emp,function(i,item){
      $('#ListaTareas').append(
        '<div class="box box-info collapsed-box">'+
            '<div class="box-header with-border">'+
                  '<div class="user-block">'+
                    // '<img class="img-circle img-bordered-sm" src="'+baseurl+'assets/dist/img/'+item.url_foto+'" alt="">'+
                        '<span class="username">'+
                          '<a>'+item.Nombre+' '+item.Paterno+'</a>'+
                        '</span>'+
                    '<span class="description">'+item.Fecha_Creacion+'</span>'+
                  '</div>'+
              '<h4 class="">'+item.Comentario+'</h4>'+
            '</div><!-- /.box-header -->'+
            '<div class="box-body">'+
            '<ul id="ListaComentariosComent'+item.idComentario+'" name="ListaComentariosComent">'+
            '</ul>'+
            '<div class="row">'+
              '<form method="POST" action="'+baseurl+'cComentarios/guardarComentarioComentario" id="formComentariosComent" name="formComentariosComent">'+
                '<div class="col-sm-9">'+
                    '<input type="text" name="Nota" id="Nota" class="form-control input-sm" placeholder="Responder">'+
                '</div>'+
                '<div class="col-sm-3">'+
                  '<input type="hidden" id="idComent" name="idComent" value="'+item.idComentario+'">'+
                  '<input type="hidden" id="idUsuarioc" name="idUsuarioc" value="'+item.idPersona+'">'+
                  '<button id="btn_Coment" type="submit" class="btn btn-success pull-right btn-block btn-sm">Responder</button>'+
                '</div>'+
              '</form>'+
            '</div>'+
            '</div><!-- /.box-body -->'+
          '</div><!-- /.box -->')
      });
  });
function Recargar(){
//Recargar comentarios para las tareas
$.post(baseurl+"cGetComentarios/getComentarios_Por_Tarea",
  {
    idTarea:idTarea
  },
  function(data){
    var emp = JSON.parse(data);
    $.each(emp,function(i,item){
      $('#ListaTareas').append(
        '<div class="box box-info collapsed-box ">'+
            '<div class="box-header with-border ">'+
                  '<div class="user-block">'+
                    // '<img class="img-circle img-bordered-sm" src="'+baseurl+'assets/dist/img/'+item.url_foto+'" alt="">'+
                        '<span class="username">'+
                          '<a>'+item.Nombre+' '+item.Paterno+'</a>'+
                        '</span>'+
                    '<span class="description">'+item.Fecha_Creacion+'</span>'+
                  '</div>'+
              '<h4 class="">'+item.Comentario+'</h4>'+
            '</div><!-- /.box-header -->'+
            '<div class="box-body">'+
            '<ul id="ListaComentariosComent'+item.idComentario+'" name="ListaComentariosComent">'+
            '</ul>'+
            '<div class="row">'+
              '<form method="POST" action="'+baseurl+'cComentarios/guardarComentarioComentario" id="formComentariosComent" name="formComentariosComent">'+
                '<div class="col-sm-9">'+
                    '<input type="text" name="Nota" id="Nota" class="form-control input-sm" placeholder="Responder">'+
                '</div>'+
                '<div class="col-sm-3">'+
                  '<input type="hidden" id="idComent" name="idComent" value="'+item.idComentario+'">'+
                  '<input type="hidden" id="idUsuarioc" name="idUsuarioc" value="'+item.idPersona+'">'+
                  '<button id="btn_Coment" type="submit" class="btn btn-success pull-right btn-block btn-sm">Responder</button>'+
                '</div>'+
              '</form>'+
            '</div>'+
            '</div><!-- /.box-body -->'+
          '</div><!-- /.box -->')
      });
  });
}
$("#mbtnEnviar").click(function(){
  var StatusFinal = $('#StatusFinal').val();
      $.post(baseurl+"cTareas/StatusRealizada",
      {
        idTarea:idTarea,
        StatusFinal:StatusFinal
      },
      function(data){
        location.reload(); 
        $('#mbtnCancelar').click();
      }

    );
});
$("#mbtnEnviarCancelada").click(function(){
  var StatusFinalC = $('#StatusFinalCancelada').val();
      $.post(baseurl+"cTareas/StatusCancelar",
      {
        idTarea:idTarea,
        StatusFinal:StatusFinalC
      },
      function(data){
        location.reload(); 
        $('#mbtnCancelarC').click();
      }

    );
});
$("#mbtnEnviarRechazada").click(function(){
  var StatusFinalRechazada= $('#StatusFinalRechazada').val();
      $.post(baseurl+"cTareas/StatusRechazar",
      {
        idTarea:idTarea,
        StatusFinalRechazada:StatusFinalRechazada
      },
      function(data){
        actNotificacionesRechazada_Leida(idTarea);
        $('#mbtnCancelarR').click();
      }

    );
});
AceptarTarea = function(){
      $.post(baseurl+"cTareas/StatusAceptar",
      {
        idTarea:idTarea,
      },
      function(data){
        actNotificacionesRechazada_Leida(idTarea);
      }
    );
       // location.reload();
}
 actNotificacionesRechazada_Leida = function($idTarea){
  $.post(baseurl+'cTareas/actNotificacionesRechazada_Leida/',
    {
      idTarea:$idTarea,
      idUduarioActivo:idUsuarioActivo
    },
    function(data){
      location.reload();
    });
 }

$('#btnEditarTarea').click(function(){
  $('#Categoria').prop('disabled',false);
  $('#Descripcion').prop('disabled',false);
  $('#btnGuardarCambiosTarea').removeClass('hidden');
  $('#btnEditarTarea').addClass('hidden');
});

$('#btnGuardarCambiosTarea').click(function(){
var Categoria= $('#Categoria').val();
var Descripcion = $('#Descripcion').val();

  $.post(baseurl+"cTareas/GuardarCambiosTarea/",
    {
      idTarea:idTarea,
      Categoria:Categoria,
      Descripcion:Descripcion
    },
    function(data){
  $('#Categoria').prop('disabled',true);
  $('#Descripcion').prop('disabled',true);
  $('#btnGuardarCambiosTarea').addClass('hidden');
  $('#btnEditarTarea').removeClass('hidden');  
    });
});