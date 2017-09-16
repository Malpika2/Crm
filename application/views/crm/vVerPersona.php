<style type="text/css">
  .hr2 {
  color: #fff;
  display: block;
  padding: 0px;
  margin: 0px;
  position: relative;
}
.inputfile {
  width: 0.1px;
  height: 0.1px;
  opacity: 0;
  overflow: hidden;
  position: absolute;
  z-index: -1;
}
</style>
<section class="content-header">
  <i class="fa fa-home fa-2x"><span class="profile-username">&nbsp;Ficha de la persona:&nbsp;&nbsp;</span><b class="profile-username text-red"><?php echo strtoupper($row_Persona->Nombre); ?></b></i>
</section>
    <!-- Main content -->
    <section class="content">
    <h1></h1>
      <div class="row">
          <div class="col-md-3">
            <!-- Profile Image -->
            <div class="box box-primary">
              <div class="box-body box-profile">
                <ul class="list-group list-group-unbordered">
                  <li class="list-group-item">
                    <b>Puesto: </b><br><?php echo $row_Persona->Puesto;?>
                  </li>
                  <li class="list-group-item">
                    <b>Cargo: </b><br><?php echo $row_Persona->Cargo; ?>
                  </li>
                  <?php if (isset($row_Empresas->NombreEmpresa)): ?>
                    <li class="list-group-item">
                      <b>Nombre Empresa:</b><br>
                      <a href="<?php echo base_url();?>cEmpresa/verEmpresa/<?php echo $row_Empresas->idEmpresa; ?>"><?php echo $row_Empresas->NombreEmpresa; ?></a>
                    </li>
                  <?php endif ?> 
                  <?php if ($row_Persona->Status=='Inactivo'): ?>
                  <li class="list-group-item">
                    <b>Justificacion de Inactividad:</b><br>
                    <?php echo $row_Persona->StatusFinal; ?>
                  </li> 
                  <?php endif ?>
                </ul>
                  <button id="btn_Editar" class="btn btn-primary btn-block " data-toggle="modal" data-target="#ModalEditarPersona">Editar</button>
              </div><!-- /.box-body -->
            </div><!-- /.box PROFILE -->
          </div><!-- /.col md3 -->

        <div class="col-md-9">
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <li class="active"><a href="#Datos" data-toggle="tab"><b class="text-blue">Datos</b></a></li>
              <li class=""><a href="#Notas" data-toggle="tab"><b class="text-blue">Notas</b></a></li>
              <li><a href="#Tareas" data-toggle="tab"><b class="text-blue">Tareas</b></a></li>
              <li><a href="#Negociaciones" data-toggle="tab"><b class="text-blue">Objetivo</b></a></li>
              <li><a href="#Archivos" data-toggle="tab"><b class="text-blue">Archivos</b></a></li>
            </ul>
            <div class="tab-content">
            <div class="tab-content">
              <div class="active tab-pane" id="Datos">
                  <div class="row">
                  <div class="col-md-12">
                    <table class="table table-bordered table-condensed">
                      <tbody style="font-size: 14px;">
                          <tr>
                              <td><b>Correo Oficina</b></td>
                              <td><?php echo $row_Persona->Correo1; ?></td>
                          </tr>
                          <tr>
                              <td><b>Correo Personal</b></td>
                              <td><?php echo $row_Persona->Correo2; ?></td>
                          </tr>
                          <tr>
                              <td><b>Telefono <?php echo $row_Persona->TipoTelefono1; ?></b></td>
                              <td><?php echo $row_Persona->Telefono1;?></td>
                          </tr>
                          <tr>
                              <td><b>Telefono <?php echo $row_Persona->TipoTelefono2;?></b></td>
                              <td><?php echo $row_Persona->Telefono2; ?></td>
                          </tr>
                          <tr>
                              <td><b>Skype</b></td>
                              <td><?php echo $row_Persona->Skype; ?></td>
                          </tr>
                          <tr>
                              <td><b>Productos</b></td>
                              <td><?php echo $row_Persona->ProductosPersona; ?></td>
                          </tr>
                          <tr>
                              <td><b>Propuesto por</b></td>
                              <td><?php echo $row_Persona->PresupuestoPersona; ?></td>
                          </tr>
                          <tr>
                              <td><b>Nivel de interés</b></td>
                              <td><?php echo $row_Persona->InteresPersona; ?></td>
                          </tr>
                          <tr>
                              <td><b>Nivel de confianza</b></td>
                              <td><?php echo $row_Persona->ConfianzaPersona; ?></td>
                          </tr>
                          <tr>
                              <td><b>Motivo de registro</b></td>
                              <td><?php echo $row_Persona->MotivoPersona; ?></td>
                          </tr>
                          <tr>
                              <td><b>Contactado en</b></td>
                              <td><?php echo $row_Persona->LugarContactoPersona; ?></td>
                          </tr>
                      </tbody>
                    </table>
                      <div class="col-md-12 bg-yellow">Datos Oficina:</div>
                      <div class="col-md-12">
                        <b>Dirección:</b>&nbsp;&nbsp;<?php echo $row_Persona->Direccion; ?><br>
                        <b>País:</b>&nbsp;&nbsp;<?php echo $row_Persona->Pais; ?><br>
                      </div>
                      <div class="col-md-12 bg-yellow">Datos Fiscales:</div>
                      <div class="col-md-12">
                        <b>Datos Fiscales:</b>&nbsp;&nbsp;<?php echo $row_Persona->DatosFiscalesPersona; ?><br>
                      </div>
                  </div>
                  </div>
              </div>
              <!-- /.tab-pane -->

            <!-- Comentarios -->
              <div class="tab-pane" id="Notas">
                <div class="post clearfix" style="padding: 0px; margin: 3px;">
                  <div class="row">
                    <form method="POST" action="<?php echo base_url();?>cComentarios/guardarComentario" id="formComentarios" name="formComentarios" enctype="multipart/form-data">
                    <div class="col-md-2">
                        <input type="hidden" id="idPersona" name="idPersona" value="<?php echo $row_Persona->idPersona;?>">
                        <input type="hidden" id="idUsuarioc" name="idUsuarioc" value="<?php echo $this->session->userdata('s_idUsuario');?>">
                    <button id="btn_Coment" type="submit" class="btn btn-success btn-sm btn-block" style="border-radius: 10px; margin-bottom: 5px;"><i class="fa fa-plus pull-left"></i>Guardar</button>
                      </div>
                  <div class="col-md-3">
                      <input type="file" name="file" id="file" class="inputfile inputfile-1" data-multiple-caption="{count} files selected" />
                      <label for="file" style="border-radius: 10px; margin-bottom: 5px;"><span id="spanFile">Cargar Archivo&hellip;</span></label>
                  </div>
                  <div class="col-md-3">
                      <p id="msg"></p>
                  </div>
                  
                      <div class="col-sm-12">
                          <input type="text" name="Nota" id="Nota" class="form-control input-sm" placeholder="Escribir Nota">
                      </div>
                      
                    </form>
                  </div>
                </div>
                <div id="activity" style="height: 720px; overflow: scroll;">
                  <div class="col-md-12" id="NotasPersona">
                  </div>
                </div>
              </div><!-- /.tab-pane -->

              <div class="tab-pane" id="Archivos">
                <div class="post clearfix" style="padding: 0px; margin: 3px;">
                <div class="col-md-12" style="height: 500px; overflow: scroll;">
                Lista Archivos
                  <ul id="ListaArchivos">
                  </ul>
                </div>
                </div>
              </div>

              <!-- /.tab-pane -->

              <div class="tab-pane" id="Tareas">
                <!-- The timeline -->
                <button id="btn_nTarea" class="btn btn-success " data-toggle="modal" data-target="#ModalTareap"><i class="fa fa-plus fa-x2"></i> Nueva Tarea</button>
                <hr>
                <ul class="timeline timeline-inverse" id="LineaTareas" style="height: 720px; overflow: scroll;">

                </ul>
              </div><!-- /.tab-pane -->
              <div class="tab-pane" id="Negociaciones">
                <button id="btn_nTarea" class="btn btn-success " data-toggle="modal" data-target="#ModalNegociacion"><i class="fa fa-plus fa-x2"></i> Nuevo Objetivo</button>
                  <hr>
                <ul class="timeline timeline-inverse" id="LineaNegociaciones" style="height: 720px; overflow: scroll;">
                </ul>
              </div><!--/.Tab-Pane-->
            </div><!-- /.tab-content -->
          </div><!-- /.nav-tabs-custom -->
        </div><!-- .col-md9-->
      </div>
    </section>
