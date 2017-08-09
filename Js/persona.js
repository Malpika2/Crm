$.post(baseurl+"cGetEmpresas/getEmpresas",
	{
		sitReg:1
	},
	function(data){
		var emp = JSON.parse(data);
		$.each(emp,function(i,item){
			$('#Empresa').append('<option value="'+item.idEmpresa+'">'+item.RazonSocial+'</option>')
			});
	});

$(document).ready(function() {
$('#ListaPersonas').on('click','#btnRealizadaPersonas', function() {
			var Personaid = $(this).val();
              $.ajax({
              type: 'POST',
              url: baseurl+"cPersona/eliminarPersona" ,
              data:{Personaid:Personaid},
              success: function(data) {
              	alert('Persona Eliminada');
              	location.reload(true);
              }
          });
          return true;
    });
});

//Autocomplete
$(document).ready(function() {
var options = {
  url: baseurl+"cGetPersonas/getPersonasAutoComplete",
  getValue: "nombre",
  list: {
    maxNumberOfElements: 5,
    match: {
      enabled: true
    },
    showAnimation: {
      type: "fade", //normal|slide|fade
      time: 400,
      callback: function() {}
    },
    hideAnimation: {
      type: "slide", //normal|slide|fade
      time: 100,
      callback: function() {}
    },    
    onSelectItemEvent: function() {
var Nombre = $("#Nombre").getSelectedItemData().nombre;
var Puesto = $("#Nombre").getSelectedItemData().cargo;
var Telefono1 = $("#Nombre").getSelectedItemData().telefono1;
var Telefono2 = $("#Nombre").getSelectedItemData().telefono2;
var Correo1 = $("#Nombre").getSelectedItemData().email1;
var Correo2 = $("#Nombre").getSelectedItemData().email2;
var Calle = $("#Nombre").getSelectedItemData().direccion;
var Pais = $("#Nombre").getSelectedItemData().pais;


      $("#Puesto").val(Puesto).trigger("change");
      $("#Telefono1").val(Telefono1).trigger("change");
      $("#Telefono2").val(Telefono2).trigger("change");
      $("#Correo1").val(Correo1).trigger("change");
      $("#Correo2").val(Correo2).trigger("change");
      $("#Calle").val(Calle).trigger("change");
      $("#Pais").val(Pais).trigger("change");
    }
  }
};

$("#Nombre").easyAutocomplete(options); 
}); 
function limpiarFormularioPersona(){
     $("#formPersona")[0].reset(); 
      $('select').each(function(){
    if($(this).children().length > 0){
        $($(this).children()[0]).prop('selectedIndex',0);
        $(this).change();
      }
  });
}