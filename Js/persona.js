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

Validar_Nueva_Persona = function(){
  var nPersona = $('#Nombre').val();
  $.ajax({
    type:'POST',
    url: baseurl+"cEmpresa/Validar_Nueva_Persona",
    data:{nPersona:nPersona},
    success: function(data){
      if (data>0){
        $('#mensaje_validar_persona').removeClass('hidden');
        $('#registrarPersona').prop("disabled",true);
      }
      else{
        $('#mensaje_validar_persona').addClass('hidden');
        $('#registrarPersona').prop("disabled",false);
      }
    }
  });
  $.ajax({
    type:'POST',
    url:baseurl+"cEmpresa/Validar_Nueva_PersonaDSPP",
    data:{nPersona:nPersona},
    success: function(data){
      if (data>0){
        $("#PresupuestoPersona").val('N/A').trigger("change");
        $("#InteresPersona").val('N/A').trigger("change");
        $("#ConfianzaPersona").val('N/A').trigger("change");
        $("#Motivo").val('N/A').trigger("change");
        $("#Motivo").prop("readonly",true);
        $("#LugarContacto").val('N/A').trigger("change");
        $("#LugarContacto").prop("readonly",true);
        $(".option").addClass('hidden');
      }
      else{
        $("#PresupuestoPersona").val('').trigger("change");
        $("#InteresPersona").val('Bajo').trigger("change");
        $("#ConfianzaPersona").val('1').trigger("change");
        $("#Motivo").val('').trigger("change");
        $("#Motivo").prop("readonly",false);
        $("#LugarContacto").val('').trigger("change");
        $("#LugarContacto").prop("readonly",false);
        $(".option").removeClass('hidden');
      }
    }
  });
}
$(document).ready(function(){
    $('#fa').tooltip({title: "Para consultar codigos de marcación internacional haga click  <a href=\"http://www.comollamar.com\" target=\"_blank\">Aqui</a> (sitio externo)", html: true, placement: "bottom",trigger:"click"}); 

});