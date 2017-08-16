    <section class="content-header">
      <ol class="breadcrumb">
        <li><a href="cLogin"><i class="fa fa-map-signs"></i>Inicio</a></li>
        <li class="active"></li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
      <h1></h1>
      <div class="col-md-12">
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title "><h2><?php echo strtoupper($row_TemaForo->TituloTema);?></h2></h3>
            <span><?php echo $row_TemaForo->AsuntoTema; ?></span>
        </div>
        <div class="box-body">
          <div class="col-md-12" id="ListaComentariosTema<?php echo $row_TemaForo->idTemasForo;?>" style="max-height:500px; overflow:scroll;">
          </div>
        </div>
        <!-- /.box-body -->
        <div class="box-footer" id="ComentariosTemaForo">
        <form name="formComentarioTema" id="formComentarioTema" method="POST" action="">
            <div class="box-footer">
              <div class="input-group">
                <input type="text" id="Comentario" name="Comentario" class="form-control" placeholder="Type message...">
                <input type="hidden" id="idUsuarioc" name="idUsuarioc" value="<?php echo $this->session->userdata('s_idUsuario'); ?>">
                <input type="hidden" id="idTema" name="idTema" value="<?php echo $row_TemaForo->idTemasForo; ?>">
                <div class="input-group-btn">
                  <button type="submit" class="btn btn-success"><i class="fa fa-plus"></i></button>
                </div>
              </div>
              </div>
              </form>

        </div>
        <!-- /.box-footer-->
      </div>
      </div>
      </div>
    </section>
<script type="text/javascript">
  var idTemasForo = <?php echo $row_TemaForo->idTemasForo;?>;
  var baseurl = "<?php echo base_url();?>";
    var idUsuarioActivo = "<?php echo $this->session->userdata('s_idUsuario');?>";

</script>