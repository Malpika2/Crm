<style type="text/css">
	#ContTareas .LinkTarea a{
			color:white;
		}
	#ContTareas .linkContacto a{
			color:#41e3fb;
		}
	#ContTareas .text-verde{
			color:#90ef00;
		}
	#ContTareas small{
		color:black;
	}
	#ContTareas .echoPalomita{
		color:#052af9;
	}

</style>
<section class="content-header">
<select id="FiltroTareas" name="FiltroTareas" class="btn-link" onchange="filtrarTareas()">
    <option value="" selected="true">Tareas de todos los usuarios</option>
</select>
</section>

<section class="content">
  <div class="table-responsive">
  <input type="hidden" name="column2_search" id="column2_search" class="select-filter" value="<?php  ?>">
    <table class="table table-responsive table-hover" id="TablaTareas">
      <thead>
        <tr>
          <th>Tarea</th>
          <th>Contacto</th>
          <th>Administrador</th>
          <th>Origen</th>
          <th>Fecha Fin</th>
          <th id="Prioridad">Prioridad</th>
          <th>Creada Por</th>
          <th>Acciones</th>
        </tr>
      </thead>
      <tfoot>
        <tr>
          <th>Tarea</th>
          <th>Contacto</th>
          <th>Administrador</th>
          <th>Origen</th>
          <th>Fecha Fin</th>
          <th id="Prioridad">Prioridad</th>
          <th>Creada Por</th>
          <th>Acciones</th>
        </tr>
      </tfoot>
      <tbody>
       <?foreach ($row_Tareas as $Tareas) {
        if ($Tareas->StatusTarea!=='Realizada' && $Tareas->StatusTarea!=='Rechazada') {
          $Administradores="";
          $NAdmin="";
          $ActiveRealizada=false;
          $prueba = json_encode($Tareas);

            foreach ($row_Administrador[$Tareas->idTarea]['Administrador'] as $admin) {
              $Administradores= $Administradores.'&nbsp;<small> <i class=" text-muted fa fa-user"></i></small>'.$admin->Nombre;
              $NAdmin = $admin->Nombre.' '.$NAdmin;
              if ($admin->idUsuario===$this->session->userdata('s_idUsuario')) {
                $ActiveRealizada=true;  
              }
              
            }            
        ?>
        <tr id="<?php echo $NAdmin; ?>">
          <td><span class="text LinkTarea"><a href="<?php base_url()?>cPersona/verTarea/<?php echo $Tareas->idTarea; ?>"><?php echo $Tareas->TituloTarea;?></a></span></td>

          <td><span class="text linkContacto"><a href="<?php echo $verContacto[$Tareas->idTarea];?>"><?php echo $NombreContacto[$Tareas->idTarea];?></a></span></td>

          <td><?php echo $Administradores; ?>

          <td><?php if(isset($ObjetivoSignal[$Tareas->idTarea])){ echo $ObjetivoSignal[$Tareas->idTarea];}else{ echo "Independiente";}?></td>

          </td>
          <td><span class="text"><?php echo $Tareas->FechaFin; ?></span></td>

          <td><span class="text"><?php echo $Tareas->Prioridad; ?></span></td>
          <td><?php echo $Tareas->NombreU ?></td>

          <td class="text-center"><button onclick="ActualizarTarea(<?php echo $Tareas->idTarea?>)"  id="checkRealizada" type="button" value="<?php $Tareas->idTarea;?>" <?php if ($ActiveRealizada==false OR $Tareas->StatusTarea=="Pendiente Aceptar"){ echo "disabled";} ?> class="btn btn-success"><i class="fa fa-check"><?php if ($Tareas->StatusTarea=="Pendiente Aceptar"){ echo "Pendiente Aceptar";}else{ echo "Relizada";}?></i></button></td>

        </tr>
        <? } }?>
      </tbody>
        <div class="box-footer clearfix no-border">
            <button id="btn_nTarea" class="btn btn-default pull-right " data-toggle="modal" data-target="#ModalTarea"><i class="fa fa-plus fa-x2"></i> Nueva Tarea</button>
        </div>
    </table>
  </div>

</section>
    <!-- Main content -->
