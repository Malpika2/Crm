<?php
/**
* 
*/
class cNegociacion extends CI_Controller
{
	public function index(){
		$this->load->view('crm/header');
		$this->load->view('crm/menu');
		$this->load->view('crm/vNegociacion');
		$this->load->view('crm/footer');
	}

	public function nuevaNegociacion(){
		$this->load->view('crm/header');
		$this->load->view('crm/menu');
		$this->load->view('crm/vNuevaNegociacion');
		$this->load->view('crm/footer');
	}
}

?>