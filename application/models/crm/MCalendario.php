<?php


class mCalendario extends CI_Model
{
		function __construct()
	{
		parent::__construct();
	}


	public function getEventosTareas(){
		$this->db->select('Tareas.idTarea as id, Tareas.TituloTarea as title, Tareas.FechaFin as start,Asignados');
		$this->db->from('Tareas');
		return $this->db->get()->result();
	}
	public function getEventosObjetivos(){
		$this->db->select('idNegociacion as id,NombreNegociacion as title,FechaLimite as start,PersonaCargo');
		$this->db->from('Negociaciones');
		return $this->db->get()->result();
	}
}