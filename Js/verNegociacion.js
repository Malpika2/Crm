mostrarTareasObjetivos();

$('#form, #fat, #formComentarios').submit(function() {
          $.ajax({
              type: 'POST',
              url: $(this).attr('action'),
              data: $(this).serialize(),
              success: function(data) { 
                $("#formComentarios")[0].reset();
                $('#ListaTareasNG').empty();
                 Recargar();
              }
          });
          
          return false;
});
$('#form, #fat, #formTareaOb').submit(function() {
          $.ajax({
              type: 'POST',
              url: $(this).attr('action'),
              data: $(this).serialize(),
              success: function(data) { 
                $("#formTareaOb")[0].reset();
                $("#ModalTareOb").modal("hide");
                mostrarTareasObjetivos();
              }
          });
          
          return false;
});

//Mostrar comentarios para los objetivos
$.post(baseurl+"cGetComentarios/getComentarios_Por_Negociacion",
  {
    idNegociacion:idNegociacion
  },
  function(data){
    var emp = JSON.parse(data);
    $.each(emp,function(i,item){
      $('#ListaTareasNG').append(
        '<div class="box box-info collapsed-box bg-info">'+
            '<div class="box-header with-border bg-info">'+
                  '<div class="user-block">'+
                    // '<img class="img-circle img-bordered-sm" src="'+baseurl+'assets/dist/img/'+item.url_foto+'" alt="">'+
                        '<span class="username">'+
                          '<a>'+item.Nombre+' '+item.Paterno+'</a>'+
                        '</span>'+
                    '<span class="description">'+item.Fecha_Creacion+'</span>'+
                  '</div>'+
              '<h4 class="">'+item.Comentario+'</h4>'+
              '<div class="box-tools pull-right">'+
                '<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i>'+
                '</button>'+
              '</div><!-- /.box-tools -->'+
            '</div><!-- /.box-header -->'+
            '<div class="box-body" style="padding:0px; margin:0px;">'+
            '<ul id="ListaComentariosComent'+item.idComentario+'" name="ListaComentariosComent" style="padding:0px; margin:0px;">'+
            '</ul>'+
            '<div class="row">'+
              '<form method="POST" action="'+baseurl+'cComentarios/guardarComentarioComentario" id="formComentariosComent" name="formComentariosComent">'+
                '<div class="col-sm-9">'+
                    '<input type="text" name="Nota" id="Nota" class="form-control input-sm" placeholder="Responder">'+
                '</div>'+
                '<div class="col-sm-3">'+
                  '<input type="hidden" id="idComent" name="idComent" value="'+item.idComentario+'">'+
                  '<input type="hidden" id="idUsuarioc" name="idUsuarioc" value="'+idUsuarioCrea+'">'+
                  '<button id="btn_Coment" type="submit" class="btn btn-success pull-right btn-block btn-sm">Responder</button>'+
                '</div>'+
              '</form>'+
            '</div>'+
            '</div><!-- /.box-body -->'+
          '</div><!-- /.box -->')
        ComentarioPorComentario(item.idComentario);
      });
  });
//Mostrar Comentarios de los comentarios
function ComentarioPorComentario(idComentario){
  $.post(baseurl+"cGetComentarios/getComentarios_Por_Comentario",
  {
    idComentario:idComentario
  },
  function(data){
    $('#ListaComentariosComent'+idComentario+'').html("");
    var emp1 = JSON.parse(data);
    $.each(emp1,function(i,item){
      $('#ListaComentariosComent'+idComentario+'').append(
        '<div class="box box-danger collapsed-box" style="padding:0px; margin:0px;">'+
            '<div class="box-header with-border bg-info">'+
                  '<div class="user-block">'+
                    // '<img class="img-circle img-bordered-sm" src="'+baseurl+'assets/dist/img/'+item.url_foto+'" alt="">'+
                        '<span class="username">'+
                          '<a href="#">'+item.Nombre+' '+item.Paterno+'</a>'+
                        '</span>'+
                    '<span class="description">'+item.Fecha_Creacion+'</span>'+
                  '</div>'+
              '<h4 class="">'+item.Comentario+'</h4>'+
            '</div><!-- /.box-header -->'+
          '</div><!-- /.box -->')
      });
  });
}
function Recargar(){
//Recargar comentarios para las comnt
$.post(baseurl+"cGetComentarios/getComentarios_Por_Negociacion",
  {
    idNegociacion:idNegociacion
  },
  function(data){
    var emp = JSON.parse(data);
    $.each(emp,function(i,item){
      $('#ListaTareasNG').append(
                '<div class="box box-info collapsed-box bg-info">'+
            '<div class="box-header with-border bg-info">'+
                  '<div class="user-block">'+
                    // '<img class="img-circle img-bordered-sm" src="'+baseurl+'assets/dist/img/'+item.url_foto+'" alt="">'+
                        '<span class="username">'+
                          '<a>'+item.Nombre+' '+item.Paterno+'</a>'+
                        '</span>'+
                    '<span class="description">'+item.Fecha_Creacion+'</span>'+
                  '</div>'+
              '<h4 class="">'+item.Comentario+'</h4>'+
              '<div class="box-tools pull-right">'+
                '<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i>'+
                '</button>'+
              '</div><!-- /.box-tools -->'+
            '</div><!-- /.box-header -->'+
            '<div class="box-body" style="padding:0px; margin:0px;">'+
            '<ul id="ListaComentariosComent'+item.idComentario+'" name="ListaComentariosComent" style="padding:0px; margin:0px;">'+
            '</ul>'+
            '<div class="row">'+
              '<form method="POST" action="'+baseurl+'cComentarios/guardarComentarioComentario" id="formComentariosComent" name="formComentariosComent">'+
                '<div class="col-sm-9">'+
                    '<input type="text" name="Nota" id="Nota" class="form-control input-sm" placeholder="Responder">'+
                '</div>'+
                '<div class="col-sm-3">'+
                  '<input type="hidden" id="idComent" name="idComent" value="'+item.idComentario+'">'+
                  '<input type="hidden" id="idUsuarioc" name="idUsuarioc" value="'+idUsuarioCrea+'">'+
                  '<button id="btn_Coment" type="submit" class="btn btn-success pull-right btn-block btn-sm">Responder</button>'+
                '</div>'+
              '</form>'+
            '</div>'+
            '</div><!-- /.box-body -->'+
          '</div><!-- /.box -->')
        ComentarioPorComentario(item.idComentario);
      });
  });
}
$(document).ready(function(){//GuardarComentariosde Coments
$('#ListaTareasNG').on('submit','#formComentariosComent',function(){
          $.ajax({
              type: 'POST',
              url: $(this).attr('action'),
              data: $(this).serialize(),
              success: function(data) { 
                $("#formComentariosComent")[0].reset();

                var idComent = $('#idComent').val();
                $('#ListaComentariosComent'+idComent).empty();
                ComentarioPorComentario(idComent);
                // Recargar();
              }
          });
          
          return false;
      });
});
$.post(baseurl+"cGetUsuarios/getUsuarios",
  function(data){
    var emp = JSON.parse(data);
    $.each(emp,function(i,item){
      $('#Asignados').append('<option value="'+item.idUsuario+'">'+item.Nombre+' '+item.Paterno+'</option>');
      });
  });

