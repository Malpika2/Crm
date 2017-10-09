<style>
.inputfile {
  width: 0.1px;
  height: 0.1px;
  opacity: 0;
  overflow: hidden;
  position: absolute;
  z-index: -1;
}
.select2-container {
  width: 100% !important;
}
</style>
<section class="content-header">
  <i class="fa fa-home fa-2x"><span class="profile-username">&nbsp;Ficha de la empresa:</span><b class="profile-username text-red"><?php echo strtoupper($row_Empresas->NombreEmpresa); ?></b></i>
</section>
    <!-- Main content -->
    <section class="content">
      <div class="row">
          <div class="col-md-3">
          <div class="box box-primary">
            <div class="box-body box-profile">
              <ul class="list-group list-group-unbordered">
                <li class="list-group-item">
                  <b><?php echo $row_Empresas->Abreviacion; ?></b> <a class="pull-right"></a>
                </li>
                <li class="list-group-item">
                  <b><?php echo $row_Empresas->Tipo; ?></b> <a class="pull-right"></a>
                </li>
                <li class="list-group-item">
                  <b>Sitio Web:</b><br> 
                    <?php if(isset($row_Empresas->SitioWeb)){echo $row_Empresas->SitioWeb;} ?>
                </li>
                <li class="list-group-item">
                <b>Representante:</b><br>
                <?php if (isset($row_Persona->Nombre)){?>
                  <a href="<?php echo base_url();?>/cPersona/verPersona/<?php echo $row_Persona->idPersona ?>"><?php echo $row_Persona->Nombre;?>
                  </a>
                <?php } ?>

                <?php if ($row_Contactos) {?>
                  <li class="list-group-item">
                  <b>Contactos</b>
                  <ul>
                <?php foreach($row_Contactos as $Contacto){ ?>
                    <li><a href="<?php echo base_url();?>cPersona/verPersona/<?php echo $Contacto->idPersona;?>">
                    <?php echo $Contacto->Nombre; ?>
                    </a></li>
                    <?php  }
                } else{echo "<li class=\"list-group-item\"><label class=\"text-muted\"> Sin Contactos</label>
                  
                </li>";}
                ?></ul></li>


                <?php if (isset($row_Persona->idPersona)){} else {echo "";}?>
                </li>

                <?php if ($row_Empresas->sitReg==0): ?>
                  <li class="list-group-item">
                    <b>Justificacion de Inactividad:</b>
                    <?php echo $row_Empresas->StatusFinalEmp; ?>
                  </li>  
                <?php endif ?>

              </ul>
                <button id="btn_Editar" class="btn btn-primary btn-block " data-toggle="modal" data-target="#ModalEditarEmp2">Editar Información</button>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
        <div class="col-md-9">
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <li class="active"><a href="#Datos" data-toggle="tab"><b class="text-blue">Datos</b></a></li>
              <li><a href="#Notas" data-toggle="tab"><b class="text-blue">Notas</b></a></li>
              <li><a href="#Negociaciones" data-toggle="tab"><b class="text-blue">Objetivos</b></a></li>
              <li><a href="#Tareas" data-toggle="tab"><b class="text-blue">Tareas</b></a></li>
              <li><a href="#Archivos" data-toggle="tab"><b class="text-blue">Archivos</b></a></li>
            </ul>
            <div class="tab-content">
              <div class="active tab-pane" id="Datos">
                  <div class="row">
                  <div class="col-md-12">
                    <table class="table table-bordered table-condensed">
                      <tbody style="font-size: 14px;">
                          <tr>
                              <td><b>Correo Oficina</b></td>
                              <td><?php echo $row_Empresas->Email; ?></td>
                          </tr>
                          <tr>
                              <td><b>Correo Personal</b></td>
                              <td><?php echo $row_Empresas->Email2; ?></td>
                          </tr>
                          <tr>
                              <td><b>Telefono Oficina</b></td>
                              <td><?php echo $row_Empresas->Telefono; ?>&nbsp;<i class="fa fa-question-circle"></i>
</td>
                          </tr>
                          <tr>
                              <td><b>Telefono Personal</b></td>
                              <td><?php echo $row_Empresas->Telefono2; ?>&nbsp;<i class="fa fa-question-circle"></i>
</td>
                          </tr>
                          <tr>
                              <td><b>Skype</b></td>
                              <td><?php echo $row_Empresas->Skype; ?></td>
                          </tr>
                          <tr>
                              <td><b>Producos</b></td>
                              <td><?php echo $row_Empresas->Productos;?></td>
                          </tr>
                          <tr>
                              <td><b>Propuesto por</b></td>
                              <td><?php echo $row_Empresas->PresupuestoPersona;?></td>
                          </tr>
                          <tr>
                              <td><b>Nivel de interés de la empresa</b></td>
                              <td><?php echo $row_Empresas->InteresEmpresa;?></td>
                          </tr>
                          <tr>
                              <td><b>Nivel de confianza de la empresa</b><small>(1-Bajo   5-Alto)</small></td>
                              <td><?php echo $row_Empresas->ConfianzaEmpresa;?></td>
                          </tr>
                          <tr>
                              <td><b>Motivo o Razón</b></td>
                              <td><?php echo $row_Empresas->MotivoEmpresa; ?></td>
                          </tr>
                          <tr>
                              <td><b>Contactado en</b></td>
                              <td><?php echo $row_Empresas->LugarContacto;?></td>
                          </tr>
                      </tbody>
                    </table>
                      <div class="col-md-12 bg-yellow">Dirección Oficina:</div>
                      <div class="col-md-12">
                        <b>Dirección:</b>&nbsp;&nbsp;<?php echo $row_Empresas->DireccionOficina; ?><br>
<!--                         <b>Ciudad:</b>&nbsp;&nbsp;<?php echo $row_Empresas->Ciudad; ?><br>
 -->                        <b>País:</b>&nbsp;&nbsp;<?php echo $row_Empresas->Pais; ?><br>
                      </div>
                      <div class="col-md-12 bg-yellow">Datos Fiscales:</div>
                      <div class="col-md-12">
                        <?php if (isset($row_Empresas->DireccionFiscal)): ?>
                          <b>Dirección Fiscal:</b>&nbsp;&nbsp;<?php echo $row_Empresas->DireccionFiscal; ?><br>
                        <?php endif ?>
                        <b>Datos Fiscales:</b>&nbsp;&nbsp;<?php echo $row_Empresas->DatosFiscales; ?><br>
                      </div>
                  </div>
                  </div>
              </div>
              <!-- /.tab-pane -->
              <div class="tab-pane" id="Archivos">
                <div class="post clearfix" style="padding: 0px; margin: 3px;">
                <div class="col-md-12" style="height: 500px; overflow: scroll;">
                Lista Archivos
                  <ul id="ListaArchivos">
                  </ul>
                </div>
                </div>
              </div>

            <!-- Comentarios -->
              <div class="tab-pane" id="Notas">
                <div class="post clearfix" style="padding: 0px; margin: 3px;">
                  <div class="row">
                  <form method="POST" action="<?php echo base_url();?>cComentarios/guardarComentarioEmpresa" id="formComentarios" name="formComentarios" enctype="multipart/form-data">
                  <div class="col-md-2">
                    <input type="hidden" id="idEmpresa" name="idEmpresa" value="<?php echo $row_Empresas->idEmpresa;?>">
                    <input type="hidden" id="idUsuarioc" name="idUsuarioc" value="<?php echo $this->session->userdata('s_idUsuario');?>">
                    <button id="btn_Coment" type="submit" class="btn btn-success btn-sm btn-block" style="border-radius: 10px; margin-bottom: 5px;"><i class="fa fa-plus pull-left"></i>Guardar</button>
                  </div>
                  <div class="col-md-3">
                      <input type="file" name="file" id="file" class="inputfile inputfile-1" data-multiple-caption="{count} files selected" />
                      <label for="file" style="border-radius: 10px; margin-bottom: 5px;"><span id="spanFile">Cargar Archivo&hellip;</span></label>
                  </div>
                  <div class="col-md-3">
                      <p id="msg"></p>
                  </div>

                  <div class="col-md-12">
                      <textarea class="form-control" rows="2" id="Nota" name="Nota" placeholder="Escribir Nota"></textarea>
                  </div>
                  </form>
                  </div>
              </div>
              <div id="activity" style="max-height: 700px; overflow: scroll;">
                <div class="col-md-12" id="NotasPersona">
                </div>
              </div>
              </div>

              <!-- /.tab-pane -->
              <div class="tab-pane" id="Tareas">
                <!-- The timeline -->
                <button id="btn_nTarea" class="btn btn-success " data-toggle="modal" data-target="#ModalTarea"><i class="fa fa-plus fa-x2"></i> Nueva Tarea</button>
                <hr>
                <ul class="timeline timeline-inverse" id="LineaTareas" style="height: 720px; overflow: scroll;" >

                </ul>
              </div>
              <!-- /.tab-pane -->
              <div class="tab-pane" id="Negociaciones">
                <button id="btn_nTarea" class="btn btn-success " data-toggle="modal" data-target="#ModalNegociacionEmp"><i class="fa fa-plus fa-x2"></i> Nuevo objetivo</button>
                  <hr>
                <ul class="timeline timeline-inverse" id="LineaNegociaciones" style="height: 720px; overflow: scroll;">
                </ul>
              </div><!--/.Tab-Pane-->
            </div>
            <!-- /.tab-content -->
          </div>
          <!-- /.nav-tabs-custom -->
        </div>
      </div>
    </section>



<div id="ModalEditarEmp2" class="modal modal-default fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content modal-lg">
        <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Editar Empresa</h4>
        </div>
        <div class="modal-body">
          <div class="container-fluid">
              <div class="row">
              <div class="col-md-12">
                <table class="table table-bordered table-responsive" id="tablaFormularioEmpresa">
                  <thead>
                    <tr style="background-color: #F0AD4E; color: white;">
                      <th colspan="2" class="text-center"><b>Información General</b></th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>
                        <span class="">Nombre Empresa</span>
                        <input type="text" class="form-control" id="NombreEmpresa2" name="NombreEmpresa2" required="true" value=" <? echo $row_Empresas->NombreEmpresa; ?>">
                      </td>
                      <td>
                        <span class="">Abreviación</span>
                        <input type="text" class="form-control" id="Abreviacion" name="Abreviacion"
                        value="<?php echo $row_Empresas->Abreviacion; ?>">
                        </div>
                      </td>
                    </tr>
                    <tr>
                      <td>
                        <span class="">SPP<small>(Opcional)</small></b></span>
                        <input type="text" class="form-control" id="SPP" name="SPP" value="<?php echo $row_Empresas->spp; ?>">
                      </td>
                      <td>
                        <div class="col-md-6">
                            <span class="">Tipo de Empresa</span>
                            <select class="form-control" id="Tipo" name="Tipo" required="true">
                              <option selected value="<?php echo $row_Empresas->Tipo;?>"><?php echo $row_Empresas->Tipo;?></option>
                              <option value="Comprador final">Comprador Final</option>
                              <option value="Intermediario">Intermediario</option>
                              <option value="Maquilador">Maquilador</option>
                              <option value="Organizador de Pequeños Productores">Organizador de Pequeños Productores</option>
                              <option value="Organismo de Certificacion">Organismo de Certificacion</option>
                          </select>              
                        </div>
                        <div class="col-md-6">
                          <span class="">Pais</span><br>
                          <select class="form-control selectpicker select2" id="Pais" name="Pais" required="true" onchange="cambiarLada()">
                          <option selected="true" value="<?php echo $row_Empresas->Pais;?>"><?php echo $row_Empresas->Pais; ?></option>
                        </select>
                        </div>
                      </td>
                    </tr>
                    <tr>
                      <td>
                        <span class="">Productos que maneja</span>
                        <textarea rows="2" cols="50" class="form-control" id="Productos" name="Productos" placeholder="Productos que maneja"><?php echo $row_Empresas->Productos; ?></textarea>
                      </td>
                      <td>
                          <span class="">Propuesto por:</span>
                          <input type="text" class="form-control" id="PresupuestoPersona" name="PresupuestoPersona" placeholder="Persona que recomienda el registro" value="<?php echo $row_Empresas->PresupuestoPersona?>">
                      </td>
                    </tr>
                    <tr>
                      <td>
                        <span class="">Nivel de Interés de la Empresa</span>
                        <select class="form-control" id="InteresEmpresa" name="InteresEmpresa" required="true">
                          <option <?php if($row_Empresas->InteresEmpresa=='Bajo'){?> selected="true"<?php } ?> value="Bajo">Bajo</option>
                          <option <?php if($row_Empresas->InteresEmpresa=='Medio'){?> selected="true"<?php } ?> value="Medio">Medio</option>
                          <option <?php if($row_Empresas->InteresEmpresa=='Alto'){?> selected="true"<?php } ?> value="Alto">Alto</option>
                        </select>
                      </td>
                      <td>
                        <span class="">Nivel de Confianza</span>
                        <select class="form-control" id="ConfianzaEmpresa" name="ConfianzaEmpresa" required="true">
                          <option <?php if($row_Empresas->ConfianzaEmpresa=='1'){?> selected="true" <?php } ?> value="1">1 (Bajo)</option>
                          <option <?php if($row_Empresas->ConfianzaEmpresa=='2'){?> selected="true" <?php } ?> value="2">2</option>
                          <option <?php if($row_Empresas->ConfianzaEmpresa=='3'){?> selected="true" <?php } ?> value="3">3</option>
                          <option <?php if($row_Empresas->ConfianzaEmpresa=='4'){?> selected="true" <?php } ?> value="4">4</option>
                          <option <?php if($row_Empresas->ConfianzaEmpresa=='5'){?> selected="true" <?php } ?> value="5">5 (Alto)</option>
                        </select>
                      </td>
                    </tr>
                    <tr>
                      <td>
                        <span class="">Motivo o Razón</span>
                        <textarea rows="2" cols="50" class="form-control" id="Motivo" name="Motivo" placeholder="Motivo de Registro"><?php echo $row_Empresas->MotivoEmpresa ?></textarea>
                      </td>
                      <td>
                        <span class="">Contactado en</span>
                        <textarea rows="2" cols="50" class="form-control" id="LugarContacto" name="LugarContacto" placeholder="Lugar donde se realizó el contacto"><?php echo $row_Empresas->LugarContacto ?></textarea>
                      </td>
                    </tr>
                    <tr >
                      <td colspan="2" style="background-color: #F0AD4E; color: white;">
                        <b>Datos de Contacto</b>
                      </td>
                    </tr>
                    <tr>
                      <td>
                         <span class="col-md-12">Representante</span>
                        <div class="col-md-10" style="padding: 0px;">
                          <input type="text" class="col-md-12 form-control" id="RepresentanteEmp" autocomplete="off" value="<?php if(isset($row_Persona->Nombre)){echo $row_Persona->Nombre;} ?>">
                          <input type="hidden" class="col-md-12 form-control" id="idRepresentanteEmp" name="idRepresentanteEmp" value="<?php echo $row_Persona->idPersona; ?>">
                          <select class="hidden form-control selectpicker" id="Representante" name="Representante" required>
                            <option selected="true" disabled="true" value="0">Lista de Representantes</option>
                          </select>                    
                        </div>
                        <div class="col-md-2 btn-group" style="padding: 0px;">
<!--                           <button style="padding: 0px" type="button" data-toggle="modal" data-target="#ModalNPersona" id="btnAgregarNuevo" class="btn bg-blue" data-toggle="tooltip" title="AGREGAR NUEVO"><i class="fa fa-plus-square fa-2x"></i></button>
 -->                          <button style="padding: 0px" type="button" id="btnBuscarExistente" class="btn bg-aqua" data-toggle="tooltip" title="BUSCAR EXISTENTE"><i class="fa fa-search fa-2x"></i></button>
                        </div>
                      </td>
                      <td>
                        <span class="col-md-12">Contacto</span>
                        <div class="col-md-10" style="padding: 0px;">
                          <select class="js-example-programmatic-multi form-control select2" id="ContactoEmp" name="ContactoEmp[]" multiple="multiple" maximumSelectionLength="2">
                            <?php foreach($row_Contactos as $Contacto){ ?>
                              <option class="form-control" selected="true" value="<?php echo $Contacto->idPersona ?>">
                                <?php echo $Contacto->Nombre; ?>
                              </option>
                          <?php }?>
                          </select>
                          <select class="hidden form-control formsNP js-example-programmatic-multi" id="Contacto" name="Contacto" required>
                            <option selected="true" disabled="true" value="0">Lista de Contactos</option>
                          </select>
                        </div>
                        <div class="col-md-2" style="padding: 0px;">
<!--                           <button style="padding: 0px" type="button" data-toggle="modal" data-target="#ModalNPersona" id="btnAgregarNuevoCont" class="btn bg-blue" data-toggle="tooltip" title="AGREGAR NUEVO"><i class="fa fa-plus-square fa-2x"></i></button>
 -->                          <button style="padding: 0px" type="button" id="btnBuscarExistenteCont" class="btn bg-aqua" data-toggle="tooltip" title="BUSCAR EXISTENTE"><i class="fa fa-search fa-2x"></i></button>
                        </div>
                      </td>
                    </tr>
                    <tr>
                      <td>
                        <span class="">Skype</span>
                        <input type="text" class="form-control" id="Skype" name="Skype" value="<?php echo $row_Empresas->Skype; ?>">
                      </td>
                      <td>
                        <span class="">Sitio Web</span>
                        <input type="text" class="form-control" id="SitioWeb" name="SitioWeb" value="<?php echo $row_Empresas->SitioWeb; ?>">
                      </td>
                    </tr>
                    <tr>
                      <td>
                        <span class="">1º Telefono</span>&nbsp;<i class="fa fa-info-circle" data-toggle="tooltip" title="Lada generada apartir de la seleccion del pais"></i>
                        <div class="input-group">
                        <?php 
                        $pos1 = stripos($row_Empresas->Telefono,'+');
                        if ($pos1 ===0) {
                          $TelefonoExp = explode("-", $row_Empresas->Telefono);
                          $Telefono1sinLada = str_replace(''.$TelefonoExp[0].'-', "", $row_Empresas->Telefono);
                        }else{
                          $TelefonoExp[0]="";
                          $Telefono1sinLada=$row_Empresas->Telefono;
                        }
                        ?>
                          <div class="input-group-addon" style="padding: 0px 12px;">
                            <label id="ladaTel1"><?php echo $TelefonoExp[0]; ?></label>
                            <input type="hidden" id="ladaTel1input" name="ladaTel1input" value="<?php echo $TelefonoExp[0]; ?>">
                          </div>                        
                          <input type="text" class="form-control" id="Telefono1" name="Telefono1" required="true"  style="height: 38px;" value="<?php echo $Telefono1sinLada ?>">
                        <div class="input-group-addon" style="padding: 0px 0px;">
                            <select id="TipoTelefono1" name="TipoTelefono1" class="" data-minimum-results-for-search="Infinity">
                              <option <?php if($row_Empresas->TipoTelefono1=='Movil'){?> selected="true"<?php } ?>value="Movil" selected="true">Movil</option>
                              <option <?php if($row_Empresas->TipoTelefono1=='Fijo'){?> selected="true"<?php } ?> value="Fijo">Fijo</option>
                            </select>
                          </div>
                        </div>
                      </td>
                      <td>
                        <?php 
                        $pos = stripos($row_Empresas->Telefono2,'+');
                        if ($pos ===0) {
                            $ladaT2 = explode("-", $row_Empresas->Telefono2);
                            $Telefono2sinLada = str_replace(''.$ladaT2[0].'-', "", $row_Empresas->Telefono2);                            
                        }else{
                          $ladaT2[0]="";
                          $Telefono2sinLada = $row_Empresas->Telefono2;
                        }
                        ?>
                        <span class="">2º Telefono</span>&nbsp;<i class="fa fa-info-circle" data-toggle="tooltip" title="Lada generada apartir de la seleccion del pais"></i>
                        <div class="input-group">
                          <div class="input-group-addon" style="padding: 0px 12px;">
                            <label id="ladaTel2"><?php echo $ladaT2[0]; ?></label>
                            <input type="hidden" id="ladaTel2input" name="ladaTel2input" value="<?php echo $ladaT2[0]; ?>">
                          </div>                        
                        <input type="text" class="form-control " id="Telefono2" name="Telefono2" style="height: 38px;" value="<?php echo $Telefono2sinLada; ?>">
                        <div class="input-group-addon" style="padding: 0px 0px;">
                            <select id="TipoTelefono2" name="TipoTelefono2" class="" data-minimum-results-for-search="Infinity">
                              <option<?php if($row_Empresas->TipoTelefono2=='Movil'){?> selected="true"<?php } ?> value="Movil" selected="true">Movil</option>
                              <option<?php if($row_Empresas->TipoTelefono2=='Fijo'){?> selected="true"<?php } ?> value="Fijo">Fijo</option>
                            </select>
                          </div>
                        </div>
                      </td>
                    </tr>
                    <tr>
                      <td>
                        <span class="">1º Email</span>
                        <input type="text" class="form-control" id="Correo1" name="Correo1" required="true" value="<?php echo $row_Empresas->Email; ?>">
                      </td>
                      <td>
                        <span class="">2º Email</span>
                        <input type="text" class="form-control" id="Correo2" name="Correo2" value="<?php echo $row_Empresas->Email2 ?>">
                      </td>
                    </tr>
                    <tr>
                      <td>
                        <span class="">Dirección Oficinas</span>
                        <textarea rows="2" type="text" class="form-control" id="DireccionOficina" name="DireccionOficina" placeholder="Ciudad, Calle, Número"> <?php echo $row_Empresas->DireccionOficina; ?></textarea>
                        <input type="hidden" class="form-control col-md-12 formsNP2" id="DireccionFiscal" name="DireccionFiscal" placeholder="Direccion Fiscal">
                        <input type="hidden" class="form-control col-md-6 formsNP2" id="Ciudad" name="Ciudad" placeholder="Ciudad">
                      </td>
                      <td>
                        <span>Datos Fiscales</span>
                        <textarea rows="2" cols="50" class="form-control col-md-12" id="DatosFiscales" name="DatosFiscales" placeholder="Información referente a la facturación"><?php echo $row_Empresas->DatosFiscales; ?></textarea> 
                      </td>
                    </tr>
                    <tr>
                      <td colspan="2">
                      <input onclick="GuardarEditEmpresa();" type="button" id="btn_GuardarEditar" class="divsNP formsNP btn btn-success btn-block" value="Guardar" data-dismiss="modal" style="border-radius: 10px;">
                      </td>
                    </tr>
                  </tbody>
                </table>
              </div>  
            </div>
          </div>
        </div> <!-- modal-body -->
    </div>
  </div>
</div>
<div id="ModalCancelar" class="modal modal-success fade" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">La Tarea Será marcada como Cancelada</h4>
      </div>
      <div class="modal-body">
        <div class="row">
        <div class="col-md-12">
        <label>Cual Fue la razón?</label>
          <textarea id="StatusFinal" class="form-control col-md-12 text-black"></textarea>
        </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>

<div id="ModalCancelarNg" class="modal modal-success fade" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">La Negociación Será marcada como Cancelada</h4>
      </div>
      <div class="modal-body">
        <div class="row">
        <div class="col-md-12">
        <label>Cual Fue la razón?</label>
          <textarea id="StatusFinalNg" class="form-control col-md-12 text-black"></textarea>
        </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>
<!-- MODAL -->
<div class="modal fade modal-info" id="ModalNegociacionEmp" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="exampleModalLabel">AGREGAR NUEVO OBJETIVO</h4>
      </div>
      <form name="formNegociacion" id="formNegociacion" method="POST" action="<?php echo base_url();?>cNegociacion/guardarEmpresa">
      <div class="modal-body">
          <div class="box box-info">
            <div class="box-body" style="background-color: #f9f8eb; color: black">
                  <div class="col-md-12 divsNP">
                    <div class="input-group">
                      <span class="input-group-addon"><b>Nombre del objetivo</b></span>
                      <input type="text" class="form-control formsNP" id="NombreNegociacion" name="NombreNegociacion"/>
                      <input type="hidden" name="EmpresaNegociacion" id="EmpresaNegociacion" value="<?php echo $row_Empresas->idEmpresa ; ?>">
                    </div>
                  </div>
                  <div class="col-md-6">
                  <div class="col-md-12 divsNP">
                    <div class="input-group">
                      <span class="input-group-addon"><b>Motivo</b></span>
                      <input type="text" class="form-control formsNP" id="Motivo" name="Motivo">
                    </div>
                  </div>
                  <div class="col-md-12 divsNP">
                    <div class="input-group">
                      <span class="input-group-addon"><b>Prioridad</b></span>
                      <select class=" form-control formsNP selectpicker" id="Prioridad" name="Prioridad">
                        <option selected="true" disabled="true">Prioridad</option>
                        <option value="Baja">Baja</option>
                        <option value="Media">Media</option>
                        <option value="Alta">Alta</option>
                      </select>              
                    </div>
                  </div>
                  <div class="col-md-12 divsNP">
                    <div class="input-group">
                      <span class="input-group-addon"><b>Status</b></span>
                      <select disabled="true" class=" form-control formsNP selectpicker" id="Status" name="Status">
                        <option value="Avanzado">Avanzado</option>
                        <option value="Cancelado">Cancelado</option>
                        <option value="En proceso">En proceso</option>
                        <option value="Incorporado" selected="true">Incorporado</option>
                        <option value="No iniciado">No iniciado</option>
                        <option value="Suspendido">Suspendido</option>
                        <option value="Interes sin compromiso">Interes sin compromiso</option>
                        <option value="Interes en participar confirmado">Interes en participar confirmado</option>
                      </select>              
                    </div>
                  </div>
                <div class="col-md-12 divsNP">
                  <div class="input-group">
                    <span class="input-group-addon"><b>Persona a cargo</b></span>
                    <select class=" form-control formsNP selectpicker" id="PersonaCargo" name="PersonaCargo" required>
                      <option selected="true" disabled="true">Usuario</option>
                    </select>              
                  </div>
                </div>
                </div>
                <div class="col-md-6">
                  <div class="col-md-12 divsNP">
                    <div class="input-group date">
                        <div id="datepicker">
                          <input type="hidden" id="FechaLimite"  name="FechaLimite"/>
                        </div>
                    </div>
                  </div>
                </div>
                <div class="col-md-12 divsNP">
                  <div class="input-group">
                    <span class="input-group-addon"><b>Detalles</b></span>
                    <textarea class="form-control formsNP" id="Detalles" name="Detalles"></textarea>
                  </div>
                </div> 
            </div><!-- /.box-body -->
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Cancelar</button>
        <button type="submit" class="btn btn-outline">Guardar Objetivo</button>
      </div>
    </form>
    </div>
  </div>
</div><!-- FIN MODAL  -->

<div class="modal fade modal-info" id="ModalTarea" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="exampleModalLabel">AGREGAR NUEVA TAREA</h4>
      </div>
      <form name="formTarea" id="formTarea" method="POST" action="<?php echo base_url();?>cEmpresa/guardarTarea">
      <div class="modal-body">
          <div class="box box-info">
            <div class="box-body" style="background-color: #f9f8eb; color: black">
               <div class="form-group">
                  <div class="input-group col-md-12">
                    <div class="input-group-addon">
                      <span>Titulo</span>
                    </div>
                    <input class="form-control col-md-12" type="text" name="TituloTarea" id="TituloTarea" required />
                  </div>
               </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <div class="input-group">
                      <div class="input-group-addon">
                        <span>Categoria</span>
                      </div>
                      <select id="Categoria" name="Categoria" class="form-control" placeholder="Categoria" style="width: 100%;">
                          <option value="Llamar">Llamar</option>
                          <option value="Entrevista">Entrevista</option>
                          <option value="Correo">Correo</option>
                          <option value="Seguimiento">Seguimiento</option>
                      </select>
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="input-group">
                      <div class="input-group-addon">
                        <span>Prioridad</span>
                      </div>
                      <select id="Prioridad" name="Prioridad" class="form-control" placeholder="Categoria" style="width: 100%;">
                          <option value="Baja">Baja</option>
                          <option value="Media">Media</option>
                          <option value="Alta">Alta</option>
                      </select>
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="input-group">
                      <div class="input-group-addon">
                        <span>Asignar Tarea a:</span>
                      </div>
                      <select id="Asignados" name="Asignados[]" class="form-control select2" multiple="multiple" data-placeholder="Selecciona un usuario" style="width: 100%;" required>
                      </select>
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="input-group">
                      <div class="input-group-addon">
                        <span>Descripcion</span>
                      </div>
                      <textarea name="Descripcion" id="Descripcion" placeholder="Detalles de la tarea" rows="4" class="form-control" ></textarea>
                    </div>
                  </div>
                </div>
                <div class="col-md-6">
                    <label>¿CUANDO DEBE CUMPLIRSE?</label>
                    <div class="">
                      <div id="calendario">
                          <input type="hidden" id="FechaFinE"  name="FechaFinE" value="">
                      </div>
                      <input type="hidden" id="idEmpresa" name="idEmpresa" value="<?php echo $row_Empresas->idEmpresa;?>">
                      <input type="hidden" id="idUsuarioc" name="idUsuarioc" 
                      value="<?php echo $this->session->userdata('s_idUsuario');?>">
                    </div>
                  </div>
                </div>
            </div>
            <!-- /.box-body -->
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Cancelar</button>
        <button type="submit" class="btn btn-outline">Guardar Tarea</button>
      </div>
    </form>
    </div>
  </div>
</div>
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
                <input type="text" class="formsNP" id="Nombre" name="Nombre" placeholder="Nombre(s) Apellidos"/>
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
        <div class="col-md-6 " style="padding: 0px;">
        <div class="col-md-12 divsNP">
              <div class="input-group">
                <span class="input-group-addon"><b>Puesto</b></span>
                <input type="text" class="form-control Puesto formsNP" id="Puesto" name="Puesto">
              </div>
        </div>
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
  var idEmpresa = "<?php echo $row_Empresas->idEmpresa; ?>";
  var idUsuarioCrea = "<?php echo $this->session->userdata('s_idUsuario');?>";
  var idUsuarioActivo = "<?php echo $this->session->userdata('s_idUsuario');?>";
</script>
<?php if (isset($row_control)==1): ?>
    <script type="text/javascript">
      var controlEdit=1;
    </script>
<?php endif ?>