<div id="ModalCancelar" class="modal modal-success fade" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">La Tarea Será marcada como Cancelada</h4>
      </div>
      <div class="modal-body">
        <div class="row">
        <div class="col-md-12">
        <label>Cual Fue la razón?</label>
          <textarea id="StatusFinal" class="form-control col-md-12 text-black"></textarea>
        </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>
<div id="ModalCancelarNg" class="modal modal-success fade" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">La Negociación Será marcada como Cancelada</h4>
      </div>
      <div class="modal-body">
        <div class="row">
        <div class="col-md-12">
        <label>Cual Fue la razón?</label>
          <textarea id="StatusFinalNg" class="form-control col-md-12 text-black"></textarea>
        </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>

<div class="modal fade modal-info" id="ModalTareap" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="exampleModalLabel">AGREGAR NUEVA TAREA</h4>
      </div>
      <form name="formTareap" id="formTareap" method="POST" action="<?php echo base_url();?>cPersona/guardarTarea">
      <div class="modal-body">
          <div class="box box-info">
            <div class="box-body" style="background-color: #f9f8eb; color: black">
               <div class="form-group">
                  <div class="input-group col-md-12">
                    <div class="input-group-addon">
                      <span>Titulo</span>
                    </div>
                    <input class="form-control col-md-12" type="text" name="TituloTarea" id="TituloTarea" required />
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
<!--                           <option value="Reunion">Reunión</option>
 -->                      </select>
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

                  <!-- <div class="form-group hidden" id="Invol_Reunion">
                    <div class="input-group">
                      <div class="input-group-addon">
                        <span>Participantes</span>
                      </div>
                      <select id="Participantes" name="Participantes" class="form-control" placeholder="Categoria" style="width: 100%;">
                      <option>Seleccione un participante</option>

                      </select>
                    </div>
                  </div> -->
                  <div class="form-group">
                    <div class="input-group">
                      <div class="input-group-addon">
                        <span>Asignar Tarea a:</span>
                      </div>
                      <select id="Asignados" name="Asignados[]" class="form-control select2" multiple="multiple" data-placeholder="Selecciona un usuario" style="width: 100%;" required>
                      </select>
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="input-group">
                      <div class="input-group-addon">
                        <span>Descripcion</span>
                      </div>
                      <textarea name="Descripcion" id="Descripcion" placeholder="Detalles de la tarea" rows="4" ></textarea>
                    </div>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group col-md-12 text-center">
                    <label>¿CUANDO DEBE CUMPLIRSE?</label>

                    <div class="input-group date">
                      <div id="datepicker" data-date="08/07/2017"></div>
                      <input type="hidden" id="FechaFin"  name="FechaFin" value="08/07/2017">
                      <input type="hidden" id="idPersona" name="idPersona" value="<?php echo $row_Persona->idPersona;?>">
                      <input type="hidden" id="idUsuarioc" name="idUsuarioc" 
                      value="<?php echo $this->session->userdata('s_idUsuario');?>">
                      <input type="hidden" id="NombreUs" name="NombreUs" 
                      value="<?php echo $this->session->userdata('s_Nombre');?>">
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
<!-- MODAL -->
<div class="modal fade modal-info" id="ModalNegociacion" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="exampleModalLabel">AGREGAR NUEVO OBJETIVO</h4>
      </div>
      <form name="formNegociacion" id="formNegociacion" method="POST" action="<?php echo base_url();?>cNegociacion/guardarPersona">
      <div class="modal-body">
          <div class="box box-info">
            <div class="box-body" style="background-color: #f9f8eb; color: black">
                  <div class="col-md-12 divsNP">
                    <div class="input-group">
                      <span class="input-group-addon"><b>Nombre del objetivo</b></span>
                      <input type="text" class="form-control formsNP" id="NombreNegociacionP" name="NombreNegociacionP"/>
                      <input type="hidden" name="PersonaNegociacion2" id="PersonaNegociacion2" value="<?php echo $row_Persona->idPersona ; ?>">
                    </div>
                  </div>
                  <div class="col-md-6">
                  <div class="col-md-12 divsNP">
                    <div class="input-group">
                      <span class="input-group-addon"><b>Motivo</b></span>
                      <input type="text" class="form-control formsNP" id="MotivoP" name="MotivoP">
                    </div>
                  </div>
                  <div class="col-md-12 divsNP">
                    <div class="input-group">
                      <span class="input-group-addon"><b>Prioridad</b></span>
                      <select class=" form-control formsNP selectpicker" id="PrioridadP" name="PrioridadP">
                        <option selected="true" disabled="true">Prioridad</option>
                        <option value="Baja">Baja</option>
                        <option value="Media">Media</option>
                        <option value="Alta">Alta</option>
                      </select>              
                    </div>
                  </div>
                  <div class="col-md-12 divsNP">
                    <div class="input-group">
                      <span class="input-group-addon"><b>Status</b></span>
                      <select class=" form-control formsNP selectpicker" id="StatusP" name="StatusP">
                        <option selected="true" disabled="true">Status</option>
                        <option value="Avanzado">Avanzado</option>
                        <option value="Cancelado">Cancelado</option>
                        <option value="En proceso">En proceso</option>
                        <option value="Incorporado">Incorporado</option>
                        <option value="No iniciado">No iniciado</option>
                        <option value="Suspendido">Suspendido</option>
                        <option value="Interes sin compromiso">Interes sin compromiso</option>
                        <option value="Interes en participar confirmado">Interes en participar confirmado</option>
                      </select>              
                    </div>
                  </div>
                <div class="col-md-12 divsNP">
                  <div class="input-group">
                    <span class="input-group-addon"><b>Persona a cargo</b></span>
                    <select class=" form-control formsNP selectpicker" id="PersonaCargoP" name="PersonaCargoP" required>
                      <option selected="true" disabled="true">Usuario</option>
                    </select>              
                  </div>
                </div>
                </div>
                <div class="col-md-6">
                  <div class="col-md-12 divsNP">
                    <div class="input-group date">
                        <div id="datepickerP" data-date="08/07/2017">
                        </div>
                        <input type="hidden" id="FechaLimiteP"  name="FechaLimiteP" value="08/07/2017"/>
                    </div>
                  </div>
                </div>
                <div class="col-md-12 divsNP">
                  <div class="input-group">
                    <span class="input-group-addon"><b>Detalles</b></span>
                    <textarea class="form-control formsNP" id="DetallesP" name="DetallesP"></textarea>
                  </div>
                </div> 
            </div><!-- /.box-body -->
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Cancelar</button>
        <button type="submit" class="btn btn-outline">Guardar Objetivo</button>
      </div>
    </form>
    </div>
  </div>
