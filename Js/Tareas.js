 //Mostrar Tareas de las Empresas============================>
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
    if (item.Activa==1) {
            $('#ListaTareas').append(
                '<li class="'+clase+'" id="tarea'+item.idTarea+'">'+
                  '<span class="handle">'+
                    '<i class="fa fa-ellipsis-v"></i>'+
                    '<i class="fa fa-ellipsis-v"></i>'+
                  '</span>'+
                  '<input onclick="ActualizarTarea('+item.idTarea+')"  id="checkRealizada" type="checkbox" value="'+item.idTarea+'">'+
                  '<span class="text LinkTarea"><a href="'+baseurl+'cPersona/verTarea/'+item.idTarea+'">'+item.TituloTarea+'</a></span>'+
                  '&nbsp;<small>con</small><span class="text linkContacto"><a href="'+baseurl+'cEmpresa/verEmpresa/'+item.idEmpresa+'">'+item.RazonSocial+'</a></span>'+
                  '<div class="tools pull-right">'+
                    '<label class="text-verde pull-right">'+item.Categoria+'</label>'+
                  '</div>'+
                '</li>'
        )
      }
      else
      {
        agregarTareaRealizadaEmpresa(clase,item.idTarea,item.TituloTarea,item.idEmpresa,item.RazonSocial,item.Categoria);
      } 
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
    if (item.Activa==1) {
            $('#ListaTareas').append(
                '<li class="'+clase+'" id="tarea'+item.idTarea+'">'+
                  '<span class="handle">'+
                    '<i class="fa fa-ellipsis-v"></i>'+
                    '<i class="fa fa-ellipsis-v"></i>'+
                  '</span>'+
                  '<input onclick="ActualizarTarea('+item.idTarea+')"  id="checkRealizada" type="checkbox" value="'+item.idTarea+'">'+
                  '<span class="text LinkTarea"><a href="'+baseurl+'cPersona/verTarea/'+item.idTarea+'">'+item.TituloTarea+'</a></span>'+
                  '&nbsp;<small>con</small><span class="text linkContacto"><a href="'+baseurl+'cEmpresa/verEmpresa/'+item.idEmpresa+'">'+item.RazonSocial+'</a>&nbsp;...</span>'+
                  '<div class="tools pull-right">'+
                    '<label class="text-verde pull-right">'+item.Categoria+'</label>'+
                  '</div>'+
                '</li>'
        )
      }
      else
      {
        agregarTareaRealizadaEmpresa(clase,item.idTarea,item.TituloTarea,item.idEmpresa,item.RazonSocial,item.Categoria);
      } 
    }); 
  });
//=======Agrega las tareas marcadas como realizadas a la lista "realizadas".
function agregarTareaRealizadaEmpresa(clase,idTarea,TituloTarea,idEmpresa,RazonSocial,Categoria){
                    $('#ListaTareasRealizadasEmp').append(
                '<li class="'+clase+' done" id="tarea'+idTarea+'">'+
                  '<span class="handle">'+
                    '<i class="fa fa-ellipsis-v"></i>'+
                    '<i class="fa fa-ellipsis-v"></i>'+
                  '</span>'+
                  '<input onclick="ActualizarTareaR('+idTarea+')"  id="checkRealizada" type="checkbox" value="'+idTarea+'" checked>'+
                  '<span class="text LinkTarea"><a href="'+baseurl+'cPersona/verTarea/'+idTarea+'">'+TituloTarea+'</a></span>'+
                  '&nbsp;<small>con</small><span class="text linkContacto"><a href="'+baseurl+'cEmpresa/verEmpresa/'+idEmpresa+'">'+RazonSocial+'</a></span>'+
                  '<div class="tools pull-right">'+
                    '<i class="fa fa-calendar-check-o  pull-right echoPalomita"></i>'+
                    '<label class="text-verde pull-right">'+Categoria+'</label>'+
                  '</div>'+
                '</li>')
    }
function ActualizarTarea(index){
  var Tareaid = index;
              $.ajax({
              type: 'POST',
              url: baseurl+"cPersona/tareaRealizada" ,
              data:{Tareaid:Tareaid},
              success: function(data) { 
                $("#tarea" + index).remove();
                recargar();
                recargar2();
              }
          });
                  return false;
  }
function ActualizarTareaR(index){
  var Tareaid = index;
              $.ajax({
              type: 'POST',
              url: baseurl+"cPersona/tareaNoRealizada" ,
              data:{Tareaid:Tareaid},
              success: function(data) { 
                $("#tarea" + index).remove();
                recargar();
                recargar2();
              }
          });
                  return false;
  }

