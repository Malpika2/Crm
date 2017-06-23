<?php
/**
* 
*/
class cInicio extends CI_Controller
{

	public function index(){
		$this->load->view('crm/header');
		$this->load->view('crm/menu');
		$this->load->view('crm/vInicio');
		$this->load->view('crm/footer');
	}
}
	
?>