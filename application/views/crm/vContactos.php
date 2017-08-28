<style type="text/css">

.nav-tabs > li.active > a, .nav-tabs > li.active > a:focus, .nav-tabs > li.active > a:hover {
  color: white;
  cursor: default;
  background-color: #00a65a;
  border: 1px solid #ddd;
  border-bottom-color: transparent;
}
a{
  color:black;
}
  #listaEmpresas,
  #listaPersonas {
    padding: 1px;
  }
  #tablaPersonas a{
    color:#3c8dbc;
    text-decoration-style: none;
    text-decoration: none;
    font-weight: bold;
    text-transform: uppercase;
  }
  #tablaEmpresas a{
    color:#2181b5;
    text-decoration-style: none;
    text-decoration: none;
    font-weight: bold;
    text-transform: uppercase;
  }
  #tablaEmpresas td{
    max-width: 250px;
    overflow: hidden;
    white-space: nowrap;
    text-overflow: ellipsis;
  }
  .box-listasE{
    margin-top: 4px;
    overflow:scroll;
    height: 35em;
    border-width: 8px;
    border-right: 1px solid #3c8dbc;
    border-left:  1px solid #3c8dbc;
    border-bottom:  1px solid #3c8dbc;
  }
  .box-listasP{
    margin-top: 4px;
    overflow:scroll;
    height: 35em;
    border-width: 8px;
    border-right: 1px solid #00a65a;
    border-left:  1px solid #00a65a;
    border-bottom:  1px solid #00a65a;
  }

</style>
    <section class="content-header">
      <ol class="breadcrumb">
        <li><a href="cInicio"><i class="fa fa-map-signs"></i>Inicio</a></li>
        <li class="active">Contactos</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">

        <div class="nav-tabs-custom">
          <div class="text-center bg-white" style="padding: 1px; margin: 10px 15px 0px 15px; border-radius: 20px">
           <ul class="nav nav-tabs">
            <li class="active col-md-2 text-center">
              <a class="btn" href="#Empresas" data-toggle="tab" style="border-radius: 10px; margin-bottom: 3px;">
                <i class="fa fa-list "></i>&nbsp;Empresas
              </a>
            </li>
            <li class="col-md-2">
              <a class="btn text-center" href="#Personas" data-toggle="tab" style="border-radius: 10px; margin-bottom: 3px;">
                <i class="fa fa-list"></i>&nbsp;Personas
              </a>
            </li>
          </ul>          
          </div>
          <div class="tab-content">
            <div class="tab-pane" id="Personas"> 
                  <div class="">
            <div class="">                    
            <div class="box-header" style="padding-bottom: 0px;">
              <h3 class="box-title">LISTADO DE PERSONAS</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body table table-responsive" style="padding-bottom: 0px;">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr style="color:#00c8d9;">
                  <th>Nombre</th>
                  <th>Cargo</th>
                  <th>Skype</th>
                  <th>Status</th>
                  <th>Fecha Registro</th>
                  <th>Acciones</th>
                </tr>
                </thead>
                <tbody id="tablaPersonas">
                <?php
                  foreach ($Persona as $Persona) {
                    if ($Persona->Status=='Inactivo') {
                      
                    }else{
                      echo '<tr>
                              <td align="left">
                              <a class="" href="'.base_url().'cPersona/verPersona/'.$Persona->idPersona.'">
                                '.$Persona->Nombre.' '.$Persona->Paterno.'
                              </a>
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
                                <button class="btn btn-danger" id="btnEliminarPersona" name="btnRealizadaPersonas" value="'.$Persona->idPersona.'"><i class="fa fa-trash"></i></button>
                                <button class="btn btn-warning" id="btnEliminarPersona" name="btnRealizadaPersonas" value="'.$Persona->idPersona.'"><i class="fa fa-edit"></i></button>
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
          </div><!-- // fin PErsonas -->
            <div class="tab-pane active" id="Empresas"> 
            <div class="">
            <div class="">                    
            <div class="box-header" style="padding-bottom: 0px;">
              <h3 class="box-title">LISTADO DE EMPRESAS</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body table table-responsive" style="padding-top: 0px;">
              <table id="example2" class="table table-bordered table-striped">
                <thead>
                <tr  style="color:#00c8d9;"">
                  <th>Nombre Empresa</th>
                  <th>Tipo</th>
                  <th>Skype</th>
                  <th>Sitio Web</th>
                  <th>Fecha Registro</th>
                  <th>Accione</th>
                </tr>
                </thead>
                <tbody id="tablaEmpresas">
                <?php
                  foreach ($Empresa as $Empresa) {
                    if ($Empresa->sitReg!='1') {
                      
                    }else{
                      echo '<tr>
                              <td align="left">
                                <a href="'.base_url().'cEmpresa/verEmpresa/'.$Empresa->idEmpresa.'">
                                '.$Empresa->NombreEmpresa.'</a>
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
                                <button class="btn btn-danger" id="btnEliminarEmpresa" name="btnRealizadaPersonas" value="'.$Empresa->idEmpresa.'"><i class="fa fa-trash"></i></button>
                                <button class="btn btn-warning " id="btnEliminarPersona" name="btnRealizadaPersonas" value="'.$Persona->idPersona.'"><i class="fa fa-edit"></i></button>

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

<!-- Modal -->
<div id="ModalPersona" class="modal modal-success fade" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">El status de la persona será marcado como Inactivo</h4>
      </div>
      <div class="modal-body">
        <div class="row">
        <div class="col-md-12">
        <label>Cual Fue la razón?</label>
          <textarea id="StatusFinal" class="col-md-12 text-black form-control"></textarea>
        </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>

<!-- Modal -->
<div id="ModalEmpresa" class="modal modal-success fade" role="dialog">
  <div class="modal-dialog">
     <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">El status de la empresa será marcado como Inactivo</h4>
      </div>
      <div class="modal-body">
        <div class="row">
        <div class="col-md-12">
        <label>Cual Fue la razón?</label>
          <textarea id="StatusFinalE" class="col-md-12 text-black"></textarea>
        </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>



     <!--    <div class="col-md-6">
        <span> -->
        <!-- Empresas -->
          
       <!--  </span>
        <div class="box box-primary box-listasE">
          <ul id="listaEmpresas">
          </ul>
        </div>
        </div>

        <div class="col-md-6">
          <span> -->
          <!-- Personas -->
         <!--    
          </span>
          <div class="box box-success box-listasP">
            <ul id="listaPersonas"> 
            </ul>
          </div>
        </div> -->
        

      </div>
    </section>
  <script type="text/javascript">
  var baseurl = "<?php echo base_url();?>";
</script>