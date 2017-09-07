<?php ob_start(); ?>
<?php
class cEmpresa extends CI_Controller
{

		function __construct()
	{
		parent::__construct();
		$this->load->library('My_phpmailer');
		$this->load->model('crm/mEmpresa');
		$this->load->model('crm/mTelefono');
		$this->load->model('crm/mCorreo');
		$this->load->model('crm/mDireccion');
		$this->load->model('crm/mPersona');
		$this->load->model('crm/mGetPersonas');
		$this->load->model('crm/mGetEmpresas');
		$this->load->model('crm/mTareas');
		$this->load->model('crm/mNegociacion');
		// $this->load->model('crm/mMailer');
		$this->load->helper('date');
	}

	public function index(){
		if($this->session->userdata('s_login')==1){
			$this->load->view('crm/header');
			$this->load->view('crm/menu');
			$this->load->view('crm/vNuevaEmpresa');
			$this->load->view('crm/footer');
		}
		else{redirect(base_url().cLogin);}
	}

	public function guardar(){
		//Empresa

		$param['NombreEmpresa'] = $this->input->post('NombreEmpresa');
		$param['Tipo'] = $this->input->post('Tipo');
		$param['Representante'] =$this->input->post('idRepresentanteEmp');
		$param['Contacto'] = null;
		$param['Skype'] = $this->input->post('Skype');
		$param['SitioWeb'] = $this->input->post('SitioWeb');
		$param['idUsuarioRegistro'] = $this->session->userdata('s_idUsuario');
		$param['DireccionOficina'] = $this->input->post('DireccionOficina');
		$param['DireccionFiscal'] = $this->input->post('DireccionFiscal');
		$param['Pais'] = $this->input->post('Pais');
		$param['Ciudad'] = $this->input->post('Ciudad');
		$param['DatosFiscales'] = $this->input->post('DatosFiscales');
		$param['SPP'] = $this->input->post('SPP');
		$param['Abreviacion'] = $this->input->post('Abreviacion');
		$param['Email'] = $this->input->post('Correo1');
		$param['Telefono'] = $this->input->post('Telefono1');
		$param['Telefono2'] = $this->input->post('Telefono2');
		$param['Email2'] = $this->input->post('Correo2');

$param['Productos'] = $this->input->post('Productos');
$param['PresupuestoPersona'] = $this->input->post('PresupuestoPersona');
$param['InteresEmpresa'] = $this->input->post('InteresEmpresa');
$param['ConfianzaEmpresa'] = $this->input->post('ConfianzaEmpresa');
$param['Motivo'] = $this->input->post('Motivo');
$param['LugarContacto'] = $this->input->post('LugarContacto');


		if(isset($_POST['ContactoEmp'])){
		foreach ($_POST['ContactoEmp'] as $contactos_value){
			$param['Contacto'] = $contactos_value.','.$param['Contacto'];
			}
		}

		$ultimaPersona=$this->mEmpresa->guardar($param);
		$param['ultimaEmpresa'] = $ultimaPersona;
		if(isset($_POST['ContactoEmp'])){
			foreach ($_POST['ContactoEmp'] as $contactos_value){
				$this->mEmpresa->guardarContactos($contactos_value,$param);
				}
			}
		if ($ultimaPersona>0) {
				$this->load->view('crm/header');
				$this->load->view('crm/menu');
				$this->load->view('crm/vNuevaEmpresa');
				$this->load->view('crm/footer');
		}

	}
	public function verEmpresa($idEmpresa){

				if($this->session->userdata('s_login')!=1){
					redirect(base_url().cLogin);
				}
		$data['row_Contactos'] = $this->mGetEmpresas->getContactos($idEmpresa);
		$data['row_Empresas'] = $this->mGetEmpresas->getEmpresaPorId($idEmpresa);
		$data['row_Persona'] = $this->mGetPersonas->getPersonasPorEmpresa2($idEmpresa);
		$data['row_Direccion'] = $this->mGetEmpresas->getDireccion($idEmpresa);
		$data['row_Telefonos'] = $this->mGetEmpresas->getTelefonos($idEmpresa);
		$data['row_Correos'] = $this->mGetEmpresas->getCorreos($idEmpresa);

				$this->load->view('crm/header');
				$this->load->view('crm/menu');
				$this->load->view('crm/vVerEmpresa',$data);
				$this->load->view('crm/footer');

	}
	public function guardarTarea(){
		$paramTarea['TituloTarea'] = $this->input->post('TituloTarea');
		$paramTarea['Categoria'] = $this->input->post('Categoria');
		$paramTarea['Asignados'] = NULL;
		$paramTarea['EmpresasPart'] = NULL;
		$paramTarea['PersonasPart'] = NULL;
		$paramTarea['FechaFin'] = $this->input->post('FechaFinE');
		$paramTarea['idPersona'] = NULL;
		$paramTarea['idEmpresa'] = $this->input->post('idEmpresa');
		$paramTarea['Prioridad'] = $this->input->post('Prioridad');
		$paramTarea['idNegociacion'] = NULL;
		$paramTarea['idUsuarioCrea'] = $this->input->post('idUsuarioc'); 
		$paramTarea['Descripcion'] = $this->input->post('Descripcion');
		if(isset($_POST['Asignados'])){
		foreach ($_POST['Asignados'] as $asignados_value){
			$paramTarea['Asignados'] = $paramTarea['Asignados'].','.$asignados_value;
		}
		}
		if(isset($_POST['Usuarios'])){
			foreach ($_POST['Usuarios'] as $asignados_value){
			$paramTarea['Asignados'] = $paramTarea['Asignados'].','.$asignados_value;
		}
		}

		if(isset($_POST['EmpresasPart'])){
		foreach ($_POST['EmpresasPart'] as $asignados_value){
			$paramTarea['EmpresasPart'] = $paramTarea['EmpresasPart'].','.$asignados_value;
		}}

		if(isset($_POST['PersonasPart'])){
		foreach ($_POST['PersonasPart'] as $asignados_value){
			$paramTarea['PersonasPart'] = $paramTarea['PersonasPart'].','.$asignados_value;
		}
		}
		if(isset($_POST['FechaFinP'])){
			$paramTarea['FechaFin']= $this->input->post('FechaFinP');
		}
		$ultimaTarea=$this->mTareas->guardarTarea($paramTarea);
		$paramTarea['UltimaTarea']=$ultimaTarea;
		if ($ultimaTarea>0) {
			if(isset($_POST['Asignados'])){
				foreach ($_POST['Asignados'] as $asignados_value){
				$this->mTareas->guardarParticipantes($asignados_value,$paramTarea);
				// $this->mMailer->enviarCorreo($ultimaTarea,$paramTarea);
				}
			}
			if(isset($_POST['EmpresasPart'])){
				foreach ($_POST['EmpresasPart'] as $Empresas_value){
				$this->mTareas->guardarEmpresasParticipantes($Empresas_value,$paramTarea);
				// $this->mMailer->enviarCorreo($ultimaTarea,$paramTarea);
				}
			}
			if(isset($_POST['PersonasPart'])){
				foreach ($_POST['PersonasPart'] as $Personas_value){
				$this->mTareas->guardarPersonasParticipantes($Personas_value,$paramTarea);
				// $this->mMailer->enviarCorreo($ultimaTarea,$paramTarea);
				}
			}
			if(isset($_POST['Usuarios'])){
				foreach ($_POST['Usuarios'] as $Asignados_value){
				$this->mTareas->guardarParticipantes($Asignados_value,$paramTarea);
				// $this->mMailer->enviarCorreo($ultimaTarea,$paramTarea);
				}
			}
		}
	}
	public function guardarTareaEmpresas(){
		$paramTarea['TituloTarea'] = $this->input->post('TituloTarea');
		$paramTarea['Categoria'] = $this->input->post('Categoria');
		$paramTarea['Asignados'] = NULL;
		$paramTarea['EmpresasPart'] = NULL;
		$paramTarea['FechaFin'] = $this->input->post('FechaFinE');
		$paramTarea['idPersona'] = NULL;
		$paramTarea['idEmpresa'] = $this->input->post('idEmpresa');
		$paramTarea['Prioridad'] = $this->input->post('Prioridad');
		$paramTarea['idNegociacion'] = NULL;
		$paramTarea['idUsuarioCrea'] = $this->input->post('idUsuarioc'); 
		$paramTarea['Descripcion'] = $this->input->post('Descripcion');
		if(isset($_POST['Asignados'])){
		foreach ($_POST['Asignados'] as $asignados_value){
			$paramTarea['Asignados'] = $paramTarea['Asignados'].','.$asignados_value;
		}
		}

		if(isset($_POST['EmpresasPart'])){
		foreach ($_POST['EmpresasPart'] as $asignados_value){
			$paramTarea['EmpresasPart'] = $paramTarea['EmpresasPart'].','.$asignados_value;
		}
		}

		$ultimaTarea=$this->mTareas->guardarTarea($paramTarea);
		$paramTarea['UltimaTarea']=$ultimaTarea;
		if ($ultimaTarea>0) {
			if(isset($_POST['Asignados'])){
				foreach ($_POST['Asignados'] as $asignados_value){
				$this->mTareas->guardarParticipantes($asignados_value,$paramTarea);
				// $this->mMailer->enviarCorreo($ultimaTarea,$paramTarea);
				}
			}
		}
	}
	public function getTareas(){
		$s = $this->input->post('idEmpresa');
		$resultado = $this->mTareas->getTareasEmpresas($s);
		echo json_encode($resultado);
	}
		public function getNegociaciones(){
		$s= $this->input->post('idEmpresa');
		$resultado = $this->mNegociacion->getNegociaciones_Por_Empresa($s);
		echo json_encode($resultado);
	}
		public function verEliminarEmpresa(){
		$data['Empresa'] = $this->mGetEmpresas->getEmpresas(1);
		$this->load->view('crm/header');
		$this->load->view('crm/menu');
		$this->load->view('crm/vEliminarEmpresa',$data);
		$this->load->view('crm/footer');
	}
		public function EliminarEmpresa(){
		$s = $this->input->post('Empresaid');
		$result = $this->mEmpresa->EliminarEmpresa($s);
	}
	public function EmpresaInactiva(){
		$idEmpresa = $this->input->post('idEmpresa');
		$StatusFinalE = $this->input->post('StatusFinalE');
		$result=$this->mEmpresa->EmpresaInactiva($idEmpresa,$StatusFinalE);
	}
	public function updateEmpresa(){
		$param['NombreEmpresa'] = $this->input->post('NombreEmpresa');
		$param['Tipo'] = $this->input->post('Tipo');
		$param['Representante'] =$this->input->post('Representante');
		$param['Skype'] = $this->input->post('Skype');
		$param['SitioWeb'] = $this->input->post('SitioWeb');
		$param['DireccionOficina'] = $this->input->post('DireccionOficina');
		$param['DireccionFiscal'] = $this->input->post('DireccionFiscal');
		$param['Pais'] = $this->input->post('Pais');
		$param['Ciudad'] = $this->input->post('Ciudad');
		$param['DatosFiscales'] = $this->input->post('DatosFiscales');
		$param['SPP'] = $this->input->post('SPP');
		$param['Abreviacion'] = $this->input->post('Abreviacion');
		$param['Email'] = $this->input->post('Correo1');
		$param['Telefono'] = $this->input->post('Telefono1');
		$param['Telefono2'] = $this->input->post('Telefono2');
		$param['Email2'] = $this->input->post('Correo2');
		$param['idEmpresa'] = $this->input->post('idEmpresa');

		if(isset($_POST['ContactoEmp'])){
		foreach ($_POST['ContactoEmp'] as $contactos_value){
			$param['Contacto'] = $contactos_value.','.$param['Contacto'];
			}
		}

		$updateEmpresa=$this->mEmpresa->updateEmpresa($param);

		if(isset($_POST['ContactoEmp'])){
			$this->mEmpresa->UpdateBorrarContactos($contactos_value,$param);
			foreach ($_POST['ContactoEmp'] as $contactos_value){
				$this->mEmpresa->UpdateContactos($contactos_value,$param);
				}
			}

		}

