<?php

class cUsuario extends CI_Controller
{
		function __construct()
	{
		parent::__construct();
		$this->load->model('crm/mUsuario');
		$this->load->model('crm/mTelefono');
		$this->load->model('crm/mCorreo');
		$this->load->model('crm/mDireccion');
	}
	public function index(){

		$this->load->view('crm/header');
		$this->load->view('crm/menu');
		$this->load->view('crm/vNuevoUsuario');
		$this->load->view('crm/footer');
	}
	public function guardar(){
//Usuario
		$param['Nombre'] = $this->input->post('Nombre');
		$param['Paterno'] = $this->input->post('ApPaterno');
		$param['Materno'] = $this->input->post('ApMaterno');
		$param['Puesto'] = $this->input->post('Puesto');
		$param['Skype'] = $this->input->post('Skype');


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
 
 		$ultimoid=$this->mUsuario->guardar($param);

		if($ultimoid > 0){
			$paramTel['idUsuario'] = $ultimoid;
			$paramCor['idUsuario'] = $ultimoid;
			$paramDir['idUsuario'] = $ultimoid;

			$paramTel['idPersona'] = NULL;
			$paramCor['idPersona'] = NULL;
			$paramDir['idPersona'] = NULL;

			$paramTel['idEmpresa'] = NULL;
			$paramCor['idEmpresa'] = NULL;
			$paramDir['idEmpresa'] = NULL;

			$this->mTelefono->guardar($paramTel);
			$this->mCorreo->guardar($paramCor);
			if($this->mDireccion->guardar($paramDir)){
				$this->load->view('crm/header');
				$this->load->view('crm/menu');
				$this->load->view('crm/vNuevoUsuario');
				$this->load->view('crm/footer');			
				}

			}
		}
}
?>