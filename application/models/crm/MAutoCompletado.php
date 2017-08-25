<?php

class mAutoCompletado extends CI_Model
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->database();
	}	
	public function buscador(){
			$s = $this->db->get('Empresas');
			return $s->result();
	}
	public function buscadorP(){
			$s = $this->db->get('Personas');
			return $s->result();
	}
}