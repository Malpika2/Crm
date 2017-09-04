//Mostrar comentarios
$.post(baseurl+"cGetComentarios/getComentarios_Por_Persona",
	{
		idPersona:idPersona
	},
function(data){
    var emp = JSON.parse(data);
    $.each(emp,function(i,item){
      $('#activity').append(
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
            '<div class="row hidden" id="divResponder'+item.idComentario+'" name="divResponder'+item.idComentario+'" style="padding: 2px 50px 0px;">'+
              '<form class="" method="POST" action="'+baseurl+'cComentarios/guardarComentarioComentario" id="formComentariosComent" name="formComentariosComent">'+
                '<div class="col-sm-9">'+
                    '<textarea type="text" name="Nota" id="Nota" class="form-control input-sm" placeholder="Responder"></textarea>'+
                '</div>'+
                '<div class="col-sm-3">'+
                  '<input type="hidden" id="idComent" name="idComent" value="'+item.idComentario+'">'+
                  '<input type="hidden" id="idUsuarioc" name="idUsuarioc" value="'+idUsuarioCrea+'">'+
                  '<button id="btn_Coment" type="submit" class="btn btn-success pull-right btn-block btn-sm">Responder</button>'+
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

function Recargar(idPersona){
  limpiar();
$.post(baseurl+"cGetComentarios/getComentarios_Por_Persona",
  {
    idPersona:idPersona
  },
function(data){
    var emp = JSON.parse(data);
    $.each(emp,function(i,item){
      $('#activity').append(
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
            '<div class="row hidden" id="divResponder'+item.idComentario+'" name="divResponder'+item.idComentario+'" style="padding: 2px 50px 0px;">'+
              '<form class="" method="POST" action="'+baseurl+'cComentarios/guardarComentarioComentario" id="formComentariosComent" name="formComentariosComent">'+
                '<div class="col-sm-9">'+
                    '<textarea type="text" name="Nota" id="Nota" class="form-control input-sm" placeholder="Responder"></textarea>'+
                '</div>'+
                '<div class="col-sm-3">'+
                  '<input type="hidden" id="idComent" name="idComent" value="'+item.idComentario+'">'+
                  '<input type="hidden" id="idUsuarioc" name="idUsuarioc" value="'+idUsuarioCrea+'">'+
                  '<button id="btn_Coment" type="submit" class="btn btn-success pull-right btn-block btn-sm">Responder</button>'+
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
        '<div class="box box-danger collapsed-box">'+
            '<div class="box-header with-border">'+
                  '<div class="user-block">'+
                        '<span class="username">'+
                          '<b style="font-size:14px;">'+item.Nombre+'</b>'+
                    '<span class="description pull-right">'+item.Fecha_Creacion+'</span>'+
                        '</span>'+
                  '</div>'+
              '<h4 class="" style="margin:0px; padding-left:50px; font-size:14px;">'+item.Comentario+'</h4>'+
            '</div><!-- /.box-header -->'+
          '</div><!-- /.box -->')
      });
  });
}

function limpiar() {//Limpia el area comentarios "activity"
var d = document.getElementById("activity");
while (d.hasChildNodes())
d.removeChild(d.firstChild);
}

$('#form, #fat, #formComentarios').submit(function() {
          $.ajax({
              type: 'POST',
              url: $(this).attr('action'),
              data: $(this).serialize(),
              success: function(data) { 
                $("#formComentarios")[0].reset();
                var idPers = $('#idPersona').val();
                Recargar(idPers);
              }
          });
          
          return false;
      });

$(document).ready(function(){
$('#activity').on('submit','#formComentariosComent',function(){
          $.ajax({
              type: 'POST',
              url: $(this).attr('action'),
              data: $(this).serialize(),
              success: function(data) { 
                $("#formComentariosComent")[0].reset();
                var idComent = $('#idComent').val();
                $('#ListaComentariosComent'+idComent).empty();
                ComentarioPorComentario(idComent);
                var idPers = $('#idPersona').val();
                Recargar(idPers);
              }
          });
          
          return false;
      });
});
//=========FIN CONTROL COMENTARIOS=========

//=========================TAREAS==============

$('#form, #fat, #formTareap').submit(function() {
          $.ajax({
              type: 'POST',
              url: $(this).attr('action'),
              data: $(this).serialize(),
              success: function(data) { 
                $("#formTareap")[0].reset();
                $("#ModalTareap").modal("hide");
                $("#Asignados").val(null).trigger("change");
                $('#LineaTareas').empty();
                recargarTareas();
              }
          });
          
          return false;
      });

$.post(baseurl+"cGetUsuarios/getUsuarios",
  function(data){
    var emp = JSON.parse(data);
    $.each(emp,function(i,item){
      $('#Asignados').append('<option value="'+item.idUsuario+'">'+item.Nombre+' '+item.Paterno+'</option>')
      });
  });

//Recargar el campo de las tareas
function recargarTareas(){
$.post(baseurl+"cPersona/getTareas",
  {
    idPersona:idPersona
  },
  function(data){
    var emp = JSON.parse(data);
    $.each(emp,function(i,item){
      var texto = $('#idUsuarioc').val();
      var cadena = item.Asignados;
      // if (cadena.indexOf(texto) != -1) {
            if(item.Activa==1){
      $('#LineaTareas').append(                     
                  '<li class="time-label">'+
                   ' <span class="bg-yellow">'+
                    ''+item.FechaFin+''+
                    '</span>'+
                  '</li>'+
                  '<li>'+
                    '<i class="fa fa-envelope bg-blue"></i>'+
                    '<div class="timeline-item">'+
                      '<span class="time"><i class="fa fa-clock-o"></i>'+item.FechaCreacion+'</span>'+
                      '<h3 class="timeline-header"><a href="'+baseurl+'/cPersona/verTarea/'+item.idTarea+'">'+item.TituloTarea+'</a></h3>'+
                      '<div class="timeline-body">'+
                        ''+item.Descripcion+''+
                      '</div>'+
                      '<div class="timeline-footer">'+
                      '<b>Categoria: </b>'+item.Categoria+''+
                      // '<button class="btn btn-danger btn-xs pull-right" id="btnRealizada" name="btnRealizada" value="'+item.idTarea+'">Realizada</button>'+
                      '</div>'+
                    '</div>'+
                  '</li>'+
                  '<li>'+
                  '</li>'
                  )}
    // }
      });

    $('#LineaTareas').append(
    '<li>'+                  
      '<i class="fa fa-clock-o bg-gray"></i>'+
    '</li>')
  });
}
//GET TAREAS==========MOSTRAR LAS TAREAS
$.post(baseurl+"cPersona/getTareas",
  {
    idPersona:idPersona
  },
  function(data){
    var emp = JSON.parse(data);
    $.each(emp,function(i,item){
      var texto = $('#idUsuarioc').val();
      var cadena = item.Asignados;
      // if (cadena.indexOf(texto) != -1) {
            if(item.Activa==1){
      $('#LineaTareas').append(                  
                  '<li class="time-label">'+
                   ' <span class="bg-yellow">'+
                    ''+item.FechaFin+''+
                    '</span>'+
                  '</li>'+
                  '<li>'+
                    '<i class="fa fa-envelope bg-blue"></i>'+
                    '<div class="timeline-item">'+
                      '<span class="time"><i class="fa fa-clock-o"></i>'+item.FechaCreacion+'</span>'+
                      '<h3 class="timeline-header"><a href="'+baseurl+'/cPersona/verTarea/'+item.idTarea+'">'+item.TituloTarea+'</a></h3>'+
                      '<div class="timeline-body">'+
                        ''+item.Descripcion+''+
                      '</div>'+
                      '<div class="timeline-footer">'+
                      '<b>Categoria: </b>'+item.Categoria+''+
                      // '<button class="btn btn-danger btn-xs pull-right" id="btnRealizada" name="btnRealizada" value="'+item.idTarea+'">Realizada</button>'+
                      '</div>'+
                    '</div>'+
                  '</li>'+
                  '<li>'+
                  '</li>'
                  )
    // }
  }
      }); 

    $('#LineaTareas').append(
    '<li>'+                  
      '<i class="fa fa-clock-o bg-gray"></i>'+
    '</li>')
  });
$(document).ready(function() { //======Ocultar Tareas Realizadas
$('#LineaTareas').on('click','#btnRealizada', function() {
      var Tareaid = $(this).val();
              $("#ModalCancelar").modal();
        $("#ModalCancelar").on('hidden.bs.modal', function () {
              var StatusFinal = $('#StatusFinal').val();
              $.ajax({
              type: 'POST',
              url: baseurl+"cPersona/tareaRealizada" ,
              data:{Tareaid:Tareaid,StatusFinal:StatusFinal},
              success: function(data) { 
                $('#LineaTareas').empty();
                recargarTareas();
                }
              });
                  return false;
        });
    });
});//Fin Ocultar tareas realizadas

// $('#Categoria').change(function(){
//   var elemento = document.getElementById("Invol_Reunion");

//   $('#Categoria option:selected').each(function(){
//     var Categoria = $('#Categoria').val();
//       if (Categoria=='Reunion') {
//               elemento.classList.remove("hidden");
//       }
//       else {
//           elemento.classList.add("hidden");
//       }
//   });
// });
                        //==========NEGOCIACIONES=============//
//Guardar Negociaciones
$('#form, #fat, #formNegociacion').submit(function() {
          $.ajax({
              type: 'POST',
              url: $(this).attr('action'),
              data: $(this).serialize(),
              success: function(data) { 
                 $("#formNegociacion")[0].reset();
                $("#ModalNegociacion").modal("hide");
                // $("#Asignados").val(null).trigger("change");
                $('#LineaNegociaciones').empty();
                recargarNegociaciones();
              }
          });
          return false;
      });

//Mostrar Negociaciones
$.post(baseurl+"cPersona/getNegociaciones",
  {
    idPersona:idPersona
  },
  function(data){
    var emp = JSON.parse(data);
    var UsuarioActivo = $('#idUsuarioc').val();

    $.each(emp,function(i,item){
            if(item.Activa==1){
            // if(item.PersonaCargo==UsuarioActivo){
      $('#LineaNegociaciones').append(                  
          '<li class="time-label">'+
            '<div class="callout callout-primary bg-success" style="border-left: 5px solid #00a65a;">'+
              '<div>'+
                '<span class="pull-right"><i class="fa fa-clock-o"></i>'+item.FechaLimite+'</span>'+
              '</div>'+
              '<a href="'+baseurl+'/cPersona/verNegociacion/'+item.idNegociacion+'" class="h4" style="text-decoration:none; color:#3c8dcc;">'+item.NombreNegociacion+'</a>'+
              '</a>'+
              '<hr class="hr2" style="border-top: 1px solid #0fce5e;">'+
              '<p>Status: '+item.Status+'</p>'+
              '<p>Motivo: '+item.Motivo+'</p>'+

              '<p>Detalles: '+item.Detalles+'</p>'+
              '<p>Persona a cargo: '+item.Nombre+' '+item.Paterno+'</p>'+
              // '<button class="btn btn-danger btn-sm pull-right" id="btnEliminar" name="btnEliminar" value="'+item.idNegociacion+'">Cancelar</button>'+
            '</div>'+
          '</li>'
        )
    // }
  }
      });
    $('#LineaNegociaciones').append(
    '<li>'+                  
      '<i class="fa fa-clock-o bg-gray"></i>'+
    '</li>')
  });

function recargarNegociaciones(){
  $.post(baseurl+"cPersona/getNegociaciones",
  {
    idPersona:idPersona
  },
  function(data){
    var emp = JSON.parse(data);
    var UsuarioActivo = $('#idUsuarioc').val();

    $.each(emp,function(i,item){
            if(item.Activa==1){
            // if(item.PersonaCargo==UsuarioActivo){
      $('#LineaNegociaciones').append(                  
          '<li class="time-label">'+
            '<div class="callout callout-primary bg-success" style="border-left: 5px solid #00a65a;">'+
              '<div>'+
                '<span class="pull-right"><i class="fa fa-clock-o"></i>'+item.FechaLimite+'</span>'+
              '</div>'+
              '<a href="'+baseurl+'/cPersona/verNegociacion/'+item.idNegociacion+'" class="h4" style="text-decoration:none; color:#3c8dcc;">'+item.NombreNegociacion+'</a>'+
              '</a>'+
              '<hr class="hr2" style="border-top: 1px solid #0fce5e;">'+
              '<p>Status: '+item.Status+'</p>'+
              '<p>Motivo: '+item.Motivo+'</p>'+

              '<p>Detalles: '+item.Detalles+'</p>'+
              '<p>Persona a cargo: '+item.Nombre+' '+item.Paterno+'</p>'+
              // '<button class="btn btn-danger btn-sm pull-right" id="btnEliminar" name="btnEliminar" value="'+item.idNegociacion+'">Cancelar</button>'+
            '</div>'+
          '</li>'
        )
      // }
      }
      });

    $('#LineaNegociaciones').append(
    '<li>'+                  
      '<i class="fa fa-clock-o bg-gray"></i>'+
    '</li>')
  });
}
$(document).ready(function() {
$('#LineaNegociaciones').on('click','#btnEliminar', function() {
      var idNegociacion = $(this).val();
              $("#ModalCancelarNg").modal();
        $("#ModalCancelarNg").on('hidden.bs.modal', function () {
              var StatusFinalNG = $('#StatusFinalNg').val();
              $.ajax({
              type: 'POST',
              url: baseurl+"cPersona/NegociacionEliminada" ,
              data:{idNegociacion:idNegociacion,StatusFinalNG:StatusFinalNG},
              success: function(data) { 
                $('#LineaNegociaciones').empty();
                recargarNegociaciones();
              }
          });
                  return false;
          });
    });
});//Fin Ocultar Negociaciones realizadas

GuardarEditPersona = function(){
  var idPersonaE = idPersona;
  var NombrePersona = $('#mNombrePersona').val();
  var Cargo = $('#mCargo').val();
  var Puesto = $('#mPuesto').val();
  var Telefono1 = $('#mTelefono1').val();
  var Telefono2 = $('#mTelefono2').val();
  var Correo1 = $('#mCorreo1').val();
  var Correo2 = $('#mCorreo2').val();
  var Skype = $('#mSkype').val();
  var Direccion = $('#mDireccion').val();
  var Estado = $('#mEstado').val();
  var Pais   = $('#mPais').val();
$.post(baseurl+"cPersona/updatePersona/",
  {   idPersonaE:idPersonaE,
      NombrePersona:NombrePersona,
      Cargo:Cargo,
      Puesto:Puesto,
      Telefono1:Telefono1,
      Telefono2:Telefono2,
      Correo1:Correo1,
      Correo2:Correo2,
      Skype:Skype,
      Direccion:Direccion,
      Estado:Estado,
      Pais:Pais
  },
  function(data){
    location.reload();
  });
}

//Responder
$(document).ready(function(){
  $('#activity').on('click','#btnResponder',function(){
      var idNegociacion = $(this).val();
      $('#divResponder'+idNegociacion).toggleClass('hidden');
  });
});