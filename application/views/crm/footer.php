  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Version</b> 1.0
    </div>
    <strong><a href=""></a>.</strong>.
  </footer>
</div>
<!-- ./wrapper -->



<!-- jQuery 2.2.3 -->
<!-- <script src="<?php echo base_url();?>assets/plugins/jQuery/jquery-2.2.3.min.js"></script> -->
<!-- jQuery UI 1.11.4 -->
<script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 3.3.6 -->
<script src="<?php echo base_url();?>assets/bootstrap/js/bootstrap.min.js"></script>
<!-- Morris.js charts -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
<script src="<?php echo base_url();?>assets/plugins/morris/morris.min.js"></script>
<!-- Sparkline -->
<script src="<?php echo base_url();?>assets/plugins/sparkline/jquery.sparkline.min.js"></script>
<!-- DataTables -->
<script src="<?php echo base_url();?>assets/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url();?>assets/plugins/datatables/dataTables.bootstrap.min.js"></script>
<!-- jvectormap -->
<script src="<?php echo base_url();?>assets/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="<?php echo base_url();?>assets/plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<!-- jQuery Knob Chart -->
<script src="<?php echo base_url();?>assets/plugins/knob/jquery.knob.js"></script>
<!-- Select2 -->
<script src="<?php echo base_url();?>assets/plugins/select2/select2.full.min.js"></script>
<!-- InputMask -->
<script src="<?php echo base_url();?>assets/plugins/input-mask/jquery.inputmask.js"></script>
<script src="<?php echo base_url();?>assets/plugins/input-mask/jquery.inputmask.date.extensions.js"></script>
<script src="<?php echo base_url();?>assets/plugins/input-mask/jquery.inputmask.extensions.js"></script>
<script src="<?php echo base_url();?>assets/plugins/datepicker/bootstrap-datepicker.js"></script>
<!-- bootstrap color picker-->
<script src="<?php echo base_url();?>assets/plugins/colorpicker/bootstrap-colorpicker.min.js"></script>
<!-- bootstrap time picker -->
<script src="<?php echo base_url();?>assets/plugins/timepicker/bootstrap-timepicker.min.js"></script>
<!-- SlimScroll 1.3.0 -->
<script src="<?php echo base_url();?>assets/plugins/slimScroll/jquery.slimscroll.min.js"></script>
<!-- iCheck 1.0.1 -->
<script src="<?php echo base_url();?>assets/plugins/iCheck/icheck.min.js"></script>
<!-- FastClick -->
<script src="<?php echo base_url();?>assets/plugins/fastclick/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url();?>assets/dist/js/app.min.js"></script>
<script src="<?php echo base_url();?>assets/dist/js/app.min.js"></script>

<!-- Bootstrap WYSIHTML5 -->
<script src="<?php echo base_url();?>assets/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<!-- AdminLTE for demo purposes -->
<!-- bootstrap datepicker -->
<script type="text/javascript" src="<?php echo base_url();?>assets/moment/moment.min.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/moment/locale/es.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/bootstrap-datetimepicker4/js/bootstrap-datetimepicker.min.js"></script>
<script src="<?php echo base_url();?>Js/EasyAutocomplete/jquery.easy-autocomplete.min.js"></script> 
<script src="<?php echo base_url();?>Js/custom-file-input.js"></script>
<!-- Page script -->
<script>
  $(function () {
    //Initialize Select2 Elements
    $(".select2").select2();

    //Datemask dd/mm/yyyy
    $("#datemask").inputmask("dd/mm/yyyy", {"placeholder": "dd/mm/yyyy"});
    //Datemask2 mm/dd/yyyy
    $("#datemask2").inputmask("mm/dd/yyyy", {"placeholder": "mm/dd/yyyy"});
    //Money Euro
    $("[data-mask]").inputmask();

    //iCheck for checkbox and radio inputs
    $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
      checkboxClass: 'icheckbox_minimal-blue',
      radioClass: 'iradio_minimal-blue'
    });
    //Red color scheme for iCheck
    $('input[type="checkbox"].minimal-red, input[type="radio"].minimal-red').iCheck({
      checkboxClass: 'icheckbox_minimal-red',
      radioClass: 'iradio_minimal-red'
    });
    //Flat red color scheme for iCheck
    $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
      checkboxClass: 'icheckbox_flat-green',
      radioClass: 'iradio_flat-green'
    });

    //Colorpicker
    $(".my-colorpicker1").colorpicker();
    //color picker with addon
    $(".my-colorpicker2").colorpicker();

    //Timepicker
    $(".timepicker").timepicker({
      showInputs: false
    });
  });