function mostrarTareasObjetivos(){
$('#LineaTareasOb').html('');
$.post(baseurl+"cTareas/getTareas_deObjetivos",
    {
      idNegociacion:idNegociacion
    },
   function(data){
    var emp = JSON.parse(data);
    var Activa =0;
    var Cancelada =0;
    var Realizada =0;
    $.each(emp,function(i,item){
      var texto = $('#idUsuarioc').val();
      var cadena = item.Asignados;
      if (cadena.indexOf(texto) != -1) {
    if(item.Activa==1){
      if(item.StatusTarea=='Activa'){Activa++;}
        if(item.StatusTarea=='Cancelada'){Cancelada++;}
          if(item.StatusTarea=='Realizada'){Realizada++;}
      $('#LineaTareasOb').append(                  
                  '<li class="time-label">'+
                   ' <span class="bg-yellow">'+
                    ''+item.FechaFin+
                    '</span>'+
                  '</li>'+
                  '<li>'+
                    '<i class="fa fa-envelope bg-blue"></i>'+
                    '<div class="timeline-item">'+
                      '<button disabled class="btn btn-info btn-sm pull-right" id="btnRealizada" name="btnRealizada" value="'+item.idTarea+'">'+item.StatusTarea+'</button>'+
                      '<h3 class="timeline-header"><a href="'+baseurl+'/cPersona/verTarea/'+item.idTarea+'">'+item.TituloTarea+'</a></h3>'+
                      '<div class="timeline-body">'+
                        ''+item.Descripcion+''+
                      '</div>'+
                      '<div class="timeline-footer">'+
                      '<b>Categoria: </b>'+item.Categoria+''+
                      '<span class="time pull-right"><i class="fa fa-clock-o"></i>'+item.FechaCreacion+'</span>'+
                      '</div>'+
                    '</div>'+
                  '</li>'+
                  '<li>'+
                  '</li>'
                  )}
    }
      });
      $('#TareasActivas').html('Activas: '+Activa);
      $('#TareasCanceladas').html('Canceladas: '+Cancelada);
      $('#TareasRealizadas').html('Realizadas: '+Realizada);
      var Avance = Activa+Realizada+Cancelada;
      Avance = (Realizada/Avance)*100;
      if (Avance>0) {
      $('#Avance').html(Avance+'%');  
      }
    $('#LineaTareasOb').append(
    '<li>'+                  
      '<i class="fa fa-clock-o bg-gray"></i>'+
    '</li>')
  });
}
$(document).ready(function() { //======Ocultar Tareas Realizadas
$('#LineaTareasOb').on('click','#btnRealizada', function() {
      var Tareaid = $(this).val();
              $("#ModalCancelar").modal();
        $("#ModalCancelar").on('hidden.bs.modal', function () {
              var StatusFinal = $('#StatusFinal').val();
              $.ajax({
              type: 'POST',
              url: baseurl+"cPersona/tareaRealizada" ,
              data:{Tareaid:Tareaid,StatusFinal:StatusFinal},
              success: function(data) { 
                $('#LineaTareasOb').empty();
                mostrarTareasObjetivos();
                }
              });
                  return false;
        });
    });
});//Fin Ocultar tareas realizadas
