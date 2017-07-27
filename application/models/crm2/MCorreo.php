<?php
class mCorreo extends CI_Model
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->database();
	}
	public function guardar($param){
		$camposC = array(
			'Correo1' => $param['Correo1'],
			'TipoCorreo1' => $param['TipoCorreo1'],
			'Correo2' => $param['Correo2'],
			'TipoCorreo2' => $param['TipoCorreo2'],
			'idUsuario' => $param['idUsuario'],
			'idPersona' => $param['idPersona'],
			'idEmpresa' => $param['idEmpresa']
			);
		$this->db->insert("Correos",$camposC);
		if ($this->db->affected_rows() > 0) {
			return true;
			}
			else{
				return false;
			}
	}
}