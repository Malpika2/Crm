var FTareas = $('#FiltroTareas').val();

  $.post(baseurl+'cTareas/getTareas_deEmpresas_PorUsuarioGrupales',
  {
    idUsuarioActivo:idUsuarioActivo
  },
  function(data){
    var emp = JSON.parse(data);
    $.each(emp,function(i,item){
      if (item.Prioridad=='Alta') {
          var clase="bg-red";
        }else if (item.Prioridad=='Media') {
          var clase="bg-yellow";
        }else if (item.Prioridad=='Baja') {
          var clase="bg-green";
        }else {
          var clase="";
        }
        FTareas=$('#FiltroTareas').val();
      var propia = item.Asignados.indexOf(FTareas);
          if (propia>=1){
            clase= clase+' Propia';
          }
          else{
            clase=clase+' NoPropia';
          }
    if (item.StatusTarea=='Activa') {
            $('#ListaTareas').append(
                '<li class="'+clase+'" id="tarea'+item.idTarea+'">'+
                  '<span class="handle">'+
                    '<i class="fa fa-ellipsis-v"></i>'+
                    '<i class="fa fa-ellipsis-v"></i>'+
                  '</span>'+
                  '<input onclick="ActualizarTarea('+item.idTarea+')"  id="checkRealizada" type="checkbox" value="'+item.idTarea+'">'+
                  '<span class="text LinkTarea">Tarea: &nbsp;<a href="'+baseurl+'cPersona/verTarea/'+item.idTarea+'">'+item.TituloTarea+'</a></span>'+
                  '&nbsp;<small>con</small><span class="text linkContacto"><a href="'+baseurl+'cEmpresa/verEmpresa/'+item.idEmpresa+'">'+item.NombreEmpresa+'</a>&nbsp;...</span>'+
                  '<div class="tools pull-right">'+
                    '<label class="text-verde pull-right">'+item.Categoria+'</label>'+
                  '</div>'+
                '</li>')}
      else
      {
        agregarTareaRealizadaEmpresa(clase,item.idTarea,item.TituloTarea,item.idEmpresa,item.NombreEmpresa,item.Categoria,'0');
      } 
    }); 
  });

  $.post(baseurl+"cTareas/getTareas_deEmpresas_PorUsuario",
  {
    idUsuarioActivo:idUsuarioActivo
  },
  function(data){
    var emp = JSON.parse(data);
    $.each(emp,function(i,item){
      if (item.Prioridad=='Alta') {
          var clase="bg-red";
        }else if (item.Prioridad=='Media') {
          var clase="bg-yellow";
        }else if (item.Prioridad=='Baja') {
          var clase="bg-green";
        }else {
          var clase="";
        }
          FTareas=$('#FiltroTareas').val();
          var propia = item.Asignados.indexOf(FTareas);
          if (propia>=1){
            clase= clase+' Propia';
          }
          else{
            clase=clase+' NoPropia';
          }
    if (item.StatusTarea=='Activa') {
          if (item.idNegociacion>0) {
          $('#ListaTareas').append(
                '<li class="'+clase+'" id="tarea'+item.idTarea+'">'+
                  '<span class="handle">'+
                    '<i class="fa fa-ellipsis-v"></i>'+
                    '<i class="fa fa-ellipsis-v"></i>'+
                  '</span>'+
                  '<input  onclick="ActualizarTarea('+item.idTarea+')"  id="checkRealizada" type="checkbox" value="'+item.idTarea+'">'+
                  '<span class="text LinkTarea">Tarea: &nbsp;<a href="'+baseurl+'cPersona/verTarea/'+item.idTarea+'">'+item.TituloTarea+'</a></span>'+
                  '&nbsp;<small>con</small><span class="text linkContacto"><a href="'+baseurl+'cEmpresa/verEmpresa/'+item.idEmpresa+'">'+item.NombreEmpresa+'</a></span>'+
                  '<div class="tools pull-right">'+
                  '<span class="badge bg-aqua"><a href="'+baseurl+'cPersona/verNegociacion/'+item.idNegociacion+'">OBJETIVO</a></span>'+
                    '<label class="text-verde pull-right">'+item.Categoria+'</label>'+
                  '</div>'+
                '</li>'
                )}
          else{
            $('#ListaTareas').append(
                '<li class="'+clase+'" id="tarea'+item.idTarea+'">'+
                  '<span class="handle">'+
                    '<i class="fa fa-ellipsis-v"></i>'+
                    '<i class="fa fa-ellipsis-v"></i>'+
                  '</span>'+
                  '<input onclick="ActualizarTarea('+item.idTarea+')"  id="checkRealizada" type="checkbox" value="'+item.idTarea+'">'+
                  '<span class="text LinkTarea">Tarea: &nbsp;<a href="'+baseurl+'cPersona/verTarea/'+item.idTarea+'">'+item.TituloTarea+'</a></span>'+
                  '&nbsp;<small>con</small><span class="text linkContacto"><a href="'+baseurl+'cEmpresa/verEmpresa/'+item.idEmpresa+'">'+item.NombreEmpresa+'</a></span>'+
                  '<div class="tools pull-right">'+
                    '<label class="text-verde pull-right">'+item.Categoria+'</label>'+
                  '</div>'+
                '</li>'
                )
          }  
      }
      else
      {
        agregarTareaRealizadaEmpresa(clase,item.idTarea,item.TituloTarea,item.idEmpresa,item.NombreEmpresa,item.Categoria,item.idNegociacion);
      } 
    }); 
  });