</script>

<!-- Obtener fecha hacia un input "datepicker inline" -->
<script type="text/javascript">
    $(document).ready(function () {
        $(function () {
            $('#datepicker').datetimepicker({
              locale:'es',
                inline: true,
                sideBySide: true,
                format:'L',
                format:"YYYY-MM-DD"
            });
        });
    });
</script>
<script type="text/javascript">
    $(document).ready(function () {
        $(function () {
            $('#calendario').datetimepicker({
              locale:'es',
                inline: true,
                sideBySide: true,
                format:'L',
                format:"YYYY-MM-DD"
            });
        });
    });
</script>
<script type="text/javascript">
    $(document).ready(function () {
        $(function () {
            $('#datepickerP').datetimepicker({
              locale:'es',
                inline: true,
                sideBySide: true,
                format:'L',
                format:"YYYY-MM-DD"
            });
        });
    });
</script>
<script type="text/javascript">
    $(document).ready(function () {
        $(function () {
            $('#datepickerE').datetimepicker({
              locale:'es',
                inline: true,
                sideBySide: true,
                format:'L',
                format:"YYYY-MM-DD"
            });
        });
    });
</script>
<script type="text/javascript">
  $(function() {              
     $('#FechaLimite').datetimepicker({
           format: 'DD/MM/YYYY'
     });
  }); 
</script>
<script type="text/javascript">
  $(function() {              
     $('#FechaLimiteP').datetimepicker({
           format: 'DD/MM/YYYY'
     });
  }); 
</script>
<!-- Scripts del proyecto -->
<script src="<?php echo base_url();?>Js/typeahead.js"></script>
<script src="<?php echo base_url();?>Js/Global.js"></script>

<?php if ($this->uri->segment(1)==='cCalendario'): ?>
  <script src="<?php echo base_url();?>Js/Calendar.js"></script>
<?php endif ?>

<?php
 if ($this->uri->segment(1)=='cInicio'){ ?>
 <script src="<?php echo base_url();?>Js/Inicio.js"></script>
<script src="<?php echo base_url();?>Js/Calendar.js"></script>
 <script>
$('#linkMenuInicio').addClass('active');
$('#linkMenuContactos').removeClass('active');
$('#linkMenuNegociacion').removeClass('active');
$('#linkMenuTareas').removeClass('active');
$('#linkMenuObjetivos').removeClass('active');
$('#linkMenuForo').removeClass('active');
$('#linkMenuUsuarios').removeClass('active');
 </script>
<?php } ?>

<?php if ($this->uri->segment(1)==='cEmpresa') {?>
  <script src="<?php echo base_url();?>Js/empresa.js"></script>
  <script src="<?php echo base_url();?>Js/verEmpresa.js"></script>
  <script src="<?php echo base_url();?>Js/negociacion.js"></script>
     <script>
      $('#linkMenuInicio').removeClass('active');
      $('#linkMenuInicio').removeClass('active');
      $('#linkMenuContactos').addClass('active');
      $('#linkMenuNegociacion').removeClass('active');
      $('#linkMenuTareas').removeClass('active');
      $('#linkMenuObjetivos').removeClass('active');
      $('#linkMenuForo').removeClass('active');
      $('#linkMenuUsuarios').removeClass('active');
     </script>
<?php } ?>

<?php if ($this->uri->segment(1)==='cNegociacion') {?>
  <script src="<?php echo base_url();?>Js/negociacion.js"></script>
     <script>
      $('#linkMenuInicio').removeClass('active');
      $('#linkMenuInicio').removeClass('active');
      $('#linkMenuContactos').addClass('active');
      $('#linkMenuNegociacion').addClass('active');
      $('#linkMenuTareas').removeClass('active');
      $('#linkMenuObjetivos').removeClass('active');
      $('#linkMenuForo').removeClass('active');
      $('#linkMenuUsuarios').removeClass('active');
     </script>
<?php } ?>

<?php if ($this->uri->segment(1)==='cContactos') {?>
  <script src="<?php echo base_url();?>Js/contactos.js"></script>
   <script>
    $('#linkMenuInicio').removeClass('active');
    $('#linkMenuContactos').addClass('active');
    $('#linkMenuContactos2').addClass('active');
    $('#linkMenuNegociacion').removeClass('active');
    $('#linkMenuTareas').removeClass('active');
    $('#linkMenuObjetivos').removeClass('active');
    $('#linkMenuForo').removeClass('active');
    $('#linkMenuUsuarios').removeClass('active');
 </script>
<?php } ?>

