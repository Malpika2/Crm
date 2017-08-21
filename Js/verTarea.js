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
        '<div class="box box-info collapsed-box bg-info">'+
            '<div class="box-header with-border bg-info">'+
                  '<div class="user-block">'+
                    '<img class="img-circle img-bordered-sm" src="'+baseurl+'assets/dist/img/'+item.url_foto+'" alt="">'+
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
        '<div class="box box-info collapsed-box bg-info">'+
            '<div class="box-header with-border bg-info">'+
                  '<div class="user-block">'+
                    '<img class="img-circle img-bordered-sm" src="'+baseurl+'assets/dist/img/'+item.url_foto+'" alt="">'+
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

// StatusRealizada = function(){
//   $.post(baseurl+"cTareas/StatusRealizada",
//   {
//     idTarea:idTarea
//   },
//   function(data){
//     location.reload(); 
//   });
// };
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
