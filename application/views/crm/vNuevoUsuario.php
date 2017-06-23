    <section class="content-header">
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url();?>cInicio"><i class="fa fa-map-signs"></i>Inicio</a></li>
        <li class="active">Registrar Usuario</li>
      </ol>
    </section>
    <!-- Main content -->
    <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12 text-center">
          <h2>Registrar Usuario</h2>
        </div>
        <form method="POST" action="<?php echo base_url();?>cUsuario/guardar"></form>
        <div class="col-md-6 divsNP">
              <div class="input-group">
                <span class="input-group-addon"><b>Nombre</b></span>
                <input type="text" class="form-control formsNP" id="Nombre" name="Nombre">
              </div>
        </div>
        <div class="col-md-6 divsNP">
              <div class="input-group">
                <span class="input-group-addon"><b>Apellido Paterno</b></span>
                <input type="text" class="form-control formsNP" id="ApPaterno" name="ApPaterno">
              </div>
        </div>
        <div class="col-md-6 divsNP">
              <div class="input-group">
                <span class="input-group-addon"><b>Apellido Materno</b></span>
                <input type="text" class="form-control formsNP" id="ApMaterno" name="ApMaterno">
              </div>
        </div>
        <div class="col-md-6 divsNP">
              <div class="input-group">
                <span class="input-group-addon"><b>Puesto</b></span>
                <select class=" form-control formsNP selectpicker" title="Selecciona un Puesto..." id="Puesto" name="Puesto">
                  <option value="Contacto">Administrador</option>
                  <option value="Representante">Encargado</option>
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
                <input type="text" class="form-control formsNP" id="Telefono2" name="Telefono">
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
        <div class="col-md-12 divsNP">
              <div class="input-group">
                <span class="input-group-addon"><b>Skype</b></span>
                <input type="text" class="form-control formsNP" id="Skype" name="Skype">
              </div>
        </div>
        <div class="col-md-12 divsNP">
              <div class="input-group">
                <span class="input-group-addon"><b>Direccion</b></span>
                <input type="text" class="col-md-5 formsNP2" id="Calle" name="Calle" placeholder="Calle">
                <input type="text" class="col-md-3 formsNP2" id="Numero" name="Numero" placeholder="Número">
                <input type="text" class="col-md-4 formsNP2" id="Colonia" name="Colonia" placeholder="Colonia">

                <input type="text" class="col-md-4 formsNP2" id="Municipio" name="Municipio" placeholder="Municipio">
                <input type="text" class="col-md-3 formsNP2" id="Estado" name="Estado" placeholder="Estado">
                <input type="text" class="col-md-2 formsNP2" id="Cp" name="Cp" placeholder="C.P:">
                <input type="text" class="col-md-3 formsNP2" id="Pais" name="Pais" placeholder="Pais:">
              </div>
              <input type="submit" name="registrarPersona" class="divsNP formsNP btn btn-primary btn-block" value="Registrar Persona">
        </div>
        </form>
</div>

      </div>
    </section>