			public function verEmpresaEdit($idEmpresa){
		if($this->session->userdata('s_login')==1){
		$data['row_Contactos'] = $this->mGetEmpresas->getContactos($idEmpresa);
		$data['row_Empresas'] = $this->mGetEmpresas->getEmpresaPorId($idEmpresa);
		$data['row_Persona'] = $this->mGetPersonas->getPersonasPorEmpresa2($idEmpresa);
		$data['row_control']=1;
				$this->load->view('crm/header');
				$this->load->view('crm/menu');
				$this->load->view('crm/vVerEmpresa',$data);
				$this->load->view('crm/footer');

				}
		else{redirect(base_url().cLogin);}
	}
	public function getContactos(){
		$idEmpresa = $this->input->post('idEmpresa');
			$result=$this->mGetEmpresas->getContactos($idEmpresa);
		echo json_encode($result);
	}
	public function getDatosEmpresa(){
		$idEmpresa = $this->input->post('idEmpresa');
		$result = $this->mGetEmpresas->getEmpresaPorId($idEmpresa);
		echo json_encode($result);
	}
	public function getPersonas(){
		$idEmpresa = $this->input->post('idEmpresa');		
		$result = $this->mGetPersonas->getPersonasPorEmpresa2($idEmpresa);
		echo json_encode($result);
	}

}