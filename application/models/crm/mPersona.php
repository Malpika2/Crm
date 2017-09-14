<?php 

class mPersona extends CI_Model
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->database();
	}
	public function guardar($param){

		$campos = array(
				'Nombre' => $param['Nombre'],
				'Paterno' => $param['Paterno'],
				'Materno' => $param['Materno'],
				'Cargo' => $param['Cargo'],
				'idEmpresa' => $param['idEmpresa'],
				'Skype' => $param['Skype'],
				// 'FechaRegistro' =>$paratm['FechaRegistro'],
				'idUsuarioRegistro' => $param['idUsuarioRegistro'],
				'Status' => $param['Status'],
				'Puesto' => $param['Puesto'],
				'Telefono1' => $param['Telefono1'],
				'Telefono2' => $param['Telefono2'],
				'TipoTelefono1' => $param['TipoTelefono1'],
				'TipoTelefono2' => $param['TipoTelefono2'],
				'Correo1' => $param['Correo1'],
				'Correo2' => $param['Correo2'],
				'Direccion' => $param['Direccion'],
				'Ciudad' => $param['Ciudad'],
				'Pais' => $param['Pais'],
				'ProductosPersona' => $param['ProductosPersona'],
				'PresupuestoPersona' => $param['PresupuestoPersona'],
				'InteresPersona' => $param['InteresPersona'],
				'ConfianzaPersona' => $param['ConfianzaPersona'],
				'MotivoPersona' => $param['MotivoPersona'],
				'LugarContactoPersona' => $param['LugarContactoPersona'],
				'DatosFiscalesPersona' => $param['DatosFiscalesPersona']
				);

				$this->db->insert("Personas",$campos);

				if ($this->db->affected_rows() > 0) {
					return $this->db->insert_id();
				}
				else {
					return false;
				}

	}	 
	public function eliminarPersona($s){
 		// $this->db->delete('Personas', array('idPersona' => $s));
		$this->db->set('Status','Inactivo');
		$this->db->where('idPersona',$s);
		$this->db->update('Personas'); 
		// $this->db->where('idPersona',$s);
		// $this->db->delete('Personas');
		return '1';
		// $error = $this->db->error(); 	
	 }
	 public function PersonaInactiva($idPersona,$StatusFinal){
	 	$this->db->set('Status','Inactivo');
	 	$this->db->set('StatusFinal',$StatusFinal);
	 	$this->db->where('idPersona',$idPersona);
	 	$this->db->update('Personas');
	 	return 1;
	 }
	 public function updatePersona($param){
	 	$campos = array(
			'Nombre' => $param['NombrePersona'],
			'Cargo' => $param['Cargo'],
			'Puesto' => $param['Puesto'],
			'Telefono1' => $param['Telefono1'],
			'Telefono2' => $param['Telefono2'],
			'Correo1' => $param['Correo1'],
			'Correo2' => $param['Correo2'],
			'Skype' => $param['Skype'],
			'Direccion' => $param['Direccion'],
			'Ciudad' => $param['Estado'],
			'Pais' => $param['Pais']);
	 	$this->db->where('idPersona',$param['idPersona']);
	 	$this->db->update('Personas',$campos);
	 	return 1;

	 }
}