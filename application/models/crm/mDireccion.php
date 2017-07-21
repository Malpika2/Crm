<?php
/**
* 
*/
class mDireccion extends CI_Model
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->database();
	}
	public function guardar($param){
		$campos = array(
			'Calle' => $param['Calle'],
			'Numero' => $param['Numero'],
			'Colonia' => $param['Colonia'],
			'Municipio' => $param['Municipio'],
			'Estado' => $param['Estado'],
			'Cp' => $param['Cp'],
			'Pais' => $param['Pais'],
			'idUsuario' => $param['idUsuario'],
			'idPersona' => $param['idPersona'],
			'idEmpresa' => $param['idEmpresa']
			);

		$this->db->insert("Direcciones",$campos);
		if ($this->db->affected_rows() > 0) {
				//return $this->db->insert_id();
			return true;
			}
			else{
				return false;
			}
	}
}