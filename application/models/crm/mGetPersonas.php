 <?php

class mGetPersonas extends CI_Model
{
	// private $DBSPP;  // Base de datos en la nube

	function __construct()
	{
		parent::__construct();

		$this->DBSPP = $this->load->database('d-spp', TRUE);

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
	public function getPersonaPorIdResult($s){
		$this->db->select('*');
		$this->db->from('Personas');
		$this->db->where('idPersona',$s);
		$query = $this->db->get();			
		return $query->result();
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
	public function getPersonasAutoComplete(){
			$s = $this->db->get('contactos');
			return $s->result();
	}
	public function getPersonaPorId2($idPersona){
		$this->db->select('*');
		$this->db->from('Personas');
		$this->db->where('idPersona',$idPersona);
		$r = $this->db->get();			
		return $r->result();
	}
	public function getPaises(){
		$this->db->order_by('nombre','ASC');
		$r = $this->db->get('paises');
		return $r->result();
	}	
	public function getLadaPorPais($Pais)
	{
		$r = $this->db->get_where('paises',array('nombre'=>$Pais));
		return $r->row();
	}
}