<style type="text/css">
.select2-container--default .select2-selection--single, .select2-selection .select2-selection--single {
  border-color: red;
}
.easy-autocomplete {
  position: relative;
  display: contents;
}
#tablaRegistroPersonas td,
#tablaRegistroPersonas th {
  border: 2px solid #e0e0e0;
  width: 50%;
}
</style>    
    <!-- Main content -->
    <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12 text-center">
          <div class="nav-tabs-custom" style="margin-bottom: 0px;">
            <div class="text-center bg-white" style="padding: 1px; margin: 10px 15px 0px 15px; border-radius: 20px">
             <ul class="nav nav-tabs">
              <li class="col-md-3">
                <a class="btn text-center" href="<?php echo base_url();?>cEmpresa" style="border-radius: 10px; margin-bottom: 3px;">
                  &nbsp;Registrar Empresas
                </a>
              </li>
              <li class="active col-md-3 text-center">
                <a class="btn" href="#tab_Personas" data-toggle="tab" style="border-radius: 10px; margin-bottom: 3px;">
                    &nbsp;Registrar Personas
                </a>
              </li>

            </ul>          
            </div>
            <div class="tab-content">
              <div class="tab-pane active" id="tab_Personas">
               <button type="button" class="btn btn-default btn-sm pull-right" onclick="limpiarFormularioPersona()" style="border-radius: 10px">
                  <i class="glyphicon glyphicon-erase"></i>Limpiar Campos
                </button> 
                <form id="formPersona" method="POST" action="<?php echo base_url();?>cPersona/guardar">
                <table class="table table-responsive table-bordered" id="tablaRegistroPersonas">
                  <thead>
                    <tr style="background-color: #F0AD4E; color: white;">
                      <th colspan="2" class="text-center"><b>Información General</b></th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>
                        <span class="col-md-4">Nombre Completo</span>
                        <div id="mensaje_validar_persona" class="alert-danger hidden col-md-8">Persona Registrada Previamente</div>
                        <input onchange="Validar_Nueva_Persona()" type="text" class="form-control " id="Nombre" name="Nombre" placeholder="Nombre(s) Apellidos" required="true" style="border-color: red">
                      </td>
                      <td>
                        <span class="">Puesto</span>
                        <input type="text" class="form-control" id="Puesto" name="Puesto">
                      </td>
                    </tr>
                    <tr>
                      <td>
                        <span class="">Tipo de Persona</span>
                        <select class="form-control selectpicker" title="Tipo de Persona..." id="Cargo" name="Cargo" required="true" style="border-color: red;">
                          <option value="Contacto">Contacto</option>
                          <option value="Representante">Representante</option>
                        </select>
                      </td>
                      <td>
                        <span>Pais</span>
                        <select class="form-control selectpicker select2" id="Pais" name="Pais" required="true" onchange="cambiarLada()">
                        </select>
                      </td>
                    </tr>
                    <tr>
                      <td>
                        <span class="">Productos que maneja</span>
                        <textarea rows="2" cols="50" class="form-control" id="Productos" name="Productos" placeholder="Productos que maneja"></textarea>
                      </td>
                      <td>
                          <span class="">Propuesto por:</span>
                          <input type="text" class="form-control" id="PresupuestoPersona" name="PresupuestoPersona" placeholder="Persona que recomienda el registro">
                      </td>
                    </tr>
                    <tr>
                      <td>
                        <span class="">Nivel de Interés de la Persona</span>
                        <select class="form-control" id="InteresPersona" name="InteresPersona" required="true" style="border-color:red;">
                          <option selected="true" value="Bajo">Bajo</option>
                          <option value="Medio">Medio</option>
                          <option value="Alto">Alto</option>
                        </select>
                      </td>
                      <td>
                        <span class="">Nivel de Confianza</span>
                        <select class="form-control" id="ConfianzaPersona" name="ConfianzaPersona" required="true" style="border-color: red;">
                          <option selected="true" value="1">1 (Bajo)</option>
                          <option value="2">2</option>
                          <option value="3">3</option>
                          <option value="4">4</option>
                          <option value="5">5 (Alto)</option>
                        </select>
                      </td>
                    </tr>
                    <tr>
                      <td>
                        <span class="">Motivo o Razón</span>
                        <textarea rows="2" cols="50" class="form-control" id="Motivo" name="Motivo" placeholder="Motivo de Registro"></textarea>
                      </td>
                      <td>
                        <span class="">Contactado en</span>
                        <textarea rows="2" cols="50" class="form-control" id="LugarContacto" name="LugarContacto" placeholder="Lugar donde se realizó el contacto"></textarea>
                      </td>
                    </tr>
                    <tr>
                      <td colspan="2" style="background-color: #F0AD4E; color: white;">
                        <b>Datos de Contacto</b>
                      </td>
                    </tr>
                    <tr>
                      <td>
                        <span class="">Empresa</span>
                        <select class="form-control select2 selectpicker" title="Empresa..." id="Empresa" name="Empresa">
                          <option value="0">Sin Empresa</option>
                        </select>
                      </td>
                      <td>
                        <span class="">Skype</span>
                        <input type="text" class="form-control" id="Skype" name="Skype">
                      </td>
                    </tr>
                    <tr>
                      <td>
                        <span class="">1º Telefono</span>&nbsp;<i class="fa fa-info-circle" data-toggle="tooltip" title="Lada generada apartir de la seleccion del pais"></i>
                        <div class="input-group">
                          <div class="input-group-addon" style="padding: 0px 12px;">
                            <label id="ladaTel1"></label>
                            <input type="hidden" id="ladaTel1input" name="ladaTel1input" value="">
                          </div>                        
                          <input type="text" class="form-control" id="Telefono1" name="Telefono1"  style="height: 38px;">
                        <div class="input-group-addon" style="padding: 0px 0px;">
                            <select id="TipoTelefono1" name="TipoTelefono1" class="" data-minimum-results-for-search="Infinity">
                              <option value="Movil" selected="true">Movil</option>
                              <option value="Fijo">Fijo</option>
                            </select>
                          </div>
                        </div>
                      </td>
                      <td>
                        <span class="">2º Telefono</span>&nbsp;<i class="fa fa-info-circle" data-toggle="tooltip" title="Lada generada apartir de la seleccion del pais"></i>
                        <div class="input-group">
                          <div class="input-group-addon" style="padding: 0px 12px;">
                            <label id="ladaTel2"></label>
                            <input type="hidden" id="ladaTel2input" name="ladaTel2input" value="">
                          </div>                        
                        <input type="text" class="form-control " id="Telefono2" name="Telefono2" style="height: 38px;">
                        <div class="input-group-addon" style="padding: 0px 0px;">
                            <select id="TipoTelefono2" name="TipoTelefono2" class="" data-minimum-results-for-search="Infinity">
                              <option value="Movil" selected="true">Movil</option>
                              <option value="Fijo">Fijo</option>
                            </select>
                          </div>
                        </div>
                      </td>
                    </tr>
                    <tr>
                      <td>
                        <span class="">1º Email</span>
                        <input type="text" class="form-control" id="Correo1" name="Correo1" required="true" style="border-color: red;">
                      </td>
                      <td>
                        <span class="">2º Email</span>
                        <input type="text" class="form-control" id="Correo2" name="Correo2">
                      </td>
                    </tr>
                    <tr>
                      <td>
                        <span class="">Dirección</span>
                        <input type="text" class="form-control" id="Calle" name="Calle" placeholder="Ciudad, Calle, Número">
                        <input type="hidden" class="form-control col-md-4 formsNP2" id="Numero" name="Numero" placeholder="Número">
                        <input type="hidden" class="form-control col-md-4 formsNP2" id="Colonia" name="Colonia" placeholder="Colonia" value="">

                        <input type="hidden" class="form-control col-md-4 formsNP2" id="Municipio" name="Municipio" placeholder="Municipio" value="">
                        <input type="hidden" class="form-control col-md-6 formsNP2" id="Estado" name="Estado" placeholder="Ciudad">
                        <input type="hidden" class="form-control col-md-4 formsNP2" id="Cp" name="Cp" placeholder="C.P:">
                      </td>
                      <td>
                        <span>Datos Fiscales</span>
                        <textarea rows="2" cols="50" class="form-control col-md-12" id="DatosFiscalesPersona" name="DatosFiscalesPersona" placeholder="Información referente a la facturación"></textarea> 
                      </td>
                    </tr>
                    <tr>
                      <td colspan="2">
                      <span class="col-md-2"></span>
                        <input type="submit" id="registrarPersona" name="registrarPersona" class=" btn btn-success col-md-8" value="Registrar Persona" style="border-radius: 10px;" disabled>
                        <span class="col-md-2"></span>
                      </td>
                    </tr>
                  </tbody>
                </table>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>


<script type="text/javascript">
  var baseurl = "<?php echo base_url();?>";
  var idUsuarioActivo = "<?php echo $this->session->userdata('s_idUsuario'); ?>";
</script>