 <?php

class mGetUsuarios extends CI_Model
{
	
	function __construct()
	{
		parent::__construct();
	}
	public function getUsuarios(){
		$s = $this->db->get('Usuarios');
		return $s->result();
	}
}