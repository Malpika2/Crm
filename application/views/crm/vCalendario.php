<link href='<?php echo base_url();?>assets/fullcalendar/fullcalendar.min.css' rel='stylesheet' />
<link href='<?php echo base_url();?>assets/fullcalendar/fullcalendar.print.min.css' rel='stylesheet' media='print' />
<script src='<?php echo base_url();?>assets/fullcalendar/lib/moment.min.js'></script>
<script src='<?php echo base_url();?>assets/fullcalendar/lib/jquery.min.js'></script>
<script src='<?php echo base_url();?>assets/fullcalendar/fullcalendar.min.js'></script>
<script src='<?php echo base_url();?>assets/fullcalendar/locale/es.js'></script>


<style>
	#calendar {
		max-width: 900px;
		margin: 0 auto;
	}

</style>
<section class="content">
  <div class="row">

	<div class="col-md-12" id='calendar'></div>
  </div>
</section>
<script>
	var baseurl="<?php echo base_url();?>";
	var idUsuarioActivo = "<?php echo $this->session->userdata('s_idUsuario');?>";

</script>