</div><!-- FIN MODAL  -->

<!-- Modal -->
<div id="ModalEditarPersona" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Editar Persona</h4>
      </div>
      <div class="modal-body">
      <div class="container-fluid">
      <div class="row">
      <div class="col-md-12">
                <table class="table table-responsive table-bordered" id="tablaRegistroPersonas">
                  <thead>
                    <tr style="background-color: #F0AD4E; color: white;">
                      <th colspan="2" class="text-center"><b>Información General</b></th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>
                        <span class="">Nombre Completo</span>
                        <input type="text" class="form-control " id="NombrePersona" name="NombrePersona" placeholder="Nombre(s) Apellidos" disabled="true" value="<?php echo $row_Persona->Nombre; ?>">
                      </td>
                      <td>
                        <span class="">Puesto</span>
                        <input type="text" class="form-control" id="Puesto" name="Puesto" value="<?php echo $row_Persona->Puesto; ?>">
                      </td>
                    </tr>
                    <tr>
                      <td>
                        <span class="">Tipo de Persona</span>
                        <select class="form-control selectpicker" title="Tipo de Persona..." id="Cargo" name="Cargo" required="true">
                          <option <?php if($row_Persona->Cargo=='Contacto'){?> selected="true" <?php } ?> value="Contacto">Contacto</option>
                          <option <?php if($row_Persona->Cargo=='Representante'){?> selected="true" <?php } ?> value="Representante">Representante</option>
                        </select>
                      </td>
                      <td>
                        <span>Pais</span>
                        <select class="form-control selectpicker select2" id="Pais" name="Pais" required="true" onchange="cambiarLada()">
                        <option value="<?php echo $row_Persona->Pais; ?>" selected="true"><?php echo $row_Persona->Pais; ?></option>
                        </select>
                      </td>
                    </tr>
                    <tr>
                      <td>
                        <span class="">Productos que maneja</span>
                        <textarea rows="2" cols="50" class="form-control" id="Productos" name="Productos" placeholder="Productos que maneja"><?php echo $row_Persona->ProductosPersona ?></textarea>
                      </td>
                      <td>
                          <span class="">Propuesto por:</span>
                          <input type="text" class="form-control" id="PresupuestoPersona" name="PresupuestoPersona" placeholder="Persona que recomienda el registro" value="<?php echo $row_Persona->PresupuestoPersona; ?>">
                      </td>
                    </tr>
                    <tr>
                      <td>
                        <span class="">Nivel de Interés de la Persona</span>
                        <select class="form-control" id="InteresPersona" name="InteresPersona" required="true">
                          <option <?php if($row_Persona->InteresPersona=='Bajo'){?> selected="true" <?php } ?> value="Bajo">Bajo</option>
                          <option <?php if($row_Persona->InteresPersona=='Medio'){?> selected="true" <?php } ?> value="Medio">Medio</option>
                          <option <?php if($row_Persona->InteresPersona=='Alto'){?> selected="true" <?php } ?> value="Alto">Alto</option>
                        </select>
                      </td>
                      <td>
                        <span class="">Nivel de Confianza</span>
                        <select class="form-control" id="ConfianzaPersona" name="ConfianzaPersona" required="true">
                          <option <?php if($row_Persona->ConfianzaPersona=='1'){?> selected="true" <?php } ?> selected="true" value="1">1 (Bajo)</option>
                          <option <?php if($row_Persona->ConfianzaPersona=='2'){?> selected="true" <?php } ?> value="2">2</option>
                          <option <?php if($row_Persona->ConfianzaPersona=='3'){?> selected="true" <?php } ?> value="3">3</option>
                          <option <?php if($row_Persona->ConfianzaPersona=='4'){?> selected="true" <?php } ?> value="4">4</option>
                          <option <?php if($row_Persona->ConfianzaPersona=='5'){?> selected="true" <?php } ?> value="5">5 (Alto)</option>
                        </select>
                      </td>
                    </tr>
                    <tr>
                      <td>
                        <span class="">Motivo o Razón</span>
                        <textarea rows="2" cols="50" class="form-control" id="Motivo" name="Motivo" placeholder="Motivo de Registro"><?php echo $row_Persona->MotivoPersona; ?></textarea>
                      </td>
                      <td>
                        <span class="">Contactado en</span>
                        <textarea rows="2" cols="50" class="form-control" id="LugarContacto" name="LugarContacto" placeholder="Lugar donde se realizó el contacto"><?php echo $row_Persona->LugarContactoPersona ?></textarea>
                      </td>
                    </tr>
                    <tr>
                      <td colspan="2" style="background-color: #F0AD4E; color: white;">
                        <b>Datos de Contacto</b>
                      </td>
                    </tr>
                    <tr>
                      <td>
                        <span class="">Empresa</span>&nbsp;<i class="fa fa-info-circle" data-toggle="tooltip" title="Asignado en la ficha de la empresa"></i>
                        <input disabled="true" class="form-control" type="text" name="EmpresaInp" value="<?php if(isset($row_Empresas)){echo $row_Empresas->NombreEmpresa; }?>">
                      <td>
                        <span class="">Skype</span>
                        <input type="text" class="form-control" id="Skype" name="Skype" value="<? echo $row_Persona->Skype; ?>">
                      </td>
                    </tr>
                    <tr>
                      <td>
                        <?php
                        $pos1 = stripos($row_Persona->Telefono1,'+');
                        if ($pos1 ===0) {
                          $lada1 = explode("-", $row_Persona->Telefono1);
                          $Telefono1sinLada = str_replace(''.$lada1[0].'-', "", $row_Persona->Telefono1);
                        }else{
                          $lada1[0]="";
                          $Telefono1sinLada=$row_Persona->Telefono1;
                        }
                        ?>
                        <span class="">1º Telefono</span>&nbsp;<i class="fa fa-info-circle" data-toggle="tooltip" title="Lada generada apartir de la seleccion del pais"></i>
                        <div class="input-group">
                          <div class="input-group-addon" style="padding: 0px 12px;">
                            <label id="ladaTel1"><?php echo $lada1[0]; ?></label>
                            <input type="hidden" id="ladaTel1input" name="ladaTel1input" value="<?php echo $lada1[0];  ?>">
                          </div>                        
                          <input type="text" class="form-control" id="Telefono1" name="Telefono1" required="true"  style="height: 38px;" value="<?php echo $Telefono1sinLada; ?>">
                        <div class="input-group-addon" style="padding: 0px 0px;">
                            <select id="TipoTelefono1" name="TipoTelefono1" class="" data-minimum-results-for-search="Infinity">
                              <option <?php if($row_Persona->TipoTelefono1=="Movil"){?> selected="true"<?php } ?> value="Movil">Movil</option>
                              <option <?php if($row_Persona->TipoTelefono1=="Fijo"){?> selected="true"<?php }?>value="Fijo">Fijo</option>
                            </select>
                          </div>
                        </div>
                      </td>
                      <td>
                      <?php 
                        $pos2 = stripos($row_Persona->Telefono2,'+');
                        if ($pos2 ===0) {
                          $lada2 = explode("-", $row_Persona->Telefono2);
                          $Telefono2sinLada = str_replace(''.$lada2[0].'-', "", $row_Persona->Telefono2);
                        }else{
                          $lada2[0]="";
                          $Telefono2sinLada=$row_Empresas->Telefono2;
                        }
                        ?>
                        <span class="">2º Telefono</span>&nbsp;<i class="fa fa-info-circle" data-toggle="tooltip" title="Lada generada apartir de la seleccion del pais"></i>
                        <div class="input-group">
                          <div class="input-group-addon" style="padding: 0px 12px;">
                            <label id="ladaTel2"><?php echo $lada2[0]; ?></label>
                            <input type="hidden" id="ladaTel2input" name="ladaTel2input" value="<?php echo $lada2[0]; ?>">
                          </div>                        
                        <input type="text" class="form-control " id="Telefono2" name="Telefono2" style="height: 38px;" value="<?php echo $Telefono2sinLada; ?>">
                        <div class="input-group-addon" style="padding: 0px 0px;">
                            <select id="TipoTelefono2" name="TipoTelefono2" class="" data-minimum-results-for-search="Infinity">
                              <option <?php if($row_Persona->TipoTelefono2=="Movil"){?> selected="true"<?php } ?> value="Movil" selected="true">Movil</option>
                              <option <?php if($row_Persona->TipoTelefono2=="Fijo"){?> selected="true"<?php } ?> value="Fijo">Fijo</option>
                            </select>
                          </div>
                        </div>
                      </td>
                    </tr>
                    <tr>
                      <td>
                        <span class="">1º Email</span>
                        <input type="text" class="form-control" id="Correo1" name="Correo1" required="true" value="<?php echo $row_Persona->Correo1; ?>">
                      </td>
                      <td>
                        <span class="">2º Email</span>
                        <input type="text" class="form-control" id="Correo2" name="Correo2" value="<?php echo $row_Persona->Correo2; ?>">
                      </td>
                    </tr>
                    <tr>
                      <td>
                        <span class="">Dirección</span>
                        <input type="text" class="form-control" id="Direccion" name="Direccion" placeholder="Ciudad, Calle, Número" value="<?php echo $row_Persona->Direccion?>">
                      </td>
                      <td>
                        <span>Datos Fiscales</span>
                        <textarea rows="2" cols="50" class="form-control col-md-12" id="DatosFiscalesPersona" name="DatosFiscalesPersona" placeholder="Información referente a la facturación"><?php echo $row_Persona->DatosFiscalesPersona; ?></textarea> 
                      </td>
                    </tr>
                    <tr>
                      <td colspan="2">
                      <span class="col-md-2"></span>
                        <input onclick="GuardarEditPersona();" type="submit" id="btn_GuardarEditarP" class="divsNP formsNP btn btn-primary btn-block" value="Guardar cambios" data-dismiss="modal">
                        <span class="col-md-2"></span>
                      </td>
                    </tr>
                  </tbody>
                </table>
              </div>
        </div> <!-- row -->
      </div>
      </div><!--  modal-bod7 -->
      <div class="modal-footer">
        <button id="btnCerrarModal" type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
      </div>
    </div>
  </div>
</div>
<script type="text/javascript">
  var baseurl = "<?php echo base_url();?>";
  var idPersona = "<?php echo $row_Persona->idPersona; ?>";
  var idUsuarioCrea = "<?php echo $this->session->userdata('s_idUsuario');?>";
</script>
<!-- <?php if (isset($row_control)==1): ?>
    <script type="text/javascript">
      var controlEdit=1;
    </script>
<?php endif ?> -->