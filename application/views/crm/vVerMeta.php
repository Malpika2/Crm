
    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-12">
        <br>
          <div class="box box-info bg-info">
            <div class="box-header with-border bg-success">
              <label class="h3"></label>&nbsp;&nbsp;<label class="h3 text-info"><?php echo $Meta->TituloMeta; ?></label>
              <button id="btn_nMeta" class="btn btn-primary pull-right " data-toggle="modal" data-target="#ModalTareaInterna"><i class="fa fa-plus fa-x2"></i>Agregar Tarea</button>
            </div>
            <!-- /.box-header -->
            <div class="box-body bg-info">
            <div class="col-md-6">
              <span class="pull-right">Status: &nbsp;<?php echo $Meta->Status; ?></span>
              <p>Fecha de actualización: &nbsp;<?php echo $Meta->FechaActualizacion; ?></p>
              <p>Prioridad:&nbsp; <?php echo $Meta->Prioridad;?></p>
              <p>Origen:&nbsp; <?php echo $Meta->Descripcion;?></p>
            </div>
            <div class="col-md-6">
              <div class="row" id="TablaTareasObjetivos">
                <div class="col-md-12">
                  <table width="100%">
                    <thead>
                      <tr>
                        <th>Tarea</th>
                        <th>Prioridad</th>
                        <th>Fecha Limite</th>
                      </tr>
                      <th></th>
                    </thead>
                    <tbody id="ListaTareasMetas">
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
            </div><!-- /.box-body -->
          </div>
        </div>
      </div>
    </section>

<div class="modal fade modal-primary" id="ModalTareaInterna" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="exampleModalLabel">AGREGAR TAREA</h4>
      </div>
      <form name="formTareasInternas" id="formTareasInternas" method="POST" action="<?php echo base_url();?>CObjetivos/guardarTareaInterna">
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
                          <option value="Otra">Otra</option>
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
                      <select id="UsuarioTareaInterna" name="UsuarioTareaInterna[]" class="form-control select2" multiple="multiple" data-placeholder="Selecciona un usuario" style="width: 100%;" required>
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
                      <div id="datepickerE" data-date="08/07/2017"></div>
                      <input type="hidden" id="FechaFinE"  name="FechaFinE" value="08/07/2017">
                      <input type="hidden" id="idUsuarioc" name="idUsuarioc" 
                      value="<?php echo $this->session->userdata('s_idUsuario');?>">
                      <input type="hidden" id="idMeta" name="idMeta" value="<?php echo $Meta->idMetas; ?>" />

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
<script type="text/javascript">
  var baseurl = "<?php echo base_url();?>";
  var idMeta = "<?php echo $Meta->idMetas; ?>";
</script>