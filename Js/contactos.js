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

