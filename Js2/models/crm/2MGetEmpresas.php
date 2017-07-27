<?php

class mGetEmpresas extends CI_Model
{
	function __construct()
	{
		parent::__construct();
	}
	public function getEmpresas($s){
		$s = $this->db->get_where('Empresas',array('sitReg' =>$s));
		return $s->result();
	}
	public function getEmpresaPorUsuario($s){
		$this->db->select('*');
		$this->db->from('Empresas');
		$this->db->where('idRepresentante',$s);
		$this->db->or_where('idContacto',$s);
		$query = $this->db->get();	
		return $query->row();
				// $this->db->join('Personas','Representante = idPersona OR Contacto = idPersona');
	}
	public function getEmpresaPorId($s){
		$this->db->select('*');
		$this->db->from('Empresas');
		$this->db->where('idEmpresa',$s);
		$query = $this->db->get();
		return $query->row();
	}
	public function getDireccion($s){
		$this->db->select('*');
		$this->db->from('Direcciones');
		$this->db->where('idEmpresa',$s);
		$query = $this->db->get();			
		return $query->row();
	}
		public function getTelefonos($s){
		$this->db->select('*');
		$this->db->from('Telefonos');
		$this->db->where('idEmpresa',$s);
		$query = $this->db->get();			
		return $query->row();
	}
		public function getCorreos($s){
		$this->db->select('*');
		$this->db->from('Correos');
		$this->db->where('idEmpresa',$s);
		$query = $this->db->get();			
		return $query->row();
	}

}