 <?php

class mTareas extends CI_Model
{
	
	function __construct()
	{
		parent::__construct();
	}
	public function guardarTarea($param){
		$campos = array(
		'TituloTarea' => $param['TituloTarea'],
		'Categoria' => $param['Categoria'],
		'Asignados' => $param['Asignados'],
		'emp_part' => $param['EmpresasPart'],
		'per_part' => $param['PersonasPart'],
		'FechaFin' => $param['FechaFin'],
		'idPersona' => $param['idPersona'],
		'idEmpresa' => $param['idEmpresa'],
		'idNegociacion' => $param['idNegociacion'],
		'Prioridad' => $param['Prioridad'],
		'Descripcion' => $param['Descripcion'],
		'idUsuarioCrea' => $param['idUsuarioCrea']);

		$this->db->insert('Tareas',$campos);
		if ($this->db->affected_rows() > 0) {
			return $this->db->insert_id();				
			}
		else {
			return false;
		}
	}
	public function guardarParticipantes($s,$param){
		$campos = array(
			'idTarea' => $param['UltimaTarea'],
			'idUsuario' => $s,
			'idPersona' => null,
			'idEmpresa'=>null);//Personas a participar
		$this->db->insert('Participantes_Tareas',$campos);
		if($this->db->affected_rows()>0){
			return true;
		}else {return false;}
	}
	public function guardarEmpresasParticipantes($s,$param){
		$campos = array(
			'idTarea' => $param['UltimaTarea'],
			'idEmpresa' => $s,
			'idPersona' => null);//Personas a participar
		$this->db->insert('Participantes_Tareas',$campos);
		if($this->db->affected_rows()>0){
			return true;
		}else {return false;}
	}
	public function guardarPersonasParticipantes($s,$param){
		$campos = array(
			'idTarea' => $param['UltimaTarea'],
			'idEmpresa' => null,
			'idPersona' => $s);//Personas a participar
		$this->db->insert('Participantes_Tareas',$campos);
		if($this->db->affected_rows()>0){
			return true;
		}else {return false;}
	}

	public function getTareasPersonas($s){
		$this->db->select('*');
		$this->db->from('Tareas');
		$this->db->like('per_part',$s);
		$this->db->or_where('idPersona',$s);
		// $this->db->join('Usuarios','Usuarios.idUsuario = Tareas.Asignados');

		$this->db->order_by('FechaFin','ASC');
		$s = $this->db->get();
		return $s->result();

	}
		public function getTareasEmpresas($s){
		$this->db->select('*');
		$this->db->from('Tareas');
		$this->db->like('emp_part',$s);
		$this->db->or_where('idEmpresa',$s);
		// $this->db->join('Usuarios','Usuarios.idUsuario = Tareas.Asignados');
		$this->db->order_by('FechaFin','ASC');
		$s = $this->db->get();
		return $s->result();
	}

		public function tareaRealizada($s){
			$data = array(
				'Activa' => '0');
			$this->db->where('idTarea',$s);
			$this->db->update('Tareas',$data);
			return true;
		}
public function tareaNoRealizada($s){
			$data = array(
				'Activa' => '1');
			$this->db->where('idTarea',$s);
			$this->db->update('Tareas',$data);
			return true;
		}
		public function getTarea($s){
			$this->db->select('*');
			$this->db->from('Tareas');
			$this->db->where('idTarea',$s);
			$query = $this->db->get();	
			return $query->row();
		}
		public function getTareas_deEmpresas_PorUsuario($s){
			$this->db->select('*');
			$this->db->from('Participantes_Tareas');
			$this->db->join('Tareas','Tareas.idTarea=Participantes_Tareas.idTarea');
			$this->db->join('Empresas','Empresas.idEmpresa=Tareas.idEmpresa');
			$this->db->where('Participantes_Tareas.idUsuario',$s);
			$this->db->order_by('Tareas.FechaFin','DESC');
			$s = $this->db->get();
			return $s->result();
		}
		public function getTareas_deEmpresas_PorUsuarioGrupales($s){
			$this->db->distinct();
			$this->db->select('*');
			$this->db->from('Participantes_Tareas');
			$this->db->join('Tareas','Tareas.idTarea=Participantes_Tareas.idTarea');
			$this->db->join('Empresas','Empresas.idEmpresa=Participantes_Tareas.idEmpresa');
			$this->db->like('Tareas.Asignados',$s);
			$this->db->where('Tareas.idEmpresa',NULL);
			$this->db->where('Tareas.idPersona',NULL);
			$this->db->group_by('Tareas.TituloTarea');
			$this->db->order_by('Tareas.FechaFin','DESC');
			$s = $this->db->get();
			return $s->result();
		}

		public function getTareas_dePersonas_PorUsuario($s){
			$this->db->select('*');
			$this->db->from('Participantes_Tareas');
			$this->db->join('Tareas','Tareas.idTarea=Participantes_Tareas.idTarea');
			$this->db->join('Personas','Personas.idPersona=Tareas.idPersona');
			$this->db->where('Participantes_Tareas.idUsuario',$s);
			$this->db->order_by('Tareas.FechaFin','DESC');
			$s = $this->db->get();
			return $s->result();
		}
		public function getTareas_dePersonas_PorUsuarioGrupales($s){
			$this->db->distinct();
			$this->db->select('*');
			$this->db->from('Participantes_Tareas');
			$this->db->join('Tareas','Tareas.idTarea=Participantes_Tareas.idTarea');
			$this->db->join('Personas','Personas.idPersona=Participantes_Tareas.idPersona');
			$this->db->like('Tareas.Asignados',$s);
			$this->db->where('Tareas.idEmpresa',NULL);
			$this->db->where('Tareas.idPersona',NULL);
			$this->db->group_by('Tareas.TituloTarea');
			$this->db->order_by('Tareas.FechaFin','DESC');
			$s = $this->db->get();
			return $s->result();
		}
	public function getAsignados($s){
		$this->db->select('*');
		$this->db->from('Participantes_Tareas');
		$this->db->join('Usuarios','Usuarios.idUsuario = Participantes_Tareas.idUsuario');
		$this->db->where('idTarea',$s);
		$s = $this->db->get();
		return $s->result();
	 }
	public function getEmp_Participantes($s){
		$this->db->select('*');
		$this->db->from('Participantes_Tareas');
		$this->db->join('Empresas','Empresas.idEmpresa = Participantes_Tareas.idEmpresa');
		$this->db->where('idTarea',$s);
		$s = $this->db->get();
		return $s->result();
	 }
	public function getPersonas_Participantes($s)
	 {
	 	$this->db->select('*');
		$this->db->from('Participantes_Tareas');
		$this->db->join('Personas','Personas.idPersona = Participantes_Tareas.idPersona');
		$this->db->where('idTarea',$s);
		$s = $this->db->get();
		return $s->result();	
	 }
	 public function getTareasInternas()
	 {
	 	$this->db->select('*');
	 	$this->db->from('Participantes_Tareas');
	 	$this->db->join('Tareas','Tareas.idTarea = Participantes_Tareas.idTarea');
	 	$this->db->join('Usuarios','Usuarios.idUsuario = Participantes_Tareas.idUsuario');
	 	// $this->db->where('Participantes_Tareas.idUsuario',$s);
	 	$s = $this->db->get();
	 	return $s->result();
	 }
	 public function eliminarTareaInterna($s){
 		$this->db->delete('Tareas', array('idTarea' => $s)); 
 		return '1';
	 }
	 public function eliminarPersona($s){
 		$this->db->delete('Personas',array('idPersona'=> $s)); 
		return '1';
	 }
}