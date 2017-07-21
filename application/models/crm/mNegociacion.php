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
	public function NegociacionEliminada($s){
			$data = array(
				'Activa' => '0');
			$this->db->where('idNegociacion',$s);
			$this->db->update('Negociaciones',$data);
			return true;

	}
	public function getNegociacionPorUsuario($s){
		$this->db->select('idNegociacion, NombreNegociacion,Negociaciones.idEmpresa,Negociaciones.idPersona,Motivo,Prioridad,Negociaciones.Status as NegStatus,PersonaCargo,FechaLimite,Detalles,CreadaPor,Activa,Empresas.RazonSocial,Personas.Nombre,Personas.Paterno');
		$this->db->from('Negociaciones');
		$this->db->join('Personas','Negociaciones.idPersona = Personas.idPersona','left');
		$this->db->join('Empresas','Negociaciones.idEmpresa = Empresas.idEmpresa','left');
		$this->db->where('Negociaciones.PersonaCargo',$s);
		$s = $this->db->get();
		return $s->result();

	}
}