<!-- <section class="content">
      <div class="row">
      <div class="col-md-12">
        <div class="nav-tabs-custom">
            <div class="text-center bg-white" style="padding: 1px; margin: 10px 15px 0px 15px; border-radius: 20px">
                <ul class="nav nav-tabs">
                  <li class="active col-md-3 text-center">
                    <a class="btn" href="#tab_Empresas" data-toggle="tab" style="border-radius: 10px; margin-bottom: 3px;">
                      <i class="fa fa-list "></i>&nbsp;Tareas con Empresas
                    </a>
                  </li>
                  <li class="col-md-3">
                    <a class="btn text-center" href="#tab_Personas" data-toggle="tab" style="border-radius: 10px; margin-bottom: 3px;">
                      <i class="fa fa-list"></i>&nbsp;Tareas con Personas
                    </a>
                  </li>
                </ul>
            </div>
        </div>
        <div class="tab-content">
            <div class="tab-pane active" id="tab_Empresas"> 
              <div class="col-md-12">
                <!-- Custom Tabs -->
               <!--  <div class="nav-tabs-custom">
                  <ul class="nav nav-tabs">
                    <li class="active"><a href="#Tareas_Pendientes" data-toggle="tab">Tareas Pendientes</a></li>
                    <li><a href="#Tareas_Realizadas" data-toggle="tab">Tareas Realizadas</a>
                    </li>
                    <li class="pull-right">
                   <span class="text-muted" style="padding: 10px 0px">Prioridad:&nbsp;
                      <i class="fa fa-bookmark text-red">Alta</i> &nbsp;
                      <i class="fa fa-bookmark text-yellow">Media</i>&nbsp;
                      <i class="fa fa-bookmark text-green">Baja</i>
                    </span>
                    </li>
                  </ul>
                  <div class="tab-content">
                    <div class="tab-pane active" id="Tareas_Pendientes">
                <div class="box box-primary">  <!-- LISTA TAREAS -->
   <!--                      <div class="box-header">
                          <i class="fa fa-university"></i>
                          <i class="ion ion-clipboard"></i>
                          <h3 class="box-title">TAREAS</h3>
                        </div>
                        <div class="box-body" id="ContTareas">
                          <ul class="todo-list" id="ListaTareas">
                          </ul>
                        </div>
                        <div class="box-footer clearfix no-border">
                            <button id="btn_nTarea" class="btn btn-default pull-right " data-toggle="modal" data-target="#ModalTarea"><i class="fa fa-plus fa-x2"></i> Nueva Tarea</button>
                        </div>
                      </div>
                    </div> -->
                    <!-- /.tab-pane --> 
                      <!-- <div class="tab-pane" id="Tareas_Realizadas"> -->
                        <!-- <b>Empresas:</b> -->
                <!-- <div class="box box-primary">  <!-- LISTA TAREAS -->
                        <!-- <div class="box-header"> -->
                          <!-- <i class="fa fa-university"></i> -->
                          <!-- <i class="ion ion-clipboard"></i> -->
                          <!-- <h3 class="box-title">TAREAS</h3> -->
                        <!-- </div> -->
                        <!-- <div class="box-body" id="ContTareas"> -->
                          <!-- <ul class="todo-list" id="ListaTareasRealizadasEmp"> -->
                          <!-- </ul> -->
                        <!-- </div> -->
          <!--               <div class="box-footer clearfix no-border">
                            <button id="btn_nTarea" class="btn btn-default pull-right " data-toggle="modal" data-target="#ModalTarea"><i class="fa fa-plus fa-x2"></i> Nueva Tarea</button>
                        </div>
                      </div> -->          
                        <!-- </div>/.tab-pane -->
                  <!-- </div>/.tab-content -->
                <!-- </div>nav-tabs-custom -->
              <!-- </div>/.col -->
            <!-- </div> -->

            <!-- <div class="tab-pane" id="tab_Personas"> -->
              <!-- <div class="col-md-12"> -->
                    <!-- Custom Tabs -->
         <!--            <div class="nav-tabs-custom">
                      <ul class="nav nav-tabs">
                        <li class="active"><a href="#Tareas_PendientesPersonas" data-toggle="tab">Tareas Pendientes</a></li>
                        <li><a href="#Tareas_RealizadasPersona" data-toggle="tab">Tareas Realizadas</a></li>
                        <li class="pull-right">             
                          <span class="text-muted" style="padding: 10px 0px">Prioridad:&nbsp;
                            <i class="fa fa-bookmark text-red">Alta</i>&nbsp;
                            <i class="fa fa-bookmark text-yellow">Media</i>&nbsp;
                            <i class="fa fa-bookmark text-green">Baja</i>
                          </span>
                        </li>
                      </ul>
                      <div class="tab-content">
                        <div  class="tab-pane active" id="Tareas_PendientesPersonas">

                    <div class="box box-primary">  <!-- LISTA TAREAS de PERSONAS -->
                            <!-- <div class="box-header"> -->
                             <!-- <i class="fa fa-users"></i>
                             <i class="ion ion-clipboard"></i>
                             <h3 class="box-title">TAREAS</h3>
                            </div>
                            <div class="box-body" id="ContTareas">
                                <ul class="todo-list" id="ListaTareasPersonas">
                                </ul>
                            </div>
                            <div class="box-footer clearfix no-border">
                                <button id="btn_nTarea" class="btn btn-default pull-right " data-toggle="modal" data-target="#ModalTareap"><i class="fa fa-plus fa-x2"></i> Nueva Tarea</button>
                            </div>
                          </div> -->
                        <!-- </div>/.tab-pane -->
                          <!-- <div class="tab-pane" id="Tareas_RealizadasPersona"> -->
                            <!-- <b>Personas:</b> -->
                            <!-- <div class="box box-primary">  LISTA TAREAS de PERSONAS -->
              <!--               <div class="box-header">
                             <i class="fa fa-users"></i>
                             <i class="ion ion-clipboard"></i>
                             <h3 class="box-title">TAREAS</h3>
                            </div>
                            <div class="box-body" id="ContTareas">
                                <ul class="todo-list" id="ListaTareasRealizadasPersonas">
                                </ul>
                            </div>
                            <div class="box-footer clearfix no-border">
                                <button id="btn_nTarea" class="btn btn-default pull-right " data-toggle="modal" data-target="#ModalTareap"><i class="fa fa-plus fa-x2"></i> Nueva Tarea</button>
                            </div>
                          </div> -->
                          <!-- </div>/.tab-pane -->
                      <!-- </div>/.tab-content -->
                    <!-- </div>nav-tabs-custom -->
                  <!-- </div>/.col -->
            <!--</div>
          </div>
        </div>
      </div>
