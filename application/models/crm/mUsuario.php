<?php
/**
* 
*/
class mUsuario extends CI_Model
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->database();
	}
	public function guardar($param){

		$campos = array(
			'Nombre'=> $param['Nombre'],
			'Paterno' => $param['Paterno'],
			'Materno' => $param['Materno'],
			'Puesto' => $param['Puesto'],
			'Skype' => $param['Skype']);

		$this->db->insert("Usuarios",$campos);
		if ($this->db->affected_rows() > 0) {
				return $this->db->insert_id();
			}
			else{
				return false;
			}
	}
	public function getUsuario($id){
		$this->db->select('*');
		$this->db->from('Usuarios');
		$this->db->where('idUsuario',$id);
		$r= $this->db->get();
		return $r->row();
	}
}?>