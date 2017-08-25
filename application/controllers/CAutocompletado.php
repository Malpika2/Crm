<?php ob_start(); ?>
<?php

class cAutoCompletado extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->model('crm/mAutoCompletado');
		$this->load->helper('text');
	}
	public function autoCompletado(){
		$resultado = $this->mAutoCompletado->buscador();
		$resultado = json_encode($resultado);
		echo $resultado;
	}
	public function autoCompletadoPersonas(){
		$resultado = $this->mAutoCompletado->buscadorP();
		$resultado = json_encode($resultado);
		echo $resultado;
	}
}