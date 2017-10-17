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
			$("#Pais").val('').trigger("change");
			}	
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
						$('#RepresentanteEmp').html('<label class="col-md-12" style="border: 1px solid #0073b7;">'+item.Nombre+'</label>');
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
	$('#RepresentanteEmp').html('');
});

$('#btnAgregarNuevo').click(function(){
	$('#Representante').addClass('hidden');
	$('#Representante').removeClass('select2');
	var Cargo = 'Representante';
	$(".Cargo").val(Cargo).trigger("change");
	$("#cargo3").val('Contacto Principal').trigger("change");

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
cambiarLada = function(){
	  var LPais = $('#Pais').val();
	  $.post(baseurl+"cGetPersonas/getLadaPorPais",
	  {
	  	Pais:LPais
	  },
	  function(data){
	  	var datos= JSON.parse(data);
	  	if (datos!==null){
	  	$('#ladaTel1').html(datos['codigo_telefono']);
	  	$('#ladaTel2').html(datos['codigo_telefono']);
	  	$('#ladaTel2input').val(datos['codigo_telefono']);
	  	$('#ladaTel1input').val(datos['codigo_telefono']);
	  	}
	  });

}
cambiarLadaP = function(){
	  var LPais = $('.Pais').val();
	  $.post(baseurl+"cGetPersonas/getLadaPorPais",
	  {
	  	Pais:LPais
	  },
	  function(data){
	  	var datos= JSON.parse(data);
	  if (datos!==null){
	  	$('.ladaTel1').html(datos['codigo_telefono']);
	  	$('.ladaTel2').html(datos['codigo_telefono']);
	  	$('.ladaTel1input').val(datos['codigo_telefono']);
	  	$('.ladaTel2input').val(datos['codigo_telefono']);
	  }
	  });

}
	
Validar_Nueva_Empresa = function(){
	var NEmpresa = $('#NombreEmpresa').val();
      $.ajax({
      type: 'POST',
      url: baseurl+"cEmpresa/Validar_Nueva_Empresa" ,
      data:{NEmpresa:NEmpresa},
      success: function(data) {
      	if (data>0) {
      		$('#mensaje_validar_empresa').removeClass('hidden');
       		$('#registrarEmpresa').prop("disabled",true);
      	}
      	else{
      		$('#mensaje_validar_empresa').addClass('hidden');
       		$('#registrarEmpresa').prop("disabled",false);
      	}
      }
  });
      $.ajax({
      	type:'POST',
      	url:baseurl+"cEmpresa/Validar_Nueva_EmpresaDSPP",
      	data:{NEmpresa:NEmpresa},
      	success:function(data){
      		if (data>0){//Si tiene registro previo se dan los valores N/A;
	      		$("#InteresEmpresa").val('N/A').trigger("change");
				$("#PresupuestoPersona").val('N/A').trigger("change");
				$("#PresupuestoPersona").prop('readonly',true);
				$("#ConfianzaEmpresa").val('N/A').trigger("change");
				$("#Motivo").val('N/A').trigger("change");
				$("#Motivo").prop('readonly',true);
				$("#LugarContacto").val('N/A').trigger("change");
				$("#LugarContacto").prop('readonly',true);
				$(".option").addClass('hidden');
      		}else{//Si no tiene registro previo se activan los campos:
		  		$("#InteresEmpresa").val('Bajo').trigger("change");
				$("#PresupuestoPersona").val('').trigger("change");
				$("#PresupuestoPersona").prop('readonly',false)
				$("#ConfianzaEmpresa").val('1').trigger("change");
				$("#Motivo").val('').trigger("change");
				$("#Motivo").prop('readonly',false)
				$("#LugarContacto").val('').trigger("change");
				$("#LugarContacto").prop('readonly',false)
		        $(".option").removeClass('hidden');
      		}

      	}
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
				$(".PresupuestoPersona").val('N/A').trigger("change");
				$(".PresupuestoPersona").prop("disabled",true);
				$(".InteresPersona").val('N/A').trigger("change");
				$(".InteresPersona").prop("disabled",true);
				$(".ConfianzaPersona").val('N/A').trigger("change");
				$(".ConfianzaPersona").prop("disabled",true);
				$(".Motivo").val('N/A').trigger("change");
				$(".Motivo").prop("disabled",true);
				$(".LugarContacto").val('N/A').trigger("change");
				$(".LugarContacto").prop("disabled",true);
			}
			else{
				$(".PresupuestoPersona").val('').trigger("change");
				$(".PresupuestoPersona").prop("disabled",false);
				$(".InteresPersona").val('Bajo').trigger("change");
				$(".InteresPersona").prop("disabled",false);
				$(".ConfianzaPersona").val('1').trigger("change");
				$(".ConfianzaPersona").prop("disabled",false);
				$(".Motivo").val('').trigger("change");
				$(".Motivo").prop("disabled",false);
				$(".LugarContacto").val('').trigger("change");
				$(".LugarContacto").prop("disabled",false);
			}
		}
	});
}

$(document).ready(function(){
    $('#fa').tooltip({title: "Para consultar codigos de marcación internacional haga click  <a href=\"http://www.comollamar.com\" target=\"_blank\">Aqui</a> (sitio externo)", html: true, placement: "bottom",trigger:"click"}); 
});
$(document).ready(function(){
    $('#fa2').tooltip({title: "Para consultar codigos de marcación internacional haga click  <a href=\"http://www.comollamar.com\" target=\"_blank\">Aqui</a> (sitio externo)", html: true, placement: "bottom",trigger:"click"}); 
});
