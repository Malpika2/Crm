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
			'NombreEmpresa' => $param['NombreEmpresa'],
			'Tipo' => $param['Tipo'],
			'idRepresentante' => $param['Representante'],
			'idContacto' => $param['Contacto'],
			'Skype' => $param['Skype'],
			'SitioWeb' => $param['SitioWeb'],
			'idUsuarioRegistro' => $param['idUsuarioRegistro'],
			// 'FechaRegistro' => $param['FechaRegistro'],
			'spp' => $param['SPP'],
			'DireccionOficina' => $param['DireccionOficina'],
			'DireccionFiscal' => $param['DireccionFiscal'],
			'Ciudad' => $param['Ciudad'],
			'Pais' => $param['Pais'],
			'DatosFiscales' => $param['DatosFiscales'],
			'Abreviacion' => $param['Abreviacion'],
			'Email' => $param['Email'],
			'Telefono' => $param['Telefono'],
			'Email2' => $param['Email2'],
			'Telefono2' => $param['Telefono2']);
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
	 public function updateEmpresa($param){
	 	$campos = array(
	 		'NombreEmpresa' => $param['NombreEmpresa'],
			'Tipo' => $param['Tipo'],
			'idRepresentante' => $param['Representante'],
			'idContacto' => $param['Contacto'],
			'Skype' => $param['Skype'],
			'SitioWeb' => $param['SitioWeb'],
			'FechaRegistro' => $param['FechaRegistro'],
			'spp' => $param['SPP'],
			'DireccionOficina' => $param['DireccionOficina'],
			'DireccionFiscal' => $param['DireccionFiscal'],
			'Ciudad' => $param['Ciudad'],
			'Pais' => $param['Pais'],
			'DatosFiscales' => $param['DatosFiscales'],
			'Abreviacion' => $param['Abreviacion'],
			'Email' => $param['Email'],
			'Telefono' => $param['Telefono1'],
			'Email2' => $param['Email2'],
			'Telefono2' => $param['Telefono2']);

			$this->db->where('idEmpresa',$param['idEmpresa']);
			$this->db->update('Empresas',$campos);
			return 1;
	 }
	 public function guardarContactos($s,$param){
		$campos = array(
			// 'idTarea' => null,
			'idEmpresa' => $param['ultimaEmpresa'],
			'idUsuario' =>null,
			'idPersona' => $s);//Personas a participar
		$this->db->insert('Participantes_Tareas',$campos);
		if($this->db->affected_rows()>0){
			return true;
		}else {return false;}
	 }
}