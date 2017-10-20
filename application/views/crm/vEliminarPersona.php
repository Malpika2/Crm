
    <!-- Main content -->
    <section class="content">
      <div class="row">
      <div class="col-md-12">
        <div class="col-md-12">
          <div class="callout callout-default">
            <div class="box">                    
            <div class="box-header">
              <h3 class="box-title">LISTADO COMPLETO DE PERSONAS</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Nombre</th>
                  <th>Cargo</th>
                  <th>Skype</th>
                  <th>Status</th>
                  <th>Fecha Registro</th>
                  <th>Eliminar</th>
                </tr>
                </thead>
                <tbody id="ListaPersonas">
                <?php
                  foreach ($Persona as $Persona) {
                    if ($Persona->Status=='Inactivo') {
                      
                    }else{
                      echo '<tr>
                              <td align="left">
                                '.$Persona->Nombre.' '.$Persona->Paterno.'
                              </td>
                              <td align="left">
                                '.$Persona->Cargo.'
                              </td>
                              <td align="left">
                                '.$Persona->Skype.'
                              </td>
                              <td align="center">
                                '.$Persona->Status.'
                              </td>
                              <td align="center">
                                '.$Persona->FechaRegistro.'
                              </td>
                              <td align="center">
                                <button class="btn btn-danger btn-xs" id="btnRealizadaPersonas" name="btnRealizadaPersonas" value="'.$Persona->idPersona.'"><i class="fa fa-trash"></i></button>
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
    </section>

<script type="text/javascript">
  var idUsuarioActivo = "<?php echo $this->session->userdata('s_idUsuario');?>";
  var baseurl = "<?php echo base_url();?>"
</script>