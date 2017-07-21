 <?php
/**
* 
*/ 
class cNegociacion extends CI_Controller
{
	function __construct(){
		parent::__construct();
		$this->load->model('crm/mNegociacion');
		$this->load->model('crm/mMailer');
	}

	public function index(){
		$idUsuario =  $this->session->userdata('s_idUsuario');
		$data['row_Negociaciones'] = $this->mNegociacion->getNegociacionPorUsuario($idUsuario);
		
		$this->load->view('crm/header');
		$this->load->view('crm/menu');
		$this->load->view('crm/vNegociacion',$data);
		$this->load->view('crm/footer');
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
		$param['Status'] = $this->input->post('Status');
		$param['PersonaCargo'] = $this->input->post('PersonaCargo');
		$param['FechaLimite'] = $this->input->post('FechaLimite');
		$param['Detalles'] = $this->input->post('Detalles');
		$param['CreadaPor'] = $this->session->userdata('s_idUsuario');
		$resultado=$this->mNegociacion->guardarEmpresa($param);
		$this->mMailer->enviarCorreoNegociacion($param);
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
		$param['Status'] = $this->input->post('StatusP');
		$param['PersonaCargo'] = $this->input->post('PersonaCargoP');
		$param['FechaLimite'] = $this->input->post('FechaLimiteP');
		$param['Detalles'] = $this->input->post('DetallesP');
		$param['CreadaPor'] = $this->session->userdata('s_idUsuario');
		$resultado=$this->mNegociacion->guardarPersona($param);

		$this->mMailer->enviarCorreoNegociacion($param);

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
}

?>