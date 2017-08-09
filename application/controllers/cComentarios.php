<?php ob_start(); ?>
<?php 

class cComentarios extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();	
		$this->load->model('crm/mComentarios');
		$this->load->helper('date');
	}

	public function guardarComentario(){
		$format = 'DATE_RFC822';
		$time = time();
		$fechaActual = standard_date($format, $time);
		$param['Comentario']= $this->input->post('Nota');
		$param['Fecha_Creacion'] = $fechaActual;
		$param['idPersona'] = $this->input->post('idPersona');
		$param['idUsuarioc'] = $this->input->post('idUsuarioc');
		$param['idEmpresa'] = NULL;
		$param['idNegociacion'] = $this->input->post('idNegociacion');
		$param['idTarea'] = $this->input->post('idTarea');
		$param['idComent']= NULL;
		$resultado=$this->mComentarios->guardarComentario($param);

		if($resultado>0){
			echo $resultado;
		}
	}
		public function guardarComentarioComentario(){
		$format = 'DATE_RFC822';
		$time = time();
		$fechaActual = standard_date($format, $time);
		$param['Comentario']= $this->input->post('Nota');
		$param['Fecha_Creacion'] = $fechaActual;
		$param['idPersona'] = NULL;
		$param['idUsuarioc'] = $this->input->post('idUsuarioc');
		$param['idEmpresa'] = NULL;
		$param['idNegociacion'] = NULL;
		$param['idTarea'] = NULL;
		$param['idComent']= $this->input->post('idComent');
		$resultado=$this->mComentarios->guardarComentario($param);

		if($resultado>0){
			echo $resultado;
		}
	}
		public function guardarComentarioEmpresa(){
		$format = 'DATE_RFC822';
		$time = time();
		$fechaActual = standard_date($format, $time);
		$param['Comentario']= $this->input->post('Nota');
		$param['Fecha_Creacion'] = $fechaActual;
		$param['idPersona'] = NULL;
		$param['idUsuarioc'] = $this->input->post('idUsuarioc');
		$param['idEmpresa'] = $this->input->post('idEmpresa');
		$param['idNegociacion'] = NULL;
		$param['idTarea'] = NULL;
		$resultado=$this->mComentarios->guardarComentario($param);

		if($resultado>0){
			echo $resultado;
		}
	}
}