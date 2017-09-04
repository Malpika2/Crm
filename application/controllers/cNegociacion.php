<?php ob_start(); ?>
<?php
/**
* 
*/ 
class cNegociacion extends CI_Controller
{
	function __construct(){
		parent::__construct();
		$this->load->model('crm/mNegociacion');
		// $this->load->model('crm/mMailer');
	}

	public function index(){
		if($this->session->userdata('s_login')==1){
			$idUsuario =  $this->session->userdata('s_idUsuario');
			$data['row_Negociaciones'] = $this->mNegociacion->getNegociacionPorUsuario($idUsuario);
			$this->load->view('crm/header');
			$this->load->view('crm/menu');
			$this->load->view('crm/vNegociacion',$data);
			$this->load->view('crm/footer');
		}
		else{redirect(base_url().cLogin);}
	}

	public function nuevaNegociacion(){
		$this->load->view('crm/header');
		$this->load->view('crm/menu');
		$this->load->view('crm/vNuevaNegociacion');
		$this->load->view('crm/footer');
	}
	public function guardarEmpresa(){
		$param['NombreNegociacion'] = $this->input->post('NombreNegociacion');
		$param['idEmpresa'] = $this->input->post('EmpresaNegociacion');
		// $param['idPersona'] = $this->input->post('PersonaContacto');
		$param['Motivo'] = $this->input->post('Motivo');
		$param['Prioridad'] = $this->input->post('Prioridad');
		// $param['Status'] = $this->input->post('Status');
		$param['Status'] = 'En Proceso';
		$param['PersonaCargo'] = $this->input->post('PersonaCargo');
		$param['FechaLimite'] = $this->input->post('FechaLimite');
		$param['Detalles'] = $this->input->post('Detalles');
		$param['CreadaPor'] = $this->session->userdata('s_idUsuario');
		$resultado=$this->mNegociacion->guardarEmpresa($param);
		// try {
		//  	 $this->mMailer->enviarCorreoNegociacion($param);
		//  } catch (Exception $e) {
		 	
		//  }
		if($resultado>0){
			$this->load->view('crm/header');
			$this->load->view('crm/menu');
			$this->load->view('crm/vNuevaNegociacion');
			$this->load->view('crm/footer');

		}
	}
	public function guardarPersona(){
		$param['NombreNegociacion'] = $this->input->post('NombreNegociacionP');
		$param['idPersona'] = $this->input->post('PersonaNegociacion2');
		// $param['idEmpresa'] = $this->input->post('EmpresaNegociacion2');

		$param['Motivo'] = $this->input->post('MotivoP');
		$param['Prioridad'] = $this->input->post('PrioridadP');
		$param['Status'] = 'En Proceso';
		$param['PersonaCargo'] = $this->input->post('PersonaCargoP');
		$param['FechaLimite'] = $this->input->post('FechaLimiteP');
		$param['Detalles'] = $this->input->post('DetallesP');
		$param['CreadaPor'] = $this->session->userdata('s_idUsuario');
		$resultado=$this->mNegociacion->guardarPersona($param);

		// $this->mMailer->enviarCorreoNegociacion($param);

		if($resultado>0){
			$this->load->view('crm/header');
			$this->load->view('crm/menu');
			$this->load->view('crm/vNuevaNegociacion');
			$this->load->view('crm/footer');

		}
	}
		public function verEliminarNegociacion(){
		$data['Negociacion'] = $this->mNegociacion->getNegociaciones();
		$this->load->view('crm/header');
		$this->load->view('crm/menu');
		$this->load->view('crm/vEliminarNegociacion',$data);
		$this->load->view('crm/footer');
	}
		public function EliminarNegociacion(){
		$s = $this->input->post('Negociacionid');
		$result = $this->mNegociacion->EliminarNegociacion($s);
	}
	public function getNegociaciones(){
		$result = $this->mNegociacion->getNegociaciones();
		echo json_encode($result);
	}
	public function ActualizarAvance(){
		// $idNegociacion = $this->input->post('idNegociacion');
		// $Status = $this->input->post('Status');
		$result = $this->mNegociacion->ActualizarAvance();
		echo json_encode($result);
	}
	public function ActualizarRealizada(){
		$idNeg = $this->input->post('idNeg');
		$cont = $this->input->post('cont');
		$this->mNegociacion->ActualizarRealizada($idNeg,$cont);
	}
	public function ActualizarCancelada(){
		$idNeg = $this->input->post('idNeg');	
		$cont = $this->input->post('cont');
		$this->mNegociacion->ActualizarCancelada($idNeg,$cont);

	}
	public function ActualizarActiva(){
		$idNeg = $this->input->post('idNeg');
		$cont = $this->input->post('cont');
		$this->mNegociacion->ActualizarActiva($idNeg,$cont);
	}
	public function updateNegociacion(){
$param['FechaVencimiento'] = $this->input->post('FechaVencimiento');
$param['Motivo'] = $this->input->post('Motivo');
$param['Prioridad'] = $this->input->post('Prioridad');
// $param['Estatus'] = $this->input->post('Estatus');
$param['Detalles'] = $this->input->post('Detalles');
$param['idObjetivo'] = $this->input->post('idObjetivo');
		$this->mNegociacion->updateNegociacion($param);
	}
}

?>