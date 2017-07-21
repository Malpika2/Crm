  <?php

/**
* 
*/
class cEmpresa extends CI_Controller
{
		function __construct()
	{
		parent::__construct();
		$this->load->model('crm/mEmpresa');
		$this->load->model('crm/mTelefono');
		$this->load->model('crm/mCorreo');
		$this->load->model('crm/mDireccion');

		$this->load->model('crm/mPersona');
		$this->load->model('crm/mGetPersonas');
		$this->load->model('crm/mGetEmpresas');
		$this->load->model('crm/mTareas');
		$this->load->model('crm/mNegociacion');
		$this->load->model('crm/mMailer');

		$this->load->helper('date');
	}

	public function index(){
		$this->load->view('crm/header');
		$this->load->view('crm/menu');
		$this->load->view('crm/vNuevaEmpresa');
		$this->load->view('crm/footer');
	}

	public function guardar(){
		//Empresa
		$format = 'DATE_RFC822';
		$time = time();
		$fechaActual = standard_date($format, $time);

		$param['RazonSocial'] = $this->input->post('RazonSocial');
		$param['Tipo'] = $this->input->post('Tipo');
		$param['Representante'] = $this->input->post('Representante');
		$param['Contacto'] = $this->input->post('Contacto');
		$param['Skype'] = $this->input->post('Skype');
		$param['SitioWeb'] = $this->input->post('SitioWeb');
		$param['FechaRegistro'] = $fechaActual;
		$param['idUsuarioRegistro'] = $this->session->userdata('s_idUsuario');

//Telefonos
		$paramTel['Telefono1'] = $this->input->post('Telefono1');
		$paramTel['TipoTelefono1'] = $this->input->post('TipoTelefono1');
		$paramTel['Telefono2'] = $this->input->post('Telefono2');
		$paramTel['TipoTelefono2'] = $this->input->post('TipoTelefono2');


//correos

		$paramCor['Correo1'] = $this->input->post('Correo1');
		$paramCor['TipoCorreo1'] = $this->input->post('TipoCorreo1');
		$paramCor['Correo2'] = $this->input->post('Correo2');
		$paramCor['TipoCorreo2'] = $this->input->post('TipoCorreo2');

//Direccion
		$paramDir['Calle'] = $this->input->post('Calle');
		$paramDir['Numero'] = $this->input->post('Numero');
		$paramDir['Colonia'] = $this->input->post('Colonia');
		$paramDir['Municipio'] = $this->input->post('Municipio');
		$paramDir['Estado'] = $this->input->post('Estado');
		$paramDir['Cp'] = $this->input->post('Cp');
		$paramDir['Pais'] = $this->input->post('Pais');

		$ultimaPersona=$this->mEmpresa->guardar($param);

		if ($ultimaPersona>0) {

			$paramTel['idPersona'] = NULL;
			$paramCor['idPersona'] = NULL;
			$paramDir['idPersona'] = NULL;

			$paramTel['idUsuario'] = NULL;
			$paramCor['idUsuario'] = NULL;
			$paramDir['idUsuario'] = NULL;

			$paramTel['idEmpresa'] = $ultimaPersona;
			$paramCor['idEmpresa'] = $ultimaPersona;
			$paramDir['idEmpresa'] = $ultimaPersona;

			$this->mTelefono->guardar($paramTel);
			$this->mCorreo->guardar($paramCor);
			if($this->mDireccion->guardar($paramDir)){

				$this->load->view('crm/header');
				$this->load->view('crm/menu');
				$this->load->view('crm/vNuevaEmpresa');
				$this->load->view('crm/footer');
			}
		}

	}
	public function verEmpresa($idPersona){
		$data['row_Empresas'] = $this->mGetEmpresas->getEmpresaPorId($idPersona);
		$data['row_Persona'] = $this->mGetPersonas->getPersonasPorEmpresa2($idPersona);
		$data['row_Direccion'] = $this->mGetEmpresas->getDireccion($idPersona);
		$data['row_Telefonos'] = $this->mGetEmpresas->getTelefonos($idPersona);
		$data['row_Correos'] = $this->mGetEmpresas->getCorreos($idPersona);

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
				$this->mMailer->enviarCorreo($ultimaTarea,$paramTarea);
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
				$this->mMailer->enviarCorreo($ultimaTarea,$paramTarea);
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


}