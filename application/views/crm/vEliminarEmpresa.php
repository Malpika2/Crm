    <!-- Main content -->
    <section class="content">
      <div class="row">
      <h1>Eliminar Empresa</h1>
      <div class="col-md-12">
        <div class="col-md-12">
          <div class="callout callout-default">
            <div class="box">                    
            <div class="box-header">
              <h3 class="box-title">LISTADO COMPLETO DE EMPRESAS</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Razon Social</th>
                  <th>Tipo</th>
                  <th>Skype</th>
                  <th>Sitio Web</th>
                  <th>Fecha Registro</th>
                  <th>Eliminar</th>
                </tr>
                </thead>
                <tbody id="ListaEmpresas">
                <?php

                  foreach ($Empresa as $Empresa) {
                    if ($Empresa->sitReg==1) {
                      echo '<tr>
                              <td align="left">
                                '.$Empresa->NombreEmpresa.'
                              </td>
                              <td align="left">
                                '.$Empresa->Tipo.'
                              </td>
                              <td align="left">
                                '.$Empresa->Skype.'
                              </td>
                              <td align="center">
                                '.$Empresa->SitioWeb.'
                              </td>
                              <td align="center">
                                '.$Empresa->FechaRegistro.'
                              </td>
                              <td align="center">
                                <button class="btn btn-danger btn-xs" id="btnRealizadaEmpresas" name="btnRealizadaEmpresas" value="'.$Empresa->idEmpresa.'"><i class="fa fa-trash"></i></button>
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
                </tr>
                </tbody>
              </table>
            </div><!-- /.box-body -->
          </div><!-- /.box -->
          </div>
      </div>
      </div>
      </div>
      <!-- //ROW -->
    </section>
    <script type="text/javascript">
  var idUsuarioActivo = "<?php echo $this->session->userdata('s_idUsuario');?>";
  var baseurl = "<?php echo base_url();?>"
</script>