<?php
/**
* 
*/
class mMetas extends CI_Model
{
	
	function __construct()
	{
		parent::__construct();
	}
	public function guardarMeta($param){
		$campos = array(
		'TituloMeta' => $param['TituloMeta'],
		'Status' => $param['Status'],
		'Prioridad' => $param['Prioridad'],
		'Descripcion' => $param['Descripcion'],
		'Porcentaje' => '0',
		'idObjetivo' =>$param['idObjetivo']);

		$this->db->insert('Metas',$campos);
		if ($this->db->affected_rows()>0) {
			return $this->db->insert_id();				
		}
		else
			{return false;}

	}
	public function getMeta($s){
		$this->db->select('*');
		$this->db->from('Metas');
		$this->db->where('idMetas',$s);
		$s = $this->db->get();
		return $s->row();
	}
}