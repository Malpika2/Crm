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
              <label class="h3"></label>&nbsp;&nbsp;<label class="h3 text-info"><?php echo $row_Negociacion->NombreNegociacion; ?></label>
            </div>
            <!-- /.box-header -->
            <div class="box-body bg-info">
            <label class="h4">Motivo:</label>&nbsp;&nbsp;<label class="h5"><?php echo 
            $row_Negociacion->Motivo; ?></label><br><hr>
            <label class="h4">Prioridad:</label>&nbsp;&nbsp;<label class="h5"><?php echo $row_Negociacion->Prioridad; ?><br></label><br><hr>
            <label class="h4">Estatus:</label>&nbsp;&nbsp;<label class="h5"><?php echo $row_Negociacion->Status; ?><br></label><br><hr>
            <label class="h4">Detalles:</label>&nbsp;&nbsp;<label class="h5"><?php echo $row_Negociacion->Detalles; ?></label><br><hr>
            <label class="h4">Fecha Vencimiento:</label>&nbsp;&nbsp;<label class="h5"><?php echo $row_Negociacion->FechaLimite; ?></label><br><hr>
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
                        <input type="hidden" id="idNegociacion" name="idNegociacion" value="<?php echo $row_Negociacion->idNegociacion;?>">
                        <input type="hidden" id="idUsuarioc" name="idUsuarioc" value="<?php echo $this->session->userdata('s_idUsuario');?>">
                        <button id="btn_Coment" type="submit" class="btn btn-success pull-right btn-block btn-sm">Guardar</button>
                      </div>
                  </form>
                <div class="col-md-12" id="ListaTareasNG" style="height: 400px; overflow: scroll;">
                </div>
                </div>  
            </div><!-- /.box-body -->
          </div>
        </div>
      </div>
    </section>
<script type="text/javascript">
  var baseurl = "<?php echo base_url();?>";
  var idNegociacion = "<?php echo $row_Negociacion->idNegociacion; ?>";
</script>