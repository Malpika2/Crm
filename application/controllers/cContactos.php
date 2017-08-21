<?php ob_start(); ?>
<?php
/**
* 
*/
class cContactos extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->model('crm/mGetPersonas');
		$this->load->model('crm/mGetEmpresas');
	}

	public function index(){
		if($this->session->userdata('s_login')==1){
			$data['Persona'] = $this->mGetPersonas->getPersonas();
			$data['Empresa'] = $this->mGetEmpresas->getEmpresas(1); 
			
			$this->load->view('crm/header');
			$this->load->view('crm/menu');
			$this->load->view('crm/vContactos',$data);
			$this->load->view('crm/footer');
		}
		else
		{
			redirect(base_url().cLogin);
		}
	}
}