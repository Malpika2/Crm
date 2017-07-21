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
          <h2>Registrar Empresa<small> ó <a href="<?php echo base_url();?>cPersona">Registrar persona</a></small></h2>
        </div>
        <form method="POST" action="<?php echo base_url();?>cEmpresa/guardar">
        <div class="col-md-6 divsNP">
              <div class="input-group">
                <span class="input-group-addon"><b>Razón Social</b></span>
                <input type="text" class="form-control formsNP" id="RazonSocial" name="RazonSocial">
              </div>
        </div>

        <div class="col-md-6 divsNP">
              <div class="input-group">
                <span class="input-group-addon"><b>Tipo</b></span>
                <select class=" form-control formsNP selectpicker" id="Tipo" name="Tipo">
                  <option selected="true" disabled="true">Tipo</option>
                  <option value="Comprador final">Comprador Final</option>
                  <option value="Intermediario">Intermediario</option>
                  <option value="Maquilador">Maquilador</option>
                  <option value="Organizador de Pequeños Productores">Organizador de Pequeños Productores</option>
                  <option value="Organismo de Certificacion">Organismo de Certificacion</option>
              </select>              
              </div>
        </div>
        <div class="col-md-6 divsNP">
              <div class="input-group">
                <span class="input-group-addon"><b>Representante</b></span>
                <select class=" form-control formsNP" id="Representante" name="Representante">
                <option selected="true" disabled="true" value="0">Representante</option>
                </select>

              </div>
        </div>
        <div class="col-md-6 divsNP">
              <div class="input-group">
                <span class="input-group-addon"><b>Contacto</b></span>
                <select class=" form-control formsNP" id="Contacto" name="Contacto">
                <option selected="true" disabled="true" value="0">Contacto</option>
                </select>
              </div>
        </div>
        <div class="col-md-3 divsNP">
              <div class="input-group">
                <span class="input-group-addon"><b>1º Telefono</b></span>
                <input type="text" class="form-control formsNP" id="Telefono1" name="Telefono1">
                <select class=" form-control formsNP selectpicker" id="TipoTelefono1" name="TipoTelefono1">
                  <option selected="true" disabled="true">Tipo</option>
                  <option value="Trabajo">Trabajo</option>
                  <option value="Personal">Personal</option>
              </select>
              </div>
        </div>
        <div class="col-md-3 divsNP">
              <div class="input-group">
                <span class="input-group-addon"><b>2º Telefono</b></span>
                <input type="text" class="form-control formsNP" id="Telefono2" name="Telefono2">
                <select class=" form-control formsNP selectpicker" id="TipoTelefono2" name="TipoTelefono2">
                  <option selected="true" disabled="true">Tipo</option>
                  <option value="Trabajo">Trabajo</option>
                  <option value="Personal">Personal</option>
              </select>
              </div>
        </div>
        <div class="col-md-3 divsNP">
              <div class="input-group">
                <span class="input-group-addon"><b>1º Email</b></span>
                <input type="text" class="form-control formsNP" id="Correo1" name="Correo1">
                <select class=" form-control formsNP selectpicker" id="TipoCorreo1" name="TipoCorreo1">
                  <option selected="true" disabled="true">Tipo</option>
                  <option value="Trabajo">Trabajo</option>
                  <option value="Personal">Personal</option>
              </select>
              </div>
        </div>
        <div class="col-md-3 divsNP">
              <div class="input-group">
                <span class="input-group-addon"><b>2º Email</b></span>
                <input type="text" class="form-control formsNP" id="Correo2" name="Correo2">
                <select class=" form-control formsNP selectpicker" id="TipoCorreo2" name="TipoCorreo2">
                  <option selected="true" disabled="true">Tipo</option>
                  <option value="Trabajo">Trabajo</option>
                  <option value="Personal">Personal</option>
              </select>
              </div>
        </div>
        <div class="col-md-6 divsNP">
              <div class="input-group">
                <span class="input-group-addon"><b>Skype</b></span>
                <input type="text" class="form-control formsNP" id="Skype" name="Skype">
              </div>
        </div>
        <div class="col-md-6 divsNP">
              <div class="input-group">
                <span class="input-group-addon"><b>Sitio Web</b></span>
                <input type="text" class="form-control formsNP" id="SitioWeb" name="SitioWeb">
              </div>
        </div>
        <div class="col-md-12 divsNP">
              <div class="input-group">
                <span class="input-group-addon"><b>Direccion</b></span>
                <input type="text" class="col-md-8 formsNP2" id="Calle" name="Calle" placeholder="Calle">
                <input type="text" class="col-md-4 formsNP2" id="Numero" name="Numero" placeholder="Número">
                <input type="hidden" class="col-md-4 formsNP2" id="Colonia" name="Colonia" placeholder="Colonia" value="">
                <input type="hidden" class="col-md-4 formsNP2" id="Municipio" name="Municipio" placeholder="Municipio" value="">
                <input type="text" class="col-md-4 formsNP2" id="Estado" name="Estado" placeholder="Estado">
                <input type="text" class="col-md-4 formsNP2" id="Cp" name="Cp" placeholder="C.P:">
                <input type="text" class="col-md-4 formsNP2" id="Pais" name="Pais" placeholder="Pais:">
              </div>
              <input type="submit" name="registrarPersona" class="divsNP formsNP btn btn-primary btn-block" value="Registrar Empresa">
        </div>
        </form>
      </div>

      </div>
    </section>
<script type="text/javascript">
  var baseurl = "<?php echo base_url();?>";
</script>