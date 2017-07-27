<?php

class cGetEmpresas extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->model('crm/mGetEmpresas');
	}
	public function getEmpresas(){
		$s = $this->input->post('sitReg');
		$resultado = $this->mGetEmpresas->getEmpresas($s);
		
		echo json_encode($resultado);
	}
}