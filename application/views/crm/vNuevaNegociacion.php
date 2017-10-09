    <section class="content-header">
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url();?>cInicio"><i class="fa fa-map-signs"></i>Inicio</a></li>
        <li class="active">Nuevo Objetivo</li>
      </ol>
    </section>

  <section class="content" style="padding-top: 4em">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <!-- Custom Tabs -->
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <li class="active col-md-3 text-center">
                <a class="btn" href="#tab_1" data-toggle="tab">
                  <i class="fa fa-briefcase fa-3x"></i><br>Empresa
                </a>
              </li>
              <li class="col-md-5 text-center"><h2>CREAR NUEVO OBJETIVO</h2></li>
              <li class="pull-right col-md-3">
                <a class="btn text-center" href="#tab_2" data-toggle="tab">
                  <i class="fa fa-user fa-3x "></i><br>Persona
                </a>
              </li>
            </ul>
            <div class="tab-content">
              <div class="tab-pane active" id="tab_1"> 
                <form method="POST" action="<?php echo base_url();?>cNegociacion/guardarEmpresa">
                  <div class="col-md-12 divsNP">
                    <div class="input-group">
                      <span class="input-group-addon"><b>Nombre del objetivo</b></span>
                      <input type="text" class="form-control formsNP" id="NombreNegociacion" name="NombreNegociacion" required>
                    </div>
                  </div>
                  <div class="col-md-6 divsNP">
                    <div class="input-group">
                      <span class="input-group-addon"><b>¿Con quien es el objetivo?</b></span>
                      <select class="select2 form-control formsNP selectpicker" id="EmpresaNegociacion" name="EmpresaNegociacion" required="true">
                        <option selected="true" disabled="true">Empresa</option>
                      </select>              
                    </div>
                  </div>
                  <div class="col-md-6 divsNP">
                        <div class="input-group">
                          <span class="input-group-addon"><b>Persona de contacto</b></span>
                          <select class="select2 form-control formsNP selectpicker" id="PersonaContacto" name="PersonaContacto" required>
                            <option selected="true" disabled="true">Contacto/Representante</option>
                        </select>              
                        </div>
                  </div>
                  <div class="col-md-6 divsNP">
                        <div class="input-group">
                          <span class="input-group-addon"><b>Motivo</b></span>
                          <textarea rows="6" class="form-control formsNP" id="Motivo" name="Motivo" required></textarea>
                        </div>
                  </div>
                  <div class="col-md-6 divsNP">
                        <div class="input-group">
                          <span class="input-group-addon"><b>Prioridad</b></span>
                          <select class="select2 form-control formsNP selectpicker" id="Prioridad" name="Prioridad" required>
                            <option selected="true" disabled="true">Prioridad</option>
                            <option value="Baja">Baja</option>
                            <option value="Media">Media</option>
                            <option value="Alta">Alta</option>
                        </select>              
                        </div>
                  </div>
                <div class="col-md-6 divsNP">
                      <div class="input-group">
                        <span class="input-group-addon"><b>Persona a cargo</b></span>
                        <select class="select2 form-control formsNP selectpicker" id="PersonaCargo" name="PersonaCargo" required>
                          <option selected="true" disabled="true">Usuario</option>
                        </select>              
                      </div>
                </div>
                <div class="col-md-6 divsNP">
                      <div class="input-group">
                        <span class="input-group-addon"><b>Fecha limite aproximada</b></span>
                          <input type='text' class="form-control" id='FechaLimite' name="FechaLimite" required="true" />
                      </div>
                </div>
                <div class="col-md-12 divsNP">
                      <div class="input-group">
                        <span class="input-group-addon"><b>Detalles</b></span>
                        <textarea class="form-control formsNP" id="Detalles" name="Detalles" required></textarea>
                      </div>
                      <input type="submit" name="registrarPersona" class="form-control divsNP formsNP btn btn-primary btn-block" value="Registrar Objetivo">

                </div>
                </form>
              </div>
              <!-- /.tab-pane -->
              <div class="tab-pane" id="tab_2">
                <form method="POST" action="<?php echo base_url();?>cNegociacion/guardarPersona">
                  <div class="col-md-12 divsNP">
                    <div class="input-group">
                      <span class="input-group-addon"><b>Nombre del objetivo</b></span>
                      <input type="text" class="form-control formsNP" id="NombreNegociacionP" name="NombreNegociacionP"/>
                    </div>
                  </div>
                  <div class="col-md-6 divsNP">
                    <div class="input-group">
                      <span class="input-group-addon"><b>¿Con quien es el objetivo?</b></span>
                      <select class="form-control formsNP selectpicker" id="PersonaNegociacion2" name="PersonaNegociacion2" required>
                        <option selected="true" disabled="true">Persona</option>
                      </select>              
                    </div>
                  </div>
                  <div class="col-md-6 divsNP">
                    <div class="input-group">
                      <span class="input-group-addon"><b>Prioridad</b></span>
                      <select class=" form-control formsNP selectpicker" id="PrioridadP" name="PrioridadP">
                        <option selected="true" disabled="true">Prioridad</option>
                        <option value="Baja">Baja</option>
                        <option value="Media">Media</option>
                        <option value="Alta">Alta</option>
                      </select>              
                    </div>
                  </div>
                  <div class="col-md-6 divsNP">
                    <div class="input-group">
                      <span class="input-group-addon"><b>Motivo</b></span>
                      <textarea rows="5" type="text" class="form-control formsNP" id="MotivoP" name="MotivoP"></textarea>
                    </div>
                  </div>
                <div class="col-md-6 divsNP">
                  <div class="input-group">
                    <span class="input-group-addon"><b>Persona a cargo</b></span>
                    <select class="form-control formsNP selectpicker" id="PersonaCargoP" name="PersonaCargoP" required>
                      <option selected="true" disabled="true">Usuario</option>
                    </select>              
                  </div>
                </div>
                <div class="col-md-6 divsNP">
                      <div class="input-group">
                        <span class="input-group-addon"><b>Fecha limite aproximada</b></span>
                        <input type='text' class="form-control" id='FechaLimiteP' name="FechaLimiteP" required="true"/>
                      </div>
                </div>
                <div class="col-md-12 divsNP">
                  <div class="input-group">
                    <span class="input-group-addon"><b>Detalles</b></span>
                    <textarea class="form-control formsNP" id="DetallesP" name="DetallesP"></textarea>
                  </div>
                  <input type="submit" name="registrarPersona" class="form-control divsNP formsNP btn btn-primary btn-block" value="Registrar Objetivo">
                </div> 
                </form>
              </div><!-- /.tab-pane tab2 -->
            </div><!-- /.tab-content -->
          </div><!-- nav-tabs-custom -->
        </div>
    </div>
  </section>
<script type="text/javascript">
  var baseurl = "<?php echo base_url();?>";
  var idUsuarioActivo = "<?php echo $this->session->userdata('s_idUsuario');?>";
</script>