<?php if ($this->uri->segment(1)==='cTareas') {?>
  <script src="<?php echo base_url();?>Js/Tareas.js"></script>
     <script>
      $('#linkMenuInicio').removeClass('active');
      $('#linkMenuInicio').removeClass('active');
      $('#linkMenuContactos').addClass('active');
      $('#linkMenuNegociacion').removeClass('active');
      $('#linkMenuTareas').addClass('active');
      $('#linkMenuObjetivos').removeClass('active');
      $('#linkMenuForo').removeClass('active');
      $('#linkMenuUsuarios').removeClass('active');
     </script>
<?php } ?>

<?php if($this->uri->segment(1)==='cTareasInternas'){?>
  <script src="<?php echo base_url();?>Js/TareasInternas.js"></script>
<?php } ?>

<?php if($this->uri->segment(1)==='CObjetivos'){?>
  <script src="<?php echo base_url();?>Js/Objetivos.js"></script>
   <script>
      $('#linkMenuInicio').removeClass('active');
      $('#linkMenuInicio').removeClass('active');
      $('#linkMenuContactos').removeClass('active');
      $('#linkMenuNegociacion').removeClass('active');
      $('#linkMenuTareas').removeClass('active');
      $('#linkMenuObjetivos').addClass('active');
      $('#linkMenuForo').removeClass('active');
      $('#linkMenuUsuarios').removeClass('active');
   </script>
<?php } ?>

<?php if ($this->uri->segment(1)==='cForo') {?>
  <script src="<?php echo base_url();?>Js/Foro.js"></script>
     <script>
      $('#linkMenuInicio').removeClass('active');
      $('#linkMenuInicio').removeClass('active');
      $('#linkMenuContactos').removeClass('active');
      $('#linkMenuNegociacion').removeClass('active');
      $('#linkMenuTareas').removeClass('active');
      $('#linkMenuObjetivos').removeClass('active');
      $('#linkMenuForo').addClass('active');
      $('#linkMenuUsuarios').removeClass('active');
     </script>
<?php } ?>

<?php if ($this->uri->segment(1)=='cPersona') {?>
    <script src="<?php echo base_url();?>Js/persona.js"></script>
    <script src="<?php echo base_url();?>Js/negociacion.js"></script>
     <script>
      $('#linkMenuInicio').removeClass('active');
      $('#linkMenuInicio').removeClass('active');
      $('#linkMenuContactos').addClass('active');
      $('#linkMenuNegociacion').removeClass('active');
      $('#linkMenuTareas').removeClass('active');
      $('#linkMenuObjetivos').removeClass('active');
      $('#linkMenuForo').removeClass('active');
      $('#linkMenuUsuarios').removeClass('active');
     </script>
<?php } ?>

<?php if ($this->uri->segment(2)=='VerNegociacion') {?>
  <script src="<?php echo base_url();?>Js/verNegociacion.js"></script>
<?php } ?>

<?php if ($this->uri->segment(2)==='verTarea') {?>
  <script src="<?php echo base_url();?>Js/verTarea.js"></script>
<?php }?>

<?php if ($this->uri->segment(2)==='verNegociacion') {?>
  <script src="<?php echo base_url();?>Js/verNegociacion.js"></script>
<?php } ?>

<?php if ($this->uri->segment(2)==='verPersona') {?>
  <script src="<?php echo base_url();?>Js/verPersona.js"></script>
<?php } ?>

<?php if ($this->uri->segment(1)==='cUsuario') {?>
     <script>
      $('#linkMenuInicio').removeClass('active');
      $('#linkMenuInicio').removeClass('active');
      $('#linkMenuContactos').removeClass('active');
      $('#linkMenuNegociacion').removeClass('active');
      $('#linkMenuTareas').removeClass('active');
      $('#linkMenuObjetivos').removeClass('active');
      $('#linkMenuForo').removeClass('active');
      $('#linkMenuUsuarios').addClass('active');
     </script>
<?php } ?>

