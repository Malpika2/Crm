$.post(baseurl+"cGetPersonas/getContactos",
	{ 
		Cargo:'Contacto'
	},
	function(data){
		var emp = JSON.parse(data);
		$.each(emp,function(i,item){
			if(item.Status=='Inactivo'){}
			else {
			$('#Contacto').append('<option value="'+item.idPersona+'">'+item.Nombre+'</option>')}
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
			$('#Contacto').append('<option value="'+item.idPersona+'">'+item.Nombre+'</option>')
			$('#Representante').append('<option value="'+item.idPersona+'">'+item.Nombre+'</option>')
			}
			});

	});

$(document).ready(function() {
$('#ListaEmpresas').on('click','#btnRealizadaEmpresas', function() {
	
      var Empresaid = $(this).val();
              $.ajax({
              type: 'POST',
              url: baseurl+"cEmpresa/EliminarEmpresa" ,
              data:{Empresaid:Empresaid},
              success: function(data) {
              	location.reload();
              }
          });
          return true;
    });
});



//Autocomplete
$(document).ready(function() {
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
			type: "slide", //normal|slide|fade
			time: 100,
			callback: function() {}
		},		
		onSelectItemEvent: function() {
			var abreviacion = $("#RazonSocial").getSelectedItemData().abreviacion;
			var SPP = $('#RazonSocial').getSelectedItemData().spp;
			var SitioWeb = $('#RazonSocial').getSelectedItemData().sitio_web;
			var Telefono1 = $('#RazonSocial').getSelectedItemData().telefono;
			var Correo1 = $('#RazonSocial').getSelectedItemData().email;
			var DatosFiscales = $('#RazonSocial').getSelectedItemData().rfc;
			if (DatosFiscales==null){
				var DatosFiscales = $('#RazonSocial').getSelectedItemData().ruc;
			}
			var DireccionOficina = $('#RazonSocial').getSelectedItemData().direccion_oficina;
			var DireccionFiscal = $('#RazonSocial').getSelectedItemData().direccion_fiscal;
			var Ciudad = $('#RazonSocial').getSelectedItemData().ciudad;
			var Pais = $('#RazonSocial').getSelectedItemData().pais;


			$("#Abreviacion").val(abreviacion).trigger("change");
			$("#SPP").val(SPP).trigger("change");
			$("#SitioWeb").val(SitioWeb).trigger("change");
			$("#Telefono1").val(Telefono1).trigger("change");
			$("#Correo1").val(Correo1).trigger("change");
			$("#DatosFiscales").val(DatosFiscales).trigger("change");
			$("#DireccionOficina").val(DireccionOficina).trigger("change");
			$("#DireccionFiscal").val(DireccionFiscal).trigger("change");
			$("#Ciudad").val(Ciudad).trigger("change");
			$("#Pais").val(Pais).trigger("change");
		}
	}
};

$("#RazonSocial").easyAutocomplete(options); 
});

//Autocomplete SPP
$(document).ready(function() {
var options = {
	url: baseurl+"cGetEmpresas/getEmpresasAutoComplete",
	getValue: "spp",
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
			var abreviacion = $('#SPP').getSelectedItemData().abreviacion;
			var nombre = $('#SPP').getSelectedItemData().nombre;
			var SitioWeb = $('#SPP').getSelectedItemData().sitio_web;
			var Telefono1 = $('#SPP').getSelectedItemData().telefono;
			var Correo1 = $('#SPP').getSelectedItemData().email;
			var DatosFiscales = $('#SPP').getSelectedItemData().rfc;
			if (DatosFiscales==null){
				var DatosFiscales = $('#SPP').getSelectedItemData().ruc;
			}
			var DireccionOficina = $('#SPP').getSelectedItemData().direccion_oficina;
			var DireccionFiscal = $('#SPP').getSelectedItemData().direccion_fiscal;
			var Ciudad = $('#SPP').getSelectedItemData().ciudad;
			var Pais = $('#SPP').getSelectedItemData().pais;


			$("#Abreviacion").val(abreviacion).trigger("change");
			$("#RazonSocial").val(nombre).trigger("change");
			$("#SitioWeb").val(SitioWeb).trigger("change");
			$("#Telefono1").val(Telefono1).trigger("change");
			$("#Correo1").val(Correo1).trigger("change");
			$("#DatosFiscales").val(DatosFiscales).trigger("change");
			$("#DireccionOficina").val(DireccionOficina).trigger("change");
			$("#DireccionFiscal").val(DireccionFiscal).trigger("change");
			$("#Ciudad").val(Ciudad).trigger("change");
			$("#Pais").val(Pais).trigger("change");
		}
	}
};

$("#SPP").easyAutocomplete(options); 
});

function limpiarFormularioEmpresa(){
 	   $("#formEmpresa")[0].reset(); 
    	$('select').each(function(){
    if($(this).children().length > 0){
        $($(this).children()[0]).prop('selectedIndex',0);
        $(this).change();
    	}
	});
}


//Autocomplete modal agregar persona
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
var Cargo = "Representante";
var Status = "Incorporado";

      $(".Puesto").val(Puesto).trigger("change");
      $(".Telefono1").val(Telefono1).trigger("change");
      $(".Telefono2").val(Telefono2).trigger("change");
      $(".Correo1").val(Correo1).trigger("change");
      $(".Correo2").val(Correo2).trigger("change");
      $(".Calle").val(Calle).trigger("change");
      $(".Pais").val(Pais).trigger("change");
      // $(".Cargo").val(Cargo).trigger("change");
      $(".Status").val(Status).trigger("change");
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
		$('#Representante').html('');
		$('#Contacto').html('');
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

// $('#ModalNPersona').on('click','#registrarPersona', function() {
$('#registrarPersona').click(function(){
	              		var control='1';
$('#form, #fat, #formPersona').submit(function() {
	var cargo = $('#Cargo').val();
          $.ajax({
              type: 'POST',
              url: $(this).attr('action'),
              data: $(this).serialize(),
              success: function(data) {
              		alert(cargo);
              if(control=='1'){
              	control=0;
              	if(cargo=='Contacto'){
					var emp = JSON.parse(data);
					alert(emp);
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
				}
						limpiarFormularioPersona();
						cargarPersonas();
						$("#btnCerrarModal").click();

              }
          });

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

