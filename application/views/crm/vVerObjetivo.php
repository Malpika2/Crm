<section class="content-header">
      <ol class="breadcrumb">
        <li><a href="cLogin"><i class="fa fa-map-signs"></i>Inicio</a></li>
        <li class="active"></li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-12">
        <br>
          <div class="box box-info bg-info">
            <div class="box-header with-border bg-success">
              <label class="h3"></label>&nbsp;&nbsp;<label class="h3 text-info"><?php echo $Objetivo->Titulo ?></label>
              <button id="btn_nMeta" class="btn btn-primary pull-right " data-toggle="modal" data-target="#ModalMeta"><i class="fa fa-plus fa-x2"></i>Agregar Meta</button>
            </div>
            <!-- /.box-header -->
            <div class="box-body bg-info">
            <div class="col-md-6">
              <span class="pull-right">Status: &nbsp;<?php echo $Objetivo->Status; ?></span>
              <p>Fecha de Creacion: &nbsp;<?php echo $Objetivo->FechaCreacion; ?></p>
              <p>Prioridad:&nbsp; <?php echo $Objetivo->Prioridad;?></p>
              <p>Origen:&nbsp; <?php echo $Objetivo->Origen;?></p>
            </div>
            <div class="col-md-6">
              <div class="row" id="TablaTareasObjetivos">
                <div class="col-md-12">
                  <table width="100%">
                    <thead>
                      <tr>
                        <th>Meta</th>
                        <th>%Desarrollo</th>
                        <th>Ultima Actualización</th>
                      </tr>
                      <th></th>
                    </thead>
                    <tbody id="ListaMetas">
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
            </div><!-- /.box-body -->
          </div>
        </div>
      </div>

<div class="modal fade modal-primary" id="ModalMeta" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="exampleModalLabel">AGREGAR NUEVA META</h4>
      </div>
      <form name="formMeta" id="formMeta" method="POST" action="<?php echo base_url();?>CObjetivos/guardarMeta">
      <div class="modal-body">
          <div class="box box-info">
            <div class="box-body" style="background-color: #f9f8eb; color: black">
               <div class="form-group">
                  <div class="input-group col-md-12">
                    <div class="input-group-addon">
                      <span>Titulo</span>
                    </div>
                    <input class="col-md-12" type="text" name="TituloMeta" id="TituloMeta" required />
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
                        <span>Descripcion</span>
                      </div>
                      <textarea name="Descripcion" id="Descripcion" placeholder="Descripcion" rows="4" ></textarea>
                    </div>
                  </div>
            </div>
            <!-- /.box-body -->
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Cancelar</button>
        <input class="col-md-12" type="hidden" name="idObjetivos" id="idObjetivos" value="<?php echo $Objetivo->idObjetivos; ?>" required />
        <button type="submit" class="btn btn-outline">Guardar Meta</button>
      </div>
    </form>
    </div>
  </div>
</div>

    </section>
<script type="text/javascript">
  var baseurl = "<?php echo base_url();?>";
  var idObjetivos = "<?php echo $Objetivo->idObjetivos; ?>";
</script>