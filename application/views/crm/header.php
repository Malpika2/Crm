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
      <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>
      <div class="col-md-9">
      <!-- search form -->
      <form action="#" method="get" class="sidebar-form" style="margin: 10px 10px; border:none">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Buscar( Personas o Empresas)...  ">
              <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
        </div>
      </form>
      <!-- /.search form -->
      </div>
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- Notifications: style can be found in dropdown.less -->
          <li class="dropdown notifications-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa  fa-plus-square fa-2x"></i>
            </a>
            <ul class="dropdown-menu" style="height: auto">
              <li class="header">Crear Nuevo</li>
              <li>
                <!-- inner menu: contains the actual data -->
                <ul class="menu">
                  <li>
                    <a href="<?php echo base_url();?>cPersona">
                      <i class="fa fa-user-plus text-aqua"></i>Persona
                    </a>
                  </li>
                  <li>
                    <a href="<?php echo base_url();?>cEmpresa">
                      <i class="fa fa-university text-yellow"></i>Empresa
                    </a>
                  </li>
                  <li>
                    <a href="<?php echo base_url();?>cNegociacion/nuevaNegociacion">
                      <i class="fa fa-briefcase text-red"></i>Objetivo
                    </a>
                  </li>
                </ul>
              </li>
            </ul>
          </li>
          <!-- Tasks: style can be found in dropdown.less -->
          <li class="dropdown notifications-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa  fa-minus-square fa-2x"></i>
            </a>
            <ul class="dropdown-menu">
              <li class="header">Eliminar</li>
              <li>
                <!-- inner menu: contains the actual data -->
                <ul class="menu">
                  <li>
                    <a href="<?php echo base_url();?>cPersona/verEliminarPersona">
                      <i class="fa  fa-user-times text-aqua"></i>Persona
                    </a>
                  </li>
                  <li>
                    <a href="<?php echo base_url();?>cEmpresa/verEliminarEmpresa">
                      <i class="fa  fa-university text-yellow"></i>Empresa
                    </a>
                  </li>
                  <li>
                    <a href="<?php echo base_url();?>cNegociacion/verEliminarNegociacion">
                      <i class="fa fa-briefcase text-red"></i>Objetivo
                    </a>
                  </li>
                </ul>
              </li>
            </ul>
          </li>

          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="<?php echo base_url();?>assets/dist/img/avatar04.png" class="user-image" alt="User Image">
              <span class="hidden-xs"></span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="<?php echo base_url();?>assets/dist/img/avatar04.png" class="img-circle" alt="User Image">

                <p>
                  <?php echo $this->session->userdata('s_Usuario');?>
                  <small><?php echo $this->session->userdata('s_Puesto');?></small>
                </p>
              </li>
              <!-- Menu Footer-->
              <li class="user-footer" style="background-color: black">
                <div class="pull-left">
                  <a href="#" class="btn btn-default btn-flat">Editar Datos</a>
                </div>
                <div class="pull-right">
                  <a href="<?php echo base_url();?>/cLogin/cerrarSession" class="btn btn-default btn-flat">Cerrar Sesión</a>
                </div>
              </li>
            </ul>
          </li>
        </ul>
      </div>
    </nav>
  </header>