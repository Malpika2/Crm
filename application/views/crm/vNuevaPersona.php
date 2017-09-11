<style type="text/css">
.select2 {
  display: initial;
}
.easy-autocomplete {
  position: relative;
  display: contents;
}
  #tablaRegistroPersonas td,
#tablaRegistroPersonas th {
  border: 2px solid #e0e0e0;
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
                <button class="btn btn-app pull-left" onclick="limpiarFormularioPersona()">
                  <i class="glyphicon glyphicon-erase"></i>Limpiar
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
                        <span class="">Nombre Completo</span>
                        <input type="text" class="form-control " id="Nombre" name="Nombre" placeholder="Nombre(s) Apellidos" required="true">
                      </td>
                      <td>
                        <span class="">Puesto</span>
                        <input type="text" class="form-control" id="Puesto" name="Puesto">
                      </td>
                    </tr>
                    <tr>
                      <td>
                        <span class="">Tipo de Persona</span>
                        <select class="form-control selectpicker" title="Tipo de Persona..." id="Cargo" name="Cargo" required="true">
                          <option value="Contacto">Contacto</option>
                          <option value="Representante">Representante</option>
                        </select>
                      </td>
                      <td>
                        <span>Pais</span>
                        <input type="text" class="form-control" id="Pais" name="Pais" placeholder="Pais:" required="true">
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
                        <select class="form-control" id="InteresPersona" name="InteresPersona" required="true">
                          <option selected="true" value="Bajo">Bajo</option>
                          <option value="Medio">Medio</option>
                          <option value="Alto">Alto</option>
                        </select>
                      </td>
                      <td>
                        <span class="">Nivel de Confianza</span>
                        <select class="form-control" id="ConfianzaPersona" name="ConfianzaPersona" required="true">
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
                        <span class=""><b>1º Telefono</b></span>
                        <input type="text" class=" form-control" id="Telefono1" name="Telefono1" required="true">
                      </td>
                      <td>
                        <span class="">2º Telefono</span>
                        <input type="text" class="form-control " id="Telefono2" name="Telefono2">
                      </td>
                    </tr>
                    <tr>
                      <td>
                        <span class="">1º Email</span>
                        <input type="text" class="form-control" id="Correo1" name="Correo1" required="true">
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
                        <input type="submit" name="registrarPersona" class=" btn btn-success col-md-8" value="Registrar Persona" style="border-radius: 10px;">
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
</script>