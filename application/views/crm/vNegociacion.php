     <section class="content-header">
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url();?>cInicio"><i class="fa fa-map-signs"></i>Inicio</a></li>
        <li class="active">Objetivos</li>
      </ol>
    </section>
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

</style>
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
          <h1>Objetivos</h1>
          <hr>
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
   <!--          <div class="col-md-2">
                <i class="fa fa-play fa-3x"></i>
            </div>
            <div class="col-md-10">
              <div class="col-md-12">
                <label><?php echo $Avanzado?></label>
              </div>
              <div class="col-md-12">
                <p>Negociaciones en estado Avanzado</p>
              </div>
            </div> -->
            </div>
          </div>
  <!--         <div class="col-md-3" style="color: red">
            <div clas="row">
              <div class="col-md-2">
                <i class="fa fa-thumbs-o-down fa-3x"></i>
              </div>
            <div class="col-md-10">
              <div class="col-md-12">
                <label><?php echo $Cancelado ?></label>
              </div>
              <div class="col-md-12">
                <p>Negociaciones Canceladas</p>
              </div>
            </div>
            </div>
          </div>
          <div class="col-md-3" style="color: #c000f5">
            <div clas="row">
              <div class="col-md-2">
                <i class="fa fa-spinner fa-3x"></i>
              </div>
              <div class="col-md-10">
                <div class="col-md-12">
                  <label><?php echo $Enproceso ?></label>
                </div>
                <div class="col-md-12">
                  <p>Negociaciones en Proceso</p>
                </div>
              </div>
            </div>
          </div>

          <div class="col-md-3"  style="color: #ef5ed7">
            <div clas="row">
              <div class="col-md-2">
                <i class="fa fa-download fa-3x"></i>
              </div>
              <div class="col-md-10">
                <div class="col-md-12">
                  <label><?php echo $Incorporado ?></label>
                </div>
                <div class="col-md-12">
                  <p>Negociaciones Incorporadas</p>
                </div>
              </div>
            </div>
          </div>

          <div class="col-md-3" style="color: #23c8cb">
            <div clas="row">
              <div class="col-md-2">
                <i class="fa  fa-stop fa-3x"></i>
              </div>
              <div class="col-md-10">
                <div class="col-md-12">
                  <label><?php echo $Noiniciado ?></label>
                </div>
                <div class="col-md-12">
                  <p>Negociaciones No Iniciadas</p>
                </div>
              </div>
            </div>
          </div>

          <div class="col-md-3" style="color: #ffaa05">
            <div clas="row">
              <div class="col-md-2">
                <i class="fa  fa-hourglass fa-3x"></i>
              </div>
              <div class="col-md-10">
                <div class="col-md-12">
                  <label><?php echo $Suspendido ?></label>
                </div>
                <div class="col-md-12">
                  <p>Negociaciones Suspendidas</p>
                </div>
              </div>
            </div>
          </div> 

          <div class="col-md-3" style="color: #05bef5">
            <div clas="row">
              <div class="col-md-2">
                <i class="fa  fa-meh-o fa-3x"></i>
              </div>
              <div class="col-md-10">
                <div class="col-md-12">
                  <label><?php echo $sinCompromiso ?></label>
                </div>
                <div class="col-md-12">
                  <p>Negociaciones sin Compromiso</p>
                </div>
              </div>
            </div>
          </div> 


          <div class="col-md-3" style="color: #24c631">
            <div clas="row">
              <div class="col-md-2">
                <i class="fa  fa-thumbs-o-up fa-3x"></i>
              </div>
              <div class="col-md-10">
                <div class="col-md-12">
                  <label><?php echo $Confirmado ?></label>
                </div>
                <div class="col-md-12">
                  <p>Negociaciones Confirmadas</p>
                </div>
              </div>
            </div>
          </div> --> 
        </div>
        <hr>
        <div class="row" id="NGdesc">
          <div class="col-md-12">
          <div class="row">
          <div class="col-md-12" id="tab_empresasActivas">
          <div class="tab-content">
            <!--TODAS NEGOCIACIONES-->
            <div class="tab-pane active" id="TodasNegociaciones"> 
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Titulo</th>
                  <th>Persona/Empresa</th>
                  <th>Prioridad</th>
                  <th>Motivo</th>
                  <th>Fecha Limite</th>
                  <th>Desarrollo</th>
                </tr>
                </thead>
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
                        <tr>
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
                          <span style="color:gray">Prioridad: <?php echo $Negociaciones->Prioridad; ?></span>
                          </td>
                          <td>
                              <span class="h5"> <?php echo $Negociaciones->Motivo;?> </span>
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
                        <?php }
                }?>
                </tbody>
              </table>
            </div><!--Fin TodasNegociaciones-->

              <!--NEG Activas-->
            <div class="tab-pane" id="NGActivas"> 
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Titulo</th>
                  <th>Persona/Empresa</th>
                  <th>Prioridad</th>
                  <th>Motivo</th>
                  <th>Fecha Fin</th>
                  <th>Eliminar</th>
                </tr>
                </thead>
                <tbody id="tablaAvanzado">
                <?php foreach ($row_Negociaciones as $Negociaciones) {
                  $ClaseNeg="";
                   if (($Negociaciones->NegStatus)=='Avanzado') {
                        $ClaseNeg='Avanzado';?>
                        <tr>
                          <td>
                            <label>
                              <a class="<?php echo $ClaseNeg ;?> h5" href=" <?php echo base_url();?>cPersona/VerNegociacion/<?php echo $Negociaciones->idNegociacion;?>">
                              <?php echo strtoupper($Negociaciones->NombreNegociacion);?></a>
                            </label>
                          </td>
                          <td>
                              <?php if ($Negociaciones->RazonSocial){?>
                                <a class="h5" href="<?php echo base_url();?>cEmpresa/verEmpresa/<?php echo $Negociaciones->idEmpresa ?>">
                                <?php echo $Negociaciones->RazonSocial;?>
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
                          <span style="color:gray">Prioridad: <?php echo $Negociaciones->Prioridad; ?></span>
                          </td>
                          <td>
                              <span class="h5"> <?php echo $Negociaciones->Motivo;?> </span>
                          </td>
                          <td>
                            <span style="color:gray" class="pull-right">Fecha Limite:<?php echo $Negociaciones->FechaLimite;?></span>
                          </td>
                          <td>
                          eliminar
                          </td>
                        </tr>
                        <?php }
                }?>
                </tbody>
              </table>
            </div><!--NEG Activas fin-->

            <div class="tab-pane" id="NGCanceladas"> 
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Titulo</th>
                  <th>Persona/Empresa</th>
                  <th>Prioridad</th>
                  <th>Motivo</th>
                  <th>Fecha Fin</th>
                  <th>Eliminar</th>
                </tr>
                </thead>
                <tbody id="tablaCancelado">
                <?php foreach ($row_Negociaciones as $Negociaciones) {
                  $ClaseNeg="";
                   if (($Negociaciones->NegStatus)=='Cancelado') {
                        $ClaseNeg='Cancelado';?>
                        <tr>
                          <td>
                            <label>
                              <a class="<?php echo $ClaseNeg ;?> h5" href=" <?php echo base_url();?>cPersona/VerNegociacion/<?php echo $Negociaciones->idNegociacion;?>">
                              <?php echo strtoupper($Negociaciones->NombreNegociacion);?></a>
                            </label>
                          </td>
                          <td>
                              <?php if ($Negociaciones->RazonSocial){?>
                                <a class="h5" href="<?php echo base_url();?>cEmpresa/verEmpresa/<?php echo $Negociaciones->idEmpresa ?>">
                                <?php echo $Negociaciones->RazonSocial;?>
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
                          <span style="color:gray">Prioridad: <?php echo $Negociaciones->Prioridad; ?></span>
                          </td>
                          <td>
                              <span class="h5"> <?php echo $Negociaciones->Motivo;?> </span>
                          </td>
                          <td>
                            <span style="color:gray" class="pull-right">Fecha Limite:<?php echo $Negociaciones->FechaLimite;?></span>
                          </td>
                          <td>
                          eliminar
                          </td>
                        </tr>
                        <?php }
                }?>
                </tbody>
              </table>
            </div><!--NEG Canceladas fin-->

            <div class="tab-pane" id="NGEnProceso"> 
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Titulo</th>
                  <th>Persona/Empresa</th>
                  <th>Prioridad</th>
                  <th>Motivo</th>
                  <th>Fecha Fin</th>
                  <th>Eliminar</th>
                </tr>
                </thead>
                <tbody id="tablaCancelado">
                <?php foreach ($row_Negociaciones as $Negociaciones) {
                  $ClaseNeg="";
                   if (($Negociaciones->NegStatus)=='En proceso') {
                        $ClaseNeg='Enproceso';?>
                        <tr>
                          <td>
                            <label>
                              <a class="<?php echo $ClaseNeg ;?> h5" href=" <?php echo base_url();?>cPersona/VerNegociacion/<?php echo $Negociaciones->idNegociacion;?>">
                              <?php echo strtoupper($Negociaciones->NombreNegociacion);?></a>
                            </label>
                          </td>
                          <td>
                              <?php if ($Negociaciones->RazonSocial){?>
                                <a class="h5" href="<?php echo base_url();?>cEmpresa/verEmpresa/<?php echo $Negociaciones->idEmpresa ?>">
                                <?php echo $Negociaciones->RazonSocial;?>
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
                          <span style="color:gray">Prioridad: <?php echo $Negociaciones->Prioridad; ?></span>
                          </td>
                          <td>
                              <span class="h5"> <?php echo $Negociaciones->Motivo;?> </span>
                          </td>
                          <td>
                            <span style="color:gray" class="pull-right">Fecha Limite:<?php echo $Negociaciones->FechaLimite;?></span>
                          </td>
                          <td>
                          eliminar
                          </td>
                        </tr>
                        <?php }
                }?>
                </tbody>
              </table>
            </div><!--NEG Canceladas fin-->

          </div><!-- tab content-->
          </div>
          </div>
        </div>
        </div>
      </div>
    </section>
<script type="text/javascript">
  var idUsuario = "<?php echo $this->session->userdata('s_idUsuario');?>";
  var baseurl = "<?php echo base_url();?>";
</script>    </script>