<?php
/**
* 
*/
class cTareasInternas extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->model('crm/mTareas');
		$this->load->model('crm/mMailer');
	}
	public function index(){
		$data['Tareas'] = $this->mTareas->getTareasInternas();
		$this->load->view('crm/header');
		$this->load->view('crm/menu');
		$this->load->view('crm/vTareasInternas',$data);
		$this->load->view('crm/footer');
	}

	public function getTareasInternas(){
		$s = $this->input->post('idUsuarioActivo');
		$resultado = $this->mTareas->getTareasInternas($s);
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
			$this->mMailer->enviarCorreo($ultimaTarea,$param);
			}
			$this->index();
			}
	}
	public function eliminarTareaInterna(){
		$s = $this->input->post('Tareaid');
		$result= $this->mTareas->eliminarTareaInterna($s);
	}
}