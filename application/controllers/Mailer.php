<?php 

/**
* 
*/
class Mailer extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
	}
	function index(){
		$config = Array(
	  'protocol' => 'smtp',
	  'smtp_host' => 'smtp.mailtrap.io',
	  'smtp_port' => 2525,
	  'smtp_user' => 'b5db8e329e0021',
	  'smtp_pass' => '6fd5d84c79c4db',
	  'mailtype' => 'html',
	  'charset' => 'iso-8859-1',
	  'wordwrap' => TRUE,
	  'crlf' => "\r\n",
	  'newline' => "\r\n"
	);
		$this->load->library('email',$config);
		$this->email->from('hamthony@hotmail.com','admin');
		$this->email->to('hamthonys@hotmail.com');
		$this->email->subject('Email Prueba');
		$this->email->message('Probando PHP mailer CI');
		$this->email->set_newline("\r\n");
		$result = $this->email->send();
		$this->email->print_debugger();
	}
}