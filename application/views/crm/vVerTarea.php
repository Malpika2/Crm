<style type="text/css">
  .form-control[disabled]{
  cursor: not-allowed;
  background: transparent;
  border: none;
}
</style>
    <section class="content-header">
      <ol class="breadcrumb">
        <li><a href=<?php echo base_url()?>cInicio><i class="fa fa-home"></i>Inicio</a></li>
        <li class="active">Ver Tarea</li>
      </ol>
    </section>


    <!-- Main content -->
    <section class="content">
      <div class="row">

      <h1></h1>
        <div class="col-md-0">
        </div>
        <div class="col-md-6">
<?php
$ActivarBotones=false;
$MostrarBotonesAceptar=false;
 foreach($row_Asignados as $Asignado){ 
  if ($Asignado->idUsuario==$this->session->userdata('s_idUsuario')) {
    $ActivarBotones=true;
    $MostrarBotonesAceptar=true;
    if ($row_Tareas->StatusTarea=='Pendiente Aceptar')
    {
      $ActivarBotones=false;
      $MostrarBotonesAceptar==true;
    }
    if ($row_Tareas->StatusTarea=='Rechazada' OR $row_Tareas->StatusTarea=='Realizada')
    {
      $ActivarBotones=false;
    }
    if ($row_Tareas->StatusTarea!=='Pendiente Aceptar')
    {
      $MostrarBotonesAceptar=false;
    }
  }
 }?>
          <div class="box box-widget widget-user-2">
                  <div class="btn-group pull-right">
                  <button type="button" class="btn btn-sm text-center btn-success pull-right" id="btnRealizarTarea" data-toggle="tooltip" data-tooltip="tooltip" title="Marcar como Realizada" <?php if ($ActivarBotones==false){echo "disabled"; } ?> ><i class="fa fa-check-square"></i></button>
                  <button class="btn btn-sm text-center btn-danger pull-right" id="btnCancelarTarea" data-toggle="tooltip" data-tooltip="tooltip" title="Cancelar Tarea" <?php if ($ActivarBotones==false){echo "disabled";} ?> ><i class="fa fa-ban"></i></button>
                  <button type="button" class="btn btn-sm text-center btn-warning pull-right" id="btnEditarTarea" data-toggle="tooltip" data-tooltip="tooltip" title="Editar Tarea" <?php if ($ActivarBotones==false){echo "disabled";} ?> ><i class="fa fa-edit"></i></button>
                  <button type="button" class="btn btn-sm text-center btn-success hidden pull-right" id="btnGuardarCambiosTarea" data-toggle="tooltip" data-tooltip="tooltip" title="Guardar Cambios" <?php if ($ActivarBotones==false){echo "disabled";} ?> ><i class="fa fa-save"></i></button>
                   </div>
            <div class="widget-user-header bg-blue">
              <h3 class="widget-user-username"><?php echo strtoupper($row_Tareas->TituloTarea); ?></h3>
              <h5 class="widget-user-desc"><?php echo $row_Tareas->StatusTarea; ?>&nbsp;&nbsp;

                <button <?php if ($MostrarBotonesAceptar==false){echo "class=\"hidden\"";} ?> id="btn_AceptarTarea" class="btn btn-success btn-sm"> Aceptar Tarea</button>&nbsp;&nbsp;
                <button <?php if ($MostrarBotonesAceptar==false){echo "class=\"hidden\"";} ?> id="btn_RechazarTarea" class="btn btn-danger btn-sm"> Rechazar Tarea</button></h5>
            </div>
            <div class="box-footer no-padding">
              <ul class="nav nav-stacked">
                 <li class="text-danger">Categoria:
  <!-- <input class="" type="text" name="Categoria" id="Categoria" value="<?php echo $row_Tareas->Categoria?>" disabled="true">-->
                 <select class="form-control" id="Categoria" name="Categoria" disabled="true">
                  <option <?php if($row_Tareas->Categoria=='Llamar'){echo "selected";} ?> value="Llamar">Llamar</option>
                  <option <?php if($row_Tareas->Categoria=='Entrevista'){echo "selected";} ?> value="Entrevista">Entrevista</option>
                  <option <?php if($row_Tareas->Categoria=='Correo'){echo "selected";} ?> value="Correo">Correo</option>
                  <option <?php if($row_Tareas->Categoria=='Seguimiento'){echo "selected";} ?> value="Seguimiento">Seguimiento</option>
                </select>
                </li>

                <li class="text-danger">Descripción:<input class="form-control" type="text" id="Descripcion" name="Descripcion" value="<?php echo $row_Tareas->Descripcion?>" disabled="true"></li>
                <li class="text-danger">Personal Asignado:<ul><?php foreach($row_Asignados as $Asignado){ echo "<li>".$Asignado->Nombre." ".$Asignado->Paterno."</li>"; }?>
                  </ul>
                </li>

            <?php if ($row_EmpParticipantes!=null) {?>
            <li class="text-danger">Empresas Participantes:<ul><?php foreach($row_EmpParticipantes as $Participantes){ echo "<li>$Participantes->NombreEmpresa"; }?></ul></li><?php } ?>

            <?php if ($row_PersonasParticipantes!=null) {?>
            <li class="text-danger">Personas Participantes:<ul><?php foreach($row_PersonasParticipantes as $PersParticipantes){ echo "<li>$PersParticipantes->Nombre"; }?></ul></li>
            <?php } ?>
                <li class="text-danger">Fecha de Vencimiento:<input class="form-control" value=<?php echo $row_Tareas->FechaFin?> disabled="true" ></li>
            <?php if ($row_Tareas->StatusTarea=='Rechazada'): ?>
                <li class="text-danger">Razón de rechazo:<input class="form-control" value="<?php echo $row_Tareas->StatusFinal; ?>" disabled="true" ></li>
            <?php endif ?>
            <?php if ($row_Tareas->StatusTarea=='Realizada'): ?>
                <li class="text-danger">Status Final:<input class="form-control" value="<?php echo $row_Tareas->StatusFinal; ?>" disabled="true" ></li>
            <?php endif ?>
              </ul>
            </div>
          </div>
        </div>
        <div class="col-md-6">
        <div class="box box-info bg-info">
            <div class="box-header with-border bg-success">
              <label class="h3"></label>&nbsp;&nbsp;<label class="h3 text-info">Comentarios</label>
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

<div id="ModalStatusFinalRechazar" class="modal modal-success fade" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Tarea Rechazada</h4>
      </div>
      <div class="modal-body">
        <div class="row">
        <div class="col-md-12">
        <label>Razón:</label>
          <textarea id="StatusFinalRechazada" class="form-control col-md-12 text-black"></textarea>
        </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" id="mbtnCancelarR" class="btn btn-default" data-dismiss="modal">Cancelar</button>
        <button type="button" id="mbtnEnviarRechazada" class="btn btn-default">Enviar</button>
      </div>
    </div>
  </div>
</div>

<script type="text/javascript">
  var baseurl = "<?php echo base_url();?>";
  var idTarea = "<?php echo $row_Tareas->idTarea; ?>";
    var idUsuarioActivo = "<?php echo $this->session->userdata('s_idUsuario');?>";
  document.getElementById("btnCancelarTarea").onclick = function(){
    $('#ModalStatusFinalCancelar').modal();
  }; 
  document.getElementById("btnRealizarTarea").onclick = function(){
    $('#ModalStatusFinal').modal();
  };
  document.getElementById("btn_RechazarTarea").onclick = function(){
    $('#ModalStatusFinalRechazar').modal();
};
  document.getElementById("btn_AceptarTarea").onclick = function(){
    AceptarTarea();
};
</script>