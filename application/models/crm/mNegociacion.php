 <?php
			// 'idPersona' => $param['idPersona'];

class mNegociacion extends CI_Model
{

	function __construct()
	{
		parent::__construct();
		$this->load->database();
	}
	public function guardarEmpresa($param){

		$camposN = array(
			'NombreNegociacion' => $param['NombreNegociacion'],
			'idEmpresa' => $param['idEmpresa'],
			'Motivo' => $param['Motivo'],
			'Prioridad' => $param['Prioridad'],
			'Status' => $param['Status'],
			'PersonaCargo' => $param['PersonaCargo'],
			'FechaLimite' => $param['FechaLimite'],
			'Detalles' => $param['Detalles'],
			'CreadaPor' =>$param['CreadaPor']);
		$this->db->insert("Negociaciones",$camposN);
		if($this->db->affected_rows()>0){
			return 1;
		}
		else {return 0;}
	}
	public function guardarPersona($param){

		$camposN = array(
			'NombreNegociacion' => $param['NombreNegociacion'],
			'idPersona' => $param['idPersona'],
			'Motivo' => $param['Motivo'],
			'Prioridad' => $param['Prioridad'],
			'Status' => $param['Status'],
			'PersonaCargo' => $param['PersonaCargo'],
			'FechaLimite' => $param['FechaLimite'],
			'Detalles' => $param['Detalles'],
			'CreadaPor' =>$param['CreadaPor']);
		$this->db->insert("Negociaciones",$camposN);
		if($this->db->affected_rows()>0){
			return 1;
		}
		else {return 0;}
	}
	public function getNegociaciones_Por_Persona($s){
			$this->db->select('*');
			$this->db->from('Negociaciones');
			$this->db->join('Usuarios','Negociaciones.PersonaCargo = Usuarios.idUsuario') ;
			$this->db->where('idPersona',$s);
			$s = $this->db->get();
			return $s->result();
	}
		public function getNegociaciones_Por_Empresa($s){
			$this->db->select('*');
			$this->db->from('Negociaciones');
			$this->db->join('Usuarios','Negociaciones.PersonaCargo = Usuarios.idUsuario') ;
			$this->db->where('idEmpresa',$s);
			$s = $this->db->get();
			return $s->result();
	}
	public function getNegociacion($s){
			$this->db->select('*');
			$this->db->from('Negociaciones');
			$this->db->join('Usuarios','Negociaciones.PersonaCargo = Usuarios.idUsuario') ;
			$this->db->where('idNegociacion',$s);
			$s = $this->db->get();
			return $s->row();
	}
	public function getNegociacionyEmpresa($s){
		$this->db->select('idNegociacion, NombreNegociacion,Negociaciones.idEmpresa,Negociaciones.idPersona,Motivo,Prioridad,Negociaciones.Status as NegStatus,Negociaciones.StatusFinal,PersonaCargo,FechaLimite,Detalles,CreadaPor,Activa,Empresas.RazonSocial,Empresas.NombreEmpresa,Personas.Nombre,Personas.Paterno,COUNT(*) as numero');
		$this->db->from('Negociaciones');
		$this->db->join('Personas','Negociaciones.idPersona = Personas.idPersona','left');
		$this->db->join('Empresas','Negociaciones.idEmpresa = Empresas.idEmpresa','left');
		$this->db->where('Negociaciones.idNegociacion',$s);
		$s = $this->db->get();
		return $s->row();
	}
	public function NegociacionEliminada($s,$StatusFinalNG){
			$data = array(
				'Activa' => '0','StatusFinal'=>$StatusFinalNG,'Status'=>'Cancelado');
			$this->db->where('idNegociacion',$s);
			$this->db->update('Negociaciones',$data);
			return true;

	}
	public function getNegociacionPorUsuario($s){
		$this->db->select('idNegociacion, NombreNegociacion,Negociaciones.idEmpresa,Negociaciones.idPersona,Motivo,Prioridad,Negociaciones.Status as NegStatus,Negociaciones.TareasActiva,Negociaciones.TareasCancelada,Negociaciones.TareasRealizada,PersonaCargo,FechaLimite,Detalles,CreadaPor,Activa,Empresas.NombreEmpresa,Personas.Nombre,Personas.Paterno');
		$this->db->from('Negociaciones');
		$this->db->join('Personas','Negociaciones.idPersona = Personas.idPersona','left');
		$this->db->join('Empresas','Negociaciones.idEmpresa = Empresas.idEmpresa','left');
		$this->db->where('Negociaciones.PersonaCargo',$s);
		$s = $this->db->get();
		return $s->result();

	}
		public function getNegociaciones(){
			$this->db->select('*');
			$this->db->from('Negociaciones');
			$this->db->join('Usuarios','Negociaciones.PersonaCargo = Usuarios.idUsuario') ;
			$s = $this->db->get();
			return $s->result();
	}
		public function EliminarNegociacion($s){
		// $this->db->delete('Empresas', array('idEmpresa'=>$s));
		$this->db->set('Status','Inactivo');
		$this->db->where('idNegociacion',$s);
		$this->db->update('Negociaciones'); 
		// $this->db->where('idEmpresas',$s);
		// $this->db->delete('Empresas');
		return true;
	}
	public function ActualizarAvance(){
		$data = array(
        'TareasRealizada' => 0,
        'TareasCancelada' => 0,
        'TareasActiva' =>0);
		$this->db->update('Negociaciones', $data);
		
		$this->db->select('count(idTarea) as cont , idNegociacion , StatusTarea');
		$this->db->from('Tareas');
		$this->db->group_by(array('idNegociacion','StatusTarea'));
		$this->db->where('idNegociacion >',0);
		$query = $this->db->get();
		return $query->result();
	}
	public function ActualizarRealizada($idNeg,$cont){
		$this->db->set('TareasRealizada',$cont);
		$this->db->where('idNegociacion',$idNeg);
		$this->db->update('Negociaciones');
	}
	public function ActualizarCancelada($idNeg,$cont){
		$this->db->set('TareasCancelada',$cont);
		$this->db->where('idNegociacion',$idNeg);
		$this->db->update('Negociaciones');
	}
	public function ActualizarActiva($idNeg,$cont){
		$this->db->set('TareasActiva',$cont);
		$this->db->where('idNegociacion',$idNeg);
		$this->db->update('Negociaciones');
	}

}