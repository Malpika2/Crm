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
    <h1></h1>
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
                    <b>Puesto: </b><?php echo $row_Persona->Puesto;?>
                  </li>
                  <li class="list-group-item">
                    <b>Cargo: </b><?php echo $row_Persona->Cargo; ?>
                  </li>
                  <?php if (isset($row_Empresas->NombreEmpresa)): ?>
                    <li class="list-group-item">
                      <b>Nombre Empresa:</b>
                      <a href="<?php echo base_url();?>cEmpresa/verEmpresa/<?php echo $row_Empresas->idEmpresa; ?>"><?php echo $row_Empresas->NombreEmpresa; ?></a>
                    </li>
                  <?php endif ?> 
                  <?php if ($row_Persona->Status=='Inactivo'): ?>
                  <li class="list-group-item">
                    <b>Justificacion de Inactividad:</b>
                    <?php echo $row_Persona->StatusFinal; ?>
                  </li> 
                  <?php endif ?>
                </ul>
                  <button id="btn_Editar" class="btn btn-primary btn-block " data-toggle="modal" data-target="#ModalEditarPersona">Editar</button>
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
                <p class="text-muted"> <?php echo $row_Persona->Direccion;?>, 
<?php echo $row_Persona->Ciudad;?>, <?php echo $row_Persona->Pais; ?></p>  
                <hr>
                <strong><i class="fa fa-pencil margin-r-5"></i>Telefonos</strong>
                <ul>
                  <li><b>Personal: </b><? echo $row_Persona->Telefono1; ?></li>
                  <li><b>Trabajo: </b> <? echo $row_Persona->Telefono2; ?></li>
                </ul>
                <hr>
                <strong><i class="fa fa-file-text-o margin-r-5"></i> Correos</strong>
                <ul>
                  <li><b>Personal: </b><? echo $row_Persona->Correo1; ?></li>
                  <li><b>Trabajo: </b> <? echo $row_Persona->Correo2; ?></li>
                </ul>
              </div><!-- /.box-body -->
            </div><!-- /.box primary datos-->
          </div><!-- /.col md3 -->

        <div class="col-md-9">
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <li class="active"><a href="#Notas" data-toggle="tab">Notas</a></li>
              <li><a href="#Tareas" data-toggle="tab">Tareas</a></li>
              <li><a href="#Negociaciones" data-toggle="tab">Objetivo</a></li>
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
                <div id="activity" style="height: 720px; overflow: scroll;">
                  <div class="col-md-12" id="NotasPersona">
                  </div>
                </div>
              </div><!-- /.tab-pane -->

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
        <div class="col-md-12 text-center">
          <h3>EDITAR PERSONA</h3>
        </div>
        <form id="formPersona" method="POST" action="<?php echo base_url();?>cPersona/guardar2">
        <div class="col-md-12 divsNP">
              <div class="input-group">
                <span class="input-group-addon"><b>Nombre Completo</b></span>
                <input type="text" class="form-control formsNP" id="mNombrePersona" name="mNombrePersona" value="<?php echo $row_Persona->Nombre; ?>" style="border:1px solid #d2d6de;" disabled />
              </div>
        </div>
        <div class="col-md-6 divsNP">
              <div class="input-group">
                <span class="input-group-addon"><b>Cargo</b></span>
                <select class="form-control formsNP" id="mCargo" name="mCargo" required>
                  <option value="Representante" <?php if ($row_Persona->Cargo=='Representante') {?> selected="true"<?php } ?> >Representante</option>
                  <option <?php if ($row_Persona->Cargo=='Contacto') {?> selected="true"<?php } ?> value="Contacto">Contacto</option>
                </select>
              </div>
        </div>
        <div class="col-md-6 " style="padding: 0px;">
        <div class="col-md-12 divsNP">
              <div class="input-group">
                <span class="input-group-addon"><b>Puesto</b></span>
                <input type="text" class="form-control Puesto  formsNP" id="mPuesto" name="mPuesto" value="<?php echo $row_Persona->Puesto ?>">
              </div>
        </div>
        </div>
        <div class="col-md-3 divsNP">
              <div class="input-group">
                <span class="input-group-addon"><b>1º Telefono</b></span>
                <input type="text" class="form-control Telefono1 formsNP" id="mTelefono1" name="mTelefono1" value="<?php echo $row_Persona->Telefono1  ?>">
                <input type="text" class="form-control formsNP text-center" disabled="true" name="" value="Personal">

              </div>
        </div>
        <div class="col-md-3 divsNP">
              <div class="input-group">
                <span class="input-group-addon"><b>2º Telefono</b></span>
                <input type="text" class="form-control Telefono2  formsNP" id="mTelefono2" name="mTelefono2" value="<?php echo $row_Persona->Telefono2; ?>">
                <input type="text" class="form-control formsNP text-center" disabled="true" name="" value="Trabajo">

              </div>
        </div>
        <div class="col-md-3 divsNP">
              <div class="input-group">
                <span class="input-group-addon"><b>1º Email</b></span>
                <input type="text" class="Correo1 form-control formsNP" id="mCorreo1" name="mCorreo1" value="<?php echo $row_Persona->Correo1; ?>">
                <input type="text" class="form-control formsNP text-center" disabled="true" name="" value="Personal">
              </div>
        </div>
        <div class="col-md-3 divsNP">
              <div class="input-group">
                <span class="input-group-addon"><b>2º Email</b></span>
                <input type="text" class="Correo2 form-control formsNP" id="mCorreo2" name="mCorreo2" value="<?php echo $row_Persona->Correo2; ?>">
                <input type="text" class="form-control formsNP text-center" disabled="true" name="" value="Trabajo">
              </div>
        </div>
        <div class="col-md-12 divsNP">
              <div class="input-group">
                <span class="input-group-addon"><b>Skype</b></span>
                <input type="text" class="form-control formsNP" id="mSkype" name="mSkype" value="<?php echo $row_Persona->Skype; ?>">
              </div>
        </div>
        <div class="col-md-12 divsNP">
              <div class="input-group">
                <span class="input-group-addon"><b>Direccion</b></span>
                <input type="text" class="form-control Calle col-md-12 formsNP2" id="mDireccion" name="mDireccion" value="<?php echo $row_Persona->Direccion; ?>">
                <input type="text" class="form-control col-md-6 formsNP2" id="mEstado" name="mEstado" value="<?php  echo $row_Persona->Ciudad; ?>">
                <input type="text" class="form-control Pais col-md-6 formsNP2" id="mPais" name="mPais" value="<?php echo $row_Persona->Pais; ?>" >
              </div>
              <input onclick="GuardarEditPersona();" type="submit" id="btn_GuardarEditarP" class="divsNP formsNP btn btn-primary btn-block" value="Guardar cambios" data-dismiss="modal">
        </div>
        </form>
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