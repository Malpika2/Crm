<?php
class mTelefono extends CI_Model
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->database();
	}
	public function guardar($paramTel){
		$camposT = array(
			'idPersona' => $paramTel['idPersona'],
			'idEmpresa' => $paramTel['idEmpresa'],
			'idUsuario' => $paramTel['idUsuario'],
			'Telefono1' => $paramTel['Telefono1'],
			'TipoTelefono1' => $paramTel['TipoTelefono1'],
			'Telefono2' => $paramTel['Telefono2'],
			'TipoTelefono2' => $paramTel['TipoTelefono2']);

		$this->db->insert("Telefonos",$camposT);
		if ($this->db->affected_rows() > 0) {
				return $this->db->insert_id();
			}
			else{
				return false;
			}
	}
}