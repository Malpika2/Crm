<?php

class mComentarios extends CI_Model
{	
	function __construct()
	{
		parent::__construct();
		$this->load->database();
	}
	public function getComentarios_Por_Persona($s){
		$this->db->select('*');
		$this->db->from('Comentarios c');
		$this->db->join('Usuarios u','u.idUsuario = c.idUsuarioc');
		$this->db->where('c.idPersona',$s);
		$this->db->order_by('Fecha_Creacion','ASC');
		$s = $this->db->get();
		return $s->result();
	}
	public function getComentarios_Por_Comentario($s){
		$this->db->select('*');
		$this->db->from('Comentarios c');
		$this->db->join('Usuarios u','u.idUsuario = c.idUsuarioc');
		$this->db->where('c.idComent',$s);
		$this->db->order_by('Fecha_Creacion','ASC');
		$s = $this->db->get();
		return $s->result();
	}
	public function getComentarios_Por_Empresa($s){
		$this->db->select('*');
		$this->db->from('Comentarios c');
		$this->db->join('Usuarios u','u.idUsuario = c.idUsuarioc');
		$this->db->where('c.idEmpresa',$s);
		$this->db->order_by('Fecha_Creacion','ASC');
		$s = $this->db->get();
		return $s->result();

	}
	public function guardarComentario($param){
		$campos = array(
			'idUsuarioc' => $param['idUsuarioc'],
			'Comentario' => $param['Comentario'],
			'Fecha_Creacion' => $param['Fecha_Creacion'],
			'idPersona' => $param['idPersona'],
			'idEmpresa' => $param['idEmpresa'],
			'idNegociacion' => $param['idNegociacion'],
			'idTarea' => $param['idTarea'],
			'idComent' => $param['idComent']
			);
			$this->db->insert("Comentarios",$campos);
			if ($this->db->affected_rows() > 0) {
				return true;
			}
			else{
				return false;
			}
	}
	public function getComentarios_Por_Tarea($s){
		$this->db->select('*');
		$this->db->from('Comentarios c');
		$this->db->join('Usuarios u','u.idUsuario = c.idUsuarioc');
		$this->db->where('c.idTarea',$s);
		$this->db->order_by('Fecha_Creacion','DESC');
		$s = $this->db->get();
		return $s->result();
	}
	public function getComentarios_Por_Negociacion($s){
		$this->db->select('*');
		$this->db->from('Comentarios c');
		$this->db->join('Usuarios u','u.idUsuario = c.idUsuarioc');
		$this->db->where('c.idNegociacion',$s);
		$this->db->order_by('Fecha_Creacion','DESC');
		$s = $this->db->get();
		return $s->result();
	}
}