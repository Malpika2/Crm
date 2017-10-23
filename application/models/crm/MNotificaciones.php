<?php /**
* 
*/
class mNotificaciones extends CI_Model
{
	
	function __construct()
	{
		parent::__construct();
	}
	public function crearNotificacion($tarea,$TituloNotificacion=null){
		$campos = array(
			'TituloNotificacion' =>$TituloNotificacion,
			'idTarea' => $tarea->idTarea,
			'idUsuario' => $tarea->idUsuarioCrea);
		$this->db->insert('Notificaciones',$campos);
		if($this->db->affected_rows()>0){
			return true;
		}
	}
	public function getNotificaciones($idUsuarioActivo){
		$this->db->select('*');
		$this->db->from('Notificaciones');
		$this->db->join('Tareas','Tareas.idTarea=Notificaciones.idTarea');
		$this->db->join('Usuarios','Usuarios.idUsuario=Notificaciones.idUsuario');
		$this->db->where('Notificaciones.idUsuario',$idUsuarioActivo);
		$this->db->where('Notificaciones.statusNotificacion','No Leida');
		$this->db->order_by('Notificaciones.Fecha_Creacion','ASC');
		$s = $this->db->get();
		return $s->result();
	}
	public function actNotificaciones($s){
		$this->db->set('statusNotificacion','Leida');
		$this->db->where('idNotificaciones',$s);
		$this->db->update('Notificaciones'); 
		return true;
	}
	public function actNotificacionesRechazada_Leida($idTarea,$idUsuarioActivo){
		$this->db->set('statusNotificacion','Leida');
		$this->db->where('idTarea',$idTarea);
		$this->db->where('idUsuario',$idUsuarioActivo);
		$this->db->update('Notificaciones'); 
		return true;
	}

}