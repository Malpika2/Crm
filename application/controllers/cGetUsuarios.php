<?php ob_start(); ?>
 <?php

class cGetUsuarios extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('crm/mGetUsuarios');
	}
	public function getUsuarios(){

		$resultado = $this->mGetUsuarios->getUsuarios();
		echo json_encode($resultado);
	}}