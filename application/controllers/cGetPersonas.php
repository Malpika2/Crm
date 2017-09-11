<?php ob_start();?>
<?php
class cGetPersonas extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->model('crm/mGetPersonas');
	}
	public function getRepresentantes(){
		$s = $this->input->post('Cargo');
		$resultado = $this->mGetPersonas->getRepresentantes($s);
		echo json_encode($resultado);
	}
	public function getContactos(){
		$s = $this->input->post('Cargo');
		$resultado = $this->mGetPersonas->getContactos($s);
		echo json_encode($resultado);
	}
	public function getPersonas(){
		$s = $this->input->post('Cargo');
		$resultado = $this->mGetPersonas->getPersonas();
		echo json_encode($resultado);
	}
	public function getPersonasPorEmpresa(){
		$s = $this->input->post('idEmpresa');
		$resultado = $this->mGetPersonas->getPersonasPorEmpresa($s);
		echo json_encode($resultado);
	}
	public function getPersonasAutoComplete(){
		$resultado = $this->mGetPersonas->getPersonasAutoComplete();
		echo json_encode($resultado);
	}
	public function getPersonaPorId(){
		$idPersona= $this->input->post('idPersona');
		$resultado = $this->mGetPersonas->getPersonaPorId2($idPersona);		
		echo json_encode($resultado);
	}
	public function getPaises(){
		$resultado = $this->mGetPersonas->getPaises();
		echo json_encode($resultado);
	}
}?>