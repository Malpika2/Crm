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
}?>