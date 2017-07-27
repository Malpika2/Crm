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
        <div class="col-md-12">
          <div class="callout callout-default">
            <div class="box">                    
            <div class="box-header">
              <h3 class="box-title">LISTADO COMPLETO DE NEGOCIACIONES</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Negociacion</th>
                  <th>Motivo</th>
                  <th>Responsable</th>
                  <th>Prioridad</th>
                  <th>Status</th>
                  <th>Fecha Limite</th>
                  <th>Eliminar</th>
                </tr>
                </thead>
                <tbody id="ListaNegociaciones">
                <?php
                  foreach ($Negociacion as $Negociacion) {
                    if ($Negociacion->Status=='Inactivo') {
                      
                    }else{
                      echo '<tr>
                              <td align="left">
                                '.$Negociacion->NombreNegociacion.'
                              </td>
                              <td align="left">
                                '.$Negociacion->Motivo.'
                              </td>
                              <td align="left">
                                '.$Negociacion->Nombre.' '.$Negociacion->Paterno.'
                              </td>
                              <td align="left">
                                '.$Negociacion->Prioridad.'
                              </td>
                              <td align="center">
                                '.$Negociacion->Status.'
                              </td>
                              <td align="center">
                                '.$Negociacion->FechaLimite.'
                              </td>
                              <td align="center">
                                <button class="btn btn-danger btn-xs" id="btnRealizadaNegociacion" name="btnRealizadaNegociacion" value="'.$Negociacion->idNegociacion.'"><i class="fa fa-trash"></i></button>
                              </td>
                            </tr>';
                            }
                    }
                ?>
                <tr>

                  <td></td>
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
    </section>

<script type="text/javascript">
  var idUsuarioActivo = "<?php echo $this->session->userdata('s_idUsuario');?>";
  var baseurl = "<?php echo base_url();?>"
</script>