// }//fin mostrar tarea empresa

function recargar(){//Recarga las tareas de las empresas
  $('#ListaTareas').empty();
  $('#ListaTareasRealizadasEmp').empty();
  $.post(baseurl+"cTareas/getTareas_deEmpresas_PorUsuario",
  {
    idUsuarioActivo:idUsuarioActivo
  },
  function(data){
    var emp = JSON.parse(data);
    $.each(emp,function(i,item){
      if (item.Prioridad=='Alta') {
          var clase="bg-red";
        }else if (item.Prioridad=='Media') {
          var clase="bg-yellow";
        }else if (item.Prioridad=='Baja') {
          var clase="bg-green";
        }else {
          var clase="";
        }
        FTareas=$('#FiltroTareas').val();
      var propia = item.Asignados.indexOf(FTareas);
          if (propia>=1){
            clase= clase+' Propia';
          }
          else{
            clase=clase+' NoPropia';
          }
    if (item.StatusTarea=='Activa') {
          if (item.idNegociacion>0) {
          $('#ListaTareas').append(
                '<li class="'+clase+'" id="tarea'+item.idTarea+'">'+
                  '<span class="handle">'+
                    '<i class="fa fa-ellipsis-v"></i>'+
                    '<i class="fa fa-ellipsis-v"></i>'+
                  '</span>'+
                  '<input  onclick="ActualizarTarea('+item.idTarea+')"  id="checkRealizada" type="checkbox" value="'+item.idTarea+'">'+
                  '<span class="text LinkTarea">Tarea: &nbsp;<a href="'+baseurl+'cPersona/verTarea/'+item.idTarea+'">'+item.TituloTarea+'</a></span>'+
                  '&nbsp;<small>con</small><span class="text linkContacto"><a href="'+baseurl+'cEmpresa/verEmpresa/'+item.idEmpresa+'">'+item.NombreEmpresa+'</a></span>'+
                  '<div class="tools pull-right">'+
                  '<span class="badge bg-aqua"><a href="'+baseurl+'cPersona/verNegociacion/'+item.idNegociacion+'">OBJETIVO</a></span>'+
                    '<label class="text-verde pull-right">'+item.Categoria+'</label>'+
                  '</div>'+
                '</li>'
                )}
          else{
            $('#ListaTareas').append(
                '<li class="'+clase+'" id="tarea'+item.idTarea+'">'+
                  '<span class="handle">'+
                    '<i class="fa fa-ellipsis-v"></i>'+
                    '<i class="fa fa-ellipsis-v"></i>'+
                  '</span>'+
                  '<input onclick="ActualizarTarea('+item.idTarea+')"  id="checkRealizada" type="checkbox" value="'+item.idTarea+'">'+
                  '<span class="text LinkTarea">Tarea: &nbsp;<a href="'+baseurl+'cPersona/verTarea/'+item.idTarea+'">'+item.TituloTarea+'</a></span>'+
                  '&nbsp;<small>con</small><span class="text linkContacto"><a href="'+baseurl+'cEmpresa/verEmpresa/'+item.idEmpresa+'">'+item.NombreEmpresa+'</a></span>'+
                  '<div class="tools pull-right">'+
                    '<label class="text-verde pull-right">'+item.Categoria+'</label>'+
                  '</div>'+
                '</li>'
                )
          }  
      }
      else {
        agregarTareaRealizadaEmpresa(clase,item.idTarea,item.TituloTarea,item.idEmpresa,item.NombreEmpresa,item.Categoria,item.idNegociacion);
      }
      ocultarTareas(); 
    }); 
  });

//Mostrar Tareas grupales de las Empresas============================>
  $.post(baseurl+"cTareas/getTareas_deEmpresas_PorUsuarioGrupales",
  {
    idUsuarioActivo:idUsuarioActivo
  },
  function(data){
    var emp = JSON.parse(data);
    $.each(emp,function(i,item){
      if (item.Prioridad=='Alta') {
          var clase="bg-red";
        }else if (item.Prioridad=='Media') {
          var clase="bg-yellow";
        }else if (item.Prioridad=='Baja') {
          var clase="bg-green";
        }else {
          var clase="";
        }
      FTareas=$('#FiltroTareas').val();
      var propia = item.Asignados.indexOf(FTareas);
          if (propia>=1){
            clase = clase+' Propia';
          }
          else{
            clase=clase+' NoPropia';
          }
    if (item.StatusTarea=='Activa') {
            $('#ListaTareas').append(
                '<li class="'+clase+'" id="tarea'+item.idTarea+'">'+
                  '<span class="handle">'+
                    '<i class="fa fa-ellipsis-v"></i>'+
                    '<i class="fa fa-ellipsis-v"></i>'+
                  '</span>'+
                  '<input onclick="ActualizarTarea('+item.idTarea+')"  id="checkRealizada" type="checkbox" value="'+item.idTarea+'">'+
                  '<span class="text LinkTarea">Tarea: &nbsp;<a href="'+baseurl+'cPersona/verTarea/'+item.idTarea+'">'+item.TituloTarea+'</a></span>'+
                  '&nbsp;<small>con</small><span class="text linkContacto"><a href="'+baseurl+'cEmpresa/verEmpresa/'+item.idEmpresa+'">'+item.NombreEmpresa+'</a>&nbsp;...</span>'+
                  '<div class="tools pull-right">'+
                    '<label class="text-verde pull-right">'+item.Categoria+'</label>'+
                  '</div>'+
                '</li>')}
      else
      {
        agregarTareaRealizadaEmpresa(clase,item.idTarea,item.TituloTarea,item.idEmpresa,item.NombreEmpresa,item.Categoria,'0');
      } 
    }); 
  });
}// Fin recargar

