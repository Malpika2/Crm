<?php 
/**
* 
*/
class cTareas extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->model('crm/mTareas');
	}
	public function index(){
		$this->load->view('crm/header');
		$this->load->view('crm/menu');
		$this->load->view('crm/vTareas');
		$this->load->view('crm/footer');
	}
	public function getTareas_deEmpresas_PorUsuario(){
		$s = $this->input->post('idUsuarioActivo');
		$resultado = $this->mTareas->getTareas_deEmpresas_PorUsuario($s);
		echo json_encode($resultado);
	}
	public function getTareas_deEmpresas_PorUsuarioGrupales(){
		$s = $this->input->post('idUsuarioActivo');
		$resultado = $this->mTareas->getTareas_deEmpresas_PorUsuarioGrupales($s);
		echo json_encode($resultado);
	}
	public function getTareas_dePersonas_PorUsuario(){
		$s = $this->input->post('idUsuarioActivo');
		$resultado = $this->mTareas->getTareas_dePersonas_PorUsuario($s);
		echo json_encode($resultado);
	}
	public function getTareas_dePersonasGrupales_PorUsuario(){
		$s = $this->input->post('idUsuarioActivo');
		$resultado = $this->mTareas->getTareas_dePersonas_PorUsuarioGrupales($s);
		echo json_encode($resultado);
	}
	
	

}