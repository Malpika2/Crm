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
                    $NombrePersona=$Persona->Nombre;
                    if ($Persona->Status=='Inactivo') {
                      
                    }else{
                      echo '<tr>
                              <td align="left">
                              <a class="" href="'.base_url().'cPersona/verPersona/'.$Persona->idPersona.'">
                                '.$Persona->Nombre.'
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
                                <button class="btn btn-danger" id="btnEliminarPersona" name="btnEliminarPersona" value="'.$Persona->idPersona.'"><i class="fa fa-trash"></i></button>
                                <a href='.base_url().'cPersona/verPersona/'.$Persona->idPersona.'><button class="btn btn-warning " id="" name="" value="'.$Persona->idPersona.'"><i class="fa fa-search"></i></button></a>

                               <!-- <button data-toggle="modal" data-target="#ModalEditarPersona" class="btn btn-warning" id="btnEditarPersona" onClick="MostrarModalEditarP(\''.$Persona->idPersona.'\',\''.$NombrePersona.'\',\''.$Persona->Cargo.'\',\''.$Persona->Puesto.'\',\''.$Persona->Telefono1.'\',\''.$Persona->Telefono2.'\',\''.$Persona->Correo1.'\',\''.$Persona->Correo2.'\',\''.$Persona->Skype.'\',\''.$Persona->Direccion.'\',\''.$Persona->Ciudad.'\',\''.$Persona->Pais.'\')" name="btnEditarPersona" value="'.$Persona->idPersona.'"><i class="fa fa-edit"></i></button> -->
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
          </div><!-- // fin Personas -->
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
                                <button class="btn btn-danger" id="btnEliminarEmpresa" name="btnEliminarEmpresa" value="'.$Empresa->idEmpresa.'"><i class="fa fa-trash"></i></button>
                                <a href='.base_url().'cEmpresa/verEmpresa/'.$Empresa->idEmpresa.'><button class="btn btn-warning " id="" name="" value="'.$Empresa->idEmpresa.'"><i class="fa fa-search"></i></button></a>

                               <!-- <button class="btn btn-warning " id="btnActualizarEmpresa" name="btnActualizarEmpresa" value="'.$Empresa->idEmpresa.'"><i class="fa fa-edit"></i></button> -->

                               <!-- <button onClick="MostrarModalEditarEmp('.$Empresa->idEmpresa.');" data-toggle="modal" data-target="#ModalEditarEmpresa" class="btn btn-info" id="btnEditarEmpresa" name="btnActualizarEmpresa" value="'.$Empresa->idEmpresa.'"><i class="fa fa-edit"></i></button> -->

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


<!-- Modal -->
<div id="ModalEditarPersona" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Editar Persona</h4>
      </div>
      <div class="modal-body">
      <div class="container-fluid">
      <div class="row">
        <div class="col-md-12 text-center">
          <h3>EDITAR PERSONA</h3>
        </div>
        <form id="formPersona" method="POST" action="<?php echo base_url();?>cPersona/guardar2">
        <div class="col-md-12 divsNP">
              <div class="input-group">
                <span class="input-group-addon"><b>Nombre Completo</b></span>
                <input type="text" class="form-control formsNP" id="mNombrePersona" name="mNombrePersona" value="" style="border:1px solid #d2d6de;" disabled />
              </div>
        </div>
        <div class="col-md-6 divsNP">
              <div class="input-group">
                <span class="input-group-addon"><b>Cargo</b></span>
                <select class="form-control formsNP" id="mCargo" name="mCargo" required>
                  <option value="Representante">Representante</option>
                  <option value="Contacto">Contacto</option>
                </select>
              </div>
        </div>
        <div class="col-md-6 " style="padding: 0px;">
        <div class="col-md-12 divsNP">
              <div class="input-group">
                <span class="input-group-addon"><b>Puesto</b></span>
                <input type="text" class="form-control Puesto  formsNP" id="mPuesto" name="mPuesto" value="">
              </div>
        </div>
        </div>
        <div class="col-md-3 divsNP">
              <div class="input-group">
                <span class="input-group-addon"><b>1º Telefono</b></span>
                <input type="text" class="form-control Telefono1 formsNP" id="mTelefono1" name="mTelefono1" value="">
                <input type="text" class="form-control formsNP text-center" disabled="true" name="" value="Personal">

              </div>
        </div>
        <div class="col-md-3 divsNP">
              <div class="input-group">
                <span class="input-group-addon"><b>2º Telefono</b></span>
                <input type="text" class="form-control Telefono2  formsNP" id="mTelefono2" name="mTelefono2" value="">
                <input type="text" class="form-control formsNP text-center" disabled="true" name="" value="Trabajo">

              </div>
        </div>
        <div class="col-md-3 divsNP">
              <div class="input-group">
                <span class="input-group-addon"><b>1º Email</b></span>
                <input type="text" class="Correo1 form-control formsNP" id="mCorreo1" name="mCorreo1" value="">
                <input type="text" class="form-control formsNP text-center" disabled="true" name="" value="Personal">
              </div>
        </div>
        <div class="col-md-3 divsNP">
              <div class="input-group">
                <span class="input-group-addon"><b>2º Email</b></span>
                <input type="text" class="Correo2 form-control formsNP" id="mCorreo2" name="mCorreo2" value="">
                <input type="text" class="form-control formsNP text-center" disabled="true" name="" value="Trabajo">
              </div>
        </div>
        <div class="col-md-12 divsNP">
              <div class="input-group">
                <span class="input-group-addon"><b>Skype</b></span>
                <input type="text" class="form-control formsNP" id="mSkype" name="mSkype" value="">
              </div>
        </div>
        <div class="col-md-12 divsNP">
              <div class="input-group">
                <span class="input-group-addon"><b>Direccion</b></span>
                <input type="text" class="form-control Calle col-md-12 formsNP2" id="mDireccion" name="mDireccion" value="">
                <input type="text" class="form-control col-md-6 formsNP2" id="mEstado" name="mEstado" value="">
                <input type="text" class="form-control Pais col-md-6 formsNP2" id="mPais" name="mPais" value="" >
                <input type="hidden" id="idPersona" name="idPersona" value="">
              </div>
              <input onclick="GuardarEditPersona();" type="submit" id="btn_GuardarEditarP" class="divsNP formsNP btn btn-primary btn-block" value="Guardar cambios" data-dismiss="modal">
        </div>
        </form>
        </div> <!-- row -->
      </div>
      </div><!--  modal-bod7 -->
      <div class="modal-footer">
        <button id="btnCerrarModal" type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
      </div>
    </div>
  </div>
</div>



<div id="ModalEditarEmpresa" class="modal modal-default fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content modal-lg">
        <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Editar Empresa</h4>
        </div>
        <div class="modal-body">
          <div class="container-fluid">
              <div class="row">
                  <div class="col-md-6">
                    <div class="col-md-12 divsNP">
                      <div class="input-group">
                        <span class="input-group-addon"><b>Nombre Empresa</b></span>
                        <input class="form-control" type="text" class="formsNP" id="NombreEmpresa" name="NombreEmpresa" style="border:1px solid #d2d6de;" value="" disabled>
                      </div>
                    </div>
                    <div class="col-md-12 divsNP">
                      <div class="input-group">
                        <span class="input-group-addon"><b>SPP<br><small>(Opcional)</small></b></span>
                        <input type="text" class="form-control formsNP" id="SPP" name="SPP" value="">
                      </div>
                    </div>
                    <div class="col-md-12 divsNP">
                      <div class="input-group">
                        <span class="input-group-addon"><b>Abreviación</b></span>
                        <input type="text" class="form-control formsNP" id="Abreviacion" name="Abreviacion" value="">
                      </div>
                    </div>
                    <div class="col-md-12 divsNP">
                      <div class="input-group">
                        <span class="input-group-addon"><b>Tipo</b></span>
                        <select class=" select2 form-control formsNP" id="Tipo" name="Tipo" required="">
                          <option selected value=""></option>
                          <option value="Comprador final">Comprador Final</option>
                          <option value="Intermediario">Intermediario</option>
                          <option value="Maquilador">Maquilador</option>
                          <option value="Organizador de Pequeños Productores">Organizador de Pequeños Productores</option>
                          <option value="Organismo de Certificacion">Organismo de Certificacion</option>
                      </select>              
                      </div>
                    </div>
                    <div class="col-md-12" style="margin: 0px; padding: 0px;">
                      <div class="col-md-12 divsNP">
                         <div class="input-group">
                          <span class="input-group-addon"><b>Skype</b></span>
                          <input type="text" class="form-control formsNP" id="Skype" name="Skype" value="" style="color:black;">
                        </div>
                      </div>
                      <div class="col-md-12 divsNP">
                        <div class="input-group">
                          <span class="input-group-addon"><b>Sitio Web</b></span>
                          <input type="text" class="form-control formsNP" id="SitioWeb" name="SitioWeb" value="">
                        </div>
                      </div>
                      <div class="col-md-12 divsNP">
                        <div class="input-group">
                        <span class="input-group-addon"><b>Datos Fiscales</b></span>
                          <textarea type="text" class="form-control col-md-12 formsNP2" id="DatosFiscales" name="DatosFiscales" style="color:black;" value=""></textarea> 
                        </div>
                      </div>
                    </div>
                </div><!--fincol-md-12 -->

                <div class="col-md-6">
                    <div class="col-md-12 divsNP" style="border:.5px solid #d2d6de; padding-bottom: 1em;">
                        <div class="col-md-12 divsNP">
                            <button style="padding: 0px" type="button" data-toggle="modal" data-target="#ModalNPersona" id="btnAgregarNuevo" class="btn col-md-2" data-toggle="tooltip" title="AGREGAR NUEVO"><i class="fa fa-plus-square fa-2x"></i></button>
                            <label class="col-md-8 h4 text-center">REPRESENTANTE</label>
                            <button style="padding: 0px" type="button" id="btnBuscarExistente" class="btn col-md-2" data-toggle="tooltip" title="BUSCAR EXISTENTE"><i class="fa fa-search fa-2x"></i></button>
                        </div>
                        <div class="col-md-12 divsNP">
                            <div class="input-group">
                               <span class="input-group-addon">
                                <b>Representante</b></span>
                              <input type="text" class="col-md-12 form-control" id="RepresentanteEmp" autocomplete="off" value="">
                              <input type="hidden" class="col-md-12 form-control" id="idRepresentanteEmp" name="idRepresentanteEmp" value="">
                              <select class="hidden form-control formsNP selectpicker" id="Representante" name="Representante" required>
                                <option disabled="true" value="0">Lista de Representantes</option>
                              </select>
                            </div>
                        </div>
                        <div class="col-md-12 divsNP">
                            <button style="padding: 0px" type="button" data-toggle="modal" data-target="#ModalNPersona" id="btnAgregarNuevoCont" class="btn col-md-2" data-toggle="tooltip" title="AGREGAR NUEVO"><i class="fa fa-plus-square fa-2x"></i></button>
                            <label class="col-md-8 h4 text-center">CONTACTO</label>
                            <button style="padding: 0px" type="button" id="btnBuscarExistenteCont" class="btn col-md-2" data-toggle="tooltip" title="BUSCAR EXISTENTE"><i class="fa fa-search fa-2x"></i></button>
                            <div class="input-group" style="width: 100%">
                              <span class="input-group-addon"><b>Contacto</b></span>
                              <select class="js-example-programmatic-multi form-control select2" id="ContactoEmp" name="ContactoEmp[]" multiple="multiple" maximumSelectionLength="2">
                              </select>
                              <select class="hidden form-control formsNP js-example-programmatic-multi" id="Contacto" name="Contacto" required>
                                <option selected="true" disabled="true" value="0">Lista de Contactos</option>
                              </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="col-md-6 divsNP">
                          <div class="input-group">
                            <span class="input-group-addon"><b>1º Telefono</b></span>
                            <input type="text" class="form-control formsNP" id="Telefono1" name="Telefono1" value="">
                            <input type="text" class="form-control text-center" disabled="true" name="" value="Personal">
                          </div>
                        </div>
                        <div class="col-md-6 divsNP">
                              <div class="input-group">
                                <span class="input-group-addon"><b>2º Telefono</b></span>
                                <input type="text" class="form-control formsNP" id="Telefono2" name="Telefono2" value="">
                                <input type="text" class="form-control text-center" disabled="true" name="" value="Trabajo">
                              </div>
                        </div>
                        <div class="col-md-6 divsNP">
                              <div class="input-group">
                                <span class="input-group-addon"><b>1º Email</b></span>
                                <input type="text" class="form-control formsNP" id="Correo1" name="Correo1" value="">
                                <input type="text" class="form-control text-center" disabled="true" name="" value="Personal">
                              </div>
                        </div>
                        <div class="col-md-6 divsNP">
                              <div class="input-group">
                                <span class="input-group-addon"><b>2º Email</b></span>
                                <input type="text" class="form-control formsNP" id="Correo2" name="Correo2" value="">
                                <input type="text" class="form-control text-center" disabled="true" name="" value="Trabajo">
                              </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-12 divsNP">
                      <div class="input-group">
                        <span class="input-group-addon"><b>Direccion</b></span>
                        <input type="text" class="form-control col-md-12 formsNP2" id="DireccionOficina" name="DireccionOficina" placeholder="Direccion Oficina" 
                        value="">
                        <input type="text" class="form-control col-md-12 formsNP2" id="DireccionFiscal" name="DireccionFiscal" placeholder="Direccion Fiscal" value="">

                        <input type="text" class="form-control col-md-6 formsNP2" id="Ciudad" name="Ciudad" placeholder="Ciudad" value="">
                        <input type="text" class="form-control col-md-6 formsNP2" id="Pais" name="Pais" placeholder="Pais:" value="">
                        <input type="hidden" class="col-md-6 formsNP2" id="idEmpresa"  value="" style="color:black;">

                      </div>
                      <input onclick="GuardarEditEmpresa();" type="button" id="btn_GuardarEditar" class="divsNP formsNP btn btn-primary btn-block" value="Guardar" data-dismiss="modal">
                </div>
                      </div>
                  </div>
        </div> <!-- modal-body -->
    </div>
  </div>
</div>



  <script type="text/javascript">
  var baseurl = "<?php echo base_url();?>";
</script>