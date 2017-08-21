    <section class="content-header">
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url();?>cInicio"><i class="fa fa-map-signs"></i>Inicio</a></li>
        <li class="active">Registrar Empresa</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12 text-center">
          <button type="button" class="btn btn-app pull-left" onclick="limpiarFormularioEmpresa()">
            <i class="glyphicon glyphicon-erase"></i>Limpiar
          </button> 
          <h2>Registrar Empresa<small> ó <a href="<?php echo base_url();?>cPersona">Registrar persona</a></small></h2>
        </div>
        <form method="POST" action="<?php echo base_url();?>cEmpresa/guardar" id="formEmpresa">
        <div class="col-md-6">
            <div class="col-md-12 divsNP">
              <div class="input-group">
                <span class="input-group-addon"><b>Nombre Empresa</b></span>
                <input type="text" class="form-control formsNP" id="NombreEmpresa" name="NombreEmpresa">
              </div>
            </div>
            <div class="col-md-12 divsNP">
              <div class="input-group">
                <span class="input-group-addon"><b>SPP<br><small>(Opcional)</small></b></span>
                <input type="text" class="form-control formsNP" id="SPP" name="SPP">
              </div>
            </div>
            <div class="col-md-12 divsNP">
              <div class="input-group">
                <span class="input-group-addon"><b>Abreviación</b></span>
                <input type="text" class="form-control formsNP" id="Abreviacion" name="Abreviacion">
              </div>
            </div>
            <div class="col-md-12 divsNP">
              <div class="input-group">
                <span class="input-group-addon"><b>Tipo</b></span>
                <select class=" select2 form-control formsNP" id="Tipo" name="Tipo" required="">
                  <option selected="true" disabled="false" value="">Tipo</option>
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
                    <input type="text" class="form-control formsNP" id="Skype" name="Skype">
                  </div>
              </div>
              <div class="col-md-12 divsNP">
                    <div class="input-group">
                      <span class="input-group-addon"><b>Sitio Web</b></span>
                      <input type="text" class="form-control formsNP" id="SitioWeb" name="SitioWeb">
                    </div>
              </div>
              <div class="col-md-12 divsNP">
                    <div class="input-group">
                    <span class="input-group-addon"><b>Datos Fiscales</b></span>
                      <textarea rows="4" cols="50" class="form-control col-md-12" id="DatosFiscales" name="DatosFiscales" placeholder="Datos Fiscales"></textarea> 
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
                      <input type="text" class="col-md-12 form-control" id="RepresentanteEmp">
                      <input type="hidden" class="col-md-12 form-control" id="idRepresentanteEmp" name="idRepresentanteEmp" value="0">
                      <select class="hidden form-control formsNP selectpicker" id="Representante" name="Representante" required>
                        <option selected="true" disabled="true" value="0">Lista de Representantes</option>
                      </select>
                    </div>
                </div>
                <div class="col-md-12 divsNP">
                    <button style="padding: 0px" type="button" data-toggle="modal" data-target="#ModalNPersona" id="btnAgregarNuevoCont" class="btn col-md-2" data-toggle="tooltip" title="AGREGAR NUEVO"><i class="fa fa-plus-square fa-2x"></i></button>
                    <label class="col-md-8 h4 text-center">CONTACTO</label>
                    <button style="padding: 0px" type="button" id="btnBuscarExistenteCont" class="btn col-md-2" data-toggle="tooltip" title="BUSCAR EXISTENTE"><i class="fa fa-search fa-2x"></i></button>
                    <div class="input-group">
                      <span class="input-group-addon"><b>Contacto</b></span>
                      <select class="js-example-programmatic-multi select2 form-control" id="ContactoEmp" name="ContactoEmp[]" multiple="multiple" maximumSelectionLength="2">
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
                    <input type="text" class="form-control formsNP" id="Telefono1" name="Telefono1">
                    <input type="text" class="form-control text-center" disabled="true" name="" value="Personal">
                  </div>
                </div>
                <div class="col-md-6 divsNP">
                      <div class="input-group">
                        <span class="input-group-addon"><b>2º Telefono</b></span>
                        <input type="text" class="form-control formsNP" id="Telefono2" name="Telefono2">
                        <input type="text" class="form-control text-center" disabled="true" name="" value="Trabajo">
                      </div>
                </div>
                <div class="col-md-6 divsNP">
                      <div class="input-group">
                        <span class="input-group-addon"><b>1º Email</b></span>
                        <input type="text" class="form-control formsNP" id="Correo1" name="Correo1">
                        <input type="text" class="form-control text-center" disabled="true" name="" value="Personal">
                      </div>
                </div>
                <div class="col-md-6 divsNP">
                      <div class="input-group">
                        <span class="input-group-addon"><b>2º Email</b></span>
                        <input type="text" class="form-control formsNP" id="Correo2" name="Correo2">
                        <input type="text" class="form-control text-center" disabled="true" name="" value="Trabajo">
                      </div>
                </div>
            </div>
        </div>
        <div class="col-md-12 divsNP">
              <div class="input-group">
                <span class="input-group-addon"><b>Direccion</b></span>
                <input type="text" class="form-control col-md-12 formsNP2" id="DireccionOficina" name="DireccionOficina" placeholder="Direccion Oficina">
                <input type="text" class="form-control col-md-12 formsNP2" id="DireccionFiscal" name="DireccionFiscal" placeholder="Direccion Fiscal">

                <input type="text" class="form-control col-md-6 formsNP2" id="Ciudad" name="Ciudad" placeholder="Ciudad">
                <input type="text" class="form-control col-md-6 formsNP2" id="Pais" name="Pais" placeholder="Pais:">
              </div>
