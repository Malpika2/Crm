    <style type="text/css">
    	.InicioM {
    		color: #2866ab;
    	}
    	.inicioa{
    		color: green;
    	}
    	#Inicio p{
    		color:black;
    	}
    </style>
    <section class="content-header" style="background-color:">
    </section>
    <!-- Main content -->
    <section id="Inicio" class="content" style="background-color: ;">
      <div class="row">
      	<div class="col-md-8">
      		<div class="row">
      			<div class="col-md-12">
      				<h2 class="InicioM">Contactos</h2>
      				<p>Empresas o Personas con las que tengamos actividades</p>
      				<div class="col-md-3"><a class="inicioa" href="<?php echo base_url();?>cEmpresa">+Registrar Empresa</a></div>
      				<div class="col-md-3"><a class="inicioa" href="<?php echo base_url();?>cPersona">+Registrar Persona</a></div>
      			</div>
      			<div class="col-md-12">
      				<h2 class="InicioM">Negociacion</h2>
      				<p>Son oportunidades con personas o empresas. Puede consultar las negociaciones y sus estatus.</p>	
      				<div class="col-md-5"><a class="inicioa" href="<?php echo base_url();?>cNegociacion/nuevaNegociacion">Crear nueva negociación</a></div>
      			</div>
      			<div class="col-md-12">
      				<h2 class="InicioM">Tareas</h2>
      				<p>Tareas programadas con tus contactos (Empresas o personas).</p>
      				<div class="col-md-3"><a class="inicioa" href="<?php echo base_url();?>cTareas">+Crear nueva tarea</a></div>

      			</div>
      			<div class="col-md-12">
      				<h2 class="InicioM">Tareas Internas</h2>
      				<p>Tareas o Actividades asiganadas a un usuario sin implicar un contacto.</p>
      				<div class="col-md-3"> <a class="inicioa" href="#">+Crear tarea interna</a></div>
      			</div>
      			<div class="col-md-12">
      				<h2 class="InicioM">Usuarios</h2>
      				<p>Son las personas que trabajas en tu empresa(Encargados).</p>
      				<div class="col-md-6"><a class="inicioa" href="<?php echo base_url();?>cUsuario">+Registrar Nuevo Usuario</a></div>
      			</div>
      		</div>
      	</div>
      	<div class="col-md-3" style="background-color: #e9eab4;">
	      	<div class="row">
	      		<div class="col-md-12" style="background-color: #1085c3">
	      			<h3 class="text-center" style="margin: 5px">TAREAS PERSONALES</h3>
	      		</div>
	      		<div class="col-md-12">
	      			<ul style="list-style-type: none; text-align: left; padding: 0px;" id="ListaTareasInternas">
                <li><div class="col-md-12"><b class="col-md-6" style="padding: 0px;">Tarea:</b><b class="col-md-6" style="padding: 0px;">Fecha Limite:</b></div></li>
	      			</ul>
	      		</div>
	      		
	      	</div>
      	</div>
      </div>
    </section>
    <script type="text/javascript">
  var idUsuarioActivo = "<?php echo $this->session->userdata('s_idUsuario');?>";
  var baseurl = "<?php echo base_url();?>"
</script>