//=======Agrega las tareas de empresas marcadas como realizadas a la lista "realizadas".
function agregarTareaRealizadaEmpresa(clase,idTarea,TituloTarea,idEmpresa,NombreEmpresa,Categoria,idNegociacion){
  if (idNegociacion>0){
          $('#ListaTareasRealizadasEmp').append(
                '<li class="'+clase+'" id="tarea'+idTarea+'">'+
                  '<span class="handle">'+
                    '<i class="fa fa-ellipsis-v"></i>'+
                    '<i class="fa fa-ellipsis-v"></i>'+
                  '</span>'+
                  '<input onclick="ActualizarTareaR('+idTarea+')"  id="checkRealizada" type="checkbox" value="'+idTarea+'" checked>'+
                  '<span class="text LinkTarea">Tarea: &nbsp;<a href="'+baseurl+'cPersona/verTarea/'+idTarea+'">'+TituloTarea+'</a></span>'+
                  '&nbsp;<small>con</small><span class="text linkContacto"><a href="'+baseurl+'cEmpresa/verEmpresa/'+idEmpresa+'">'+NombreEmpresa+'</a></span>'+
                  '<div class="tools pull-right">'+
                  '<span class="badge bg-aqua"><a href="'+baseurl+'cPersona/verNegociacion/'+idNegociacion+'">OBJETIVO</a></span>'+
                    '<label class="text-verde pull-right">'+Categoria+'</label>'+
                  '</div>'+
                '</li>'
                )}
          else{
              $('#ListaTareasRealizadasEmp').append(
                '<li class="'+clase+' done" id="tarea'+idTarea+'">'+
                  '<span class="handle">'+
                    '<i class="fa fa-ellipsis-v"></i>'+
                    '<i class="fa fa-ellipsis-v"></i>'+
                  '</span>'+
                  '<input onclick="ActualizarTareaR('+idTarea+')"  id="checkRealizada" type="checkbox" value="'+idTarea+'" checked>'+
                  '<span class="text LinkTarea">Tarea: &nbsp;<a href="'+baseurl+'cPersona/verTarea/'+idTarea+'">'+TituloTarea+'</a></span>'+
                  '&nbsp;<small>con</small><span class="text linkContacto"><a href="'+baseurl+'cEmpresa/verEmpresa/'+idEmpresa+'">'+NombreEmpresa+'</a></span>'+
                  '<div class="tools pull-right">'+
                    '<i class="fa fa-calendar-check-o  pull-right echoPalomita"></i>'+
                    '<label class="text-verde pull-right">'+Categoria+'</label>'+
                  '</div>'+
                '</li>')}
    }