<!--               <div class="input-group">
                <span class="input-group-addon"><b>Direccion<br>Fiscal</b></span>
                <input type="text" class="col-md-8 formsNP2" id="Calle" name="Calle" placeholder="Calle">
                <input type="text" class="col-md-4 formsNP2" id="Numero" name="Numero" placeholder="Número">
                <input type="hidden" class="col-md-4 formsNP2" id="Colonia" name="Colonia" placeholder="Colonia" value="">
                <input type="hidden" class="col-md-4 formsNP2" id="Municipio" name="Municipio" placeholder="Municipio" value="">
                <input type="text" class="col-md-4 formsNP2" id="Estado" name="Estado" placeholder="Estado">
                <input type="text" class="col-md-4 formsNP2" id="Cp" name="Cp" placeholder="C.P:">
                <input type="text" class="col-md-4 formsNP2" id="Pais" name="Pais" placeholder="Pais:">
              </div> -->
              <input type="submit" name="registrarEmpresa" class="divsNP formsNP btn btn-primary btn-block" value="Registrar Empresa">
        </div>
        </form>
      </div>
      </div>
    </section>

<!-- Modal -->
<div id="ModalNPersona" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Registrar Empresa > Registrar Persona</h4>
      </div>
      <div class="modal-body">
      <div class="container-fluid">
      <div class="row">
        <div class="col-md-12 text-center">
          <button type="button" class="btn btn-app pull-left" onclick="limpiarFormularioPersona()">
            <i class="glyphicon glyphicon-erase"></i>Limpiar
          </button> 
          <h3>REGISTRAR PERSONA</h3>
        </div>
        <form id="formPersona" method="POST" action="<?php echo base_url();?>cPersona/guardar2">
        <div class="col-md-12 divsNP">
              <div class="input-group">
                <span class="input-group-addon"><b>Nombre Completo</b></span>
                <input type="text" class="form-control formsNP" id="Nombre" name="Nombre" placeholder="Nombre(s) Apellidos"/>
              </div>
        </div>
        <div class="col-md-6 divsNP">
              <div class="input-group">
                <span class="input-group-addon"><b>Cargo</b></span>
                <select class="form-control Cargo select2 formsNP" id="Cargo" name="Cargo">
                  <option selected="true" value="Representante">Representante</option>
                  <option selected="true" value="Contacto">Contacto</option>
                </select>
              </div>
        </div>
<!--         <div class="col-md-6 divsNP">
              <div class="input-group">
                <span class="input-group-addon"><b>Empresa</b></span>
                <select class="form-control select2 formsNP selectpicker" title="Empresa..." id="Empresa" name="Empresa">
                  <option value="0">Sin Empresa</option>
                </select>
              </div>
        </div> -->
        <div class="col-md-6 " style="padding: 0px;">
        <div class="col-md-12 divsNP">
              <div class="input-group">
                <span class="input-group-addon"><b>Puesto</b></span>
                <input type="text" class="form-control Puesto formsNP" id="Puesto" name="Puesto">
              </div>
        </div>
