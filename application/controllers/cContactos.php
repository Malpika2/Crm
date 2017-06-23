<?php

/**
* 
*/
class cContactos extends CI_Controller
{
	public function index(){
		$this->load->view('crm/header');
		$this->load->view('crm/menu');
		$this->load->view('crm/vContactos');
		$this->load->view('crm/footer');
	}
	public function nuevaPersona(){
		$this->load->view('crm/header');
		$this->load->view('crm/menu');
		$this->load->view('crm/vNuevaPersona');
		$this->load->view('crm/footer');
	}
	public function nuevaEmpresa(){
		$this->load->view('crm/header');
		$this->load->view('crm/menu');
		$this->load->view('crm/vNuevaEmpresa');
		$this->load->view('crm/footer');
	}

}

?>