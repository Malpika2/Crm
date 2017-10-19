<style type="text/css">
[data-notify="container"][class*="alert-pastel-"] {
  background-color: rgb(255, 255, 238);
  border-width: 0px;
  border-left: 15px solid rgb(255, 240, 106);
  border-radius: 0px;
  box-shadow: 0px 0px 5px rgba(51, 51, 51, 0.3);
  font-family: 'Old Standard TT', serif;
  letter-spacing: 1px;
}
[data-notify="container"].alert-pastel-info {
  border-left-color: rgb(255, 179, 40);
}
[data-notify="container"].alert-pastel-danger {
  border-left-color: rgb(255, 103, 76);
}
[data-notify="container"][class*="alert-pastel-"] > [data-notify="title"] {
  color: rgb(80, 80, 57);
  display: block;
  font-weight: 700;
  margin-bottom: 5px;
}
[data-notify="container"][class*="alert-pastel-"] > [data-notify="message"] {
  font-weight: 400;
}
#BuscadorHeader{
width: 100%;
padding: 5px 5px !important;
}
#BuscadorHeaderP{
width: 100% !important;
padding: 5px 5px !important;
}
.select2 {

  display: initial;
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
<!--   <link rel="stylesheet" href="<?php echo base_url();?>assets/plugins/datepicker/datepicker3.css">
 -->  <!-- iCheck for checkboxes and radio inputs -->

    <link rel="stylesheet" type="text/css" media="screen" href="<?php echo base_url();?>assets/bootstrap-datetimepicker4/css/bootstrap-datetimepicker.min.css">


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
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/dist/css/component.css" />
<!-- <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/alertify/alertify.core.css"> -->
<!-- <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/alertify/alertify.default.css"> -->
<!-- jQuery 2.2.3 -->
<script src="<?php echo base_url();?>assets/plugins/jQuery/jquery-2.2.3.min.js"></script>
<script src="https://js.pusher.com/4.1/pusher.min.js"></script>
<!-- <script src="<?php echo base_url();?>assets/notify/notify.js"></script> -->



<link href='<?php echo base_url();?>assets/fullcalendar/fullcalendar.min.css' rel='stylesheet' />
<link href='<?php echo base_url();?>assets/fullcalendar/fullcalendar.print.min.css' rel='stylesheet' media='print' />
<script src='<?php echo base_url();?>assets/fullcalendar/lib/moment.min.js'></script>
<!-- <script src='<?php echo base_url();?>assets/fullcalendar/lib/jquery.min.js'></script> -->
<script src='<?php echo base_url();?>assets/fullcalendar/fullcalendar.min.js'></script>
<script src='<?php echo base_url();?>assets/fullcalendar/locale/es.js'></script>
<script src="<?php echo base_url();?>assets/bootstrap-notify/bootstrap-notify.js"></script>
<script src="<?php echo base_url();?>assets/bootstrap-notify/bootstrap-notify.min.js"></script>
</head>
<script type="text/javascript">
  var NombreUsuarioActivo = "User<?php echo $this->session->userdata('s_idUsuario'); ?>"

    // Pusher.log = function(message) {
    //   if (window.console && window.console.log) {
    //     window.console.log(message);
    //   }
    // };

    var pusher = new Pusher('0824bf96b5ad5478d289');
    var presenceChannelUser = pusher.subscribe(NombreUsuarioActivo);
    presenceChannelUser.bind('Notificacion', function(data) {

$.notify({
  title: '<strong><p>Tienes una nueva tarea:</p></strong>',
  message:'<div style="text-overflow:ellipsis; white-space: nowrap; overflow:hidden; width:100%;">'+data.message+'</div>'
},{
  type: 'success'
});

  $.post(baseurl+'cNotificaciones/getNotificaciones/',
    {idUsuarioActivo:idUsuarioActivo},
    function(data){
          $('#notificaciones_menu').html('');
      var num_notificaciones=0;
      var Notificaciones = JSON.parse(data);
      $.each(Notificaciones,function(i,item){
        num_notificaciones++;
        $('#notificaciones_menu').append(
        '<li class="divider"></li>'+
          '<li class="col-md-12" style="padding:0px; margin:0px;">'+
              '<a href="'+baseurl+'cPersona/verTarea/'+item.idTarea+'" class="col-md-10">'+
                '<i class="fa fa-file-text-o text-green col-md-1" style="padding:0px; margin:0px;"></i>'+
                '<div style="overflow:hidden; text-overflow:ellipsis; padding:0px;">'+item.TituloTarea+''+
                '</div>'+
              '</a>'+
              '<button onClick="NotifVisto('+item.idNotificaciones+')" class=" btn btn-danger btn-xs"><i class="fa  fa-minus-square"></i></button>'+
          '</li>'+
          '<hr>')

      });
            if (num_notificaciones===0){
        $('#notificaciones_menu').append('<li class="text-center">No hay notificaciones nuevas</li>');
      }
      $('#ContadorNotificaciones').html(num_notificaciones);

    });  

      });
  </script>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <header class="main-header">
    <!-- Logo -->
    <a href="<?php echo base_url('cInicio'); ?>" class="logo" style="height: 59px">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b></b>SPP</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg text-center">
     <b>C.R.M</b>
      </span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <div class="navbar-custom-menu" style="float: left; width: 95%;">
        <ul class="nav navbar-nav" style="width: 100%">
          <li class="" style="padding: 15px 5% 0px 5%">
            <div class="">
              <input id="BuscadorHeaderP" class="form-control" type="text" placeholder="Buscar Persona">
            </div>
          </li>
          <li style="padding: 15px 5% 0px 5%">
            <div class="">          
              <input type="text" class="form-control" name="BuscadorHeader" id="BuscadorHeader" placeholder="Buscar Empresas">
            </div>
          </li>

            
          <li class="dropdown messages-menu">
            <a href="" class="dropdown-toggle" data-toggle="dropdown">
               <button type="button" class="btn btn-success" style="border-radius: 10px; margin:0px 10px 0px 0px; ">Crear
                  <span class="caret"></span>
              </button>
            </a>
            <ul class="dropdown-menu">
                <li class="header">Nueva:</li>
                <li>
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
                    <li>
                      <a href="<?php echo base_url();?>cTareas">
                      <i class="fa fa-file-text-o text-green"></i>Tarea
                      </a>
                    </li>
                  </ul>
                </li>
            </ul>
          </li>
          <li class="dropdown notifications-menu">
            <a href="" class="dropdown-toggle" data-toggle="dropdown">
              <button type="button" class="btn btn-danger btn-menuHeader" style="border-radius: 10px; margin: 0px 5px;">Eliminar
                <span class="caret"></span>
              </button>
            </a>
            <ul class="dropdown-menu">
              <li class="header">Eliminar</li>
              <li>
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
          <li class="dropdown notifications-menu">
            <a href="" class="dropdown-toggle" data-toggle="dropdown" style="margin-bottom:7px;">
                  <i class="fa  fa-exclamation-circle fa-2x"></i>
                  <span class="label label-primary" id="ContadorNotificaciones" style="font-size: 1em; top: 5px;"></span>
            </a>
            <ul class="dropdown-menu">
              <li class="header">Notificaciones:</li>
              <li>
                <ul class="menu" id="notificaciones_menu" name="notificaciones_menu">
                </ul>
              </li>
            </ul>
          </li>
        </ul>
      </div>

    </nav>
  </header>
  <script type="text/javascript">
  var baseurl = "<?php echo base_url();?>";
  </script>