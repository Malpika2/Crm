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
              <button id="btn_nTarea" class="btn btn-primary pull-right " data-toggle="modal" data-target="#ModalObjetivos"><i class="fa fa-plus fa-x2"></i>Nuevo Objetivo</button>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Titulo/Asunto</th>
                  <th>Prioridad</th>
                  <th>Status</th>
                  <th>% Desarrollo</th>
                  <th>Fecha Creacion</th>
                  <th>Eliminar</th>
                </tr>
                </thead>
                <tbody id="ListaTareasInternas">
                <?php
                  foreach ($Objetivo as $Objetivo) {
                      echo '<tr>
                              <td align="left"><b>
                                <a style="color:blue; text-decoration:none;" href="'.base_url().'CObjetivos/verObjetivo/'.$Objetivo->idObjetivos.'">
                                '.$Objetivo->Titulo.'
                                </a></b>
                              </td>
                              <td align="left">
                                '.$Objetivo->Prioridad.'
                              </td>
                              <td align="left">
                                '.$Objetivo->Status.'
                              </td>
                              <td align="center">
                                '.$Objetivo->Porcentaje.'
                              </td>
                              <td align="center">
                                '.$Objetivo->FechaCreacion.'
                              </td>
                              <td align="center">
                                <button class="btn btn-danger btn-xs" id="btnRealizada" name="btnRealizada" value="'.$Objetivo->idObjetivos.'"><i class="fa fa-trash"></i></button>            
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



<div class="modal fade modal-primary" id="ModalObjetivos" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="exampleModalLabel">AGREGAR NUEVO OBJETIVO</h4>
      </div>
      <form name="formObjetivos" id="formObjetivos" method="POST" action="<?php echo base_url();?>CObjetivos/guardarObjetivo">
      <div class="modal-body">
          <div class="box box-info">
            <div class="box-body" style="background-color: #f9f8eb; color: black">
               <div class="form-group">
                  <div class="input-group col-md-12">
                    <div class="input-group-addon">
                      <span>Titulo</span>
                    </div>
                    <input class="form-control col-md-12" type="text" name="TituloObjetivo" id="TituloObjetivo" required />
                  </div>
               </div>
                <div class="col-md-6">
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
                        <span>Status</span>
                      </div>
                      <select id="Status" name="Status" class="form-control" placeholder="Categoria" style="width: 100%;">
                          <option value="Activa">Activa</option>
                          <option value="Detenida">Detenida</option>
                          <option value="Inactiva">Inactiva</option>
                      </select>
                    </div>
                  </div>
                </div>
                  <div class="form-group">
                    <div class="input-group">
                      <div class="input-group-addon">
                        <span>Origen</span>
                      </div>
                      <textarea class="form-control" name="Origen" id="Origen" placeholder="Origen del Objetivo" rows="4" ></textarea>
                    </div>
                  </div>
            </div>
            <!-- /.box-body -->
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Cancelar</button>
        <button type="submit" class="btn btn-outline">Guardar</button>
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