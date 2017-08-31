mostrarPersonas();
$.post(baseurl+"cGetEmpresas/getEmpresas",
	{
		sitReg:1
	},
	function(data){
		var emp = JSON.parse(data);
		$.each(emp,function(i,item){
			$('#listaEmpresas').append(
        '<a href="'+baseurl+'cEmpresa/verEmpresa/'+item.idEmpresa+'">'+
          '<div class="info-box bg-aqua">'+
            '<span class="info-box-icon"><i class="fa fa-university"></i></span>'+
            '<div class="info-box-content">'+
              '<span class="info-box-number h3">'+item.RazonSocial+'</span>'+
              '<div class="progress">'+
                '<div class="progress-bar" style="width: 70%"></div>'+
              '</div>'+
              '<span class="progress-description">'+item.Tipo+'</span>'+
            '</div>'+
          '</div>'+
          '</a')
			});
	});
function mostrarPersonas(){
$.post(baseurl+"cGetPersonas/getPersonas",
	{
		Cargo:'Representante'
	},
	function(data){
		var emp = JSON.parse(data);
		$.each(emp,function(i,item){
            if(item.Status=='Inactivo'){}
      else {
			$('#listaPersonas').append(
        '<a href="'+baseurl+'cPersona/verPersona/'+item.idPersona+'">'+
          '<div class="info-box bg-green">'+
            '<span class="info-box-icon"><i class="fa fa-user"></i></span>'+
            '<div class="info-box-content">'+
              '<span class="info-box-number h3">'+item.Nombre+' '+item.Paterno+'</span>'+
              '<div class="progress">'+
                '<div class="progress-bar" style="width: 70%"></div>'+
              '</div>'+
              '<span class="progress-description">'+item.Cargo+'</span>'+
            '</div>'+
          '</div>'+
          '</a>')}
			});
	});
}

$(document).ready(function() {
$('#tablaPersonas').on('click','#btnEliminarPersona', function() {
      var Personaid = $(this).val();
    $.confirm({
        title: 'Eliminar Persona!',
        content: 'La persona será marcada como inactiva, ¿Desea continuar?',
        buttons: {
            Continuar: function () {
                // $.alert('Confirmed!');
              $.ajax({
              type: 'POST',
              url: baseurl+"cPersona/eliminarPersona" ,
              data:{Personaid:Personaid},
              success: function(data) {
                location.reload(true);
              }
          });
          return true;
            },
            Cancelar: function () {
            }
        }
    });
    });
});

MostrarModalEditarP = function($idPersona,$NombrePersona,$Cargo,$Puesto,$Telefono1,$Telefono2,$Correo1,$Correo2,$Skype,$Direccion,$Ciudad,$Pais){

$('#idPersona').val($idPersona);
$('#mNombrePersona').val($NombrePersona);
$('#mCargo').val($Cargo);
$('#mPuesto').val($Puesto);
$('#mTelefono1').val($Telefono1);
$('#mTelefono2').val($Telefono2);
$('#mCorreo1').val($Correo1);
$('#mCorreo2').val($Correo2);
$('#mSkype').val($Skype);
$('#mDireccion').val($Direccion);
$('#mEstado').val($Ciudad);
$('#mPais').val($Pais);
};

MostrarModalEditarEmp = function($idEmpresa){

  $.post(baseurl+"cEmpresa/getContactos",
    {
        idEmpresa:$idEmpresa
    },
    function(data){
      var emp = JSON.parse(data);
        $.each(emp,function(i,item){
          alert(item['Nombre']);
        $('#ContactoEmp').append('<option selected="true">'+item['Nombre']+'</option>');
        });
    });

    $.post(baseurl+"cEmpresa/getDatosEmpresa",
    {
        idEmpresa:$idEmpresa
    },
    function(data){
      var emp2 = JSON.parse(data);
      $('#NombreEmpresa').val(emp2['NombreEmpresa']);
      $('#SPP').val(emp2['spp']);
      $('#Abreviacion').val(emp2['Abreviacion']);
      $('#Tipo').val(emp2['Tipo']).trigger("change");
      $('#Skype').val(emp2['Skype']);
      $('#SitioWeb').val(emp2['SitioWeb']);
      $('#DatosFiscales').val(emp2['DatosFiscales']);
      $('#Telefono1').val(emp2['Telefono']);
      $('#Telefono2').val(emp2['Telefono2']);
      $('#Correo1').val(emp2['Email']);
      $('#Correo2').val(emp2['Email2']);
      $('#DireccionOficina').val(emp2['DireccionOficina']);
      $('#DireccionFiscal').val(emp2['DireccionFiscal']);
      $('#Ciudad').val(emp2['Ciudad']);
      $('#Pais').val(emp2['Pais']);
      $('#idEmpresa').val(emp2['idEmpresa']);

    });

    $.post(baseurl+"cEmpresa/getPersonas",
    {
        idEmpresa:$idEmpresa
    },
    function(data){
      var emp3 = JSON.parse(data);
$('#RepresentanteEmp').val(emp3['Nombre']);
$('#idRepresentanteEmp').val(emp3['idPersona']);
    });
};


