<?php

class mGetUsuarios extends CI_Model
{
	
	function __construct()
	{
		parent::__construct();
	}
	public function getUsuarios(){
		$this->db->select('*');
		$this->db->from('Usuarios');
		$this->db->order_by('Nombre','ASC');
		$s = $this->db->get();
		return $s->result();
	}
}