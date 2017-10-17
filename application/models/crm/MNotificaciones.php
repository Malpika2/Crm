<?php /**
* 
*/
class mNotificaciones extends CI_Model
{
	
	function __construct()
	{
		parent::__construct();
	}
	public function getNotificaciones($idUsuarioActiavo){
		$this->db->select('*');
		$this->db->from('Notificaciones');
		$this->db->join('Tareas','Tareas.idTarea=Notificaciones.idTarea');
		$this->db->join('Usuarios','Usuarios.idUsuario=Notificaciones.idUsuario');
		$this->db->where('Notificaciones.idUsuario',$idUsuarioActiavo);
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

}