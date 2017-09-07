mostrarTareasObjetivos();

$('#form, #fat, #formComentarios').submit(function() {


          $.ajax({
              type: 'POST',
              url: $(this).attr('action'),
              data: $(this).serialize(),
              success: function(data) {
                var idNegociacion = $('#idNegociacion').val();
                    var file_data = $('#file').prop('files')[0];
                    if (file_data){
                        var form_data = new FormData();
                        form_data.append('file', file_data);
                        $.ajax({
                            url: baseurl+'ajaxupload/upload_file', 
                            dataType: 'text', 
                            cache: false,
                            contentType: false,
                            processData: false,
                            data:form_data,
                            type: 'post',
                            success: function (response) {
                                $('#msg').html(response); // Exito
                                $.post(baseurl+"ajaxupload/uploadBD",{
                                  idNegociacion:idNegociacion,
                                  idComentario:data,
                                  nombreArchivo:file_data['name']},
                                  function(data){
                                    $("#formComentarios")[0].reset();
                                    Recargar(idNegociacion);
                                   $('#ListaTareasNG').empty();
                                });
                              $('#spanFile').html('Cargar Archivo&hellip;');
                            },
                            error: function (response) {
                                $('#msg').html(response); // error
                        }
                    });
                    } 
                    else{
                      $('#msg').html('');
                      $('#spanFile').html('Cargar Archivo&hellip;');
                    }
                                    $("#formComentarios")[0].reset();
                                    Recargar(idNegociacion);
                                    $('#ListaTareasNG').empty();

              }
          });

          // $.ajax({
          //     type: 'POST',
          //     url: $(this).attr('action'),
          //     data: $(this).serialize(),
          //     success: function(data) { 
          //       $("#formComentarios")[0].reset();
          //       $('#ListaTareasNG').empty();
          //        Recargar(idNegociacion);
          //     }
          // });
          
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
  if (item.NombreArchivo ===null){item.NombreArchivo='';}
      $('#ListaTareasNG').append(
        '<div class="box box-info collapsed-box bg-info">'+
            '<div class="box-header with-border">'+
              '<div class="box-tools col-md-12" style="position:inherit;">'+
                '<button type="button" class="btn btn-box-tool pull-left" data-widget="collapse" data-toggle="tooltip" title="Respuestas"><i class="fa fa-sort-down fa-2x"></i>'+
                '</button>'+
                '<button id="btnResponder" name="btnResponder" type="button" class="btn btn-box-tool pull-right" data-toggle="tooltip" title="Responder" value="'+item.idComentario+'"><i class="fa fa-mail-reply text-green"></i>'+
                '</button>'+
              '</div><!-- /.box-tools -->'+
                  '<div class="user-block">'+
                        '<span class="username col-md-11">'+
                          '<b style="font-size:14px;">'+item.Nombre+'</b>'+
                          '<span class="description pull-right">'+item.Fecha_Creacion+'</span>'+
                        '</span>'+
                  '</div>'+
              '<h4 class="" style="margin:5px; padding-left:50px; font-size:14px;">'+item.Comentario+'</h4>'+
                '<a href="'+baseurl+'uploads/'+item.NombreArchivo+'">'+item.NombreArchivo+'</a>'+
            '<div class="row hidden" id="divResponder'+item.idComentario+'" name="divResponder'+item.idComentario+'" style="padding: 2px 50px 0px;">'+
              '<form class="" method="POST" action="'+baseurl+'cComentarios/guardarComentarioComentario" id="formComentariosComent" name="formComentariosComent">'+
                '<div class="col-sm-9">'+
                    '<textarea type="text" name="Nota" id="Nota" class="form-control input-sm" placeholder="Responder"></textarea>'+
                '</div>'+
                '<div class="col-sm-3">'+
                  '<input class="" type="hidden" id="idComent'+item.idComentario+'" name="idComent'+item.idComentario+'" value="">'+
                  '<input class="" type="hidden" id="idComent" name="idComent"  value="'+item.idComentario+'">'+
                  '<input type="hidden" id="idUsuarioc" name="idUsuarioc" value="'+idUsuarioCrea+'">'+
                  '<input type="file" name="file'+item.idComentario+'" id="file'+item.idComentario+'"/>'+
                  '<button id="btn_Coment" value="'+item.idComentario+'" type="submit" class="btn btn-success pull-right btn-block btn-sm">Responder</button>'+
                '</div>'+
              '</form>'+
            '</div>'+
            '</div><!-- /.box-header -->'+
            '<div class="box-body">'+
            '<ul id="ListaComentariosComent'+item.idComentario+'" name="ListaComentariosComent">'+
            '</ul>'+
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
  if (item.NombreArchivo ===null){item.NombreArchivo='';}
      $('#ListaComentariosComent'+idComentario+'').append(
        '<div class="box box-danger collapsed-box">'+
            '<div class="box-header with-border">'+
                  '<div class="user-block">'+
                        '<span class="username">'+
                          '<b style="font-size:14px;">'+item.Nombre+'</b>'+
                    '<span class="description pull-right">'+item.Fecha_Creacion+'</span>'+
                        '</span>'+
                  '</div>'+
              '<h4 class="" style="margin:0px; padding-left:50px; font-size:14px;">'+item.Comentario+'</h4>'+
              '<a href="'+baseurl+'uploads/'+item.NombreArchivo+'">'+item.NombreArchivo+'</a>'+
            '</div><!-- /.box-header -->'+
          '</div><!-- /.box -->')
      });
  });
}
function limpiar() {//Limpia el area comentarios "activity"
var d = document.getElementById("ListaTareasNG");
while (d.hasChildNodes())
d.removeChild(d.firstChild);
}

