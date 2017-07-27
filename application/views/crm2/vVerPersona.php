<style type="text/css">
  .hr2 {
  color: #fff;
  display: block;
  padding: 0px;
  margin: 0px;
  position: relative;
}
</style>
    <section class="content-header">
      <h1>
      </h1>
      <ol class="breadcrumb">
        <li><a href="cLogin"><i class="fa fa-map-signs"></i>Inicio</a></li>
        <li class="active">Contactos</li>
        <li class="active">Personas</li>
      </ol>
    </section>
    <!-- Main content -->
    <section class="content">
      <div class="row">
          <div class="col-md-3">
            <!-- Profile Image -->
            <div class="box box-primary">
              <div class="box-body box-profile">
                <img class="profile-user-img img-responsive img-circle" src="<?php echo base_url();?>assets/dist/img/silueta_user.png" alt="User profile picture">
                <h3 class="profile-username text-center"><?php echo $row_Persona->Nombre; ?></h3>
                <p class="text-muted text-center"></p>
                <ul class="list-group list-group-unbordered">
                  <li class="list-group-item">
                    <b><?php echo $row_Persona->Paterno;?>  <?php echo $row_Persona->Materno; ?></b>
                  </li>
                  <li class="list-group-item">
                    <b>Empresa: </b> 
                    <?php if (isset($row_Empresas)) {?>
                      <a href="<?php echo base_url();?>cEmpresa/verEmpresa/<?php echo $row_Empresas->idEmpresa ?>" class="text-center">
                      <?php echo $row_Empresas->RazonSocial; ?>
                      </a>
                    <?php }
                    else{ echo "Ninguna"; }?>
                  </li>
                  <li class="list-group-item">
                    <b>Cargo: </b><?php echo $row_Persona->Cargo; ?>
                  </li>
                  <?php if ($row_Persona->Status=='Inactivo'): ?>
                  <li class="list-group-item">
                    <b>Justificacion de Inactividad:</b>
                    <?php echo $row_Persona->StatusFinal; ?>
                  </li>  
                <?php endif ?>
                </ul>
                <a href="#" class="btn btn-primary btn-block"><b>Editar</b></a>
              </div><!-- /.box-body -->
            </div><!-- /.box PROFILE -->

            <!-- About Me Box -->
            <div class="box box-primary">
              <div class="box-header with-border">
                <h3 class="box-title">Datos:</h3>
              </div><!-- /.box-header -->
              <div class="box-body">
                <strong><i class="fa fa-book margin-r-5"></i> Skype</strong>
                  <p class="text-muted">
                    <?php echo $row_Persona->Skype; ?>
                  </p>
                  <hr>
                <strong><i class="fa fa-map-marker margin-r-5"></i> Direccion</strong>
                <p class="text-muted"> <?php echo " ".$row_Direccion->Calle." #".$row_Direccion->Numero.", ".$row_Direccion->Colonia.", ".$row_Direccion->Municipio.", ".$row_Direccion->Estado.", ".$row_Direccion->Cp.", ".$row_Direccion->Pais.".";?>
                </p>
                <hr>
                <strong><i class="fa fa-pencil margin-r-5"></i>Telefonos</strong>
                <ul>
                  <li><?php echo $row_Telefonos->Telefono1." ".$row_Telefonos->TipoTelefono1; ?></li>
                  <li><?php echo $row_Telefonos->Telefono2." ".$row_Telefonos->TipoTelefono2; ?></li>
                </ul>
                <hr>
                <strong><i class="fa fa-file-text-o margin-r-5"></i> Correos</strong>
                <ul>
                  <li><?php echo $row_Correos->Correo1." ".$row_Correos->TipoCorreo1;?></li>
                  <li><?php echo $row_Correos->Correo2." ".$row_Correos->TipoCorreo2;?></li>
                </ul>
              </div><!-- /.box-body -->
            </div><!-- /.box primary datos-->
          </div><!-- /.col md3 -->

        <div class="col-md-9">
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <li class="active"><a href="#Notas" data-toggle="tab">Notas</a></li>
              <li><a href="#Tareas" data-toggle="tab">Tareas</a></li>
              <li><a href="#Negociaciones" data-toggle="tab">Negociaciones</a></li>
            </ul>
            <div class="tab-content"><!-- Comentarios -->

              <div class="active tab-pane" id="Notas">
                <div class="post clearfix">
                  <div class="row">
                    <form method="POST" action="<?php echo base_url();?>cComentarios/guardarComentario" id="formComentarios" name="formComentarios">
                      <div class="col-sm-9">
                          <input type="text" name="Nota" id="Nota" class="form-control input-sm" placeholder="Agregar Nota">
                      </div>
                      <div class="col-sm-3">
                        <input type="hidden" id="idPersona" name="idPersona" value="<?php echo $row_Persona->idPersona;?>">
                        <input type="hidden" id="idUsuarioc" name="idUsuarioc" value="<?php echo $this->session->userdata('s_idUsuario');?>">
                        <button id="btn_Coment" type="submit" class="btn btn-success pull-right btn-block btn-sm">Guardar</button>
                      </div>
                    </form>
                  </div>
                </div>
                <div id="activity">
                  <div class="col-md-12" id="NotasPersona">
                  </div>
                </div>
              </div><!-- /.tab-pane -->

              <div class="tab-pane" id="Tareas">
                <!-- The timeline -->
                <button id="btn_nTarea" class="btn btn-success " data-toggle="modal" data-target="#ModalTareap"><i class="fa fa-plus fa-x2"></i> Nueva Tarea</button>
                <hr>
                <ul class="timeline timeline-inverse" id="LineaTareas">

                </ul>
              </div><!-- /.tab-pane -->
              <div class="tab-pane" id="Negociaciones">
                <button id="btn_nTarea" class="btn btn-success " data-toggle="modal" data-target="#ModalNegociacion"><i class="fa fa-plus fa-x2"></i> Nueva Negociación</button>
                  <hr>
                <ul class="timeline timeline-inverse" id="LineaNegociaciones">
                </ul>
              </div><!--/.Tab-Pane-->
            </div><!-- /.tab-content -->
          </div><!-- /.nav-tabs-custom -->
        </div><!-- .col-md9-->
      </div>
    </section>

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
        <h4 class="modal-title" id="exampleModalLabel">AGREGAR NUEVA NEGOCIACIÓN</h4>
      </div>
      <form name="formNegociacion" id="formNegociacion" method="POST" action="<?php echo base_url();?>cNegociacion/guardarPersona">
      <div class="modal-body">
          <div class="box box-info">
            <div class="box-body" style="background-color: #f9f8eb; color: black">
                  <div class="col-md-12 divsNP">
                    <div class="input-group">
                      <span class="input-group-addon"><b>Nombre de la negociación</b></span>
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
        <button type="submit" class="btn btn-outline">Guardar Negociacion</button>
      </div>
    </form>
    </div>
  </div>
</div><!-- FIN MODAL  -->
<script type="text/javascript">
  var baseurl = "<?php echo base_url();?>";
  var idPersona = "<?php echo $row_Persona->idPersona; ?>";
  var idUsuarioCrea = "<?php echo $this->session->userdata('s_idUsuario');?>";
</script>