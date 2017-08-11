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
		$this->DBSPP->select('*');
		$this->DBSPP->from('empresa');
		$s =$this->DBSPP->get();
			return $s->result();
	}

	public function getEmpresaPorUsuario($s){
		$this->DBCRM->select('*');
		$this->DBCRM->from('Empresas');
		$this->DBCRM->where('idRepresentante',$s);
		$this->DBCRM->or_where('idContacto',$s);
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

}