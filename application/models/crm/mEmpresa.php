<?php
/**
* 
*/
class mEmpresa extends CI_Model
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->database();
	}
	public function guardar($param){
		$campos = array(
			'RazonSocial' => $param['RazonSocial'],
			'Tipo' => $param['Tipo'],
			'idRepresentante' => $param['Representante'],
			'idContacto' => $param['Contacto'],
			'Skype' => $param['Skype'],
			'SitioWeb' => $param['SitioWeb'],
			'idUsuarioRegistro' => $param['idUsuarioRegistro'],
			'FechaRegistro' => $param['FechaRegistro']

			);
		$this->db->insert("Empresas",$campos);
		if ($this->db->affected_rows()>0) {
			return $this->db->insert_id();
		}
		else
			{return false;}

	}
	public function EliminarEmpresa($s){
		// $this->db->delete('Empresas', array('idEmpresa'=>$s));
$this->db->set('sitReg','0');
$this->db->where('idEmpresa',$s);
$this->db->update('Empresas'); 
// $this->db->where('idEmpresas',$s);
// $this->db->delete('Empresas');
		return true;
	}
	public function EmpresaInactiva($idEmpresa,$StatusFinalE){
	 	$this->db->set('sitReg','0');
	 	$this->db->set('StatusFinalEmp',$StatusFinalE);
	 	$this->db->where('idEmpresa',$idEmpresa);
	 	$this->db->update('Empresas');
	 	return 1;
	 }
}