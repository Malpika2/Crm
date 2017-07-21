<?php
/**
* 
*/
class cContactos extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
	}

	public function index(){
		$this->load->view('crm/header');
		$this->load->view('crm/menu');
		$this->load->view('crm/vContactos');
		$this->load->view('crm/footer');
	}
}