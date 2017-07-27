$.post(baseurl+"cGetUsuarios/getUsuarios",
	function(data){ 
		var emp = JSON.parse(data);
		$.each(emp,function(i,item){
			$('#PersonaCargo').append('<option value="'+item.idUsuario+'">'+item.Nombre+'</option>')
			});
	});