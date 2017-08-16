<section class="content-header">
      <ol class="breadcrumb">
        <li><a href="cLogin"><i class="fa fa-map-signs"></i>Inicio</a></li>
        <li class="active"></li>
      </ol>
    </section>
    <!-- Main content -->
    <section class="content" id="Seguimiento">
    <div class="container-fluid">
      <div class="row">
      <br>
      <span class="h2">SEGUIMIENTO CRM</span>
      <div class="box-tools pull-right" data-toggle="tooltip" title="Agregar Tema">
        <button id="btnAgregarTemaForo" type="button" class="btn btn-default" data-toggle="modal" data-target="#ModalAgregarTema"><i class="fa fa-plus-square text-red"></i></button>
      </div>
      <div class="col-md-12" id="divTablaForo">
      <table class="table table-responsive table-hover" style="background-color: #f9f8eb" >
            <thead style="background-color: #7a9eb1;">
            <tr>
              <th></th>
              <th>Tema</th>
              <th>Seccion</th>
              <th>Status</th>
              <th>Fecha creacion</th>
            </tr>
            </thead>
            <tbody id="bodyTablaForo" class="text-left">
            </tbody>
        </table>
        
      </div>
          <div class="col-md-12" id="TemasForo" name="TemasForo">
          </div>
      </div>
    </div>
    </section>

<div class="modal fade modal-info" id="ModalAgregarTema" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="exampleModalLabel">Agregar Tema</h4>
      </div>
      <form name="formAgregarTema" id="formAgregarTema" method="POST" action="<?php echo base_url();?>cForo/guardarTema">
      <div class="modal-body">
        <div class="container-fluid">
        <div class="row">
          <div class="input-group col-sm-12 divsNP">
            <div class="input-group-addon">
              <span>Titulo</span>
            </div>
            <input style="color:black" class="col-md-12" type="text" id="TituloTema" name="TituloTema" required>
          </div>
          <div class="input-group col-sm-12 divsNP">
            <div class="input-group-addon">
              <span>Sección</span>
            </div>
            <input style="color:black" class="col-md-12" type="text" name="seccion" name="seccion" id="seccion" required />
          </div>

          <div class="input-group col-md-12 divsNP">
            <div class="input-group-addon">
              <span>Asunto</span>
            </div>
            <textarea style="color:black" class="col-md-12" type="text" id="AsuntoTema" name="AsuntoTema" required></textarea>
          </div>

          <input type="hidden" name="idUsuarioCrea" id="idUsuarioCrea" value="<?php echo $this->session->userdata('s_idUsuario');?>">
        </div>
        </div>
      <div class="modal-footer">
        <button id="mbtnCerrarModal" type="button" class="btn btn-outline pull-left" data-dismiss="modal">Cancelar</button>
        <button type="submit" class="btn btn-outline">Guardar</button>
      </div>
    </form>
    </div>
  </div>
</div>
<script type="text/javascript">
  var idUsuarioActivo = "<?php echo $this->session->userdata('s_idUsuario');?>";
  var baseurl = "<?php echo base_url();?>"
</script>