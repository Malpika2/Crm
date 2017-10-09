<?php


class mCalendario extends CI_Model
{
		function __construct()
	{
		parent::__construct();
	}


	public function getEventosTareas(){
		$this->db->select('*');
		$this->db->from('Tareas');
		return $this->db->get()->result();
	}
	public function getEventosObjetivos(){
		$this->db->select('*');
		$this->db->from('Negociaciones');
		return $this->db->get()->result();
	}
}