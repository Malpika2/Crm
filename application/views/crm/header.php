<style type="text/css">
/*.easy-autocomplete {
  position: absolute;
  display: block;
  z-index: 2000;
}
.easy-autocomplete-container {
position: absolute;
display: contents;
}*/
#BuscadorHeader{
width: 100%;
padding: 0px !important;
font-family: 'Source Sans Pro','Helvetica Neue',Helvetica,Arial,sans-serif !important;
}
#BuscadorHeaderP{
  width: 100%;
padding: 0px !important;
font-family: 'Source Sans Pro','Helvetica Neue',Helvetica,Arial,sans-serif !important;

}
.select2 {
  /*box-sizing: border-box;*/
  display: initial;
  /*margin: 0;*/
  /*position: relative;*/
  /*vertical-align: middle;*/
}
.easy-autocomplete {
  position: relative;
  display: contents;
  text-align: left;
}
</style>
<!DOCTYPE html>
<html>
<?php ob_start(); ?>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>CRM</title>

  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="<?php echo base_url();?>assets/bootstrap/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <!-- daterange picker -->
  <!-- bootstrap datepicker -->
  <link rel="stylesheet" href="<?php echo base_url();?>assets/plugins/datepicker/datepicker3.css">
  <!-- iCheck for checkboxes and radio inputs -->
  <link rel="stylesheet" href="<?php echo base_url();?>assets/plugins/iCheck/all.css">
  <!-- Bootstrap Color Picker -->
  <link rel="stylesheet" href="<?php echo base_url();?>assets/plugins/colorpicker/bootstrap-colorpicker.min.css">
  <!-- Bootstrap time Picker -->
  <link rel="stylesheet" href="<?php echo base_url();?>assets/plugins/timepicker/bootstrap-timepicker.min.css">
  <!-- Select2 -->
  <link rel="stylesheet" href="<?php echo base_url();?>assets/plugins/select2/select2.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url();?>assets/dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="<?php echo base_url();?>assets/dist/css/skins/_all-skins.min.css">
  <link rel="stylesheet" href="<?php echo base_url();?>assets/dist/css/personalizado/style.css">
<!-- DataTables -->
  <link rel="stylesheet" href="<?php echo base_url();?>assets/plugins/datatables/dataTables.bootstrap.css">

  <!-- JS file -->
<!-- CSS file -->
<link rel="stylesheet" href="<?php echo base_url();?>Js/EasyAutocomplete/easy-autocomplete.min.css"> 
<!-- Additional CSS Themes file - not required-->
<link rel="stylesheet" href="<?php echo base_url();?>Js/EasyAutocomplete/easy-autocomplete.themes.min.css"> 
<link rel="stylesheet" href="<?php echo base_url();?>assets/dist/css/personalizado/jquery-confirm.min.css"> 


  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
</head>

<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <header class="main-header">
    <!-- Logo -->
    <a href="#" class="logo" style="height: 59px">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b></b>SPP</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg text-center">
     <b>C.R.M</b>
      <!-- <img src="<?php echo base_url();?>assets/dist/img/FU<! NDEPPO.jpg" class="img-responsive" style="height: 74px; width: 140px; display:inline;"> -->
      </span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
  <!--     <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a> -->
      <div class="col-md-9 text-center DivsNP2">
        <div class="col-md-6 DivsNP2">
          <input id="BuscadorHeaderP" class="form-control col-md-12" type="text" placeholder="Buscar Persona" />
        </div>

        <div class="col-md-6 DivsNP2">          
            <input type="text" class="form-control col-md-12" name="BuscadorHeader" id="BuscadorHeader" placeholder="Buscar Empresas">
        </div>
      </div>
      <div class="col-md-3 DivsNP2">
      <div class="navbar-custom-menu DivsNP2" style="float: left; padding: 0% 0px 0px 0px;">
        <ul class="nav navbar-nav">
          <!-- Notifications: style can be found in dropdown.less -->

              <li class="dropdown notifications-menu">
                <div class="btn-group">
                  <button type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown" style="border-radius: 10px; margin:0px 10px 0px 0px; ">Crear
                    <span class="caret"></span>
                    <span class="sr-only">Toggle Dropdown</span>
                  </button>
                  <ul class="dropdown-menu" role="menu">
                  <li>
                    <a href="<?php echo base_url();?>cPersona">
                      <i class="fa fa-user-plus text-aqua"></i>Persona
                    </a>
                  </li>
                    <li class="divider"></li>
                  <li>
                    <a href="<?php echo base_url();?>cEmpresa">
                      <i class="fa fa-university text-yellow"></i>Empresa
                    </a>
                  </li>
                    <li class="divider"></li>
                  <li>
                    <a href="<?php echo base_url();?>cNegociacion/nuevaNegociacion">
                      <i class="fa fa-briefcase text-red"></i>Objetivo
                    </a>
                  </li>
                  </ul>
                </div>
              </li>              
              <li class="dropdown notifications-menu">
                <div class="btn-group">
                  <button type="button" class="btn btn-danger dropdown-toggle btn-menuHeader" data-toggle="dropdown" style="border-radius: 10px; margin: 0px 5px;">Eliminar
                    <span class="caret"></span>
                    <span class="sr-only">Toggle Dropdown</span>
                  </button>
                  <ul class="dropdown-menu" role="menu">
                  <li>
                    <a href="<?php echo base_url();?>cPersona/verEliminarPersona">
                      <i class="fa  fa-user-times text-aqua"></i>Persona
                    </a>
                  </li>
                    <li class="divider"></li>
                  <li>
                    <a href="<?php echo base_url();?>cEmpresa/verEliminarEmpresa">
                      <i class="fa  fa-university text-yellow"></i>Empresa
                    </a>
                  </li>
                    <li class="divider"></li>
                  <li>
                    <a href="<?php echo base_url();?>cNegociacion/verEliminarNegociacion">
                      <i class="fa fa-briefcase text-red"></i>Objetivo
                    </a>
                  </li>
                  </ul>
                </div>
              </li>
   <!--        <!-- User Account: style can be found in dropdown.less -->
          <!-- <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" style="padding: 4px 0px 0px 0px; margin: 0px 5px 0px 5px;"> -->
<!--               <img src="<?php echo base_url();?>assets/dist/img/avatar04.png" class="user-image" alt="User Image">
 -->
              <!-- &nbsp;<i class="fa fa-user fa-2x"></i>
              <span class="hidden-xs"></span>
            </a>
            <ul class="dropdown-menu">
 -->              <!-- User image -->
              <!-- <li class="user-header"> -->
<!--                 <img src="<?php echo base_url();?>assets/dist/img/avatar04.png" class="img-circle" alt="User Image"> -->
<!--           &nbsp;<i class="fa fa-user fa-3x" style="color:white"></i>

                <p>
                  <?php echo $this->session->userdata('s_Usuario');?>
                  <small><?php echo $this->session->userdata('s_Puesto');?></small>
                </p>
              </li> -->
              <!-- Menu Footer-->
<!--               <li class="user-footer" style="background-color: black">
                <div class="pull-left">
                  <a href="#" class="btn btn-default btn-flat">Editar Datos</a>
                </div>
                <div class="pull-right">
                  <a href="<?php echo base_url();?>/cLogin/cerrarSession" class="btn btn-default btn-flat">Cerrar Sesión</a>
                </div>
              </li>
            </ul>
          </li> -->
        </ul>
      </div>
      </div>
    </nav>
  </header>
  <script type="text/javascript">
  var baseurl = "<?php echo base_url();?>";
  </script>