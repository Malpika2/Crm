    <section class="content-header">
      <ol class="breadcrumb">
        <li><a href="cLogin"><i class="fa fa-map-signs"></i>Inicio</a></li>
        <li class="active"></li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
      <h3>GESTION DE OBJETIVOS</h3>
      <div class="col-md-12">
        <div class="col-md-12">
          <div class="callout callout-default">
            <div class="box">                    
            <div class="box-header">
              <h3 class="box-title">LISTADO COMPLETO</h3>
              <button id="btn_nTarea" class="btn btn-primary pull-right " data-toggle="modal" data-target="#ModalTarea"><i class="fa fa-plus fa-x2"></i>Nuevo Objetivo</button>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Titulo Tarea</th>
                  <th>Descripción</th>
                  <th>Usuario</th>
                  <th>Prioridad</th>
                  <th>Fecha Limite</th>
                  <th>Eliminar</th>
                </tr>
                </thead>
                <tbody id="ListaTareasInternas">
                <?php
                  foreach ($Tareas as $Tarea) {
                      echo '<tr>
                              <td align="left">
                                '.$Tarea->TituloTarea.'
                              </td>
                              <td align="left">
                                '.$Tarea->Descripcion.'
                              </td>
                              <td align="left">
                                '.$Tarea->Nombre.' '.$Tarea->Paterno.'
                              </td>
                              <td align="center">
                                '.$Tarea->Prioridad.'
                              </td>
                              <td align="center">
                                '.$Tarea->FechaFin.'
                              </td>
                              <td align="center">
                                <button class="btn btn-danger btn-xs" id="btnRealizada" name="btnRealizada" value="'.$Tarea->idTarea.'"><i class="fa fa-trash"></i></button>            
                              </td>
                            </tr>';
                  }
                ?>
                <tr>

                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                </tr>
                </tbody>
              </table>
            </div><!-- /.box-body -->
          </div><!-- /.box -->
          </div>
      </div>
      </div>



<div class="modal fade modal-primary" id="ModalTarea" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="exampleModalLabel">AGREGAR NUEVA TAREA GRUPAL</h4>
      </div>
      <form name="formTareasInternas" id="formTareasInternas" method="POST" action="<?php echo base_url();?>cTareasInternas/guardarTareaInterna">
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
                      <select id="UsuarioTareaInterna" name="UsuarioTareaInterna[]" class="form-control select2" multiple="multiple" data-placeholder="Usuarios Participantes" style="width: 100%;" required>
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
                      <div id="datepickerE" data-date="08/07/2017"></div>
                      <input type="hidden" id="FechaFinE"  name="FechaFinE" value="08/07/2017">
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
    </section>

<script type="text/javascript">
  var idUsuarioActivo = "<?php echo $this->session->userdata('s_idUsuario');?>";
  var baseurl = "<?php echo base_url();?>"
</script>