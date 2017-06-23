    <section class="content-header">
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url();?>cInicio"><i class="fa fa-map-signs"></i>Inicio</a></li>
        <li class="active">Negociaciones</li>
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
</style>
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
          <h1>Negociaciones</h1>
          <hr>
        <div class="row" id="statusNG">
          <div class="col-md-3" style="color: #638ccc"">
          <div class="row">
            <div class="col-md-2">
                <i class="fa fa-play fa-3x"></i>
            </div>
            <div class="col-md-10">
              <div class="col-md-12">
                <label>2</label>
              </div>
              <div class="col-md-12">
                <p>Negociaciones en estado Avanzado</p>
              </div>
            </div>
            </div>
          </div>
          <div class="col-md-3" style="color: red">
            <div clas="row">
              <div class="col-md-2">
                <i class="fa fa-thumbs-o-down fa-3x"></i>
              </div>
            <div class="col-md-10">
              <div class="col-md-12">
                <label>2</label>
              </div>
              <div class="col-md-12">
                <p>Negociaciones Canceladas</p>
              </div>
            </div>
            </div>
          </div>
          <div class="col-md-3" style="color: yellowgreen">
            <div clas="row">
              <div class="col-md-2">
                <i class="fa fa-spinner fa-3x"></i>
              </div>
              <div class="col-md-10">
                <div class="col-md-12">
                  <label>2</label>
                </div>
                <div class="col-md-12">
                  <p>Negociaciones en Proceso</p>
                </div>
              </div>
            </div>
          </div>

          <div class="col-md-3"  style="color: #638ccc">
            <div clas="row">
              <div class="col-md-2">
                <i class="fa fa-download fa-3x"></i>
              </div>
              <div class="col-md-10">
                <div class="col-md-12">
                  <label>2</label>
                </div>
                <div class="col-md-12">
                  <p>Negociaciones Incorporadas</p>
                </div>
              </div>
            </div>
          </div>

          <div class="col-md-3" style="color: #2866ab">
            <div clas="row">
              <div class="col-md-2">
                <i class="fa  fa-stop fa-3x"></i>
              </div>
              <div class="col-md-10">
                <div class="col-md-12">
                  <label>2</label>
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
                  <label>2</label>
                </div>
                <div class="col-md-12">
                  <p>Negociaciones Suspendidas</p>
                </div>
              </div>
            </div>
          </div> 

          <div class="col-md-3" style="color: #2866ab">
            <div clas="row">
              <div class="col-md-2">
                <i class="fa  fa-meh-o fa-3x"></i>
              </div>
              <div class="col-md-10">
                <div class="col-md-12">
                  <label>2</label>
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
                  <label>2</label>
                </div>
                <div class="col-md-12">
                  <p>Negociaciones Confirmadas</p>
                </div>
              </div>
            </div>
          </div> 
        </div>
        <hr>
        <div class="row" id="NGdesc">
          <div class="col-md-12">
            <div class="row">
              <ul>
              <li>
                <div class="col-md-1">
                  <i class="fa fa-briefcase fa-3x"></i>
                </div>
                <div class="col-md-11">
                  <div class="col-md-12">
                      <p><label><a href="Paginadelanegociacion">Nombre Negociacion</a></label><small> con </small><a href="Pagina de la empresa"> Nombre Empresa</a></p>
                  </div>
                  <div class="col-md-12">
                    <span style="color: #24c631">Negociación Confirmada </span><span>Responsable: Nombre Resposable </span><span>Registro: 09/01/2018</span>
                  </div>
                </div>
              </li>
              <hr>
              <li>
                <div class="col-md-1">
                  <i class="fa fa-briefcase fa-3x"></i>
                </div>
                <div class="col-md-11">
                  <div class="col-md-12">
                      <p><label><a href="Paginadelanegociacion">Nombre Negociacion</a></label><small> con </small><a href="Pagina de la empresa"> Nombre Empresa</a></p>
                  </div>
                  <div class="col-md-12">
                    <span style="color: #ffaa05">Negociación Suspendida </span><span>Responsable: Nombre Resposable </span><span>Registro: 09/01/2018</span>
                  </div>
                </div>
              </li>
              </ul>
            </div>
          </div>
        </div>

      </div>
    </section>