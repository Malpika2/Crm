<?php ob_start(); ?>
<?php
class cLogin extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('crm/mLogin');
	}
	public function index(){
		$data['mensaje'] = "";
		$this->load->view('crm/vLogin',$data);
	}
	public function ingresar(){
		$usu = $this->input->post('usuario');
		$pass= $this->input->post('password');		
		$res=$this->mLogin->ingresar($usu,$pass);
		if ($res==1){
				redirect(base_url('cInicio'));
				$this->load->view('crm/header');
				$this->load->view('crm/menu');
				$this->load->view('crm/vInicio');
				$this->load->view('crm/footer');
		}
		else {
			$data['mensaje'] = "Usuario o contraseña incorrecta";
			$this->load->view('crm/vLogin',$data);
		}
	}
}