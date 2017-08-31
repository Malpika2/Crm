<style type="text/css">
  .form-control[disabled]{
  cursor: not-allowed;
  background: transparent;
  border: none;
}
</style>
    <section class="content-header">
      <ol class="breadcrumb">
        <li><a href="cLogin"><i class="fa fa-map-signs"></i>Inicio</a></li>
        <li class="active">Consultar Objetivo</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
    <h1></h1>
      <div class="row">
        <div class="col-md-0">
        </div>
        <div class="col-md-6">
          <div class="box box-info bg-info">
              <div class="box-header with-border bg-success">
              <label class="h3"></label>&nbsp;&nbsp;<label class="h3 text-info"><?php echo $row_Negociacion->NombreNegociacion; ?></label> 
              <button id="btn_EditarObjetivo" onClick="EditarObjetivo(<?php echo $row_Negociacion->idNegociacion ?>);" class="btn btn-link pull-right text-yellow" data-toggle="tooltip" title="Editar"><i class="fa fa-edit fa-2x"></i></button>

              <button id="btn_Guardarbjetivo" onClick="UpdateObjetivo(<?php echo $row_Negociacion->idNegociacion ?>);" class="btn btn-link pull-right text-green hidden" data-toggle="tooltip" title="Gaurdar Cambios"><i class="fa fa-check-square-o fa-2x"></i></button>

              <label class="text-info pull-right">Avance:<span class="h3 text-info pull-right" id="Avance" name="Avance"></span></label>
            </div>
            <!-- /.box-header -->
            <div class="box-body bg-info">
            <label class="">Motivo:</label>&nbsp;&nbsp;<input class="form-control"  type="text" name="Motivo" id="Motivo" value="<?php echo $row_Negociacion->Motivo; ?>" disabled>
<hr>
            <label class="">Prioridad:</label>&nbsp;&nbsp;
              <input type="text" id="Prioridad" name="Prioridad" class="form-control" disabled value="<?php echo $row_Negociacion->Prioridad; ?>">
<hr>
            <label class="">Estatus:</label>&nbsp;&nbsp;
              <input type="text" id="Estatus" name="Estatus" class="form-control" disabled value="<?php echo $row_Negociacion->NegStatus; ?>">
<hr>
            <label class="">Detalles:</label>&nbsp;&nbsp;
              <input type="text" id="Detalles" name="Detalles" class="form-control" disabled value="<?php echo $row_Negociacion->Detalles; ?>">
<hr>
            <label class="">Fecha Vencimiento:</label>&nbsp;&nbsp;
              <input type="text" id="FechaVencimiento" name="FechaVencimiento" class="form-control" disabled value="<?php echo $row_Negociacion->FechaLimite; ?>">