function recargar(){
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
    if (item.Activa==1) {
            $('#ListaTareas').append(
                '<li class="'+clase+'" id="tarea'+item.idTarea+'">'+
                  '<span class="handle">'+
                    '<i class="fa fa-ellipsis-v"></i>'+
                    '<i class="fa fa-ellipsis-v"></i>'+
                  '</span>'+
                  '<input onclick="ActualizarTarea('+item.idTarea+')"  id="checkRealizada" type="checkbox" value="'+item.idTarea+'">'+
                  '<span class="text LinkTarea"><a href="'+baseurl+'cPersona/verTarea/'+item.idTarea+'">'+item.TituloTarea+'</a></span>'+
                  '&nbsp;<small>con</small><span class="text linkContacto"><a href="'+baseurl+'cEmpresa/verEmpresa/'+item.idEmpresa+'">'+item.RazonSocial+'</a></span>'+
                  '<div class="tools pull-right">'+
                    '<label class="text-verde pull-right">'+item.Categoria+'</label>'+
                  '</div>'+
                '</li>'
        )
      }
      else
      {
        agregarTareaRealizadaEmpresa(clase,item.idTarea,item.TituloTarea,item.idEmpresa,item.RazonSocial,item.Categoria);
      } 
    }); 
  });
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
    if (item.Activa==1) {
            $('#ListaTareas').append(
                '<li class="'+clase+'" id="tarea'+item.idTarea+'">'+
                  '<span class="handle">'+
                    '<i class="fa fa-ellipsis-v"></i>'+
                    '<i class="fa fa-ellipsis-v"></i>'+
                  '</span>'+
                  '<input onclick="ActualizarTarea('+item.idTarea+')"  id="checkRealizada" type="checkbox" value="'+item.idTarea+'">'+
                  '<span class="text LinkTarea"><a href="'+baseurl+'cPersona/verTarea/'+item.idTarea+'">'+item.TituloTarea+'</a></span>'+
                  '&nbsp;<small>con</small><span class="text linkContacto"><a href="'+baseurl+'cEmpresa/verEmpresa/'+item.idEmpresa+'">'+item.RazonSocial+'</a>&nbsp;...</span>'+
                  '<div class="tools pull-right">'+
                    '<label class="text-verde pull-right">'+item.Categoria+'</label>'+
                  '</div>'+
                '</li>'
        )
      }
      else
      {
        agregarTareaRealizadaEmpresa(clase,item.idTarea,item.TituloTarea,item.idEmpresa,item.RazonSocial,item.Categoria);
      } 
    }); 
  });
}




//=================================PERSONAS===============




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
    if (item.Activa==1) {
      $('#ListaTareasPersonas').append(
                '<li class="'+clase+'">'+
                  '<span class="handle">'+
                    '<i class="fa fa-ellipsis-v"></i>'+
                    '<i class="fa fa-ellipsis-v"></i>'+
                  '</span>'+
                  '<input onclick="ActualizarTarea('+item.idTarea+')" type="checkbox" value="'+item.idTarea+'" >'+
                  '<span class="text LinkTarea"><a href="'+baseurl+'cPersona/verTarea/'+item.idTarea+'">'+item.TituloTarea+'</a></span>'+
                  '&nbsp;<small>con</small><span class="text linkContacto"><a href="'+baseurl+'cPersona/verPersona/'+item.idPersona+'">'+item.Nombre+'</a></span>'+
                  '<div class="tools pull-right">'+
                    '<label class="text-verde pull-right">'+item.Categoria+'</label>'+
                  '</div>'+
                '</li>'
        )
    }
    else{
                  agregarTareaRealizadaPersona(clase,item.idTarea,item.TituloTarea,item.idPersona,item.Nombre,item.Categoria);
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
    if (item.Activa==1) {
      $('#ListaTareasPersonas').append(
                '<li class="'+clase+'">'+
                  '<span class="handle">'+
                    '<i class="fa fa-ellipsis-v"></i>'+
                    '<i class="fa fa-ellipsis-v"></i>'+
                  '</span>'+
                  '<input onclick="ActualizarTarea('+item.idTarea+')" type="checkbox" value="'+item.idTarea+'" >'+
                  '<span class="text LinkTarea"><a href="'+baseurl+'cPersona/verTarea/'+item.idTarea+'">'+item.TituloTarea+'</a></span>'+
                  '&nbsp;<small>con</small><span class="text linkContacto"><a href="'+baseurl+'cPersona/verPersona/'+item.idPersona+'">'+item.Nombre+'...</a></span>'+
                  '<div class="tools pull-right">'+
                    '<label class="text-verde pull-right">'+item.Categoria+'</label>'+
                  '</div>'+
                '</li>'
        )
    }
    else{
                  agregarTareaRealizadaPersona(clase,item.idTarea,item.TituloTarea,item.idPersona,item.Nombre,item.Categoria);
    }
          }); 
  });
