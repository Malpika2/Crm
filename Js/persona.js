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

      $('#Nombre').val(Nombre).trigger("change");

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
function utf8_decode (strData) {
  var tmpArr = []
  var i = 0
  var c1 = 0
  var seqlen = 0
  strData += ''
  while (i < strData.length) {
    c1 = strData.charCodeAt(i) & 0xFF
    seqlen = 0
    if (c1 <= 0xBF) {
      c1 = (c1 & 0x7F)
      seqlen = 1
    } else if (c1 <= 0xDF) {
      c1 = (c1 & 0x1F)
      seqlen = 2
    } else if (c1 <= 0xEF) {
      c1 = (c1 & 0x0F)
      seqlen = 3
    } else {
      c1 = (c1 & 0x07)
      seqlen = 4
    }
    for (var ai = 1; ai < seqlen; ++ai) {
      c1 = ((c1 << 0x06) | (strData.charCodeAt(ai + i) & 0x3F))
    }
    if (seqlen === 4) {
      c1 -= 0x10000
      tmpArr.push(String.fromCharCode(0xD800 | ((c1 >> 10) & 0x3FF)))
      tmpArr.push(String.fromCharCode(0xDC00 | (c1 & 0x3FF)))
    } else {
      tmpArr.push(String.fromCharCode(c1))
    }
    i += seqlen
  }
  return tmpArr.join('')
}