function Recargar(idNegociacion){
limpiar();
$.post(baseurl+"cGetComentarios/getComentarios_Por_Negociacion",
  {
    idNegociacion:idNegociacion
  },
  function(data){
    var emp = JSON.parse(data);
    $.each(emp,function(i,item){
  if (item.NombreArchivo ===null){item.NombreArchivo='';}
      $('#ListaTareasNG').append(
        '<div class="box box-info collapsed-box bg-info">'+
            '<div class="box-header with-border">'+
              '<div class="box-tools col-md-12" style="position:inherit;">'+
                '<button type="button" class="btn btn-box-tool pull-left" data-widget="collapse" data-toggle="tooltip" title="Respuestas"><i class="fa fa-sort-down fa-2x"></i>'+
                '</button>'+
                '<button id="btnResponder" name="btnResponder" type="button" class="btn btn-box-tool pull-right" data-toggle="tooltip" title="Responder" value="'+item.idComentario+'"><i class="fa fa-mail-reply text-green"></i>'+
                '</button>'+
              '</div><!-- /.box-tools -->'+
                  '<div class="user-block">'+
                        '<span class="username col-md-11">'+
                          '<b style="font-size:14px;">'+item.Nombre+'</b>'+
                          '<span class="description pull-right">'+item.Fecha_Creacion+'</span>'+
                        '</span>'+
                  '</div>'+
              '<h4 class="" style="margin:5px; padding-left:50px; font-size:14px;">'+item.Comentario+'</h4>'+
                '<a href="'+baseurl+'uploads/'+item.NombreArchivo+'">'+item.NombreArchivo+'</a>'+
            '<div class="row hidden" id="divResponder'+item.idComentario+'" name="divResponder'+item.idComentario+'" style="padding: 2px 50px 0px;">'+
              '<form class="" method="POST" action="'+baseurl+'cComentarios/guardarComentarioComentario" id="formComentariosComent" name="formComentariosComent">'+
                '<div class="col-sm-9">'+
                    '<textarea type="text" name="Nota" id="Nota" class="form-control input-sm" placeholder="Responder"></textarea>'+
                '</div>'+
                '<div class="col-sm-3">'+
                  '<input class="" type="hidden" id="idComent'+item.idComentario+'" name="idComent'+item.idComentario+'" value="">'+
                  '<input class="" type="hidden" id="idComent" name="idComent"  value="'+item.idComentario+'">'+
                  '<input type="hidden" id="idUsuarioc" name="idUsuarioc" value="'+idUsuarioCrea+'">'+
                  '<input type="file" name="file'+item.idComentario+'" id="file'+item.idComentario+'"/>'+
                  '<button id="btn_Coment" value="'+item.idComentario+'" type="submit" class="btn btn-success pull-right btn-block btn-sm">Responder</button>'+
                '</div>'+
              '</form>'+
            '</div>'+
            '</div><!-- /.box-header -->'+
            '<div class="box-body">'+
            '<ul id="ListaComentariosComent'+item.idComentario+'" name="ListaComentariosComent">'+
            '</ul>'+
            '</div><!-- /.box-body -->'+
          '</div><!-- /.box -->')
        ComentarioPorComentario(item.idComentario);
      });
  });
}
$(document).ready(function(){//GuardarComentariosde Coments
$('#ListaTareasNG').on('submit','#formComentariosComent',function(){

  var conArchivo=0;
          $.ajax({
              type: 'POST',
              url: $(this).attr('action'),
              data: $(this).serialize(),
              success: function(data) {
                conArchivo=1;
              var idNegociacion = $('#idNegociacion').val();
              var idComent = $('.idComent').val();
              var file_data = $('#file'+idComent).prop('files')[0];

              var idComentario = data;
                    if (file_data){        
                        var form_data = new FormData();
                        form_data.append('file', file_data);

                              $.post(baseurl+"ajaxupload/uploadBD",
                                {
                                  idNegociacion:idNegociacion,
                                  idComentario:idComentario,
                                  nombreArchivo:file_data['name']
                                },
                                  function(data2){
                                        $.ajax({
                                            url: baseurl+'ajaxupload/upload_file', 
                                            dataType: 'text', 
                                            cache: false,
                                            contentType: false,
                                            processData: false,
                                            data:form_data,
                                            type: 'post',
                                            success: function (response) {
                                                $('#msg').html(response); // Exito
                                                $("#formComentariosComent")[0].reset();
                                                $('#ListaComentariosComent'+idComent).empty();
                                                ComentarioPorComentario(idComent);
                                                Recargar(idNegociacion);
                                                $('#divResponder'+idComent).toggleClass('hidden');
                                            },
                                            error: function (response) {
                                                $('#msg').html(response); // error
                                            }
                                        });

                                    });
                    } 
                    else{
                      $('#msg').html('');
                $("#formComentariosComent")[0].reset();
                $('#ListaComentariosComent'+idComent).empty();
                ComentarioPorComentario(idComent);
                Recargar(idNegociacion);
                $('#divResponder'+idComent).toggleClass('hidden');
                    }
              if (conArchivo<=0) {
                $("#formComentariosComent")[0].reset();
                $('#ListaComentariosComent'+idComent).empty();
                ComentarioPorComentario(idComent);
                Recargar(idNegociacion);
                $('#divResponder'+idComent).toggleClass('hidden');
                }
              }
          });





          // $.ajax({
          //     type: 'POST',
          //     url: $(this).attr('action'),
          //     data: $(this).serialize(),
          //     success: function(data) { 
          //       $("#formComentariosComent")[0].reset();
          //       var idComent2 = $('#idComent').val();
          //       alert(idComent2);
          //       $('#ListaComentariosComent'+idComent2).empty();
          //       ComentarioPorComentario(idComent2);
          //       var idNego = idNegociacion;
          //       Recargar(idNegociacion);
          //       $('#divResponder'+idComent2).addClass('hidden');
          //       // Recargar();

          //     }
          // });
          
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
      // if (cadena.indexOf(texto) != -1) {
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
                  )}EditarObjetivo
    // }
      });
      $('#TareasActivas').html('Activas: '+Activa);
      $('#TareasCanceladas').html('Canceladas: '+Cancelada);
      $('#TareasRealizadas').html('Realizadas: '+Realizada);
      var Avance = Activa+Realizada+Cancelada;
      Avance = (Realizada/Avance)*100;
      if (Avance>0) {

      $('#Avance').html(Math.round(Avance)+'%');  
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

EditarObjetivo = function($idObjetivo){
$('#FechaVencimiento').prop('disabled',false);
$('#Motivo').prop('disabled',false);
$('#PrioridadLbl').addClass('hidden');
$('#Prioridad').removeClass('hidden');
$('#Prioridad').prop('disabled',false);
$('#Estatus').prop('disabled',false);
$('#Detalles').prop('disabled',false);
$('#btn_EditarObjetivo').addClass('hidden');
$('#btn_Guardarbjetivo').removeClass('hidden');
};

UpdateObjetivo = function($idObjetivo){
  var FechaVencimiento = $('#FechaVencimiento').val();
  var Motivo = $('#Motivo').val();
  var Prioridad = $('#Prioridad').val();
  // var Estatus = $('#Estatus').val();
  var Detalles = $('#Detalles').val();
  var idObjetivo=$idObjetivo;

  $.post(baseurl+"cNegociacion/updateNegociacion",
    {
      FechaVencimiento:FechaVencimiento,
      Motivo:Motivo,
      Prioridad:Prioridad,
      // Estatus:Estatus,
      Detalles:Detalles,
      idObjetivo:idObjetivo
    },
    function(data){
      $('#FechaVencimiento').prop('disabled',true);
      $('#Motivo').prop('disabled',true);
      $('#Prioridad').prop('disabled',true);
      $('#Estatus').prop('disabled',true);
      $('#Detalles').prop('disabled',true);
      $('#btn_EditarObjetivo').removeClass('hidden');
      $('#btn_Guardarbjetivo').addClass('hidden');
    });
};

//Responder
$(document).ready(function(){
  $('#ListaTareasNG').on('click','#btnResponder',function(){
      var idNegociacion = $(this).val();
      $('#divResponder'+idNegociacion).toggleClass('hidden');
      $('#idComent'+idNegociacion).toggleClass('idComent');
      $('#idComent'+idNegociacion).val(idNegociacion);
  });
});