function agregarTareaRealizadaPersona(clase,idTarea,TituloTarea,idPersona,Nombre,Categoria){
              $('#ListaTareasRealizadasPersonas').append(
                '<li class="'+clase+' done" id="tarea'+idTarea+'">'+
                  '<span class="handle">'+
                    '<i class="fa fa-ellipsis-v"></i>'+
                    '<i class="fa fa-ellipsis-v"></i>'+
                  '</span>'+
                  '<input onclick="ActualizarTareaR('+idTarea+')"  id="checkRealizada" type="checkbox" value="'+idTarea+'" checked>'+
                  '<span class="text LinkTarea"><a href="'+baseurl+'cPersona/verTarea/'+idTarea+'">'+TituloTarea+'</a></span>'+
                  '&nbsp;<small>con</small><span class="text linkContacto"><a href="'+baseurl+'cPersona/verPersona/'+idPersona+'">'+Nombre+'</a></span>'+
                  '<div class="tools pull-right">'+
                    '<i class="fa fa-calendar-check-o  pull-right echoPalomita"></i>'+
                    '<label class="text-verde pull-right">'+Categoria+'</label>'+
                  '</div>'+
                '</li>')
    }
// function ActualizarTarea(index){
//   var Tareaid = index;
//               $.ajax({
//               type: 'POST',
//               url: baseurl+"cPersona/tareaRealizada" ,
//               data:{Tareaid:Tareaid},
//               success: function(data) { 
//                 $("#tarea" + index).remove();
//                 recargar();
//               }
//           });
//                   return false;
//   }
//   function ActualizarTareaR(index){
//   var Tareaid = index;
//               $.ajax({
//               type: 'POST',
//               url: baseurl+"cPersona/tareaNoRealizada" ,
//               data:{Tareaid:Tareaid},
//               success: function(data) { 
//                 $("#tarea" + index).remove();
//                 recargar();
//               }
//           });
//                   return false;
//   }
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
    if (item.Activa==1) {
      $('#ListaTareasPersonas').append(
                '<li class="'+clase+'">'+
                  '<span class="handle">'+
                    '<i class="fa fa-ellipsis-v"></i>'+
                    '<i class="fa fa-ellipsis-v"></i>'+
                  '</span>'+
                  '<input onclick="ActualizarTarea('+item.idTarea+')" type="checkbox" value="'+item.idTarea+'" >'+
                  '<span class="text LinkTarea"><a href="'+baseurl+'cPersona/verTarea/'+item.idTarea+'">'+item.TituloTarea+'</a></span>'+
                  '&nbsp;<small>con</small><span class="text linkContacto"><a href="'+baseurl+'cPersona/verPersona/'+item.idPersona+'">'+item.Nombre+'</a></span>'+
                  '<div class="tools pull-right">'+
                    '<label class="text-verde pull-right">'+item.Categoria+'</label>'+
                  '</div>'+
                '</li>'
        )
    }
    else{
                  agregarTareaRealizadaPersona(clase,item.idTarea,item.TituloTarea,item.idPersona,item.Nombre,item.Categoria);
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
    if (item.Activa==1) {
      $('#ListaTareasPersonas').append(
                '<li class="'+clase+'">'+
                  '<span class="handle">'+
                    '<i class="fa fa-ellipsis-v"></i>'+
                    '<i class="fa fa-ellipsis-v"></i>'+
                  '</span>'+
                  '<input onclick="ActualizarTarea('+item.idTarea+')" type="checkbox" value="'+item.idTarea+'" >'+
                  '<span class="text LinkTarea"><a href="'+baseurl+'cPersona/verTarea/'+item.idTarea+'">'+item.TituloTarea+'</a></span>'+
                  '&nbsp;<small>con</small><span class="text linkContacto"><a href="'+baseurl+'cPersona/verPersona/'+item.idPersona+'">'+item.Nombre+'...</a></span>'+
                  '<div class="tools pull-right">'+
                    '<label class="text-verde pull-right">'+item.Categoria+'</label>'+
                  '</div>'+
                '</li>'
        )
    }
    else{
                  agregarTareaRealizadaPersona(clase,item.idTarea,item.TituloTarea,item.idPersona,item.Nombre,item.Categoria);
    }
          }); 
  });
}


$.post(baseurl+"cGetPersonas/getPersonas",
function(data){
  var emp= JSON.parse(data);
  $.each(emp,function(i,item){
          if(item.Status=='Inactivo'){}
      else {
    $('#PersonasPart').append('<option value="'+item.idPersona+'">'+item.Nombre+' '+item.Paterno+'</option>')}
  });
});

$.post(baseurl+"cGetUsuarios/getUsuarios",
  function(data){
    var emp = JSON.parse(data);
    $.each(emp,function(i,item){
      $('#Asignados').append('<option value="'+item.idUsuario+'">'+item.Nombre+' '+item.Paterno+'</option>');
      $('#Usuarios').append('<option value="'+item.idUsuario+'">'+item.Nombre+' '+item.Paterno+'</option>')
      });
  });

$.post(baseurl+"cGetEmpresas/getEmpresas",
  {
    sitReg:1
  },
  function(data){
    var emp = JSON.parse(data);
    $.each(emp,function(i,item){
      $('#EmpresasPart').append('<option value="'+item.idEmpresa+'">'+item.RazonSocial+'</option>')
      });
  });