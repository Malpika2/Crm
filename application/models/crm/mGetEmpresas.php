<?php
class mGetEmpresas extends CI_Model
{
	private $DBCRM; // Base de datos local
    private $DBSPP;  // Base de datos en la nube
	function __construct()
	{
		
		parent::__construct();
		$this->DBCRM = $this->load->database('default', TRUE);
		$this->DBSPP = $this->load->database('d-spp', TRUE);

	}
	public function getEmpresas($s){
		$s =$this->DBCRM->get_where('Empresas',array('sitReg' =>$s));
		return $s->result();
	}
	public function getEmpresasAutoComplete(){
		$query = $this->DBCRM->query("SELECT * FROM empresa");

		$rawdata = array();
		$rawdata2= array();
		$i=0;

		foreach($query->result_array() as $fila){

			$arrayEmpresas = array(
				'nombre' =>  $fila['nombre'],
				'abreviacion' => $fila['abreviacion'],
				'spp' => $fila['spp'],
				'sitio_web' => $fila['sitio_web'],
				'telefono' => $fila['telefono'],
				'email' => $fila['email'],
				'rfc' => $fila['rfc'],
				'ruc' => $fila['ruc'],
				'direccion_oficina' => $fila['direccion_oficina'],
				'direccion_fiscal' => $fila['direccion_fiscal'],
				'ciudad' => $fila['ciudad'],
				'pais' => $fila['pais']);
				$rawdata[$i]= $arrayEmpresas;
				$i++;		
		}
		return $rawdata;

	}

	public function getEmpresaPorUsuario($s){
		$this->DBCRM->select('*');
		$this->DBCRM->from('Empresas');
		$this->DBCRM->like('idRepresentante',$s,'both');
		$this->DBCRM->or_like('idContacto',$s,'both');
		$query = $this->DBCRM->get();	
		return $query->row();
				// $this->db->join('Personas','Representante = idPersona OR Contacto = idPersona');
	}
	public function getEmpresaPorId($s){
		$this->DBCRM->select('*');
		$this->DBCRM->from('Empresas');
		$this->DBCRM->where('idEmpresa',$s);
		$query = $this->DBCRM->get();
		return $query->row();
	}
	public function getDireccion($s){
		$this->DBCRM->select('*');
		$this->DBCRM->from('Direcciones');
		$this->DBCRM->where('idEmpresa',$s);
		$query = $this->DBCRM->get();			
		return $query->row();
	}
		public function getTelefonos($s){
		$this->DBCRM->select('*');
		$this->DBCRM->from('Telefonos');
		$this->DBCRM->where('idEmpresa',$s);
		$query = $this->DBCRM->get();			
		return $query->row();
	}
		public function getCorreos($s){
		$this->DBCRM->select('*');
		$this->DBCRM->from('Correos');
		$this->DBCRM->where('idEmpresa',$s);
		$query = $this->DBCRM->get();			
		return $query->row();
	}
	public function getContactos($s){
		$this->db->select('*');
		$this->db->from('Participantes_Tareas');
		$this->db->join('Personas','Personas.idPersona = Participantes_Tareas.idPersona');
		$this->db->where('Participantes_Tareas.idEmpresa',$s);
		$this->db->group_by('Personas.idPersona');
		$s = $this->db->get();
		return $s->result();
	}
	public function Validar_Nueva_Empresa($nEmpresa){
		$query = $this->db->get_where('Empresas',array('NombreEmpresa'=>$nEmpresa));
		return $query->num_rows();
	}
}
		// Ã¡ = á
		// Ã± = ñ
		// Ã© = é
		// Ã³ = ó
		// Ã‘ = Ñ
		// Ã‰ = É
		// Ã­ = í
		// Ãº = ú



