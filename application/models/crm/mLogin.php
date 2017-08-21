<?php ob_start(); ?>
<?php
class mLogin extends CI_Model
{
	public function ingresar($usu,$pass){
		$this->db->select('idUsuario,Nombre,Paterno,Puesto,Password,url_foto');
		$this->db->from('Usuarios');
		$this->db->where('Usuario',$usu);
		$this->db->where('Password',$pass);
		$resultado = $this->db->get();
		if($resultado->num_rows() == 1){
			$r = $resultado->row();
			$s_usuario = array(
				's_Nombre' => $r->Nombre,
				's_idUsuario' => $r->idUsuario,
				's_Puesto' => $r->Puesto,
				's_Foto' => $r->url_foto,
				's_Usuario' => $r->Nombre." ".$r->Paterno,
				's_login' => 1
				);
			$this->session->set_userdata($s_usuario);
			return 1;
		}
		else {
			return 0;
		}
	}
	public function cerrarSession(){
			$s_usuario = array(
				's_Nombre' => '',
				's_idUsuario' => '',
				's_Puesto' => '',
				's_Foto' => '',
				's_Usuario' => '',
				's_login' => 0);
		$this->session->sess_destroy();
	}
}