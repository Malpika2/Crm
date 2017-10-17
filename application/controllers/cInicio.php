<?php ob_start(); ?>
<?php
/**
* 
*/
class cInicio extends CI_Controller
{
	function __construct()
	{
		parent::__construct();			
	}
	public function index(){
	if($this->session->userdata('s_login')==1){
		$this->load->view('crm/header');
		$this->load->view('crm/menu');
		$this->load->view('crm/vCalendario');
		$this->load->view('crm/footer');		
	}
	else{
		redirect(base_url().cLogin);
		}
	}
	public function getEventosTareas(){
		$r = $this->mCalendario->getEventosTareas();
		echo json_encode($r);
	}
	public function getEventosObjetivos(){
		$r = $this->mCalendario->getEventosObjetivos();
		echo json_encode($r);
	}
}