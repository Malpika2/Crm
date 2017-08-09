<?php 

class mObjetivo extends CI_Model
{
	
	function __construct()
	{
		parent::__construct();
	}
	public function guardarObjetivo($param){
		$campos = array(
		'Titulo' => $param['TituloObjetivo'],
		'Status' => $param['Status'],
		'Prioridad' => $param['Prioridad'],
		'Origen' => $param['Origen'],
		'Porcentaje' => '0');
		$this->db->insert('Objetivos',$campos);
		if ($this->db->affected_rows()>0) {
			return $this->db->insert_id();				
		}
		else
			{return false;}
	}
	public function getObjetivos(){
		$this->db->select('*');
		$this->db->from('Objetivos');
		$s = $this->db->get();
		return $s->result();
	}
	public function getObjetivoPorId($s){
		$this->db->select('*');
		$this->db->from('Objetivos');
		$this->db->where('idObjetivos',$s);
		$query = $this->db->get();
		return $query->row();

	}
	public function getMetasPorObjetivo($s){
		$this->db->select('*');
		$this->db->from('Metas');
		$this->db->where('idObjetivo',$s);
		$s = $this->db->get();
		return $s->result();
	}
	public function getTareasPorMeta($s){
		$this->db->select('*');
		$this->db->from('Tareas');
		$this->db->where('idMeta',$s);
		$s = $this->db->get();
		return $s->result();
	}
}