function ActualizarTarea(index){
  var tareaid = index;
  var varcontrol=0;
  if (varcontrol==0){
        $("#ModalCancelar").modal();
                  $('#btn_AceptarModalCancelar').click(function(){
                    if (varcontrol==0){
                    var StatusFinal = $('#StatusFinal').val();
                    $.post(baseurl+"cPersona/tareaRealizada",
                    {
                      Tareaid:tareaid,
                      StatusFinal:StatusFinal
                    },
                    function(data){
                    document.location.href = baseurl+'cTareas';
                      $("#tarea"+tareaid).remove();
                      $('#btn_CerrarModalCancelar').click();
                      $(location).attr('href', baseurl+'cTareas');
                      varcontrol++;
                    });
                  }
                  });
  }
}

function ActualizarTareaR(index){
              var Tareaid = index;
              $.ajax({
              type: 'POST',
              url: baseurl+"cPersona/tareaNoRealizada" ,
              data:{Tareaid:Tareaid},
              success: function(data) { 
                $("#tarea" + index).remove();
                recargar2();
                recargar();
              }
          });
            return false;
  }

//=================================PERSONAS=====================================
$('#form, #fat, #formTareaEmpresas').submit(function() {//form personas
          $.ajax({
              type: 'POST',
              url: $(this).attr('action'),
              data: $(this).serialize(),
              success: function(data) { 
                $("#formTareaEmpresas")[0].reset();
                $("#ModalTareap").modal("hide");
                recargar2();              
              }
          });
          
          return false;
      });

$('#form, #fat, #formTareaEmpresas2').submit(function() {
          $.ajax({
              type: 'POST',
              url: $(this).attr('action'),
              data: $(this).serialize(),
              success: function(data) { 
                $("#formTareaEmpresas2")[0].reset();
                $("#ModalTarea").modal("hide");
                $("#Asignados").val(null).trigger("change");
                recargar();              
              }
          });
          
          return false;
      });

