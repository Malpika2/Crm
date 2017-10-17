<?php 
class cNotificaciones extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->model('crm/mNotificaciones');
	}
	function index(){

	}
	// Las notificaciones se guardan en el modelo Tareas al guardar una tarea (por ahora);
	public function getNotificaciones(){
		$idUsuarioActivo = $this->input->post('idUsuarioActivo');
		$r=$this->mNotificaciones->getNotificaciones($idUsuarioActivo);
		echo json_encode($r);

	}
		public function trigger_event()
	{
		$pusher = $this->ci_pusher->get_pusher();

		// Set message
		$data['message'] = 'Prueba notificaciones ' . date('Y-m-d H:i:s');

		// Send message
		$canal = $this->session->userdata('s_Nombre');
		$event = $pusher->trigger($canal, 'Notificacion', $data);

		if ($event === TRUE)
		{
			echo 'Event triggered successfully!';
		}
		else
		{
			echo 'Ouch, something happend. Could not trigger event.';
		}
	}
	public function actNotificaciones(){
		$idNotificacion = $this->input->post('idNotificacion');
		$this->mNotificaciones->actNotificaciones($idNotificacion);
		return true;
	}
}