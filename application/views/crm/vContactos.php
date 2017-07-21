<style type="text/css">
  #listaEmpresas,
  #listaPersonas {
    padding: 1px;
  }
  .box-listasE{
    margin-top: 4px;
    overflow:scroll;
    height: 35em;
    border-width: 8px;
    border-right: 1px solid #3c8dbc;
    border-left:  1px solid #3c8dbc;
    border-bottom:  1px solid #3c8dbc;
  }
  .box-listasP{
    margin-top: 4px;
    overflow:scroll;
    height: 35em;
    border-width: 8px;
    border-right: 1px solid #00a65a;
    border-left:  1px solid #00a65a;
    border-bottom:  1px solid #00a65a;
  }
</style>
    <section class="content-header">
      <ol class="breadcrumb">
        <li><a href="cInicio"><i class="fa fa-map-signs"></i>Inicio</a></li>
        <li class="active">Contactos</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="text-center bg-black" style="padding: 1px; margin: 10px 15px 0px 15px; border-radius: 20px">
        <h2>CONTACTOS</h2>
        </div>
        <div class="col-md-6">
        <span><!-- Empresas --></span>
        <div class="box box-primary box-listasE">
          <ul id="listaEmpresas">
          </ul>
        </div>
        </div>

        <div class="col-md-6">
          <span><!-- Personas --></span>
          <div class="box box-success box-listasP">
            <ul id="listaPersonas"> 
            </ul>
          </div>
        </div>
        

      </div>
    </section>
  <script type="text/javascript">
  var baseurl = "<?php echo base_url();?>";
</script>