  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image ">
          &nbsp;<i class="fa fa-user fa-2x" style="color:white"></i>     
      </div>
        <div class="pull-left info">
          <p class="h5"></p><?php echo $this->session->userdata('s_Usuario');?> 
        </div>
      </div>
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" id="Menu">
        <li class="header" style="color:white">General</li>
        <li id="linkMenuInicio" class="treeview">
          <a href="<?php echo base_url();?>cInicio">
            <i class="fa  fa-home"></i> 
            <span>Inicio</span>
            <span class="pull-right-container">
            </span>
          </a>
        </li>
        <li id="linkMenuContactos" class="treeview">
          <a href="<?php echo base_url();?>cContactos">
            <i class="fa fa-users"></i>
            <span>Contactos</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li id="linkMenuContactos2">
              <a id="" href="<?php echo base_url();?>cContactos"><i class="fa fa-users"></i>Personas - Empresas</a>
            </li>          
            <li id="linkMenuNegociacion">
              <a id="" href="<?php echo base_url();?>cNegociacion"><i class="fa fa-calendar"></i>Objetivos</a>
            </li>
            <li id="linkMenuTareas">
                <a id="" href="<?php echo base_url();?>cTareas">
                <i class="fa  fa-file-text-o"></i> <span>Tareas</span>
                </a>
            </li>
          </ul>
        </li>
        <li class="header" style="color:white">Usuario</li>
        <li id="linkMenuObjetivos" class="treeview">
          <a id="" href="<?php echo base_url();?>CObjetivos">
            <i class="fa fa-calendar-check-o"></i>
            <span>Objetivos internos</span>
          </a>
        </li>
        <li id="linkMenuForo" class="treeview">
          <a id="" href="<?php echo base_url();?>cForo">
            <i class="fa fa-comment"></i>
            <span>Foro</span>
          </a>
        </li>
        <li id="linkMenuUsuarios" class="treeview">
          <a id="" href="<?php echo base_url();?>cLogin/cerrarSession">
            <i class="fa  fa-clock-o"></i>
            <span>Cerrar sesión</span>
          </a>
        </li>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>
<div class="content-wrapper" id="cuerpo">
