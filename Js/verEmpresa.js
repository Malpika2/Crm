GuardarEditEmpresa = function(){
var idEmpresa = $("#idEmpresa").val();
var NombreEmpresa = $("#NombreEmpresa").val();
var SPP = $("#SPP").val();
var Abreviacion = $("#Abreviacion").val();
var Tipo = $("#Tipo").val();
var Representante = $("#Representante").val();
var Contacto = $("#Contacto").val();
var Skype = $("#Skype").val();
var SitioWeb = $("#SitioWeb").val();
var Telefono1 = $("#Telefono1").val();
var TipoTelefono1 = $("#TipoTelefono1").val();
var Telefono2 = $("#Telefono2").val();
var TipoTelefono2 = $("#TipoTelefono2").val();
var Correo1 = $("#Correo1").val();
var TipoCorreo1 = $("#TipoCorreo1").val();
var Correo2 = $("#Correo2").val();
var TipoCorreo2 = $("#TipoCorreo2").val();
var DatosFiscales = $("#DatosFiscales").val();
var DireccionOficina = $("#DireccionOficina").val();
var DireccionFiscal = $("#DireccionFiscal").val();
var Ciudad = $("#Ciudad").val();
var Pais = $("#Pais").val();
$.post(baseurl+"cEmpresa/updateEmpresa/",
  { idEmpresa:idEmpresa,
    NombreEmpresa:NombreEmpresa,
    SPP:SPP,
    Abreviacion:Abreviacion,
    Tipo:Tipo,
    Representante:Representante,
    Contacto:Contacto,
    Skype:Skype,
    SitioWeb:SitioWeb,
    Telefono1:Telefono1,
    TipoTelefono1:TipoTelefono1,
    Telefono2:Telefono2,
    TipoTelefono2:TipoTelefono2,
    Correo1:Correo1,
    TipoCorreo1:TipoCorreo1,
    Correo2:Correo2,
    TipoCorreo2:TipoCorreo2,
    DatosFiscales:DatosFiscales,
    DireccionOficina:DireccionOficina,
    DireccionFiscal:DireccionFiscal,
    Ciudad:Ciudad,
    Pais:Pais
  },
  function(data){
    location.reload();
  });
}

//Mostrar Comentarios
 if(typeof(idEmpresa) != "undefined"){
  $.post(baseurl+"cGetComentarios/getComentarios_Por_Empresa",
  {
    idEmpresa:idEmpresa
  },
  function(data){
    var emp = JSON.parse(data);
    $.each(emp,function(i,item){
      $('#activity').append(
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
              '<div class="box-tools pull-right">'+
                '<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i>'+
                '</button>'+
              '</div><!-- /.box-tools -->'+
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

//Recargar los comentarios
function Recargar(idEmpresa){
  limpiar();
$.post(baseurl+"cGetComentarios/getComentarios_Por_Empresa",
	{
		idEmpresa:idEmpresa
	},
	function(data){
		var emp = JSON.parse(data);
		$.each(emp,function(i,item){
			$('#activity').append(
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
              '<div class="box-tools pull-right">'+
                '<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i>'+
                '</button>'+
              '</div><!-- /.box-tools -->'+
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
        '<div class="box box-danger collapsed-box">'+
            '<div class="box-header with-border bg-info">'+
                  '<div class="user-block">'+
                    '<img class="img-circle img-bordered-sm" src="'+baseurl+'assets/dist/img/'+item.url_foto+'" alt="">'+
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
                var idEmpresa = $('#idEmpresa').val();
                Recargar(idEmpresa);
              }
          });
          
          return false;
      });

$(document).ready(function(){//GuardarComentariosde Coments
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
                var idEmpresa = $('#idEmpresa').val();
                Recargar(idEmpresa);
              }
          });
          
          return false;
      });
});
//Fin Control Comentarios

$('#form, #fat, #formTarea').submit(function() {
          $.ajax({
              type: 'POST',
              url: $(this).attr('action'),
              data: $(this).serialize(),
              success: function(data) { 
				    $("#formTarea")[0].reset();
		        $("#ModalTarea").modal("hide");
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
      $('#Asignados').append('<option value="'+item.idUsuario+'">'+item.Nombre+'</option>')
      });
  });

//GET TAREAS==========MOSTRAR LAS TAREAS
 if(typeof(idEmpresa) != "undefined"){
$.post(baseurl+"cEmpresa/getTareas",
  {
    idEmpresa:idEmpresa
  },
  function(data){
    var emp = JSON.parse(data);
    $.each(emp,function(i,item){
      var texto = $('#idUsuarioc').val();
      var cadena = item.Asignados;
      // if (cadena.indexOf(texto) != -1) { filtro
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


function recargarTareas(){ //===============RECARGAR LAS TAREAS DESPUES DE GUARDAR
$.post(baseurl+"cEmpresa/getTareas",
  {
    idEmpresa:idEmpresa
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

//==========NEGOCIACIONES=============//
//Guardar Negociaciones
$('#form, #fat, #formNegociacion').submit(function() {
          $.ajax({
              type: 'POST',
              url: $(this).attr('action'),
              data: $(this).serialize(),
              success: function(data) { 
                 $("#formNegociacion")[0].reset();
                $("#ModalNegociacionEmp").modal("hide");
                // $("#Asignados").val(null).trigger("change");
                $('#LineaNegociaciones').empty();
                recargarNegociaciones();
              }
          });
          return false;
      });
//Mostrar Negociaciones
 if(typeof(idEmpresa) != "undefined"){
$.post(baseurl+"cEmpresa/getNegociaciones",
  {
    idEmpresa:idEmpresa
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
function recargarNegociaciones(){$.post(baseurl+"cEmpresa/getNegociaciones",
  {
    idEmpresa:idEmpresa
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

//Oculta las Negociaciones Realizadas
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

