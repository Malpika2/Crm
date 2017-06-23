    <section class="content-header">
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url();?>cInicio"><i class="fa fa-map-signs"></i>Inicio</a></li>
        <li class="active">Registrar Persona</li>
      </ol>
    </section>
    <!-- Main content -->
    <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12 text-center">
          <h2>Registrar persona<small> ó <a href="<?php echo base_url();?>cContactos/nuevaEmpresa">Registrar Empresa</a></small></h2>
        </div>
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
        <div class="col-md-3 divsNP">
              <div class="input-group">
                <span class="input-group-addon"><b>Cargo</b></span>
                <select class=" form-control formsNP selectpicker" title="Selecciona un cargo..." id="Cargo" name="Cargo">
                  <option value="Contacto">Contacto</option>
                  <option value="Representante">Representante</option>
                </select>
              </div>
        </div>
        <div class="col-md-3 divsNP">
              <div class="input-group">
                <span class="input-group-addon"><b>Empresa</b></span>
                <select class=" form-control formsNP selectpicker" title="Empresa..." id="Empresa" name="Empresa">
                  <option value="Contacto">Empresa1</option>
                  <option value="Representante">Empresa2</option>
                </select>
              </div>
        </div>
        <div class="col-md-3 divsNP">
              <div class="input-group">
                <span class="input-group-addon"><b>Telefono</b></span>
                <input type="text" class="form-control formsNP" id="Telefono" name="Telefono">
                <select class=" form-control formsNP selectpicker" id="TipoTelefono" name="TipoTelefono">
                  <option selected="true" disabled="true">Tipo</option>
                  <option value="Contacto">Trabajo</option>
                  <option value="Representante">Personal</option>
              </select>
              </div>
        </div>
        <div class="col-md-3 divsNP text-center">
          aqui se mostraran los telefonos ingresados
        </div>
        <div class="col-md-3 divsNP">
              <div class="input-group">
                <span class="input-group-addon"><b>Email</b></span>
                <input type="text" class="form-control formsNP" id="Correo" name="Correo">
                <select class=" form-control formsNP selectpicker" id="TipoCorreo" name="TipoCorreo">
                  <option selected="true" disabled="true">Tipo</option>
                  <option value="Contacto">Trabajo</option>
                  <option value="Representante">Personal</option>
              </select>
              </div>
        </div>
        <div class="col-md-3 divsNP text-center">
          aqui se mostraran los correos ingresados
        </div>
        <div class="col-md-7 divsNP">
              <div class="input-group">
                <span class="input-group-addon"><b>Skype</b></span>
                <input type="text" class="form-control formsNP" id="Skype" name="Skype">
              </div>
        </div>

        <div class="col-md-5 divsNP">
              <div class="input-group">
                <span class="input-group-addon"><b>Status</b></span>
                <select class=" form-control formsNP selectpicker" id="Status" name="Status">
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
</div>

      </div>
    </section>