// function mostrarTareaPersonas(){
$.post(baseurl+"cTareas/getTareas_dePersonas_PorUsuario",
  {
    idUsuarioActivo:idUsuarioActivo
  },
  function(data){
    var emp = JSON.parse(data);
    $.each(emp,function(i,item){
        if (item.Prioridad=='Alta') {
          var clase="bg-red";
        }else if (item.Prioridad=='Media') {
          var clase="bg-yellow";
        }else if (item.Prioridad=='Baja') {
          var clase="bg-green";
        }else {
          var clase="";
        }
      FTareas=$('#FiltroTareas').val();
      var propia = item.Asignados.indexOf(FTareas);
          if (propia>=1){
            clase= clase+' Propia';
          }
          else{
            clase=clase+' NoPropia';
          }
    if (item.StatusTarea=='Activa') {
        if (item.idNegociacion>0){
          $('#ListaTareasPersonas').append(
                '<li class="'+clase+'" id="tarea'+item.idTarea+'">'+
                  '<span class="handle">'+
                    '<i class="fa fa-ellipsis-v"></i>'+
                    '<i class="fa fa-ellipsis-v"></i>'+
                  '</span>'+
                  '<input onclick="ActualizarTarea('+item.idTarea+')" type="checkbox" value="'+item.idTarea+'" >'+
                  '<span class="text LinkTarea">Tarea: &nbsp;<a href="'+baseurl+'cPersona/verTarea/'+item.idTarea+'">'+item.TituloTarea+'</a></span>'+
                  '&nbsp;<small>con</small><span class="text linkContacto"><a href="'+baseurl+'cPersona/verPersona/'+item.idPersona+'">'+item.Nombre+'</a></span>'+
                  '<div class="tools pull-right">'+
                  '<span class="badge bg-aqua"><a href="'+baseurl+'cPersona/verNegociacion/'+item.idNegociacion+'">OBJETIVO</a></span>'+
                    '<label class="text-verde pull-right">'+item.Categoria+'</label>'+
                  '</div>'+
                '</li>'
                )}
          else{
      $('#ListaTareasPersonas').append(
                '<li class="'+clase+'">'+
                  '<span class="handle">'+
                    '<i class="fa fa-ellipsis-v"></i>'+
                    '<i class="fa fa-ellipsis-v"></i>'+
                  '</span>'+
                  '<input onclick="ActualizarTarea('+item.idTarea+')" type="checkbox" value="'+item.idTarea+'" >'+
                  '<span class="text LinkTarea">Tarea: &nbsp;<a href="'+baseurl+'cPersona/verTarea/'+item.idTarea+'">'+item.TituloTarea+'</a></span>'+
                  '&nbsp;<small>con</small><span class="text linkContacto"><a href="'+baseurl+'cPersona/verPersona/'+item.idPersona+'">'+item.Nombre+'</a></span>'+
                  '<div class="tools pull-right">'+
                    '<label class="text-verde pull-right">'+item.Categoria+'</label>'+
                  '</div>'+
                '</li>')}
      }
      else{
                  agregarTareaRealizadaPersona(clase,item.idTarea,item.TituloTarea,item.idPersona,item.Nombre,item.Categoria,item.idNegociacion);
          }
    }); 
  });