<script src="<?php echo base_url();?>Js/jquery-confirm.min.js"></script>
<script>
  $(document).ready(function() {
    // Setup - add a text input to each footer cell
    $('#TablaTareas tfoot th').each( function () {
        var title = $(this).text();
        if (title!=='Acciones'){
        $(this).html( '<input type="text" placeholder="Filtrar '+title+'" />' );}
        else{
          $(this).html( '' );}
      });

    // DataTable 
     var table = $('#TablaTareas').DataTable({

      "paging": true,
      "lengthChange": false,
      "searching": true,
      "ordering": true,
      "info": false,
      "autoWidth": true,
          oLanguage: {
            "sProcessing":     "Procesando...",
            "sLengthMenu":     "Mostrar _MENU_ registros",
            "sZeroRecords":    "No se encontraron resultados",
            "sEmptyTable":     "Ningún dato disponible en esta tabla",
            "sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
            "sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0 registros",
            "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
            "sInfoPostFix":    "",
            "sSearch":         "Buscar:",
            "sUrl":            "",
            "sInfoThousands":  ",",
            "sLoadingRecords": "Cargando...",
            "oPaginate": {
            "sFirst":    "Primero",
            "sLast":     "Último",
            "sNext":     "Siguiente",
            "sPrevious": "Anterior"
            }}
    });

    $('#column2_search').on( 'keyup', function () {
    table
        .columns( 2 )
        .search( this.value )
        .draw();
      });

    // Apply the search
    table.columns().every( function () {
        var that = this;
 
        $( 'input', this.footer() ).on( 'keyup change', function () {
            if ( that.search() !== this.value ) {
                that
                    .search( this.value )
                    .draw();
            }
        });
    });
  var r = $('#TablaTareas tfoot tr');
  r.find('th').each(function(){
    $(this).css('padding', 8);
  });
  $('#TablaTareas thead').append(r);
  $('#search_0').css('text-align', 'center');
  });
</script>
<script>
  $(document).ready(function() {
    // Setup - add a text input to each footer cell
    $('#example1 tfoot th').each( function () {
        var title = $(this).text();
        if (title!='Acciones'){
        $(this).html( '<input type="text" placeholder="Filtrar '+title+'" />' );}
        else{
          $(this).html( '' );}
      });

    // DataTable 
    var table = $('#example1').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": true,
      "ordering": true,
      "info": false,
      "autoWidth": true,
          oLanguage: {
            "sProcessing":     "Procesando...",
            "sLengthMenu":     "Mostrar _MENU_ registros",
            "sZeroRecords":    "No se encontraron resultados",
            "sEmptyTable":     "Ningún dato disponible en esta tabla",
            "sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
            "sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0 registros",
            "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
            "sInfoPostFix":    "",
            "sSearch":         "Buscar:",
            "sUrl":            "",
            "sInfoThousands":  ",",
            "sLoadingRecords": "Cargando...",
            "oPaginate": {
            "sFirst":    "Primero",
            "sLast":     "Último",
            "sNext":     "Siguiente",
            "sPrevious": "Anterior"
            }}
    });
    // Apply the search
    table.columns().every( function () {
        var that = this;
 
        $( 'input', this.footer() ).on( 'keyup change', function () {
            if ( that.search() !== this.value ) {
                that
                    .search( this.value )
                    .draw();
            }
        });
    });
  var r = $('#example1 tfoot tr');
  r.find('th').each(function(){
    $(this).css('padding', 8);
  });
  $('#example1 thead').append(r);
  $('#search_0').css('text-align', 'center');

  });
</script>
<script>
  $(document).ready(function() {
    // Setup - add a text input to each footer cell
    $('#example2 tfoot th').each( function () {
        var title = $(this).text();
        if (title!='Acciones'){
        $(this).html( '<input type="text" placeholder="Filtrar '+title+'" />' );}
        else{
          $(this).html( '' );}
      });

    // DataTable
    var table = $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": true,
      "ordering": true,
      "info": false,
      "autoWidth": true,
          oLanguage: {
            "sProcessing":     "Procesando...",
            "sLengthMenu":     "Mostrar _MENU_ registros",
            "sZeroRecords":    "No se encontraron resultados",
            "sEmptyTable":     "Ningún dato disponible en esta tabla",
            "sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
            "sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0 registros",
            "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
            "sInfoPostFix":    "",
            "sSearch":         "Buscar:",
            "sUrl":            "",
            "sInfoThousands":  ",",
            "sLoadingRecords": "Cargando...",
            "oPaginate": {
            "sFirst":    "Primero",
            "sLast":     "Último",
            "sNext":     "Siguiente",
            "sPrevious": "Anterior"
            }}
    });
 
    // Apply the search
    table.columns().every( function () {
        var that = this;
 
        $( 'input', this.footer() ).on( 'keyup change', function () {
            if ( that.search() !== this.value ) {
                that
                    .search( this.value )
                    .draw();
            }
        });
    });
  var r = $('#example2 tfoot tr');
  r.find('th').each(function(){
    $(this).css('padding', 8);
  });
  $('#example2 thead').append(r);
  $('#search_0').css('text-align', 'center');

  });