GuardarEditPersona = function(){
  var idPersonaE = $('#idPersona').val();
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
};

$(document).ready(function() {
$('#tablaEmpresas').on('click','#btnActualizarEmpresa', function() {
      var idEmpresa = $(this).val();
    $.confirm({
        title: 'Editar Persona',
        content: '¿Desea continuar?',
        buttons: {
            Continuar: function () {
              $.ajax({
              type: 'POST',
              url: baseurl+"cEmpresa/verEmpresaEdit" ,
              data:{idEmpresa:idEmpresa},
              success: function(data) {
              window.location.href = baseurl+"cEmpresa/verEmpresaEdit/"+idEmpresa;              
            }
          });
          return true;
            },
            Cancelar: function () {
            }
        }
    });
    });
});

//  $(document).ready(function() {
// $('#tablaPersonas').on('click','#btnEliminarPersona', function() {
//       var idPersona = $(this).val();
//        $("#ModalPersona").modal();
//                $("#ModalPersona").on('hidden.bs.modal', function () {
//                 var StatusFinal = $('#StatusFinal').val();
//               $.ajax({
//               type: 'POST',
//               url: baseurl+"cPersona/PersonaInactiva" ,
//               data:{idPersona:idPersona,StatusFinal:StatusFinal},
//               success: function(data) {
//                 alert('Persona Marcada como "Inactiva"');
//                 // location.href=baseurl+"/cContactos";
//                 mostrarPersonas();
//               }
//           });
//           return true;
//       });
//     });
// });
$(document).ready(function() {
$('#tablaEmpresas').on('click','#btnEliminarEmpresa', function() {
      var idEmpresa = $(this).val();
    $.confirm({
        title: 'Eliminar Empresa',
        content: 'La Empresa será marcada como inactiva, ¿Desea continuar?',
        buttons: {
            Continuar: function () {
                // $.alert('Confirmed!');
              $.ajax({
              type: 'POST',
              url: baseurl+"cEmpresa/EmpresaInactiva" ,
              data:{idEmpresa:idEmpresa},
              success: function(data) {
                location.reload(true);
              }
          });
          return true;
            },
            Cancelar: function () {
            }
        }
    });
    });
});

// $(document).ready(function() {
// $('#tablaEmpreas').on('click','#btnEliminarEmpresa', function() {
//       var idEmpresa = $(this).val();
//        $("#ModalEmpresa").modal();
//                $("#ModalEmpresa").on('hidden.bs.modal', function () {
//                 var StatusFinalE = $('#StatusFinalE').val();
//               $.ajax({
//               type: 'POST',
//               url: baseurl+"cEmpresa/EmpresaInactiva" ,
//               data:{idEmpresa:idEmpresa,StatusFinalE:StatusFinalE},
//               success: function(data) {
//                 alert('Empresa Marcada como "Inactiva"');
//                 location.href=baseurl+"cContactos";
//               }
//           });
//           return true;
//       });
//     });
// });


//  $(document).ready(function() {

// $('#tablaEmpreas').on('click','#btnEliminarEmpresa', function() {
//         $("#myModal").modal("show");
//     });
//         $("#myModal").on('shown.bs.modal', function () {
//             alert('The modal is fully shown.');
//     });

// $('#tablaEmpreas').on('click','#btnEliminarEmpresa', function() {
//       var Tareaid = $(this).val();
//               $.ajax({
//               type: 'POST',
//               url: baseurl+"cTareasInternas/eliminarTareaInterna" ,
//               data:{Tareaid:Tareaid},
//               success: function(data) {
//                 alert('Tarea Eliminada');
//                 location.href="http://localhost/crm/cTareasInternas/";
//               }
//           });
//           return true;
//     });
// });