$.post(baseurl+"cTareas/getTareas_dePersonasGrupales_PorUsuario",
  {
    idUsuarioActivo:idUsuarioActivo
  },
  function(data){
    var emp = JSON.parse(data);
    $.each(emp,function(i,item){
        if (item.Prioridad=='Alta') {
          var clase="bg-red";
        }else if (item.Prioridad=='Media') {
          var clase="bg-yellow";
        }else if (item.Prioridad=='Baja') {
          var clase="bg-green";
        }else {
          var clase="";
        }
      FTareas=$('#FiltroTareas').val();
      var propia = item.Asignados.indexOf(FTareas);
          if (propia>=1){
            clase= clase+' Propia';
          }
          else{
            clase=clase+' NoPropia';
          }
    if (item.StatusTarea=='Activa') {
      $('#ListaTareasPersonas').append(
                '<li class="'+clase+'">'+
                  '<span class="handle">'+
                    '<i class="fa fa-ellipsis-v"></i>'+
                    '<i class="fa fa-ellipsis-v"></i>'+
                  '</span>'+
                  '<input onclick="ActualizarTarea('+item.idTarea+')" type="checkbox" value="'+item.idTarea+'" >'+
                  '<span class="text LinkTarea">Tarea: &nbsp;<a href="'+baseurl+'cPersona/verTarea/'+item.idTarea+'">'+item.TituloTarea+'</a></span>'+
                  '&nbsp;<small>con</small><span class="text linkContacto"><a href="'+baseurl+'cPersona/verPersona/'+item.idPersona+'">'+item.Nombre+'...</a></span>'+
                  '<div class="tools pull-right">'+
                    '<label class="text-verde pull-right">'+item.Categoria+'</label>'+
                  '</div>'+
                '</li>'
        )
    }
    else{
                  agregarTareaRealizadaPersona(clase,item.idTarea,item.TituloTarea,item.idPersona,item.Nombre,item.Categoria,item.idNegociacion);
    }
          }); 
  });