</script>
<script>
  $(document).ready(function() {
    // Setup - add a text input to each footer cell
    $('#tablaObEmpresas tfoot th').each( function () {
        var title = $(this).text();
        $(this).html( '<input type="text" placeholder="Filtrar '+title+'" />' );
      });

    // DataTable
    var table = $('#tablaObEmpresas').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": true,
      "ordering": true,
      "info": false,
      "autoWidth": true,
          oLanguage: {
            "sProcessing":     "Procesando...",
            "sLengthMenu":     "Mostrar _MENU_ registros",
            "sZeroRecords":    "No se encontraron resultados",
            "sEmptyTable":     "Ningún dato disponible en esta tabla",
            "sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
            "sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0 registros",
            "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
            "sInfoPostFix":    "",
            "sSearch":         "Buscar:",
            "sUrl":            "",
            "sInfoThousands":  ",",
            "sLoadingRecords": "Cargando...",
            "oPaginate": {
            "sFirst":    "Primero",
            "sLast":     "Último",
            "sNext":     "Siguiente",
            "sPrevious": "Anterior"
            }}
    });
 
    // Apply the search
    table.columns().every( function () {
        var that = this;
 
        $( 'input', this.footer() ).on( 'keyup change', function () {
            if ( that.search() !== this.value ) {
                that
                    .search( this.value )
                    .draw();
            }
        });
    });
  var r = $('#tablaObEmpresas tfoot tr');
  r.find('th').each(function(){
    $(this).css('padding', 8);
  });
  $('#tablaObEmpresas thead').append(r);
  $('#search_0').css('text-align', 'center');

  });
</script>
<script>
  $(document).ready(function() {
    // Setup - add a text input to each footer cell
    $('#tablaObPersonas tfoot th').each( function () {
        var title = $(this).text();
        $(this).html( '<input type="text" placeholder="Filtrar '+title+'" />' );

      });

    // DataTable
    var table = $('#tablaObPersonas').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": true,
      "ordering": true,
      "info": false,
      "autoWidth": true,
          oLanguage: {
            "sProcessing":     "Procesando...",
            "sLengthMenu":     "Mostrar _MENU_ registros",
            "sZeroRecords":    "No se encontraron resultados",
            "sEmptyTable":     "Ningún dato disponible en esta tabla",
            "sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
            "sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0 registros",
            "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
            "sInfoPostFix":    "",
            "sSearch":         "Buscar:",
            "sUrl":            "",
            "sInfoThousands":  ",",
            "sLoadingRecords": "Cargando...",
            "oPaginate": {
            "sFirst":    "Primero",
            "sLast":     "Último",
            "sNext":     "Siguiente",
            "sPrevious": "Anterior"
            }}
    });
 
    // Apply the search
    table.columns().every( function () {
        var that = this;
 
        $( 'input', this.footer() ).on( 'keyup change', function () {
            if ( that.search() !== this.value ) {
                that
                    .search( this.value )
                    .draw();
            }
        });
    });
  var r = $('#tablaObPersonas tfoot tr');
  r.find('th').each(function(){
    $(this).css('padding', 8);
  });
  $('#tablaObPersonas thead').append(r);
  $('#search_0').css('text-align', 'center');

  });
</script>
<script>
  $(function () {
    $('#tablaForos').DataTable({
      "paging": true,
      "lengthChange": true,
      "searching": true,
      "ordering": true,
      "binfo": true,
      "autoWidth": true,
          oLanguage: {
            "sProcessing":     "Procesando...",
            "sLengthMenu":     "Mostrar _MENU_ registros",
            "sZeroRecords":    "No se encontraron resultados",
            "sEmptyTable":     "Ningún dato disponible en esta tabla",
            "sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
            "sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0 registros",
            "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
            "sInfoPostFix":    "",
            "sSearch":         "Buscar:",
            "sUrl":            "",
            "sInfoThousands":  ",",
            "sLoadingRecords": "Cargando...",
            "oPaginate": {
            "sFirst":    "Primero",
            "sLast":     "Último",
            "sNext":     "Siguiente",
            "sPrevious": "Anterior"
            }}
    });
  });
</script>
</body>
</html>