</section> -->

<div class="modal fade modal-info" id="ModalTareap" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="exampleModalLabel">AGREGAR NUEVA TAREA GRUPAL</h4>
      </div>
      <form name="formTareaEmpresas" id="formTareaEmpresas" method="POST" action="<?php echo base_url();?>cEmpresa/guardarTarea">
      <div class="modal-body">
          <div class="box box-info">
            <div class="box-body" style="background-color: #f9f8eb; color: black">
               <div class="form-group">
                  <div class="input-group col-md-12">
                    <div class="input-group-addon">
                      <span>Titulo</span>
                    </div>
                    <input class="col-md-12" type="text" name="TituloTarea" id="TituloTarea" required />
                  </div>
               </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <div class="input-group">
                      <div class="input-group-addon">
                        <span>Categoria</span>
                      </div>
                      <select id="Categoria" name="Categoria" class="form-control" placeholder="Categoria" style="width: 100%;">
                          <option value="Llamar">Llamar</option>
                          <option value="Entrevista">Entrevista</option>
                          <option value="Correo">Correo</option>
                          <option value="Seguimiento">Seguimiento</option>
                          <option value="Reunion">Reunión</option>
                      </select>
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="input-group">
                      <div class="input-group-addon">
                        <span>Prioridad</span>
                      </div>
                      <select id="Prioridad" name="Prioridad" class="form-control" placeholder="Categoria" style="width: 100%;">
                          <option value="Baja">Baja</option>
                          <option value="Media">Media</option>
                          <option value="Alta">Alta</option>
                      </select>
                    </div>
                  </div>
                  Participantes:
                  <div class="form-group">
                    <div class="input-group">
                      <div class="input-group-addon">
                        <span>Usuarios:</span>
                      </div>
                      <select id="Usuarios" name="Usuarios[]" class="form-control select2" multiple="multiple" data-placeholder="Usuarios Participantes" style="width: 100%;" required>
                      </select>
                    </div>
                  </div>
          <div class="form-group">
                    <div class="input-group">
                      <div class="input-group-addon">
                        <span>Personas:</span>
                      </div>
                      <!-- <select id="PersonasPart" name="PersonasPart[]" class="form-control select2" multiple="multiple" data-placeholder="Personas Participantes" style="width: 100%;" required>
                      </select> -->
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="input-group">
                      <div class="input-group-addon">
                        <span>Descripcion</span>
                      </div>
                      <textarea name="Descripcion" id="Descripcion" placeholder="Detalles de la tarea" rows="4" class="form-control" ></textarea>
                    </div>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group col-md-12 text-center">
                    <label>¿CUANDO DEBE CUMPLIRSE?</label>
                    <div class="input-group date">
                      <div id="datepickerP">
                          <input type="hidden" id="FechaFinP"  name="FechaFinP"/>
                      </div>
                      <input type="hidden" id="idUsuarioc" name="idUsuarioc" 
                      value="<?php echo $this->session->userdata('s_idUsuario');?>">
                    </div>
                  </div>
                </div>
            </div>
            <!-- /.box-body -->
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Cancelar</button>
        <button type="submit" class="btn btn-outline">Guardar Tarea</button>
      </div>
    </form>
    </div>
  </div>