// }
function recargar2(){
$('#ListaTareasPersonas').empty();
$('#ListaTareasRealizadasPersonas').empty();
$.post(baseurl+"cTareas/getTareas_dePersonas_PorUsuario",
  {
    idUsuarioActivo:idUsuarioActivo
  },
  function(data){
    var emp = JSON.parse(data);
    $.each(emp,function(i,item){
        if (item.Prioridad=='Alta') {
          var clase="bg-red";
        }else if (item.Prioridad=='Media') {
          var clase="bg-yellow";
        }else if (item.Prioridad=='Baja') {
          var clase="bg-green";
        }else {
          var clase="";
        }
      FTareas=$('#FiltroTareas').val();
      var propia = item.Asignados.indexOf(FTareas);
          if (propia>=1){
            clase= clase+' Propia';
          }
          else{
            clase=clase+' NoPropia';
          }
    if (item.StatusTarea=='Activa') {
        if (item.idNegociacion>0) {
          $('#ListaTareasPersonas').append(
                '<li class="'+clase+'" id="tarea'+item.idTarea+'">'+
                  '<span class="handle">'+
                    '<i class="fa fa-ellipsis-v"></i>'+
                    '<i class="fa fa-ellipsis-v"></i>'+
                  '</span>'+
                  '<input onclick="ActualizarTarea('+item.idTarea+')" type="checkbox" value="'+item.idTarea+'" >'+
                  '<span class="text LinkTarea">Tarea: &nbsp;<a href="'+baseurl+'cPersona/verTarea/'+item.idTarea+'">'+item.TituloTarea+'</a></span>'+
                  '&nbsp;<small>con</small><span class="text linkContacto"><a href="'+baseurl+'cPersona/verPersona/'+item.idPersona+'">'+item.Nombre+'</a></span>'+
                  '<div class="tools pull-right">'+
                  '<span class="badge bg-aqua"><a href="'+baseurl+'cPersona/verNegociacion/'+item.idNegociacion+'">OBJETIVO</a></span>'+
                    '<label class="text-verde pull-right">'+item.Categoria+'</label>'+
                  '</div>'+
                '</li>'
                )}
          else{
      $('#ListaTareasPersonas').append(
                '<li class="'+clase+'">'+
                  '<span class="handle">'+
                    '<i class="fa fa-ellipsis-v"></i>'+
                    '<i class="fa fa-ellipsis-v"></i>'+
                  '</span>'+
                  '<input onclick="ActualizarTarea('+item.idTarea+')" type="checkbox" value="'+item.idTarea+'" >'+
                  '<span class="text LinkTarea">Tarea: &nbsp;<a href="'+baseurl+'cPersona/verTarea/'+item.idTarea+'">'+item.TituloTarea+'</a></span>'+
                  '&nbsp;<small>con</small><span class="text linkContacto"><a href="'+baseurl+'cPersona/verPersona/'+item.idPersona+'">'+item.Nombre+'</a></span>'+
                  '<div class="tools pull-right">'+
                    '<label class="text-verde pull-right">'+item.Categoria+'</label>'+
                  '</div>'+
                '</li>'
        )
    }
    }
    else{
                  agregarTareaRealizadaPersona(clase,item.idTarea,item.TituloTarea,item.idPersona,item.Nombre,item.Categoria,item.idNegociacion);
    }
    ocultarTareas();
          }); 
  });
$.post(baseurl+"cTareas/getTareas_dePersonasGrupales_PorUsuario",
  {
    idUsuarioActivo:idUsuarioActivo
  },
  function(data){
    var emp = JSON.parse(data);
    $.each(emp,function(i,item){
        if (item.Prioridad=='Alta') {
          var clase="bg-red";
        }else if (item.Prioridad=='Media') {
          var clase="bg-yellow";
        }else if (item.Prioridad=='Baja') {
          var clase="bg-green";
        }else {
          var clase="";
        }
      FTareas=$('#FiltroTareas').val();
      var propia = item.Asignados.indexOf(FTareas);
          if (propia>=1){
            clase= clase+' Propia';
          }
          else{
            clase=clase+' NoPropia';
          }
    if (item.StatusTarea=='Activa') {
      $('#ListaTareasPersonas').append(
                '<li class="'+clase+'">'+
                  '<span class="handle">'+
                    '<i class="fa fa-ellipsis-v"></i>'+
                    '<i class="fa fa-ellipsis-v"></i>'+
                  '</span>'+
                  '<input onclick="ActualizarTarea('+item.idTarea+')" type="checkbox" value="'+item.idTarea+'" >'+
                  '<span class="text LinkTarea">Tarea: &nbsp;<a href="'+baseurl+'cPersona/verTarea/'+item.idTarea+'">'+item.TituloTarea+'</a></span>'+
                  '&nbsp;<small>con</small><span class="text linkContacto"><a href="'+baseurl+'cPersona/verPersona/'+item.idPersona+'">'+item.Nombre+'...</a></span>'+
                  '<div class="tools pull-right">'+
                    '<label class="text-verde pull-right">'+item.Categoria+'</label>'+
                  '</div>'+
                '</li>'
        )
    }
    else{
                  agregarTareaRealizadaPersona(clase,item.idTarea,item.TituloTarea,item.idPersona,item.Nombre,item.Categoria,item.idNegociacion);
    }
          }); 
  });
}

