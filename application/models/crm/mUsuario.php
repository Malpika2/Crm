<?php
/**
* 
*/
class mUsuario extends CI_Model
{
	
	function __construct()
	{
		parent::__construct();
	}
	public function guardar($param){

		$campos = $array(
			$param['Nombre'],$param['Paterno'],$param['Materno'],$param['Puesto'],$param['Skype']

			);
	}
}?>