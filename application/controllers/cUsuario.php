<?php

class cUsuario extends CI_Controller
{
		function __construct()
	{
		parent::__construct();
		$this->load->model('crm/mUsuario');
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
		$param['Telefono1'] = $this->input->post('Telefono1');
		$param['TipoTelefono1'] = $this->input->post('TipoTelefono1');
		$param['Telefono2'] = $this->input->post('Telefono2');
		$param['TipoTelefono2'] = $this->input->post('TipoTelefono2');


//correos

		$param['Correo1'] = $this->input->post('Correo1');
		$param['TipoCorreo1'] = $this->input->post('TipoCorreo1');
		$param['Correo2'] = $this->input->post('Correo2');
		$param['TipoCorreo2'] = $this->input->post('TipoCorreo2');

//Direccion
		$param['Calle'] = $this->input->post('Calle');
		$param['Numero'] = $this->input->post('Numero');
		$param['Colonia'] = $this->input->post('Colonia');
		$param['Municipio'] = $this->input->post('Municipio');
		$param['Estado'] = $this->input->post('Estado');
		$param['Cp'] = $this->input->post('Cp');
		$param['Pais '] = $this->input->post('Pais');

		$this->mUsuario->guardar($param);

	}
}
?>