<hr>

            <?php if ($row_Negociacion->idEmpresa>0) { ?>
            <label class="">Empresa:</label>&nbsp;&nbsp;
              <p class=""><a href="<?php echo base_url().'cEmpresa/verEmpresa/'.$row_Negociacion->idEmpresa.''; ?>"><?php echo $row_Negociacion->NombreEmpresa; ?></a></p><hr>
            <?php }
            else{?>
            <label class="">Persona:</label>&nbsp;&nbsp;<p class=""><a href="<?php echo base_url().'cPersona/verPersona/'.$row_Negociacion->idPersona.''; ?>"><?php echo $row_Negociacion->Nombre; ?></a></p><hr>
            <?php } ?>
            <?php if ($row_Negociacion->StatusFinal!=NULL): ?>
                  <li class="list-group-item">
                    <b>Justificación de Cancelación:</b>
                    <?php echo $row_Negociacion->StatusFinal; ?>
                  </li>  
          <?php endif ?>
            </div><!-- /.box-body -->
          </div>
        </div>
        <div class="col-md-6">
          <div class="box box-info bg-info">
            <div class="nav-tabs-custom">
              <div class="box-header with-border bg-success">
                <ul class="nav nav-tabs">
                  <li class="active"><a href="#Comentarios" data-toggle="tab">Comentarios</a></li>
                  <li class=""><a href="#TareasOb" data-toggle="tab">Tareas</a></li>
                  <!-- <div class="btn btn-group"> -->
                  <!-- <span id="TareasActivas" name="TareasActivas" class="badge bg-yellow"></span>
                  <span id="TareasRealizadas" name="TareasRealizadas" class="badge bg-green"></span>
                  <span id="TareasCanceladas" name="TareasCanceladas" class="badge bg-red"></span></div> -->
              </div>
                  <div class="box-body bg-info">
                    <div class="tab-content"><!-- Comentarios -->
                      <div class="active tab-pane" id="Comentarios">
                        <div class="row">
                            <form method="POST" action="<?php echo base_url();?>cComentarios/guardarComentario" id="formComentarios" name="formComentarios">
                              <div class="col-sm-9">
                                <input type="text" name="Nota" id="Nota" class="form-control input-sm" placeholder="Agregar Nota">
                              </div>
                              <div class="col-sm-3">
                                <input type="hidden" id="idNegociacion" name="idNegociacion" value="<?php echo $row_Negociacion->idNegociacion;?>">
                                <input type="hidden" id="idUsuarioc" name="idUsuarioc" value="<?php echo $this->session->userdata('s_idUsuario');?>">
                                <button id="btn_Coment" type="submit" class="btn btn-success pull-right btn-block btn-sm">Guardar</button>
                              </div>
                            </form>
                          <div class="col-md-12" id="ListaTareasNG" style="height: 400px; overflow: scroll;">
                          </div>
                        </div> 
                      </div>

                    <div class="tab-pane" id="TareasOb">
                        <!-- The timeline -->
                      <button id="btn_nTarea" class="btn btn-success " data-toggle="modal" data-target="#ModalTareOb"><i class="fa fa-plus fa-x2"></i> Nueva Tarea</button>
                      <div class="btn btn-group">
                  <span id="TareasActivas" name="TareasActivas" class="badge bg-yellow"></span>
                  <span id="TareasRealizadas" name="TareasRealizadas" class="badge bg-green"></span>
                  <span id="TareasCanceladas" name="TareasCanceladas" class="badge bg-red"></span></div>
                      <hr>
                      <ul class="timeline timeline-inverse" id="LineaTareasOb" style="height: 400px; overflow: scroll;">
                      </ul>
                    </div>

                  </div>
                  </div>
                </ul>
            </div> <!-- box-header -->
          </div>
        </div>
      </div><!-- col -->
      </div>
    </section>

<div class="modal fade modal-info" id="ModalTareOb" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="exampleModalLabel">AGREGAR NUEVA TAREA</h4>
      </div>
      <form name="formTareaOb" id="formTareaOb" method="POST" action="<?php echo base_url();?>cPersona/guardarTareaObjetivo">
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
                      <textarea name="Descripcion" id="Descripcion" placeholder="Detalles de la tarea" rows="4" class="form-control" ></textarea>
                    </div>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group col-md-12 text-center">
                    <label>¿CUANDO DEBE CUMPLIRSE?</label>

                    <div class="input-group date">
                      <div id="datepicker" data-date="08/07/2017"></div>
                      <input type="hidden" id="FechaFin"  name="FechaFin" value="08/07/2017">
                      <input type="hidden" id="idNegociacion" name="idNegociacion" value="<?php echo $row_Negociacion->idNegociacion;?>">
                      <input type="hidden" id="idEmpresa" name="idEmpresa" value="<?php echo $row_Negociacion->idEmpresa;?>">
                      <input type="hidden" id="idPersona" name="idPersona" value="<?php echo $row_Negociacion->idPersona;?>">
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

<script type="text/javascript">
  var baseurl = "<?php echo base_url();?>";
  var idNegociacion = "<?php echo $row_Negociacion->idNegociacion; ?>";
  var idUsuarioCrea = "<?php echo $this->session->userdata('s_idUsuario'); ?>";
</script>