function agregarTareaRealizadaPersona(clase,idTarea,TituloTarea,idPersona,Nombre,Categoria,idNegociacion){
  if (idNegociacion>0) {
    $('#ListaTareasRealizadasPersonas').append(
                '<li class="'+clase+'" id="tarea'+idTarea+'">'+
                  '<span class="handle">'+
                    '<i class="fa fa-ellipsis-v"></i>'+
                    '<i class="fa fa-ellipsis-v"></i>'+
                  '</span>'+
                  '<input onclick="ActualizarTareaR('+idTarea+')" id="checkRealizada" type="checkbox" value="'+idTarea+'" checked>'+
                  '<span class="text LinkTarea">Tarea: &nbsp;<a href="'+baseurl+'cPersona/verTarea/'+idTarea+'">'+TituloTarea+'</a></span>'+
                  '&nbsp;<small>con</small><span class="text linkContacto"><a href="'+baseurl+'cPersona/verPersona/'+idPersona+'">'+Nombre+'</a></span>'+
                  '<div class="tools pull-right">'+
                  '<span class="badge bg-aqua"><a href="'+baseurl+'cPersona/verNegociacion/'+idNegociacion+'">OBJETIVO</a></span>'+
                    '<label class="text-verde pull-right">'+Categoria+'</label>'+
                  '</div>'+
                '</li>'
                )}
    else{
              $('#ListaTareasRealizadasPersonas').append(
                '<li class="'+clase+' done" id="tarea'+idTarea+'">'+
                  '<span class="handle">'+
                    '<i class="fa fa-ellipsis-v"></i>'+
                    '<i class="fa fa-ellipsis-v"></i>'+
                  '</span>'+
                  '<input onclick="ActualizarTareaR('+idTarea+')" id="checkRealizada" type="checkbox" value="'+idTarea+'" checked>'+
                  '<span class="text LinkTarea">Tarea: &nbsp;<a href="'+baseurl+'cPersona/verTarea/'+idTarea+'">'+TituloTarea+'</a></span>'+
                  '&nbsp;<small>con</small><span class="text linkContacto"><a href="'+baseurl+'cPersona/verPersona/'+idPersona+'">'+Nombre+'</a></span>'+
                  '<div class="tools pull-right">'+
                    '<i class="fa fa-calendar-check-o  pull-right echoPalomita"></i>'+
                    '<label class="text-verde pull-right">'+Categoria+'</label>'+
                  '</div>'+
                '</li>')
            }
}

$.post(baseurl+"cGetPersonas/getPersonas",
function(data){
  var emp= JSON.parse(data);
  $.each(emp,function(i,item){
          if(item.Status=='Inactivo'){}
      else {
    $('#PersonasPart').append('<option value="'+item.idPersona+'">'+item.Nombre+'</option>')}
  });
});

$.post(baseurl+"cGetUsuarios/getUsuarios",
  function(data){
    var emp = JSON.parse(data);
    $.each(emp,function(i,item){
      $('#Asignados').append('<option value="'+item.idUsuario+'">'+item.Nombre+'</option>');
      $('#Usuarios').append('<option value="'+item.idUsuario+'">'+item.Nombre+'</option>');
      if(item.idUsuario===idUsuarioActivo){
        $('#FiltroTareas').append('<option selected="true" value="'+item.Nombre+'">Mis Tareas</option>');
        $('#column2_search').val(item.Nombre);
        $('#column2_search').keyup();

      }
      else{
      $('#FiltroTareas').append('<option value="'+item.Nombre+'">Tareas de: '+item.Nombre+'</option>')}
      }
      );
  });

$.post(baseurl+"cGetEmpresas/getEmpresas",
  {
    sitReg:1
  },
  function(data){
    var emp = JSON.parse(data);
    $.each(emp,function(i,item){
      $('#EmpresasPart').append('<option value="'+item.idEmpresa+'">'+item.NombreEmpresa+'</option>')
      });
  });

filtrarTareas = function(){
  var FTareas = $('#FiltroTareas').val();
  $('#column2_search').val(FTareas);
  $('#column2_search').keyup();
  $('#TablaTareas>thead>tr>th:nth-of-type(3)').HiddenTables(); 
  $('#TablaTareas>tfoot>tr>th:nth-of-type(3)').HiddenTables();
  $('#TablaTareas>tbody>tr>td:nth-of-type(3)').HiddenTables(); 
  if (FTareas==''){
  $('#TablaTareas>thead>tr>th:nth-of-type(3)').ShowTables(); 
  $('#TablaTareas>tfoot>tr>th:nth-of-type(3)').ShowTables();
  $('#TablaTareas>tbody>tr>td:nth-of-type(3)').ShowTables(); 
  }
}
 jQuery.fn.HiddenTables = function()  //damos nombre ala funcion
   {
     $(this).hide();
  };
   jQuery.fn.ShowTables = function()  //damos nombre ala funcion
   {
     $(this).show();
  };
ocultarTareas = function(){
  $(".NoPropia").addClass('hidden');
  var FTareas = $('#FiltroTareas').val();
  if (FTareas==='Todas'){
    $(".NoPropia").removeClass('hidden');
  }
}
