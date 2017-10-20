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

</section>

<section class="content">
  <ul class="nav nav-tabs">
    <li class="active"><a data-toggle="tab" href="#TareasActivas">Tareas Activas</a></li>
    <li><a data-toggle="tab" href="#TareasNoActivas">Tareas Realizadas/Rechazadas/Canceladas</a></li>
  </ul>
    <select id="FiltroTareas" name="FiltroTareas" class="btn-link" onchange="filtrarTareas()">
    <option value="" selected="true">Tareas de todos los usuarios</option>
</select>

  <div class="tab-content">
  <div id="TareasActivas" class="tab-pane fade in active">
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
        if ($Tareas->StatusTarea!=='Realizada' && $Tareas->StatusTarea!=='Rechazada' && $Tareas->StatusTarea!=='Cancelada') {
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
          <!-- Nombre TAREA-->
          <td><span class="text LinkTarea"><a href="<?php base_url()?>cPersona/verTarea/<?php echo $Tareas->idTarea; ?>"><?php echo $Tareas->TituloTarea;?></a></span></td>
          <!-- Nombre Contacto-->
          <td><span class="text linkContacto"><a href="<?php echo $verContacto[$Tareas->idTarea];?>"><?php echo $NombreContacto[$Tareas->idTarea];?></a></span></td>
          <!-- Nombre Administrador-->
          <td><?php echo $Administradores; ?></td>
          <!-- Origen-->
          <td><?php if(isset($ObjetivoSignal[$Tareas->idTarea])){ echo $ObjetivoSignal[$Tareas->idTarea];}else{ echo "Independiente";}?></td>

            <!-- Fecha Fin-->
          <td><span class="text"><?php echo $Tareas->FechaFin; ?></span></td>
            <!-- Nombre Prioridad-->
          <td><span class="text"><?php echo $Tareas->Prioridad; ?></span></td>
            <!-- Nombre del usuario que la crea-->
          <td><?php echo $Tareas->NombreU ?></td>
            <!-- Acciones -->
          <td class="text-center"><button onclick="ActualizarTarea(<?php echo $Tareas->idTarea?>)"  id="checkRealizada" type="button" value="<?php $Tareas->idTarea;?>" <?php if ($ActiveRealizada==false OR $Tareas->StatusTarea=="Pendiente Aceptar"){ echo "disabled";} ?> class="btn btn-success"><i class="fa fa-check"><?php if ($Tareas->StatusTarea=="Pendiente Aceptar"){ echo "Pendiente Aceptar";}else{ echo "Relizada";}?></i></button></td>

        </tr>
        <? } }?>
      </tbody>
        <div class="box-footer clearfix no-border">
            <button id="btn_nTarea" class="btn btn-default pull-right " data-toggle="modal" data-target="#ModalTarea"><i class="fa fa-plus fa-x2"></i> Nueva Tarea</button>
        </div>
    </table>
  </div>
</div>
  <div id="TareasNoActivas" class="tab-pane fade">
      <div class="table-responsive">
  <input type="hidden" name="column2_search" id="column2_search" class="select-filter" value="<?php  ?>">
    <table class="table table-responsive table-hover" id="TablaTareasNoActivas">
      <thead>
        <tr>
          <th>Tarea</th>
          <th>Contacto</th>
          <th>Administrador</th>
          <th>Origen</th>
          <th>Fecha Fin</th>
          <th id="Prioridad">Status</th>
          <th>Creada Por</th>
          <th>Razón</th>
        </tr>
      </thead>
      <tfoot>
        <tr>
          <th>Tarea</th>
          <th>Contacto</th>
          <th>Administrador</th>
          <th>Origen</th>
          <th>Fecha Fin</th>
          <th id="Prioridad">Status</th>
          <th>Creada Por</th>
          <th>Razón</th>
        </tr>
      </tfoot>
      <tbody>
       <?foreach ($row_Tareas as $Tareas) {
        if ($Tareas->StatusTarea=='Realizada' || $Tareas->StatusTarea=='Rechazada' || $Tareas->StatusTarea=='Cancelada') {
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
          <!-- Nombre TAREA-->
          <td><span class="text LinkTarea"><a href="<?php base_url()?>cPersona/verTarea/<?php echo $Tareas->idTarea; ?>"><?php echo $Tareas->TituloTarea;?></a></span></td>
          <!-- Nombre Contacto-->
          <td><span class="text linkContacto"><a href="<?php echo $verContacto[$Tareas->idTarea];?>"><?php echo $NombreContacto[$Tareas->idTarea];?></a></span></td>
          <!-- Nombre Administrador-->
          <td><?php echo $Administradores; ?></td>
          <!-- Origen-->
          <td><?php if(isset($ObjetivoSignal[$Tareas->idTarea])){ echo $ObjetivoSignal[$Tareas->idTarea];}else{ echo "Independiente";}?></td>

            <!-- Fecha Fin-->
          <td><span class="text"><?php echo $Tareas->FechaFin; ?></span></td>
            <!--  Estatus Tarea-->
          <td><span class="text"><?php echo $Tareas->StatusTarea; ?></span></td>
            <!-- Nombre del usuario que la crea-->
          <td><?php echo $Tareas->NombreU ?></td>
            <!-- Razón -->
          <td class="text-center">
            <?php echo $Tareas->StatusFinal; ?>
          </td>

        </tr>
        <? } }?>
      </tbody>
        <div class="box-footer clearfix no-border">
            <button id="btn_nTarea" class="btn btn-default pull-right " data-toggle="modal" data-target="#ModalTarea"><i class="fa fa-plus fa-x2"></i> Nueva Tarea</button>
        </div>
    </table>
  </div>
  </div>
  </div>
</section>

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