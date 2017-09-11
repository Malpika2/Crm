<?php
class cCalendario extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->model('crm/mCalendario');
	}
	public function index(){
		$this->load->view('crm/header');
		$this->load->view('crm/menu');
		$this->load->view('crm/vCalendario');
		$this->load->view('crm/footer');
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