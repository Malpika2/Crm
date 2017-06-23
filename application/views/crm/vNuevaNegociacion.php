    <section class="content-header">
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url();?>cInicio"><i class="fa fa-map-signs"></i>Inicio</a></li>
        <li class="active">Nueva Negociación</li>
      </ol>
    </section>

    <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12 text-center">
          <h2>Crear una nueva negociación</h2>
        </div>
        <div class="col-md-12 divsNP">
              <div class="input-group">
                <span class="input-group-addon"><b>Nombre de la negociación</b></span>
                <input type="text" class="form-control formsNP" id="NombreNegociacion" name="NombreNegociacion">
              </div>
        </div>
        <div class="col-md-6 divsNP">
              <div class="input-group">
                <span class="input-group-addon"><b>¿Con quien es la negociación?</b></span>
                <select class=" form-control formsNP selectpicker" id="PersonaNegociacion" name="PersonaNegociacion">
                  <option selected="true" disabled="true">Empresa/Persona</option>
                  <option value="persona">persona1</option>
                  <option value="empresa">empresa1</option>
              </select>              
              </div>
        </div>
        <div class="col-md-6 divsNP">
              <div class="input-group">
                <span class="input-group-addon"><b>Persona de contacto</b></span>
                <select class=" form-control formsNP selectpicker" id="PersonaContacto" name="PersonaContacto">
                  <option selected="true" disabled="true">Persona_Contacto/Representante</option>
                  <option value="persona">Contacto1</option>
                  <option value="empresa">Representante1</option>
              </select>              
              </div>
        </div>
        <div class="col-md-6 divsNP">
              <div class="input-group">
                <span class="input-group-addon"><b>Motivo</b></span>
                <input type="text" class="form-control formsNP" id="Motivo" name="Motivo">
              </div>
        </div>
        <div class="col-md-3 divsNP">
              <div class="input-group">
                <span class="input-group-addon"><b>Prioridad</b></span>
                <select class=" form-control formsNP selectpicker" id="Prioridad" name="Prioridad">
                  <option selected="true" disabled="true">Prioridad</option>
                  <option value="1">1</option>
                  <option value="2">2</option>
                  <option value="3">3</option>
              </select>              
              </div>
        </div>
                <div class="col-md-3 divsNP">
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
        <div class="col-md-6 divsNP">
              <div class="input-group">
                <span class="input-group-addon"><b>Persona a cargo</b></span>
                <select class=" form-control formsNP selectpicker" id="PersonaCargo" name="PersonaCargo">
                  <option selected="true" disabled="true">Usuario</option>
                  <option value="Us">Usuario1</option>
                </select>              
              </div>
        </div>
        <div class="col-md-6 divsNP">
              <div class="input-group">
                <span class="input-group-addon"><b>Fecha limite aproximada</b></span>
                <div class="input-group date">
                  <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                  </div>
                  <input type="text" class="form-control pull-right" id="datepicker">
                </div>
                </div>
        </div>
        <div class="col-md-12 divsNP">
              <div class="input-group">
                <span class="input-group-addon"><b>Detalles</b></span>
                <textarea class="form-control formsNP" id="Motivo" name="Motivo"></textarea>
              </div>
              <input type="submit" name="registrarPersona" class="divsNP formsNP btn btn-primary btn-block" value="Registrar Negociación">

        </div>
      </div>

      </div>
    </section>