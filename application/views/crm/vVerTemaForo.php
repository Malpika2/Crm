
    <!-- Main content -->
    <section class="content">
      <div class="row">
      <h1></h1>
      <div class="col-md-12">
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title "><h2><?php echo strtoupper($row_TemaForo->TituloTema);?></h2></h3>
            <span><?php echo $row_TemaForo->AsuntoTema; ?></span>
<?php if($this->session->userdata('s_Nombre')=='Anthony' OR $this->session->userdata('s_Nombre')=='Yasser' ){;?><button type="button" class="btn btn-info pull-right" data-toggle="modal" data-target="#ModalTareasForo">Tareas</button><?php } ?>

        </div>
        <div class="box-body" id="ComentariosTemaForo">
                  <form name="formComentarioTema" id="formComentarioTema" method="POST" action="">
            <div class="box-footer">
              <div class="input-group">
                <input type="text" id="Comentario" name="Comentario" class="form-control" placeholder="Comentario">
                <input type="hidden" id="idUsuarioc" name="idUsuarioc" value="<?php echo $this->session->userdata('s_idUsuario'); ?>">
                <input type="hidden" id="idTema" name="idTema" value="<?php echo $row_TemaForo->idTemasForo; ?>">
                <div class="input-group-btn">
                  <button type="submit" class="btn btn-success"><i class="fa fa-plus"></i></button>
                </div>
              </div>
              </div>
              </form>
          <div class="col-md-12" id="ListaComentariosTema<?php echo $row_TemaForo->idTemasForo;?>" style="max-height:500px; overflow-y:scroll;">
          </div>
        </div>
        <!-- /.box-body -->
        <div class="box-footer" id="">
        </div>
        <!-- /.box-footer-->
      </div>
      </div>
      </div>
    </section>

<div id="ModalTareasForo" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h3 class="modal-title">Tareas de Foro</h3>
      </div>
      <div class="modal-body">
        <table id="tablaTareasForo" class="table table-hover table-bordered table-responsive">
          <thead>
            <th class="col-md-6">Tarea</th>
            <th class="col-md-6">Estado</th>
          </thead>
          <tbody id="bodyTareasForo">
          </tbody>
        </table>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>
<script type="text/javascript">
  var idTemasForo = <?php echo $row_TemaForo->idTemasForo;?>;
  var baseurl = "<?php echo base_url();?>";
  var idUsuarioActivo = "<?php echo $this->session->userdata('s_idUsuario');?>";
  var NombreUsuarioActivo = "<?php echo $this->session->userdata('s_Nombre');?>";
</script>