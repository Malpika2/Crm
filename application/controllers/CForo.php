<?php
/**
* 
*/
class cForo extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->model('crm/mForo');
		$this->load->helper('date');
	}
	public function index(){
		if($this->session->userdata('s_login')==1){
			$this->load->view('crm/header');
			$this->load->view('crm/menu');
			$this->load->view('crm/vForo');
			$this->load->view('crm/footer');
		}
		else{redirect(base_url().cLogin);}
	}
	public function guardarTema(){
	$param['TituloTema'] = $this->input->post('TituloTema');
	$param['seccion'] = $this->input->post('seccion');
	$param['AsuntoTema'] = $this->input->post('AsuntoTema');
	$param['idUsuarioCrea'] = $this->input->post('idUsuarioCrea');

	if($this->mForo->guardarTema($param)){
		$this->index();
			}

	}
	public function getTemas(){
		$resultado = $this->mForo->getTemas();
		$resultado = json_encode($resultado);
		echo $resultado;
	}
	public function getComentariosPorTema(){
		$idTema = $this->input->post('idTemaForo');
		$resultado = $this->mForo->getComentariosPorTema($idTema);
		$resultado = json_encode($resultado);
		echo $resultado;
	}
	public function guardarComentario(){
		$param['Comentario'] = $this->input->post('Comentario');
		$param['idUsuarioc'] = $this->input->post('idUsuarioc');
		$param['idTema'] = $this->input->post('idTema');
		$this->mForo->guardarComentario($param);
	}
	public function ActualizarComentario(){
		$idComentario = $this->input->post('valor');
		$comentario = $this->input->post('comentario');
		$this->mForo->ActualizarComentario($idComentario,$comentario);
		return true;
	}
	public function verTemaForo($idTema){
	$datos['row_TemaForo']	= $this->mForo->getTema($idTema);
		$this->load->view('crm/header');
		$this->load->view('crm/menu');
		$this->load->view('crm/vVerTemaForo',$datos);
		$this->load->view('crm/footer');
	}
	public function ActualizarVisto(){
		$idTema = $this->input->post('valor');
		$estado = $this->input->post('valor2');
		if ($estado=='Visto'){
			$estado=1;
		}
		if ($estado=='Pendiente') {
			$estado=2;
		}
		if ($estado=='Realizado') {
			$estado=3;
		}
		$this->mForo->ActualizarVisto($idTema,$estado);
		return true;
	}
	public function AddTareaForo(){
		$idComentario = $this->input->post('idComentario');
		$comentario = $this->input->post('comentario');
		$this->mForo->AddTareaForo($idComentario,$comentario);
		return true;
	}
	public function getTareaForo(){
		$idComentario = $this->input->post('idComentario');
		if ($idComentario>0) {
			$r = $this->mForo->getTareaForo($idComentario);
			$r = json_encode($r);
			return $r;
		}
		else{
			$r = $this->mForo->getTareaForo();
			echo json_encode($r);
		}
	}
	public function actTareaForo()
	{
		$idTareaForo = $this->input->post('idTareaForo');
		$status = $this->input->post('status');
		$this->mForo->actTareaForo($idTareaForo,$status);
	}
}			