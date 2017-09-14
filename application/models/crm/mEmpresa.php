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
			'Telefono2' => $param['Telefono2'],
			'TipoTelefono1' => $param['TipoTelefono1'],
			'TipoTelefono2' => $param['TipoTelefono2'],

'Productos' => $param['Productos'],
'PresupuestoPersona' => $param['PresupuestoPersona'],
'InteresEmpresa' => $param['InteresEmpresa'],
'ConfianzaEmpresa' => $param['ConfianzaEmpresa'],
'MotivoEmpresa' => $param['MotivoEmpresa'],
'LugarContacto' => $param['LugarContacto']



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
			'Telefono' => $param['Telefono'],
			'Email2' => $param['Email2'],
			'Telefono2' => $param['Telefono2']);

			$this->db->where('idEmpresa',$param['idEmpresa']);
			$this->db->update('Empresas',$campos);
			return 1;
	 }
	 public function guardarContactos($s,$param){
		$campos = array(
			'idTarea' => 0,
			'idEmpresa' => $param['ultimaEmpresa'],
			'idUsuario' =>null,
			'idPersona' => $s);//Personas a participar
		$this->db->insert('Participantes_Tareas',$campos);
		if($this->db->affected_rows()>0){
			return true;
		}else {return false;}
	 }
	 public function UpdateBorrarContactos($s,$param){
	 		 	$camposD = array(
	 		'idEmpresa'=>0,
	 		'idTarea' =>0,
	 		'idPersona' =>0,
	 		'idUsuario'=>0);
	 	$this->db->where('idEmpresa',$param['idEmpresa']);
	 	$this->db->where('idTarea',0);
	 	$this->db->where('idUsuario',NULL);
	 	$this->db->update('Participantes_Tareas',$camposD);

	 	try {
	 	$this->db->where('idEmpresa',$param['idEmpresa']);
	 	$this->db->where('idTarea',null);
	 	$this->db->where('idEmpresa',null);
	 	$this->db->where('idUsuario',null);
	 	$this->db->where('idPersona',null);
	 	$this->db->delete('Participantes_Tareas');
	 	} catch (Exception $e) {
	 		
	 	}
	 }
	 public function UpdateContactos($s,$param){
	 	$campos = array(
				'idEmpresa' => $param['idEmpresa'],
				'idPersona' => $s);
	 	$this->db->insert('Participantes_Tareas',$campos);
	 	if($this->db->affected_rows()>0){
			return true;
		}else {return false;}

	 	// $campos = array(
	 	// 	'idEmpresa' =>$param['idEmpresa'],
	 	// 	'idPersona' => $s);
	 	// $this->db->where('idEmpresa',$param['idEmpresa']);
	 }
}