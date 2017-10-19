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
		'idMeta' => $param['idMeta'],
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
			
			$camposNotif = array(
				'idTarea' =>$param['UltimaTarea'],
				'idUsuario' => $s);

			$this->db->insert('Notificaciones',$camposNotif);//Guarda las notificaciones de las TAREAS;
			$this->trigger_event($s,$param['TituloTarea']);

			return true;
		}else {return false;}
	}

	public function trigger_event($s,$TituloTarea)
	{
		$pusher = $this->ci_pusher->get_pusher();

		// Set message
		$data['message'] = $TituloTarea;

		// Send message
		$canal = 'User'.$s;
		$event = $pusher->trigger($canal, 'Notificacion', $data);

		if ($event === TRUE)
		{
			echo 'Event triggered successfully!';
		}
		else
		{
			echo 'Ouch, something happend. Could not trigger event.';
		}
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
	public function getTareas(){
		$s = $this->db->get('Tareas');
		return $s->result();
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

		public function tareaRealizada($s,$StatusFinal){
			$data = array(
				'StatusTarea' => 'Realizada','StatusFinal' =>$StatusFinal);
			$this->db->where('idTarea',$s);
			$this->db->update('Tareas',$data);
			return true;
		}
		public function tareaNoRealizada($s){
			$data = array(
				'StatusTarea' => 'Activa','StatusFinal' => '');
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
		public function getTareas_deEmpresas_PorUsuario($s=null){
			$this->db->select('idParticipantes, Participantes_Tareas.idTarea idTareaP, Participantes_Tareas.idUsuario idUsuarioP, Participantes_Tareas.idPersona idPersonaP, Participantes_Tareas.idEmpresa idEmpresaP, Empresas.idEmpresa idEmpresaE, Empresas.NombreEmpresa,Personas.idPersona idPersonaPer, Personas.Nombre,Tareas.idTarea, Tareas.TituloTarea, Tareas.Categoria, Tareas.Asignados, Tareas.emp_part, Tareas.per_part, Tareas.Descripcion, Tareas.idPersona idPersonaT, Tareas.idEmpresa idEmpresaT, Tareas.idNegociacion, Tareas.idMeta, Tareas.FechaFin, Tareas.idUsuarioCrea, Tareas.FechaCreacion, Tareas.Activa, Tareas.Prioridad, Tareas.StatusFinal, Tareas.StatusTarea, Usuarios.Nombre NombreU
				');
			$this->db->from('Participantes_Tareas');
			$this->db->join('Tareas','Tareas.idTarea=Participantes_Tareas.idTarea');
			$this->db->join('Empresas','Empresas.idEmpresa=Tareas.idEmpresa','left');
			$this->db->join('Personas','Personas.idPersona=Tareas.idPersona','left');
			$this->db->join('Usuarios','Usuarios.idUsuario=Tareas.idUsuarioCrea','left');
			// $this->db->where('Participantes_Tareas.idUsuario',$s);
			if ($s!==null) {
			$this->db->where('Tareas.idTarea',$s);				
			}
			$this->db->group_by('Tareas.idTarea');
			$this->db->order_by('Tareas.FechaFin','DESC');
			$s = $this->db->get();
			return $s->result();
		}
		public function getTareas_dePersonas_PorUsuario($s){
			$this->db->select('*');
			$this->db->from('Participantes_Tareas');
			$this->db->join('Tareas','Tareas.idTarea=Participantes_Tareas.idTarea');
			$this->db->join('Personas','Personas.idPersona=Tareas.idPersona');
			// $this->db->where('Participantes_Tareas.idUsuario',$s);
			$this->db->group_by('Tareas.idTarea');
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
			// $this->db->like('Tareas.Asignados',$s);
			$this->db->where('Tareas.idEmpresa',NULL);
			$this->db->where('Tareas.idPersona',NULL);
			$this->db->group_by('Tareas.TituloTarea');
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
			// $this->db->like('Tareas.Asignados',$s);
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
		$this->db->group_by('Usuarios.idUsuario');
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
	 public function getTareas_deObjetivos($s)
	 {
	 	$this->db->select('*');
	 	$this->db->from('Tareas');
	  	$this->db->where('idNegociacion',$s);
	 	$s = $this->db->get();
	 	return $s->result();
	 }
	public function getTareas_deObjetivosAll()
	 {	$s=0;
	 	$this->db->select('*');
	 	$this->db->from('Tareas');
	  	$this->db->where('idNegociacion !=',$s);
	 	$s = $this->db->get();
	 	return $s->result();
	 }
	 public function getTareasInternasPorUsuarioActivo($s)
	 {
	 	$this->db->select('*');
	 	$this->db->from('Participantes_Tareas');
	 	$this->db->join('Tareas','Tareas.idTarea = Participantes_Tareas.idTarea');
	 	$this->db->join('Usuarios','Usuarios.idUsuario = Participantes_Tareas.idUsuario');
	 	$this->db->where('Participantes_Tareas.idUsuario',$s);
	 	$s = $this->db->get();
	 	return $s->result();
	 }
	 public function eliminarTareaInterna($s){
 		$this->db->delete('Tareas', array('idTarea' => $s)); 
 		return '1';
	 }
	 public function StatusRealizada($id,$status){
	 	$data = array(
	 		'StatusTarea' =>'Realizada',
	 		'StatusFinal' =>$status
	 		);
	 	$this->db->where('idTarea',$id);
	 	$this->db->update('Tareas',$data);
	 	return true;
	 }
	 public function StatusCancelar($id,$status){
	 	$data = array(
	 		'StatusTarea' =>'Cancelada',
	 		'StatusFinal' =>$status
	 		);
	 	$this->db->where('idTarea',$id);
	 	$this->db->update('Tareas',$data);
	 	return true;
	 }
	 public function StatusRechazar($id,$status){
	 	$data = array(
	 		'StatusTarea' =>'Rechazada',
	 		'StatusFinal' =>$status
	 		);
	 	$this->db->where('idTarea',$id);
	 	$this->db->update('Tareas',$data);
	 	return true;
	 }
	 public function StatusAceptar($id){
	 	$data = array(
	 		'StatusTarea' =>'Activa',
	 		'StatusFinal' =>$status
	 		);
	 	$this->db->where('idTarea',$id);
	 	$this->db->update('Tareas',$data);
	 	return true;
	 }
	 public function GuardarCambiosTarea($idTarea,$Categoria,$Descripcion){
	 	$data = array(
	 		'Categoria' =>$Categoria,
	 		'Descripcion' =>$Descripcion
	 		);
	 	$this->db->where('idTarea',$idTarea);
	 	$this->db->update('Tareas',$data);
	 	return true;
	 }
	 public function getEmpresaPorTarea($idTarea){
	 	$this->db->select('*');
	 	$this->db->from('Tareas');
	 	$this->db->join('Empresas','Empresas.idEmpresa=Tareas.idEmpresa');
	 	$this->db->where('idTarea',$idTarea);
	 	$r = $this->db->get();
	 	return $r->result();

	 }

}