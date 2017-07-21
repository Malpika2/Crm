<?php 

class cGetComentarios extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->model('crm/mComentarios');
	}
	public function getComentarios_Por_Persona(){
		$s = $this->input->post('idPersona');
		$resultado = $this->mComentarios->getComentarios_Por_Persona($s);
		echo json_encode($resultado);
	}
	public function getComentarios_Por_Empresa(){
		$s = $this->input->post('idEmpresa');
		$resultado = $this->mComentarios->getComentarios_Por_Empresa($s);
		echo json_encode($resultado);
	}
	public function getComentarios_Por_Comentario(){
		$s = $this->input->post('idComentario');
		$resultado = $this->mComentarios->getComentarios_Por_Comentario($s);
		echo json_encode($resultado);
	}
	public function getComentarios_Por_Tarea(){
		$s = $this->input->post('idTarea');
		$resultado = $this->mComentarios->getComentarios_Por_Tarea($s);
		echo json_encode($resultado);
	}
	public function getComentarios_Por_Negociacion(){
		$s = $this->input->post('idNegociacion');
		$resultado = $this->mComentarios->getComentarios_Por_Negociacion($s);
		echo json_encode($resultado);
	}		
	
}