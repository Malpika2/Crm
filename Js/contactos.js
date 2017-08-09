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

 $(document).ready(function() {
$('#tablaPersonas').on('click','#btnEliminarPersona', function() {
      var idPersona = $(this).val();
       $("#ModalPersona").modal();
               $("#ModalPersona").on('hidden.bs.modal', function () {
                var StatusFinal = $('#StatusFinal').val();
              $.ajax({
              type: 'POST',
              url: baseurl+"cPersona/PersonaInactiva" ,
              data:{idPersona:idPersona,StatusFinal:StatusFinal},
              success: function(data) {
                alert('Persona Marcada como "Inactiva"');
                location.href=baseurl+"/cContactos";
              }
          });
          return true;
      });
    });
});
$(document).ready(function() {
$('#tablaEmpreas').on('click','#btnEliminarEmpresa', function() {
      var idEmpresa = $(this).val();
       $("#ModalEmpresa").modal();
               $("#ModalEmpresa").on('hidden.bs.modal', function () {
                var StatusFinalE = $('#StatusFinalE').val();
              $.ajax({
              type: 'POST',
              url: baseurl+"cEmpresa/EmpresaInactiva" ,
              data:{idEmpresa:idEmpresa,StatusFinalE:StatusFinalE},
              success: function(data) {
                alert('Empresa Marcada como "Inactiva"');
                location.href=baseurl+"cContactos";
              }
          });
          return true;
      });
    });
});


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