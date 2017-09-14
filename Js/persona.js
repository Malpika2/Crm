$.post(baseurl+"cGetEmpresas/getEmpresas",
	{
		sitReg:1
	},
	function(data){
		var emp = JSON.parse(data);
		$.each(emp,function(i,item){
			$('#Empresa').append('<option value="'+item.idEmpresa+'">'+item.NombreEmpresa+'</option>')
			});
	});
$.post(baseurl+"cGetPersonas/getPaises",
  function(data){
    var emp= JSON.parse(data);
    $.each(emp,function(i,item){
      $('#Pais').append('<option value="'+item.nombre+'">'+item.nombre+'</option>')
    });
});
$(document).ready(function() {
$('#ListaPersonas').on('click','#btnRealizadaPersonas', function() {
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

//Autocomplete
$(document).ready(function() {
  var control3=0;
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
      control3=0;
var Nombre = $("#Nombre").getSelectedItemData().nombre;
var Puesto = $("#Nombre").getSelectedItemData().cargo;
var Telefono1 = $("#Nombre").getSelectedItemData().telefono1;
var Telefono2 = $("#Nombre").getSelectedItemData().telefono2;
var Correo1 = $("#Nombre").getSelectedItemData().email1;
var Correo2 = $("#Nombre").getSelectedItemData().email2;
var Calle = $("#Nombre").getSelectedItemData().direccion;
var Pais = $("#Nombre").getSelectedItemData().pais;

      $('#Nombre').val(Nombre).trigger("change");

      $("#Puesto").val(Puesto).trigger("change");
      $("#Telefono1").val(Telefono1).trigger("change");
      $("#Telefono2").val(Telefono2).trigger("change");
      $("#Correo1").val(Correo1).trigger("change");
      $("#Correo2").val(Correo2).trigger("change");
      $("#Calle").val(Calle).trigger("change");
      $("#Pais").val(Pais).trigger("change");
    },
    onClickEvent: function(){
      control3=2;
    },
    onMouseOutEvent: function(){
      if (control3===0){
      $("#Puesto").val('').trigger("change");
      $("#Telefono1").val('').trigger("change");
      $("#Telefono2").val('').trigger("change");
      $("#Correo1").val('').trigger("change");
      $("#Correo2").val('').trigger("change");
      $("#Calle").val('').trigger("change");
      $("#Pais").val('').trigger("change");
      }
    },
    onHideListEvent:function(){
      if(control3==0){
      $("#Puesto").val('').trigger("change");
      $("#Telefono1").val('').trigger("change");
      $("#Telefono2").val('').trigger("change");
      $("#Correo1").val('').trigger("change");
      $("#Correo2").val('').trigger("change");
      $("#Calle").val('').trigger("change");
      $("#Pais").val('').trigger("change");
      } 
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

$('#form, #fat, #formPersona').submit(function() {
  $.ajax({
          type: 'POST',
          url: $(this).attr('action'),
          data: $(this).serialize(),
          success: function(data) {
            limpiarFormularioPersona();
      $.alert({
            title: 'Guardar Persona!',
            content: 'Persona guardada correctamente!',
        });
          }
    });
       return false;
});
cambiarLada = function(){
    var LPais = $('#Pais').val();
    $.post(baseurl+"cGetPersonas/getLadaPorPais",
    {
      Pais:LPais
    },
    function(data){
      var datos= JSON.parse(data);
      $('#ladaTel1').html(datos['codigo_telefono']);
      $('#ladaTel2').html(datos['codigo_telefono']);
      $('#ladaTel2input').val(datos['codigo_telefono']);
      $('#ladaTel1input').val(datos['codigo_telefono']);
    });

}