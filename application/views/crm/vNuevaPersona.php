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
          <button class="btn btn-app pull-left" onclick="limpiarFormularioPersona()">
            <i class="glyphicon glyphicon-erase"></i>Limpiar
          </button> 
          <h2>Registrar persona<small> ó <a href="<?php echo base_url();?>cEmpresa">Registrar Empresa</a></small></h2>
        </div>
        <form id="formPersona" method="POST" action="<?php echo base_url();?>cPersona/guardar">
        <div class="col-md-12 divsNP">
              <div class="input-group">
                <span class="input-group-addon"><b>Nombre Completo</b></span>
                <input type="text" class="formsNP" id="Nombre" name="Nombre" placeholder="Nombre(s) Apellidos">
              </div>
        </div>
<!--         <div class="col-md-6 divsNP">
              <div class="input-group">
                <span class="input-group-addon"><b>Apellido Paterno</b></span>
                <input type="hidden" class="formsNP" id="ApPaterno" name="ApPaterno">
              </div>
        </div> -->
<!--         <div class="col-md-6 divsNP">
              <div class="input-group">
                <span class="input-group-addon"><b>Apellido Materno</b></span>
                <input type="hidden" class="formsNP" id="ApMaterno" name="ApMaterno">
              </div>
        </div> -->
        <div class="col-md-6 divsNP">
              <div class="input-group">
                <span class="input-group-addon"><b>Cargo</b></span>
                <select class="form-control select2 formsNP selectpicker" title="Selecciona un cargo..." id="Cargo" name="Cargo">
                  <option value="Contacto">Contacto</option>
                  <option value="Representante">Representante</option>
                </select>
              </div>
        </div>
        <div class="col-md-6 divsNP">
            <div class="input-group">
              <span class="input-group-addon"><b>Puesto</b></span>
              <input type="text" class=" formsNP" id="Puesto" name="Puesto">
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
        <!-- <div class="col-md-12 " style="padding: 0px;"> -->
<!--         <div class="col-md-6 divsNP">
              <div class="input-group">
                <span class="input-group-addon"><b>Status</b></span>
                <select class="form-control select2 formsNP selectpicker" id="Status" name="Status">
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
        <!-- </div> -->
        <div class="col-md-3 divsNP">
              <div class="input-group">
                <span class="input-group-addon"><b>1º Telefono</b></span>
                <input type="text" class="formsNP" id="Telefono1" name="Telefono1">
                <input type="text" class="text-center formsNP" disabled="true" name="" value="Personal">
              </div>
        </div>
        <div class="col-md-3 divsNP">
              <div class="input-group">
                <span class="input-group-addon"><b>2º Telefono</b></span>
                <input type="text" class=" formsNP" id="Telefono2" name="Telefono2">
                <input type="text" class="text-center formsNP" disabled="true" name="" value="Trabajo">
              </div>
        </div>
        <div class="col-md-3 divsNP">
              <div class="input-group">
                <span class="input-group-addon"><b>1º Email</b></span>
                <input type="text" class="form-control formsNP" id="Correo1" name="Correo1">
                <input type="text" class="text-center formsNP" disabled="true" name="" value="Personal">
              </div>
        </div>
        <div class="col-md-3 divsNP">
              <div class="input-group">
                <span class="input-group-addon"><b>2º Email</b></span>
                <input type="text" class="form-control formsNP" id="Correo2" name="Correo2">
                <input type="text" class="text-center formsNP" disabled="true" name="" value="Trabajo">
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
                <input type="text" class="col-md-12 formsNP2" id="Calle" name="Calle" placeholder="Dirección">
                <input type="hidden" class="col-md-4 formsNP2" id="Numero" name="Numero" placeholder="Número">
                <input type="hidden" class="col-md-4 formsNP2" id="Colonia" name="Colonia" placeholder="Colonia" value="">

                <input type="hidden" class="col-md-4 formsNP2" id="Municipio" name="Municipio" placeholder="Municipio" value="">
                <input type="text" class="col-md-6 formsNP2" id="Estado" name="Estado" placeholder="Ciudad">
                <input type="hidden" class="col-md-4 formsNP2" id="Cp" name="Cp" placeholder="C.P:">
                <input type="text" class="col-md-6 formsNP2" id="Pais" name="Pais" placeholder="Pais:">
              </div>
              <input type="submit" name="registrarPersona" class="divsNP formsNP btn btn-primary btn-block" value="Registrar Persona">
        </div>
        </form>
        </div>
      </div>
    </section>
<script type="text/javascript">
  var baseurl = "<?php echo base_url();?>";
</script>