<?php

class mForo extends CI_Model
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->database();
	}
	public function guardarTema($param){
		$campos = array(
				'TituloTema' => $param['TituloTema'],
				'seccion' => $param['seccion'],
				'AsuntoTema' => $param['AsuntoTema'],
				'idUsuarioCrea' => $param['idUsuarioCrea']);
		$this->db->insert('TemasForo',$campos);
		return $this->db->insert_id();
	}
	public function getTemas(){
		$this->db->select('*');
		$this->db->from('TemasForo');
		$s = $this->db->get();
		return $s->result();
	}
	public function getComentariosPorTema($s){
		$this->db->select('*');
		$this->db->from('Comentarios c');
		$this->db->join('Usuarios u','u.idUsuario = c.idUsuarioc');
		$this->db->where('c.idTemaForo',$s);
		$this->db->order_by('Fecha_Creacion','DESC');
		$s = $this->db->get();
		return $s->result();
	}
	public function guardarComentario($param){
		$campos = array(
			'idUsuarioc' => $param['idUsuarioc'],
			'Comentario' => $param['Comentario'],
			'idPersona' => null,
			'idEmpresa' => null,
			'idNegociacion' => null,
			'idTarea' => null,
			'idComent' => null,
			'idTemaForo' => $param['idTema']
			);
			$this->db->insert("Comentarios",$campos);
			if ($this->db->affected_rows() > 0) {
				return true;
			}
			else{
				return false;
			}
	}
	public function ActualizarComentario($idComentario,$comentario){
		$data = array(
				'Comentario' => $comentario);
			$this->db->where('idComentario',$idComentario);
			$this->db->update('Comentarios',$data);
			return true;
	}
	public function getTema($idTema){
		$this->db->select('*');
		$this->db->from('TemasForo');
		$this->db->where('idTemasForo',$idTema);
		$r = $this->db->get();
		return $r->row();
	}
	public function ActualizarVisto($idTema){
		$data = array('Visto'=>1);
		$this->db->where('idComentario',$idTema);
		$this->db->update('Comentarios',$data);
		return true;
	}
	}