    <section class="content-header">
      <ol class="breadcrumb">
        <li><a href="cLogin"><i class="fa fa-map-signs"></i>Inicio</a></li>
        <li class="active"></li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-0">
        </div>
        <div class="col-md-6">
          <div class="box box-info bg-info">
            <div class="box-header with-border bg-success">
              <div class="col-md-5">
                <label class="h3 text-info"><?php echo $row_Tareas->TituloTarea; ?></label>
              </div>
              <div class="col-md-4">
                <a href="#" class="btn btn-sm text-center btn-success" id="btnRealizarTarea" data-toggle="modal" data-target="#ModalStatusFinal">Realizada</a>
                <button class="btn btn-sm text-center btn-danger" id="btnCancelarTarea" data-toggle="modal" data-target="#ModalStatusFinalCancelar">Cancelar</button>
              </div>
              <div class="col-md-3">
                  <label class="h4 text-info pull-right"><?php echo $row_Tareas->StatusTarea; ?></label>  
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body bg-info">
            <label class="h4">Categoria:</label>&nbsp;&nbsp;<label class="h5"><?php echo $row_Tareas->Categoria?></label><br><hr>
            <label class="h4">Personal Asignado:</label>&nbsp;&nbsp;<label class="h5"><?php foreach($row_Asignados as $Asignado){ echo $Asignado->Nombre." ".$Asignado->Paterno."<br>"; }?></label><br><hr>
            <?php if ($row_EmpParticipantes!=null) {?>
            <label class="h4">Participantes:</label>&nbsp;&nbsp;<label class="h5"><?php foreach($row_EmpParticipantes as $Participantes){ echo $Participantes->RazonSocial."<br>"; }?></label><br><hr><?php } ?>
            <?php if ($row_PersonasParticipantes!=null) {?>
            <label class="h4">Participantes:</label>&nbsp;&nbsp;<label class="h5"><?php foreach($row_PersonasParticipantes as $PersParticipantes){ echo $PersParticipantes->Nombre."&nbsp;".$PersParticipantes->Paterno."<br>"; }?></label><br><hr><?php } ?>

            <label class="h4">Descripcion:</label>&nbsp;&nbsp;<label class="h5"><?php echo $row_Tareas->Descripcion?></label><br><hr>
            <label class="h4">Fecha Vencimiento:</label>&nbsp;&nbsp;<label class="h5"><?php echo $row_Tareas->FechaFin?></label><br><hr>
            <?php if ($row_Tareas->Activa==0): ?>
            <li class="list-group-item">
              <b>Dictamen Final:</b>
              <?php echo $row_Tareas->StatusFinal; ?>
            </li>  
            <?php endif ?>
            </div><!-- /.box-body -->
          </div>
        </div>
        <div class="col-md-6">
        <div class="box box-info bg-info">
            <div class="box-header with-border bg-success">
              <label class="h3"></label>&nbsp;&nbsp;<label class="h3 text-info">Agregar Comentario</label>
            </div>
            <!-- /.box-header -->
            <div class="box-body bg-info">
              <div class="row">
                <form method="POST" action="<?php echo base_url();?>cComentarios/guardarComentario" id="formComentarios" name="formComentarios">
                      <div class="col-sm-9">
                          <input type="text" name="Nota" id="Nota" class="form-control input-sm" placeholder="Agregar Nota">
                      </div>
                      <div class="col-sm-3">
                        <input type="hidden" id="idTarea" name="idTarea" value="<?php echo $row_Tareas->idTarea;?>">
                        <input type="hidden" id="idUsuarioc" name="idUsuarioc" value="<?php echo $this->session->userdata('s_idUsuario');?>">
                        <button id="btn_Coment" type="submit" class="btn btn-success pull-right btn-block btn-sm">Guardar</button>
                      </div>
                  </form>
                <div class="col-md-12" id="ListaTareas" style="height: 400px; overflow: scroll;">
                </div>
                </div>  
            </div><!-- /.box-body -->
          </div>
        </div>
      </div>
    </section>

<div id="ModalStatusFinal" class="modal modal-success fade" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Actualización de tarea</h4>
      </div>
      <div class="modal-body">
        <div class="row">
        <div class="col-md-12">
        <label>Dictamen Final:</label>
          <textarea id="StatusFinal" class="form-control col-md-12 text-black"></textarea>
        </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" id="mbtnCancelar" class="btn btn-default" data-dismiss="modal">Cancelar</button>
        <button type="button" id="mbtnEnviar" class="btn btn-default">Enviar</button>

      </div>
    </div>
  </div>
</div>
<div id="ModalStatusFinalCancelar" class="modal modal-success fade" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Actualización de tarea</h4>
      </div>
      <div class="modal-body">
        <div class="row">
        <div class="col-md-12">
        <label>Dictamen Final:</label>
          <textarea id="StatusFinalCancelada" class="form-control col-md-12 text-black"></textarea>
        </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" id="mbtnCancelarC" class="btn btn-default" data-dismiss="modal">Cancelar</button>
        <button type="button" id="mbtnEnviarCancelada" class="btn btn-default">Enviar</button>

      </div>
    </div>
  </div>
</div>

<script type="text/javascript">
  var baseurl = "<?php echo base_url();?>";
  var idTarea = "<?php echo $row_Tareas->idTarea; ?>";
</script>