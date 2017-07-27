 <?php

class mGetPersonas extends CI_Model
{
	
	function __construct()
	{
		parent::__construct();
	}
	public function getRepresentantes($s){
		$s = $this->db->get_where('Personas',array('Cargo' =>$s));
		return $s->result();
	}
	public function getContactos($s){
		$s = $this->db->get_where('Personas',array('Cargo'=>$s));
		return $s->result();
	}
	public function getPersonas(){
		$s = $this->db->get('Personas');
		return $s->result();
	}
	public function getPersonasPorEmpresa($s){
		$this->db->select('p.idPersona,p.Nombre,p.Paterno,p.idEmpresa');
		$this->db->from('Personas p');
		$this->db->join('Empresas e','e.idRepresentante = p.idPersona OR e.idContacto = p.idPersona');
		$this->db->where('e.idEmpresa',$s);
		$s = $this->db->get();
		return $s->result();
	}
	public function getPersonasPorEmpresa2($s){
		$this->db->select('p.idPersona,p.Nombre,p.Paterno,p.idEmpresa');
		$this->db->from('Personas p');
		$this->db->join('Empresas e','e.idRepresentante = p.idPersona OR e.idContacto = p.idPersona');
		$this->db->where('e.idEmpresa',$s);
		$query = $this->db->get();
		return $query->row();
	}
	public function getPersonaPorId($s){
		$this->db->select('*');
		$this->db->from('Personas');
		$this->db->where('idPersona',$s);
		$query = $this->db->get();			
		return $query->row();
	}
	
	public function getDireccion($s){
		$this->db->select('*');
		$this->db->from('Direcciones');
		$this->db->where('idPersona',$s);
		$query = $this->db->get();			
		return $query->row();
	}
		public function getTelefonos($s){
		$this->db->select('*');
		$this->db->from('Telefonos');
		$this->db->where('idPersona',$s);
		$query = $this->db->get();			
		return $query->row();
	}
		public function getCorreos($s){
		$this->db->select('*');
		$this->db->from('Correos');
		$this->db->where('idPersona',$s);
		$query = $this->db->get();			
		return $query->row();
	}
}