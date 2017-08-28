$(document).ready(function() {
var options = {
	url: baseurl+"cGetEmpresas/autoCompletado/",
	getValue:"NombreEmpresa",
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
		onClickEvent: function() {
			var idEmpresa = $('#BuscadorHeader').getSelectedItemData().idEmpresa;
			location.href=baseurl+"cEmpresa/verEmpresa/"+idEmpresa;
		}
	},
	    theme: "round"
};
$("#BuscadorHeader").easyAutocomplete(options); 
});

$(document).ready(function() {
var options = {
	url: baseurl+"cGetEmpresas/autoCompletadoPersonas/",
	getValue:"Nombre",
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
		onClickEvent: function() {
			var idPersona = $('#BuscadorHeaderP').getSelectedItemData().idPersona;
			location.href=baseurl+"cPersona/verPersona/"+idPersona;
		}
	},
	    theme: "round"
};
$("#BuscadorHeaderP").easyAutocomplete(options); 
});