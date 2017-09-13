$.post(baseurl+"cGetPersonas/getContactos",
	{ 
		Cargo:'Contacto'
	},
	function(data){
		var emp = JSON.parse(data);
		$.each(emp,function(i,item){
			if(item.Status=='Inactivo'){}
			else {
			$('#Representante').append('<option value="'+item.idPersona+'">'+item.Nombre+'</option>')
			$('#Contacto').append('<option value="'+item.idPersona+'">'+item.Nombre+'</option>')}
			});
	});
$.post(baseurl+"cGetPersonas/getPaises",
  function(data){
    var emp= JSON.parse(data);
    $.each(emp,function(i,item){
      $('#Pais').append('<option value="'+item.nombre+'">'+item.nombre+'</option>')
      $('.Pais').append('<option value="'+item.nombre+'">'+item.nombre+'</option>')
          });
});
$.post(baseurl+"cGetPersonas/getRepresentantes",
	{
		Cargo:'Representante'
	},
	function(data){
		var emp = JSON.parse(data);
		$.each(emp,function(i,item){
			if(item.Status=='Inactivo'){}
			else {
			$('#Representante').append('<option value="'+item.idPersona+'">'+item.Nombre+'</option>')
			}
			});

	});

$(document).ready(function() {
$('#ListaEmpresas').on('click','#btnRealizadaEmpresas', function() {
      var Empresaid = $(this).val();
          $.confirm({
        title: 'Eliminar Empresa!',
        content: 'La Empresa será marcada como inactiva, ¿Desea continuar?',
        buttons: {
            Continuar: function () {
                // $.alert('Confirmed!');
              $.ajax({
              type: 'POST',
              url: baseurl+"cEmpresa/EliminarEmpresa" ,
              data:{Empresaid:Empresaid},
              success: function(data) {
              	location.reload();
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
	var control=0;
var options = {
	url: baseurl+"cGetEmpresas/getEmpresasAutoComplete",
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
			type: "normal", //normal|slide|fade
			time: 100,
			callback: function() {}
		},		
		onSelectItemEvent: function() {
			control=0;
			var nombre = $('#NombreEmpresa').getSelectedItemData().nombre;
			var abreviacion = $("#NombreEmpresa").getSelectedItemData().abreviacion;
			var SPP = $('#NombreEmpresa').getSelectedItemData().spp;
			var SitioWeb = $('#NombreEmpresa').getSelectedItemData().sitio_web;
			var Telefono1 = $('#NombreEmpresa').getSelectedItemData().telefono;
			var Correo1 = $('#NombreEmpresa').getSelectedItemData().email;
			var DatosFiscales = $('#NombreEmpresa').getSelectedItemData().rfc;
			if (DatosFiscales==null){
				var DatosFiscales = $('#NombreEmpresa').getSelectedItemData().ruc;
			}
			var DireccionOficina = $('#NombreEmpresa').getSelectedItemData().direccion_oficina;
			var DireccionFiscal = $('#NombreEmpresa').getSelectedItemData().direccion_fiscal;
			var Ciudad = $('#NombreEmpresa').getSelectedItemData().ciudad;
			var Pais = $('#NombreEmpresa').getSelectedItemData().pais;
			$("#NombreEmpresa").val(nombre).trigger("change");
			$("#Abreviacion").val(abreviacion).trigger("change");
			$("#SPP").val(SPP).trigger("change");
			$("#SitioWeb").val(SitioWeb).trigger("change");
			$("#Telefono1").val(Telefono1).trigger("change");
			$("#Correo1").val(Correo1).trigger("change");
			$("#DatosFiscales").val(DatosFiscales).trigger("change");
			$("#DireccionOficina").val(DireccionOficina).trigger("change");
			$("#DireccionFiscal").val(DireccionFiscal);
			$("#Ciudad").val(Ciudad).trigger("change");
			$("#Pais").val(Pais).trigger("change");
		},
		onClickEvent: function(){
			control=2;
		},
		onMouseOutEvent: function(){
			if (control===0){
			$("#Abreviacion").val('').trigger("change");
			$("#SPP").val('').trigger("change");
			$("#SitioWeb").val('').trigger("change");
			$("#Telefono1").val('').trigger("change");
			$("#Correo1").val('').trigger("change");
			$("#DatosFiscales").val('').trigger("change");
			$("#DireccionOficina").val('').trigger("change");
			$("#DireccionFiscal").val('');
			$("#Ciudad").val('').trigger("change");
			$("#Pais").val('').trigger("change");
			}
		},
		onHideListEvent:function(){
			if(control==0){
			$("#Abreviacion").val('').trigger("change");
			$("#SPP").val('').trigger("change");
			$("#SitioWeb").val('').trigger("change");
			$("#Telefono1").val('').trigger("change");
			$("#Correo1").val('').trigger("change");
			$("#DatosFiscales").val('').trigger("change");
			$("#DireccionOficina").val('').trigger("change");
			$("#DireccionFiscal").val('');
			$("#Ciudad").val('').trigger("change");
			$("#Pais").val('').trigger("change");}	
		}
	}
};

$("#NombreEmpresa").easyAutocomplete(options);
});

//Autocomplete SPP
// $(document).ready(function() {
// 	var control2=0;
// var options = {
// 	url: baseurl+"cGetEmpresas/getEmpresasAutoComplete",
// 	getValue: "spp",
// 	list: {
// 		maxNumberOfElements: 5,
// 		match: {
// 			enabled: true
// 		},
// 		showAnimation: {
// 			type: "fade", //normal|slide|fade
// 			time: 400,
// 			callback: function() {}
// 		},
// 		hideAnimation: {
// 			type: "slide", //normal|slide|fade
// 			time: 100,
// 			callback: function() {}
// 		},		
// 		onSelectItemEvent: function() {
// 			control2=0;
// 			var abreviacion = $('#SPP').getSelectedItemData().abreviacion;
// 			var nombre = $('#SPP').getSelectedItemData().nombre;
// 			var SitioWeb = $('#SPP').getSelectedItemData().sitio_web;
// 			var Telefono1 = $('#SPP').getSelectedItemData().telefono;
// 			var Correo1 = $('#SPP').getSelectedItemData().email;
// 			var DatosFiscales = $('#SPP').getSelectedItemData().rfc;
// 			if (DatosFiscales==null){
// 				var DatosFiscales = $('#SPP').getSelectedItemData().ruc;
// 			}
// 			var DireccionOficina = $('#SPP').getSelectedItemData().direccion_oficina;
// 			var DireccionFiscal = $('#SPP').getSelectedItemData().direccion_fiscal;
// 			var Ciudad = $('#SPP').getSelectedItemData().ciudad;
// 			var Pais = $('#SPP').getSelectedItemData().pais;


// 			$("#Abreviacion").val(abreviacion).trigger("change");
// 			$("#NombreEmpresa").val(nombre).trigger("change");
// 			$("#SitioWeb").val(SitioWeb).trigger("change");
// 			$("#Telefono1").val(Telefono1).trigger("change");
// 			$("#Correo1").val(Correo1).trigger("change");
// 			$("#DatosFiscales").val(DatosFiscales).trigger("change");
// 			$("#DireccionOficina").val(DireccionOficina).trigger("change");
// 			$("#DireccionFiscal").val(DireccionFiscal).trigger("change");
// 			$("#Ciudad").val(Ciudad).trigger("change");
// 			$("#Pais").val(Pais).trigger("change");
// 		},
// 		onClickEvent: function(){
// 			control2=2;
// 		},
// 		onMouseOutEvent: function(){
// 			if (control2===0){
// 			$("#NombreEmpresa").val('').trigger("change");
// 			$("#Abreviacion").val('').trigger("change");
// 			// $("#SPP").val('').trigger("change");
// 			$("#SitioWeb").val('').trigger("change");
// 			$("#Telefono1").val('').trigger("change");
// 			$("#Correo1").val('').trigger("change");
// 			$("#DatosFiscales").val('').trigger("change");
// 			$("#DireccionOficina").val('').trigger("change");
// 			$("#DireccionFiscal").val('');
// 			$("#Ciudad").val('').trigger("change");
// 			$("#Pais").val('').trigger("change");
// 			}
// 		},
// 		onHideListEvent:function(){
// 			if(control2==0){
// 			$("#NombreEmpresa").val('').trigger("change");
// 			$("#Abreviacion").val('').trigger("change");
// 			// $("#SPP").val('').trigger("change");
// 			$("#SitioWeb").val('').trigger("change");
// 			$("#Telefono1").val('').trigger("change");
// 			$("#Correo1").val('').trigger("change");
// 			$("#DatosFiscales").val('').trigger("change");
// 			$("#DireccionOficina").val('').trigger("change");
// 			$("#DireccionFiscal").val('');
// 			$("#Ciudad").val('').trigger("change");
// 			$("#Pais").val('').trigger("change");}	
// 		}
// 	}
// };

// $("#SPP").easyAutocomplete(options); 
// });

function limpiarFormularioEmpresa(){
 	   $("#formEmpresa")[0].reset();
 	   $("#ContactoEmp").empty();
    	$('select').each(function(){
    if($(this).children().length > 0){
        $($(this).children()[0]).prop('selectedIndex',0);
        $(this).change();
    	}
	});
}


//Autocomplete modal agregar persona
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
	var Cargo = "Representante";
	var Status = "Incorporado";
      
      // $('#Nombre').val(Nombre).trigger("change");
      $(".Puesto").val(Puesto).trigger("change");
      $(".Telefono1").val(Telefono1).trigger("change");
      $(".Telefono2").val(Telefono2).trigger("change");
      $(".Correo1").val(Correo1).trigger("change");
      $(".Correo2").val(Correo2).trigger("change");
      $(".Calle").val(Calle).trigger("change");
      $(".Pais").val(Pais).trigger("change");
      // $(".Cargo").val(Cargo).trigger("change");
      $(".Status").val(Status).trigger("change");
    },
		onClickEvent: function(){
			control3=2;
		},
		onMouseOutEvent: function(){
			if (control3===0){
			  // $('#Nombre').val('').trigger("change");
		      $(".Puesto").val('').trigger("change");
		      $(".Telefono1").val('').trigger("change");
		      $(".Telefono2").val('').trigger("change");
		      $(".Correo1").val('').trigger("change");
		      $(".Correo2").val('').trigger("change");
		      $(".Calle").val('').trigger("change");
		      $(".Pais").val('').trigger("change");
		      $(".Status").val('').trigger("change");
			}
		},
		onHideListEvent:function(){
			if(control3==0){
			  // $('#Nombre').val('').trigger("change");
		      $(".Puesto").val('').trigger("change");
		      $(".Telefono1").val('').trigger("change");
		      $(".Telefono2").val('').trigger("change");
		      $(".Correo1").val('').trigger("change");
		      $(".Correo2").val('').trigger("change");
		      $(".Calle").val('').trigger("change");
		      $(".Pais").val('').trigger("change");
		      $(".Status").val('').trigger("change");
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


function cargarPersonas(){
		$('#Representante').empty();
		$('#Contacto').empty();
	$.post(baseurl+"cGetPersonas/getRepresentantes",
	{
		Cargo:'Representante'
	},
	function(data){
		var emp = JSON.parse(data);
		$('#Representante').append('<option select="true" value="0">Lista de representantes</option>');
		$.each(emp,function(i,item){
			if(item.Status=='Inactivo'){}
			else {
			$('#Representante').append('<option value="'+item.idPersona+'">'+item.Nombre+'</option>')
			}
			});

	});
	$.post(baseurl+"cGetPersonas/getContactos",
	{ 
		Cargo:'Contacto'
	},
	function(data){
		var emp = JSON.parse(data);
		$('#Contacto').append('<option select="true" value="0">Lista de Contactos</option>');
		$.each(emp,function(i,item){
						if(item.Status=='Inactivo'){}
			else {
			$('#Contacto').append('<option value="'+item.idPersona+'">'+item.Nombre+'</option>')
			}
			});
	});
}

$('#registrarPersona').click(function(){

var control='1';
$('#form, #fat, #formPersona').submit(function() {
	if(control=='1'){
	control=0;
	var cargo = $('#Cargo').val();
          $.ajax({
              type: 'POST',
              url: $(this).attr('action'),
              data: $(this).serialize(),
              success: function(data) {
              	if(cargo=='Contacto'){
					var emp = JSON.parse(data);
					$.each(emp,function(i,item){
					$('#ContactoEmp').append('<option selected="true" value="'+item.idPersona+'">'+item.Nombre+'</option>')
						});
					}
				if (cargo=='Representante') {
					var emp = JSON.parse(data);
					$.each(emp,function(i,item){
						$('#RepresentanteEmp').val(item.Nombre);
						$('#idRepresentanteEmp').val(item.idPersona);
						});
					}
						limpiarFormularioPersona();
						cargarPersonas();
						$("#btnCerrarModal").click();

              }
          });
      }
          return false;
      });
    });

//CAMPOS REPRESENTANTE Y CONTACTO Multiple
$(document).ready(function() {
	$('#ContactoEmp').on('select2:unselect', function (evt) {
		var unselected = $(this).find('option:not(:selected)');
		unselected.remove();
	});
});

$('#Contacto').change(function(){
	$('#Contacto option:selected').each(function(){
			var idPersona= $('#Contacto').val();
			$.post(baseurl+"cGetPersonas/getPersonaPorId",
				{ 
					idPersona:idPersona
				},
				function(data){
					var emp = JSON.parse(data);
					$.each(emp,function(i,item){
					$('#ContactoEmp').append('<option selected="true" value="'+item.idPersona+'">'+item.Nombre+'</option>')
						});
				});
	});
});
$('#Representante').change(function(){
	$('#Representante option:selected').each(function(){
			var idRep= $('#Representante').val();
			$.post(baseurl+"cGetPersonas/getPersonaPorId",
				{ 
					idPersona:idRep
				},
				function(data){
					var emp = JSON.parse(data);
					$.each(emp,function(i,item){
						$('#RepresentanteEmp').val(item.Nombre);
						$('#idRepresentanteEmp').val(item.idPersona);
						});
				});
	});
});

$('#btnBuscarExistente').click(function(){
	$('#Representante').removeClass('hidden');
	$('#Representante').addClass('select2');
});

$('#btnAgregarNuevo').click(function(){
	$('#Representante').addClass('hidden');
	$('#Representante').removeClass('select2');
	var Cargo = 'Representante';
	$(".Cargo").val(Cargo).trigger("change");

});

$('#btnBuscarExistenteCont').click(function(){
	$('#Contacto').removeClass('hidden');
	$('#Contacto').addClass('select2');
});

$('#btnAgregarNuevoCont').click(function(){
	$('#Contacto').addClass('hidden');
	$('#Contacto').removeClass('select2');
	var Cargo = 'Contacto';
	$(".Cargo").val(Cargo).trigger("change");

});

$('#form, #fat, #formEmpresa').submit(function() {
	$.ajax({
          type: 'POST',
          url: $(this).attr('action'),
          data: $(this).serialize(),
          success: function(data) {
          	limpiarFormularioEmpresa();
			$.alert({
		        title: 'Guardar Empresa!',
		        content: 'Empresa guardada correctamente!',
		    });
          }
		});
	     return false;
});

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

function utf8_encode (argString) { 
  if (argString === null || typeof argString === 'undefined') {
    return ''
  }
  // .replace(/\r\n/g, "\n").replace(/\r/g, "\n");
  var string = (argString + '')
  var utftext = ''
  var start
  var end
  var stringl = 0
  start = end = 0
  stringl = string.length
  for (var n = 0; n < stringl; n++) {
    var c1 = string.charCodeAt(n)
    var enc = null
    if (c1 < 128) {
      end++
    } else if (c1 > 127 && c1 < 2048) {
      enc = String.fromCharCode(
        (c1 >> 6) | 192, (c1 & 63) | 128
      )
    } else if ((c1 & 0xF800) !== 0xD800) {
      enc = String.fromCharCode(
        (c1 >> 12) | 224, ((c1 >> 6) & 63) | 128, (c1 & 63) | 128
      )
    } else {
      // surrogate pairs
      if ((c1 & 0xFC00) !== 0xD800) {
        throw new RangeError('Unmatched trail surrogate at ' + n)
      }
      var c2 = string.charCodeAt(++n)
      if ((c2 & 0xFC00) !== 0xDC00) {
        throw new RangeError('Unmatched lead surrogate at ' + (n - 1))
      }
      c1 = ((c1 & 0x3FF) << 10) + (c2 & 0x3FF) + 0x10000
      enc = String.fromCharCode(
        (c1 >> 18) | 240, ((c1 >> 12) & 63) | 128, ((c1 >> 6) & 63) | 128, (c1 & 63) | 128
      )
    }
    if (enc !== null) {
      if (end > start) {
        utftext += string.slice(start, end)
      }
      utftext += enc
      start = end = n + 1
    }
  }
  if (end > start) {
    utftext += string.slice(start, stringl)
  }
  return utftext
}
