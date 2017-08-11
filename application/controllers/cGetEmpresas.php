<?php ob_start(); ?>
<?php

class cGetEmpresas extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->model('crm/mGetEmpresas');
		$this->load->helper('text');
	}
	public function getEmpresas(){
		$s = $this->input->post('sitReg');
		$resultado = $this->mGetEmpresas->getEmpresas($s);
		echo json_encode($resultado);
	}
	public function getEmpresasAutoComplete(){
		$resultado = $this->mGetEmpresas->getEmpresasAutoComplete();
		$resultado = json_encode($resultado);
		echo $resultado;
	}
}