<!--         <div class="col-md-6 divsNP">
              <div class="input-group">
                <span class="input-group-addon"><b>Status</b></span>
                <select class=" Status form-control select2 formsNP selectpicker" id="Status" name="Status">
                  <option selected="true" disabled="true">Status</option>
                  <option value="Avanzado">Avanzado</option>
                  <option value="Cancelado">Cancelado</option>
                  <option value="En proceso">En proceso</option>
                  <option value="Incorporado">Incorporado</option>
                  <option value="No iniciado">No iniciado</option>
                  <option value="Suspendido">Suspendido</option>
                  <option value="Interes sin compromiso">Interes sin compromiso</option>
                  <option value="Interes en participar confirmado">Interes en participar confirmado</option>
              </select>              
              </div>
        </div> -->
        </div>
        <div class="col-md-3 divsNP">
              <div class="input-group">
                <span class="input-group-addon"><b>1º Telefono</b></span>
                <input type="text" class="form-control Telefono1 formsNP" id="Telefono1" name="Telefono1">
                <input type="text" class="form-control form-control formsNP text-center" disabled="true" name="" value="Personal">

              </div>
        </div>
        <div class="col-md-3 divsNP">
              <div class="input-group">
                <span class="input-group-addon"><b>2º Telefono</b></span>
                <input type="text" class="form-control Telefono2  formsNP" id="Telefono2" name="Telefono2">
                <input type="text" class="form-control formsNP text-center" disabled="true" name="" value="Trabajo">

              </div>
        </div>
        <div class="col-md-3 divsNP">
              <div class="input-group">
                <span class="input-group-addon"><b>1º Email</b></span>
                <input type="text" class="Correo1 form-control formsNP" id="Correo1" name="Correo1">
                <input type="text" class="form-control formsNP text-center" disabled="true" name="" value="Personal">
              </div>
        </div>
        <div class="col-md-3 divsNP">
              <div class="input-group">
                <span class="input-group-addon"><b>2º Email</b></span>
                <input type="text" class="Correo2 form-control formsNP" id="Correo2" name="Correo2">
                <input type="text" class="form-control formsNP text-center" disabled="true" name="" value="Trabajo">
              </div>
        </div>
        <div class="col-md-12 divsNP">
              <div class="input-group">
                <span class="input-group-addon"><b>Skype</b></span>
                <input type="text" class="form-control formsNP" id="Skype" name="Skype">
              </div>
        </div>
        <div class="col-md-12 divsNP">
              <div class="input-group">
                <span class="input-group-addon"><b>Direccion</b></span>
                <input type="text" class=" form-control Calle col-md-12 formsNP2" id="Calle" name="Calle" placeholder="Dirección">
                <input type="hidden" class="form-control col-md-4 formsNP2" id="Numero" name="Numero" placeholder="Número">
                <input type="hidden" class="form-control col-md-4 formsNP2" id="Colonia" name="Colonia" placeholder="Colonia" value="">

                <input type="hidden" class="form-control col-md-4 formsNP2" id="Municipio" name="Municipio" placeholder="Municipio" value="">
                <input type="text" class=" form-control col-md-6 formsNP2" id="Estado" name="Estado" placeholder="Ciudad">
                <input type="hidden" class="form-control col-md-4 formsNP2" id="Cp" name="Cp" placeholder="C.P:">
                <input type="text" class=" form-control Pais col-md-6 formsNP2" id="Pais" name="Pais" placeholder="Pais:">
              </div>
              <input type="submit" id="registrarPersona" name="registrarPersona" class="divsNP formsNP btn btn-primary btn-block" value="Registrar Persona">
        </div>
        </form>
        </div> <!-- row -->
      </div>
      </div><!--  modal-bod7 -->
      <div class="modal-footer">
        <button id="btnCerrarModal" type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<script type="text/javascript">
  var baseurl = "<?php echo base_url();?>";
</script>