</div>


<div class="modal fade modal-info" id="ModalTarea" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="exampleModalLabel">AGREGAR NUEVA TAREA GRUPAL</h4>
      </div>
      <form name="formTareaEmpresas2" id="formTareaEmpresas2" method="POST" action="<?php echo base_url();?>cEmpresa/guardarTarea">
      <div class="modal-body">
          <div class="box box-info">
            <div class="box-body" style="background-color: #f9f8eb; color: black">
               <div class="form-group">
                  <div class="input-group col-md-12">
                    <div class="input-group-addon">
                      <span>Titulo</span>
                    </div>
                    <input class="col-md-12 form-control" type="text" name="TituloTarea" id="TituloTarea" required />
                  </div>
               </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <div class="input-group">
                      <div class="input-group-addon">
                        <span>Categoria</span>
                      </div>
                      <select id="Categoria" name="Categoria" class="form-control" placeholder="Categoria" style="width: 100%;">
                          <option value="Llamar">Llamar</option>
                          <option value="Entrevista">Entrevista</option>
                          <option value="Correo">Correo</option>
                          <option value="Seguimiento">Seguimiento</option>
                          <option value="Reunion">Reunión</option>
                      </select>
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="input-group">
                      <div class="input-group-addon">
                        <span>Prioridad</span>
                      </div>
                      <select id="Prioridad" name="Prioridad" class="form-control" placeholder="Categoria" style="width: 100%;">
                          <option value="Baja">Baja</option>
                          <option value="Media">Media</option>
                          <option value="Alta">Alta</option>
                      </select>
                    </div>
                  </div>
                  Participantes:
                  <div class="form-group">
                    <div class="input-group">
                      <div class="input-group-addon">
                        <span>Usuarios:</span>
                      </div>
                      <select id="Asignados" name="Asignados[]" class="form-control select2" multiple="multiple" data-placeholder="Usuarios Participantes" style="width: 100%;" required>
                      </select>
                    </div>
                  </div>
				  <div class="form-group">
                    <div class="input-group">
                      <div class="input-group-addon">
                        <span>Empresas:</span>
                      </div>
                      <select id="EmpresasPart" name="EmpresasPart[]" class="form-control select2" multiple="multiple" data-placeholder="Empresas Participantes" style="width: 100%;" required>
                      </select>
                    </div>
                  </div>
          <div class="form-group">
                    <div class="input-group">
                      <div class="input-group-addon">
                        <span>Personas:</span>
                      </div>
                      <select id="PersonasPart" name="PersonasPart[]" class="form-control select2" multiple="multiple" data-placeholder="Personas Participantes" style="width: 100%;" required>
                      </select>
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="input-group">
                      <div class="input-group-addon">
                        <span>Descripcion</span>
                      </div>
                      <textarea class="form-control" name="Descripcion" id="Descripcion" placeholder="Detalles de la tarea" rows="4" ></textarea>
                    </div>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group col-md-12 text-center">
                    <label>¿CUANDO DEBE CUMPLIRSE?</label>
                    <div class="input-group date">
                      <div id="datepickerE">
                        <input type="hidden" id="FechaFinE"  name="FechaFinE">
                      </div>
                      <input type="hidden" id="idUsuarioc" name="idUsuarioc" 
                      value="<?php echo $this->session->userdata('s_idUsuario');?>">
                    </div>
                  </div>
                </div>
            </div>
            <!-- /.box-body -->
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Cancelar</button>
        <button type="submit" class="btn btn-outline">Guardar Tarea</button>
      </div>
    </form>
    </div>
  </div>
</div>

<div id="ModalCancelar" class="modal modal-success fade" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Tarea Realizada</h4>
      </div>
      <div class="modal-body">
        <div class="row">
        <div class="col-md-12">
        <label>Dictamen Final de la Tarea:</label>
          <textarea id="StatusFinal" class="form-control col-md-12 text-black"></textarea>
        </div>
        </div>
      </div>
      <div class="modal-footer">
        <button id="btn_AceptarModalCancelar" type="button" class="btn btn-default">Aceptar</button>
        <button id="btn_CerrarModalCancelar" type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
      </div>
    </div>
  </div>
</div>
<script type="text/javascript">
  var idUsuarioActivo = "<?php echo $this->session->userdata('s_idUsuario');?>";
  var baseurl = "<?php echo base_url();?>"
</script>