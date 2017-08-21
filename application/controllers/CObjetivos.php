<?php ob_start(); ?>
<?php
/**
* 
*/
class cObjetivos extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->model('crm/mObjetivo');
		$this->load->model('crm/mMetas');
		$this->load->model('crm/mTareas');
		// $this->load->model('crm/mMailer');
	}
	public function index(){
		if($this->session->userdata('s_login')==1){
			$data['Objetivo'] = $this->mObjetivo->getObjetivos();
			$this->load->view('crm/header');
			$this->load->view('crm/menu');
			$this->load->view('crm/vObjetivos',$data);
			$this->load->view('crm/footer');
		}
		else{redirect(base_url().cLogin);}
	}
	public function guardarObjetivo(){

		$param['TituloObjetivo'] = $this->input->post('TituloObjetivo');
		$param['Prioridad'] = $this->input->post('Prioridad');
		$param['Status'] = $this->input->post('Status');
		$param['Origen'] = $this->input->post('Origen');

		$ultimaTarea=$this->mObjetivo->guardarObjetivo($param);

	}
	public function verObjetivo($idObjetivo)
	{
		$data['Objetivo'] = $this->mObjetivo->getObjetivoPorId($idObjetivo);
		$this->load->view('crm/header');
		$this->load->view('crm/menu');
		$this->load->view('crm/vVerObjetivo',$data);
		$this->load->view('crm/footer');
	}
	public function verMeta($idMeta)
	{
		$data['Meta'] = $this->mMetas->getMeta($idMeta);
		$this->load->view('crm/header');
		$this->load->view('crm/menu');
		$this->load->view('crm/vVerMeta',$data);
		$this->load->view('crm/footer');
	}
	public function guardarMeta(){
	$param['TituloMeta'] = $this->input->post('TituloMeta');
	$param['Prioridad'] = $this->input->post('Prioridad');
	$param['Status'] = $this->input->post('Status');
	$param['Descripcion'] = $this->input->post('Descripcion');
	$param['idObjetivo'] = $this->input->post('idObjetivos');
	$result = $this->mMetas->guardarMeta($param);
	}
	public function getMetasPorObjetivo(){
	$s = $this->input->post('idObjetivos');
	$resultado = $this->mObjetivo->getMetasPorObjetivo($s);
	echo json_encode($resultado);
	}
	public function getTareasPorMeta(){
	$s = $this->input->post('idMeta');
	$resultado = $this->mObjetivo->getTareasPorMeta($s);
	echo json_encode($resultado);
	}
	public function guardarTareaInterna(){
	$param['TituloTarea'] =  $this->input->post('TituloTarea');
	$param['Categoria'] =  $this->input->post('Categoria');
	$param['Prioridad'] =  $this->input->post('Prioridad');
	$param['Asignados'] = NULL;

	$param['EmpresasPart'] = NULL;
	$param['PersonasPart'] = NULL;
	$param['idPersona'] = NULL;
	$param['idNegociacion'] = NULL;
	$param['idEmpresa'] = NULL;
	$param['idMeta'] = $this->input->post('idMeta');

	$param['Descripcion'] =  $this->input->post('Descripcion');
	$param['datepickerE'] =  $this->input->post('datepickerE');
	$param['FechaFin'] =  $this->input->post('FechaFinE');
	$param['idUsuarioCrea'] =  $this->input->post('idUsuarioc');

		if(isset($_POST['UsuarioTareaInterna'])){
			foreach ($_POST['UsuarioTareaInterna'] as $asignados_value){
			$param['Asignados'] = $param['Asignados'].','.$asignados_value;
		}
		}
		$ultimaTarea=$this->mTareas->guardarTarea($param);
		$param['UltimaTarea']=$ultimaTarea;
		if ($ultimaTarea>0) {
			foreach ($_POST['UsuarioTareaInterna'] as $asignados_value){
			$this->mTareas->guardarParticipantes($asignados_value,$param);
			}
			$this->index();
			}
	}
	public function eliminarTareaInterna(){
		$s = $this->input->post('Tareaid');
		$result= $this->mTareas->eliminarTareaInterna($s);
	}
}