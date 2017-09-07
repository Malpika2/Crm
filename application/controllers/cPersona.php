<?php ob_start(); ?>

   <?php

class cPersona extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->library('My_phpmailer');
		$this->load->model('crm/mPersona');
		$this->load->model('crm/mTelefono');
		$this->load->model('crm/mCorreo');
		$this->load->model('crm/mDireccion');
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
			$this->load->view('crm/vNuevaPersona');
			$this->load->view('crm/footer');
		}
		else{redirect(base_url().cLogin);}

	}
	public function guardar(){

	$param['Nombre'] = $this->input->post('Nombre');
	$param['Paterno'] = $this->input->post('ApPaterno');
	$param['Materno'] = $this->input->post('ApMaterno');
	$param['Cargo'] = $this->input->post('Cargo');
	$param['idEmpresa'] = $this->input->post('Empresa');
	$param['Skype'] = $this->input->post('Skype');
	$param['Status'] = $this->input->post('Status');
	$param['Telefono1'] = $this->input->post('Telefono1');
	$param['Telefono2'] = $this->input->post('Telefono2');
	$param['Correo1'] = $this->input->post('Correo1');
	$param['Correo2'] = $this->input->post('Correo2');
	$param['Puesto'] = $this->input->post('Puesto');
	$param['Ciudad'] = $this->input->post('Estado');
	$param['Pais'] = $this->input->post('Pais');
	$param['Direccion'] = $this->input->post('Calle');
	$param['idUsuarioRegistro'] = $this->session->userdata('s_idUsuario');

$param['ProductosPersona'] = $this->input->post('Productos');
$param['PresupuestoPersona'] = $this->input->post('PresupuestoPersona');
$param['InteresPersona'] = $this->input->post('InteresPersona');
$param['ConfianzaPersona'] = $this->input->post('ConfianzaPersona');
$param['MotivoPersona'] = $this->input->post('Motivo');
$param['LugarContactoPersona'] = $this->input->post('LugarContacto');
$param['DatosFiscalesPersona'] = $this->input->post('DatosFiscalesPersona');


	$ultimaPersona=$this->mPersona->guardar($param);
	
			$this->load->view('crm/header');
			$this->load->view('crm/menu');
			$this->load->view('crm/vNuevaPersona');
			$this->load->view('crm/footer');

	}
	public function verTarea($idTarea){

		if($this->session->userdata('s_login')==1){

		$data['row_Tareas'] = $this->mTareas->getTarea($idTarea);
		$data['row_Asignados'] = $this->mTareas->getAsignados($idTarea);
		$data['row_EmpParticipantes']= $this->mTareas->getEmp_Participantes($idTarea);
		$data['row_PersonasParticipantes']= $this->mTareas->getPersonas_Participantes($idTarea);


		$this->load->view('crm/header');
		$this->load->view('crm/menu');
		$this->load->view('crm/vVerTarea',$data);
		$this->load->view('crm/footer');}
		else{redirect(base_url().cLogin);}

	}
	public function verPersona($idPersona){
		if($this->session->userdata('s_login')==1){
			$data['row_Persona'] = $this->mGetPersonas->getPersonaPorId($idPersona);
			$data['row_Direccion'] = $this->mGetPersonas->getDireccion($idPersona);
			$data['row_Telefonos'] = $this->mGetPersonas->getTelefonos($idPersona);
			$data['row_Correos'] = $this->mGetPersonas->getCorreos($idPersona);
			$data['row_Empresas'] = $this->mGetEmpresas->getEmpresaPorUsuario($idPersona);

					$this->load->view('crm/header');
					$this->load->view('crm/menu');
					$this->load->view('crm/vVerPersona',$data);
					$this->load->view('crm/footer');}
		else{redirect(base_url().cLogin);}
	}
	// public function verPersonaEdit($idPersona){
	// 	if($this->session->userdata('s_login')==1){
	// 		$data['row_Persona'] = $this->mGetPersonas->getPersonaPorId($idPersona);
	// 		$data['row_Direccion'] = $this->mGetPersonas->getDireccion($idPersona);
	// 		$data['row_Telefonos'] = $this->mGetPersonas->getTelefonos($idPersona);
	// 		$data['row_Correos'] = $this->mGetPersonas->getCorreos($idPersona);
	// 		$data['row_Empresas'] = $this->mGetEmpresas->getEmpresaPorUsuario($idPersona);
	// 		$data['row_control']=1;

	// 				$this->load->view('crm/header');
	// 				$this->load->view('crm/menu');
	// 				$this->load->view('crm/vVerPersona',$data);
	// 				$this->load->view('crm/footer');}
	// 	else{redirect(base_url().cLogin);}
	// }
	public function guardar2(){
	$param['Nombre'] = $this->input->post('Nombre');
	$param['Paterno'] = $this->input->post('ApPaterno');
	$param['Materno'] = $this->input->post('ApMaterno');
	$param['Cargo'] = $this->input->post('Cargo');
	$param['idEmpresa'] = $this->input->post('Empresa');
	$param['Skype'] = $this->input->post('Skype');
	$param['Status'] = $this->input->post('Status');
	$param['Telefono1'] = $this->input->post('Telefono1');
	$param['Telefono2'] = $this->input->post('Telefono2');
	$param['Correo1'] = $this->input->post('Correo1');
	$param['Correo2'] = $this->input->post('Correo2');
	$param['Puesto'] = $this->input->post('Puesto');
	$param['Ciudad'] = $this->input->post('Estado');
	$param['Pais'] = $this->input->post('Pais');
	$param['Direccion'] = $this->input->post('Calle');
	$param['idUsuarioRegistro'] = $this->session->userdata('s_idUsuario');
	$ultimaPersona=$this->mPersona->guardar($param);

		if($ultimaPersona>0){
				$result = $this->mPersona->mGetPersonas->getPersonaPorIdResult($ultimaPersona);
				echo json_encode($result);	
		}

	}
	public function guardarTarea(){
		$paramTarea['TituloTarea'] = $this->input->post('TituloTarea');
		$paramTarea['Categoria'] = $this->input->post('Categoria');
		$paramTarea['Asignados'] = NULL; 
		$paramTarea['FechaFin'] = $this->input->post('FechaFin');
		$paramTarea['idPersona'] = $this->input->post('idPersona');
		$paramTarea['idEmpresa'] = NULL;
		$paramTarea['Prioridad'] = $this->input->post('Prioridad');
		$paramTarea['idNegociacion'] = NULL;
		$paramTarea['idUsuarioCrea'] = $this->input->post('idUsuarioc'); 
		$paramTarea['Descripcion'] = $this->input->post('Descripcion');

		if(isset($_POST['Asignados'])){
		foreach ($_POST['Asignados'] as $asignados_value){
			$paramTarea['Asignados'] = $paramTarea['Asignados'].','.$asignados_value;
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
		public function guardarTareaObjetivo(){
		$paramTarea['TituloTarea'] = $this->input->post('TituloTarea');
		$paramTarea['Categoria'] = $this->input->post('Categoria');
		$paramTarea['Asignados'] = NULL; 
		$paramTarea['FechaFin'] = $this->input->post('FechaFin');
		$paramTarea['idPersona'] = $this->input->post('idPersona');
		$paramTarea['EmpresasPart'] = NULL;
		$paramTarea['PersonasPart'] = NULL;
		$paramTarea['idMeta'] = NULL;
		$paramTarea['idEmpresa']= $this->input->post('idEmpresa');
		$paramTarea['Prioridad'] = $this->input->post('Prioridad');
		$paramTarea['idNegociacion'] = $this->input->post('idNegociacion');
		$paramTarea['idUsuarioCrea'] = $this->input->post('idUsuarioc'); 
		$paramTarea['Descripcion'] = $this->input->post('Descripcion');

		if(isset($_POST['Asignados'])){
		foreach ($_POST['Asignados'] as $asignados_value){
			$paramTarea['Asignados'] = $paramTarea['Asignados'].','.$asignados_value;
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
		$s = $this->input->post('idPersona');
		$resultado = $this->mTareas->getTareasPersonas($s);
		echo json_encode($resultado);
	}
	public function tareaRealizada(){
		$s = $this->input->post('Tareaid');
		$StatusFinal = $this->input->post('StatusFinal');
		$resultado = $this->mTareas->tareaRealizada($s,$StatusFinal);
		return true;
	}
	public function tareaNoRealizada(){
		$s = $this->input->post('Tareaid');
		$resultado = $this->mTareas->tareaNoRealizada($s);
	}
	public function getNegociaciones(){
		$s= $this->input->post('idPersona');
		$resultado = $this->mNegociacion->getNegociaciones_Por_Persona($s);
		echo json_encode($resultado);
	}
	public function NegociacionEliminada(){
		$s = $this->input->post('idNegociacion');
		$StatusFinalNG = $this->input->post('StatusFinalNG');
		$resultado = $this->mNegociacion->NegociacionEliminada($s,$StatusFinalNG);
	}
	public function verNegociacion($idNegociacion){
		if($this->session->userdata('s_login')==1){
		$data['row_Negociacion'] = $this->mNegociacion->getNegociacionyEmpresa($idNegociacion);
		// $data['row_Empresa'] = $this->mNegociacion->getNegociacionyEmpresa($idNegociacion);
		$this->load->view('crm/header');
		$this->load->view('crm/menu');
		$this->load->view('crm/vVerNegociacion',$data);
		$this->load->view('crm/footer');}
		else{redirect(base_url().cLogin);}

	}
	public function EliminarNegociacio(){
		$s = $this->input->post('idNegociacion');
		$resultado = $this->mNegociacion->EliminarNegociacio($s);
	}
	public function verEliminarPersona(){
		if($this->session->userdata('s_login')==1){
		$data['Persona'] = $this->mGetPersonas->getPersonas();
		$this->load->view('crm/header');
		$this->load->view('crm/menu');
		$this->load->view('crm/vEliminarPersona',$data);
		$this->load->view('crm/footer');}
		else{redirect(base_url().cLogin);}

	}
	public function eliminarPersona(){
		$s = $this->input->post('Personaid');
		$result=$this->mPersona->eliminarPersona($s);
		}
	public function PersonaInactiva(){
		$idPersona = $this->input->post('idPersona');
		$StatusFinal = $this->input->post('StatusFinal');
		$result=$this->mPersona->PersonaInactiva($idPersona,$StatusFinal);
	}
	public function updatePersona(){
		$param['idPersona'] = $this->input->post('idPersonaE');
		$param['NombrePersona'] = $this->input->post('NombrePersona');
		$param['Cargo'] = $this->input->post('Cargo');
		$param['Puesto'] = $this->input->post('Puesto');
		$param['Telefono1'] = $this->input->post('Telefono1');
		$param['Telefono2'] = $this->input->post('Telefono2');
		$param['Correo1'] = $this->input->post('Correo1');
		$param['Correo2'] = $this->input->post('Correo2');
		$param['Skype'] = $this->input->post('Skype');
		$param['Direccion'] = $this->input->post('Direccion');
		$param['Estado'] = $this->input->post('Estado');
		$param['Pais'] = $this->input->post('Pais');
		$ultimaPersona = $this->mPersona->updatePersona($param);
		return $ultimaPersona;
	}

}