<style type="text/css">
  .form-control[disabled]{
  cursor: not-allowed;
  background: transparent;
  border: none;
}
</style>

    <section class="content-header">
      <label class="h3">Tarea:</label>&nbsp;&nbsp;<label class="h3 text-info text-red"><?php 
      
$variable = strtr(strtoupper($row_Tareas->TituloTarea),"àèìòùáéíóúçñäëïöü","ÀÈÌÒÙÁÉÍÓÚÇÑÄËÏÖÜ");
echo $variable;
      ?></label> 
    </section>
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
    <!-- Main content -->
<section class="content">
    <div class="box box-info">
        <div class="box-body">
          <div class="row">
            <div class="col-md-6">
                  <div class="btn-group pull-right">
                    <button type="button" class="btn btn-sm text-center btn-success pull-right" id="btnRealizarTarea" data-toggle="tooltip" data-tooltip="tooltip" title="Marcar como Realizada" <?php if ($ActivarBotones==false){echo "disabled"; } ?> ><i class="fa fa-check-square"></i></button>
                    <button class="btn btn-sm text-center btn-danger pull-right" id="btnCancelarTarea" data-toggle="tooltip" data-tooltip="tooltip" title="Cancelar Tarea" <?php if ($ActivarBotones==false){echo "disabled";} ?> ><i class="fa fa-ban"></i></button>
                    <button type="button" class="btn btn-sm text-center btn-warning pull-right" id="btnEditarTarea" data-toggle="tooltip" data-tooltip="tooltip" title="Editar Tarea" <?php if ($ActivarBotones==false){echo "disabled";} ?> ><i class="fa fa-edit"></i></button>
                    <button type="button" class="btn btn-sm text-center btn-success hidden pull-right" id="btnGuardarCambiosTarea" data-toggle="tooltip" data-tooltip="tooltip" title="Guardar Cambios" <?php if ($ActivarBotones==false){echo "disabled";} ?> ><i class="fa fa-save"></i></button>
                   </div>

                  <div class="col-md-12">
                    <div class="col-md-6">                
                      <div class="col-md-12"><label class="">Fecha Vencimiento:</label></div>
                      <div class="col-md-12 text-center"><input class="form-control" value=<?php echo $row_Tareas->FechaFin?> disabled="true" ></div>
                    </div>
                    <div class="col-md-6">
                      <div class="col-md-12"><label class="">Categoria:</label></div>
                      <div class="col-md-12 bg-yellow text-center">
                         <select class="form-control" id="Categoria" name="Categoria" disabled="true">
                          <option <?php if($row_Tareas->Categoria=='Llamar'){echo "selected";} ?> value="Llamar">Llamar</option>
                          <option <?php if($row_Tareas->Categoria=='Entrevista'){echo "selected";} ?> value="Entrevista">Entrevista</option>
                          <option <?php if($row_Tareas->Categoria=='Correo'){echo "selected";} ?> value="Correo">Correo</option>
                          <option <?php if($row_Tareas->Categoria=='Seguimiento'){echo "selected";} ?> value="Seguimiento">Seguimiento</option>
                        </select>
                      </div>
                    </div>
                  </div>



                <div class="col-md-6">
                    <label>Usuario Asignado:</label><ul><?php foreach($row_Asignados as $Asignado){ echo "<li>".$Asignado->Nombre." ".$Asignado->Paterno; }?></ul>
                </div>
                <div class="col-md-6">
                  <label>Status:</label>
                     <p><?php echo $row_Tareas->StatusTarea; ?></p>
                <button <?php if ($MostrarBotonesAceptar==false){echo "class=\"hidden\"";} ?> id="btn_AceptarTarea" class="btn btn-success btn-sm"> Aceptar Tarea</button>&nbsp;&nbsp;
                <button <?php if ($MostrarBotonesAceptar==false){echo "class=\"hidden\"";} ?> id="btn_RechazarTarea" class="btn btn-danger btn-sm"> Rechazar Tarea</button>
                </div>
                <?php if (isset($row_Empresa)): ?>
                <div class="col-md-6">
                  <label>Empresa:</label><br>&nbsp;&nbsp;<a href="<?php echo base_url();?>cEmpresa/verEmpresa/<?php echo $row_Empresa->idEmpresa; ?>"><?php echo $row_Empresa->NombreEmpresa;?></a>
                </div>                  
                <?php endif ?>
                <?php if (isset($row_Persona)): ?>
                  <div class="col-md-12">
                    <label>Persona:</label>
                    <p>&nbsp;&nbsp;&nbsp;&nbsp;<a href="<?php echo base_url('cPersona/verPersona/').$row_Persona->idPersona; ?>"><?php echo $row_Persona->Nombre; ?></a></p>
                  </div>
                <?php endif ?>
                <?php if ($row_EmpParticipantes!=null) {?>
                  <div class="col-md-12">
                    <label>Empresas Participantes:</label><ul><?php foreach($row_EmpParticipantes as $Participantes){ echo "<li>$Participantes->NombreEmpresa</li>"; }?></ul>
                  </div>
                <?php } ?>
                <?php if ($row_PersonasParticipantes!=null) {?>
                <div class="col-md-12">
                  <label>Personas Participantes:</label>
                  <ul><?php foreach($row_PersonasParticipantes as $PersParticipantes){ echo "<li>$PersParticipantes->Nombre</li>"; }?>
                  </ul>
                </div>
                <?php } ?>
                <?php if ($row_Objetivo): ?>
                  <div class="col-md-6">
                    <label>Objetivo</label>
                    <p><a href="<?php echo base_url('cPersona/verNegociacion/').$row_Objetivo->idNegociacion;?>"><?php echo $row_Objetivo->NombreNegociacion; ?></a></p>
                  </div>
                <?php endif ?>
                <?php if ($row_Tareas->StatusTarea=='Rechazada'): ?>
                  <div class="col-md-12">
                    <label>Razón de rechazo:</label>
                    <input class="form-control" value="<?php echo $row_Tareas->StatusFinal; ?>" disabled="true" >
                  </div>
                <?php endif ?>
                <?php if ($row_Tareas->StatusTarea=='Realizada'): ?>
                  <div class="col-md-12">
                    <label>Status Final:</label>
                    <input class="form-control" value="<?php echo $row_Tareas->StatusFinal; ?>" disabled="true" >
                  </div>
                <?php endif ?>
                <div class="col-md-12">
                  <label>Tarea creada por:</label><ul>
                  <p><?php echo $row_UsuarioCrea->Nombre.' '.$row_UsuarioCrea->Paterno; ?></p></ul>
                </div>
                <div class="col-md-12">
                  <label class="">Descripcion:</label>
                  <textarea class="form-control"  type="text" name="Descripcion" id="Descripcion" value="" disabled><?php echo $row_Tareas->Descripcion?></textarea>
                </div>
              </div>
            <div class="col-md-6">
                <div class="box-header with-border">
                  <label class="h3"></label>&nbsp;&nbsp;<label class="h3 text-info">Comentarios</label>
                </div>
                  <div class="box-body">
                    <div class="tab-content"><!-- Comentarios -->
                      <div class="active tab-pane" id="Comentarios">
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
                      </div>
                    </div>
                  </div> 
            </div>
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
          <textarea id="StatusFinalRechazada" name="StatusFinalRechazada" class="form-control col-md-12 text-black"></textarea>
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