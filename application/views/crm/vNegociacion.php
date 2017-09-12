<style type="text/css">
  #statusNG label{
    padding-top: 0px;
    font-size:2em;
    margin:0px;
  }
  #NGdesc p{
    margin:0px;
  }
.Avanzado{
  color:#638ccc;
}
.Cancelado{
  color:red;
}
.Enproceso{
  color:#c000f5;
}
.Incorporado{
  color:#ef5ed7;
}
.Noiniciado{
  color:#23c8cb;
}
.Suspendido{
  color:#ffaa05;
}
.sinCompromiso{
  color:#05bef5;
}
.Confirmado{
  color:#24c631;
}
.Default{
  color: black;
}
#example1 a{
  color:#2181b5;
  text-decoration-style: none;
  text-decoration: none;
  font-weight: bold;
  text-transform: uppercase;
}
#example2 a{
  color:#2181b5;
  text-decoration-style: none;
  text-decoration: none;
  font-weight: bold;
  text-transform: uppercase;
}
</style>
<section class="content-header">
  <select id="FiltroObjetivos" name="FiltroObjetivos" class="btn-link" onchange="filtrarObjetivos()">
      <option value="Todas" selected="true">Objetivos de todos los usuarios</option>
  </select>
</section>
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <h3 class="box-title">LISTADO DE OBJETIVOS</h3>
        <div class="row" id="statusNG">
          <div class="col-md-3" style="color: #638ccc"">
          <div class="row">
          <?php 

                  $Avanzado=0;
                  $Cancelado=0;
                  $Enproceso=0;
                  $Incorporado=0;
                  $Noiniciado=0;
                  $Suspendido=0;
                  $sinCompromiso=0;
                  $Confirmado=0;
          foreach ($row_Negociaciones as $Negociaciones) {
                   if (($Negociaciones->NegStatus)=='Avanzado') {
                        $Avanzado++;
                        }
                    if ($Negociaciones->NegStatus=='Cancelado') {
                        $Cancelado++;
                        }
                    if ($Negociaciones->NegStatus=='En proceso') {
                        $Enproceso++;
                        }
                    if ($Negociaciones->NegStatus=='Incorporado') {
                        $Incorporado++;
                        }
                    if ($Negociaciones->NegStatus=='No iniciado') {
                        $Noiniciado++;
                        }
                    if ($Negociaciones->NegStatus=='Suspendido') {
                        $Suspendido++;
                        }
                    if ($Negociaciones->NegStatus=='Interes sin compromiso') {
                        $sinCompromiso++;
                        }
                    if ($Negociaciones->NegStatus=='Interes en participar confirmado') {
                        $Confirmado++;
                        }
                  }
            ?>
            </div>
          </div>
        </div>
        <div class="row" id="NGdesc">
          <div class="col-md-12">
          <div class="row">
          <div class="col-md-12" id="tab_empresasActivas">
        <div class="nav-tabs-custom">
          <div class="text-center bg-white" style="padding: 1px; margin: 10px 15px 0px 15px; border-radius: 20px">
           <ul class="nav nav-tabs">
            <li class="active col-md-3 text-center">
              <a class="btn" href="#tab_Empresas" data-toggle="tab" style="border-radius: 10px; margin-bottom: 3px;">
                <i class="fa fa-list "></i>&nbsp;Objetivos con Empresas
              </a>
            </li>
            <li class="col-md-3">
              <a class="btn text-center" href="#tab_Personas" data-toggle="tab" style="border-radius: 10px; margin-bottom: 3px;">
                <i class="fa fa-list"></i>&nbsp;Objetivos con Personas
              </a>
            </li>
          </ul>          
          </div>
          <div class="tab-content">
            <!--TODAS NEGOCIACIONES-->
            <div class="tab-pane active table-responsive" id="tab_Empresas"> 
              <table id="tablaObEmpresas" class="table table-bordered table-striped">
                <thead>
                <tr style="color:#00c8d9;">
                  <th>Titulo</th>
                  <th>Empresa</th>
                  <th>Administrador</th>
                  <th>Prioridad</th>
                  <th>Motivo</th>
                  <th>Fecha Limite</th>
                  <th>Desarrollo</th>
                </tr>
                </thead>
                <tfoot>
                <tr style="color:#00c8d9;">
                  <th>Titulo</th>
                  <th>Empresa</th>
                  <th>Administrador</th>
                  <th>Prioridad</th>
                  <th>Motivo</th>
                  <th>Fecha Limite</th>
                  <th>Desarrollo</th>
                </tr>
                </tfoot>
                <tbody id="tablaAvanzado">
                <?php foreach ($row_Negociaciones as $Negociaciones) {
                  $ClaseNeg="";

                   if (($Negociaciones->NegStatus)=='Avanzado') {
                        $ClaseNeg='Avanzado';
                        }
                    if ($Negociaciones->NegStatus=='Cancelado') {
                        $ClaseNeg='Cancelado';
                        }
                    if ($Negociaciones->NegStatus=='En proceso') {
                        $ClaseNeg='Enproceso';
                        }
                    if ($Negociaciones->NegStatus=='Incorporado') {
                        $ClaseNeg='Incorporado';
                        }
                    if ($Negociaciones->NegStatus=='No iniciado') {
                        $ClaseNeg='Noiniciado';
                        }
                    if ($Negociaciones->NegStatus=='Suspendido') {
                        $ClaseNeg='Suspendido';
                        }
                    if ($Negociaciones->NegStatus=='Interes sin compromiso') {
                        $ClaseNeg='sinCompromiso';
                        }
                    if ($Negociaciones->NegStatus=='Interes en participar confirmado') {
                        $ClaseNeg='Confirmado';
                        }
                    if ($Negociaciones->NegStatus=='Inactivo') {
                        $ClaseNeg='Inactivo';
                    }
                    if ($Negociaciones->NegStatus!='Inactivo') {?>
                    <?php if ($Negociaciones->idEmpresa>='1'): ?>
                        <tr id="trObjetivo<?php echo $Negociaciones->idUsuario?>" class="Todas trObjetivo<?php echo $Negociaciones->idUsuario?>">
                          <td>
                            <label>
                              <a class="<?php echo $ClaseNeg ;?> h5" href=" <?php echo base_url();?>cPersona/VerNegociacion/<?php echo $Negociaciones->idNegociacion;?>">
                              <?php echo strtoupper($Negociaciones->NombreNegociacion);?></a>
                            </label>
                          </td>
                          <td>
                              <?php if ($Negociaciones->NombreEmpresa){?>
                                <a class="h5" href="<?php echo base_url();?>cEmpresa/verEmpresa/<?php echo $Negociaciones->idEmpresa ?>">
                                <?php echo $Negociaciones->NombreEmpresa;?>
                                 </a>
                              <?php }
                                else{?>
                                <a class="h5" href="<?php echo base_url();?>cPersona/verPersona/<?php echo $Negociaciones->idPersona?>">
                                <?php echo $Negociaciones->Nombre.' '.$Negociaciones->Paterno.'';
                                ?></a>
                              <?php } ?>
                                </p>
                          </td>
                          <td>
                            <span style="color: gray"><?php echo $Negociaciones->Usuario ?></span>
                          </td>
                          <td>
                          <span style="color:gray"><?php echo $Negociaciones->Prioridad; ?></span>
                          </td>
                          <td>
                          <span style="color:gray"> <?php echo $Negociaciones->Motivo;?> </span>
                          </td>
                          <td>
                            <span style="color:gray" class="pull-right"><?php echo $Negociaciones->FechaLimite;?></span>
                          </td>
                          <td>
                            <span style="color:gray" class="pull-right"><?php 
                            $activa = $Negociaciones->TareasActiva;
                            $R = $Negociaciones->TareasRealizada;
                            $C = $Negociaciones->TareasCancelada;
                            $t= $activa+$R+$C;
                            if ($t!=0) {
                            $Av= ($R/$t)*100;
                            echo round($Av,2)."%";
                            }
                            else{
                              echo "Sin Tareas";
                            }
                            ?></span>
                          </td>
                        </tr>
                        <?php endif ?>
                        <?php }
                }?>
                </tbody>
              </table>
            </div><!--Fin tabEmpresas-->
            <div class="tab-pane table-responsive" id="tab_Personas"> 
              <table id="tablaObPersonas" class="table table-responsive table-bordered table-striped">
                <thead>
                <tr style="color:#00c8d9;">
                  <th>Titulo</th>
                  <th>Persona</th>
                  <th>Administrador</th>
                  <th>Prioridad</th>
                  <th>Motivo</th>
                  <th>Fecha Limite</th>
                  <th>Desarrollo</th>
                </tr>
                </thead>
                <tfoot>
                <tr style="color:#00c8d9;">
                  <th>Titulo</th>
                  <th>Persona</th>
                  <th>Administrador</th>
                  <th>Prioridad</th>
                  <th>Motivo</th>
                  <th>Fecha Limite</th>
                  <th>Desarrollo</th>
                </tr>
                </tfoot>
                <tbody id="tablaAvanzado">
                <?php foreach ($row_Negociaciones as $Negociaciones) {
                  $ClaseNeg="";

                   if (($Negociaciones->NegStatus)=='Avanzado') {
                        $ClaseNeg='Avanzado';
                        }
                    if ($Negociaciones->NegStatus=='Cancelado') {
                        $ClaseNeg='Cancelado';
                        }
                    if ($Negociaciones->NegStatus=='En proceso') {
                        $ClaseNeg='Enproceso';
                        }
                    if ($Negociaciones->NegStatus=='Incorporado') {
                        $ClaseNeg='Incorporado';
                        }
                    if ($Negociaciones->NegStatus=='No iniciado') {
                        $ClaseNeg='Noiniciado';
                        }
                    if ($Negociaciones->NegStatus=='Suspendido') {
                        $ClaseNeg='Suspendido';
                        }
                    if ($Negociaciones->NegStatus=='Interes sin compromiso') {
                        $ClaseNeg='sinCompromiso';
                        }
                    if ($Negociaciones->NegStatus=='Interes en participar confirmado') {
                        $ClaseNeg='Confirmado';
                        }
                    if ($Negociaciones->NegStatus=='Inactivo') {
                        $ClaseNeg='Inactivo';
                    }               
                    if ($Negociaciones->NegStatus!='Inactivo') {?>
                      <?php if ($Negociaciones->idPersona>='1'): ?>
                        <tr id="trObjetivo<?php echo $Negociaciones->idUsuario?>" class="Todas trObjetivo<?php echo $Negociaciones->idUsuario?>">
                          <td>
                            <label>
                              <a class="<?php echo $ClaseNeg ;?> h5" href=" <?php echo base_url();?>cPersona/VerNegociacion/<?php echo $Negociaciones->idNegociacion;?>">
                              <?php echo strtoupper($Negociaciones->NombreNegociacion);?></a>
                            </label>
                          </td>
                          <td>
                              <?php if ($Negociaciones->NombreEmpresa){?>
                                <a class="h5" href="<?php echo base_url();?>cEmpresa/verEmpresa/<?php echo $Negociaciones->idEmpresa ?>">
                                <?php echo $Negociaciones->NombreEmpresa;?>
                                 </a>
                              <?php }
                                else{?>
                                <a class="h5" href="<?php echo base_url();?>cPersona/verPersona/<?php echo $Negociaciones->idPersona?>">
                                <?php echo $Negociaciones->Nombre.' '.$Negociaciones->Paterno.'';
                                ?></a>
                              <?php } ?>
                                </p>
                          </td>
                          <td>
                            <span style="color: gray"><?php echo $Negociaciones->Usuario ?></span>
                          </td>
                          <td>
                          <span style="color:gray"><?php echo $Negociaciones->Prioridad; ?></span>
                          </td>
                          <td>
                          <span style="color:gray"> <?php echo $Negociaciones->Motivo;?> </span>
                          </td>
                          <td>
                            <span style="color:gray" class="pull-right"><?php echo $Negociaciones->FechaLimite;?></span>
                          </td>
                          <td>
                            <span style="color:gray" class="pull-right"><?php 
                            $activa = $Negociaciones->TareasActiva;
                            $R = $Negociaciones->TareasRealizada;
                            $C = $Negociaciones->TareasCancelada;
                            $t= $activa+$R+$C;
                            if ($t!=0) {
                            $Av= ($R/$t)*100;
                            echo round($Av,2)."%";
                            }
                            else{
                              echo "Sin Tareas";
                            }
                            ?></span>
                          </td>
                        </tr>
                      <?php endif ?>

                        <?php }
                }?>
                </tbody>
              </table>
            </div><!--Fin tabEmpresas-->
          </div><!-- tab content-->
          </div>
          </div>
          </div>
        </div>
        </div>
      </div>
    </section>
<script type="text/javascript">
  var idUsuarioActivo = "<?php echo $this->session->userdata('s_idUsuario');?>";
  var idUsuario = "<?php echo $this->session->userdata('s_idUsuario');?>";
  var baseurl = "<?php echo base_url();?>";
</script>    </script>