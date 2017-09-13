<?php

class AjaxUpload extends CI_Controller {
 
    function __construct() {
        parent::__construct();
        $this->load->model('crm/mUpload');
    }
 
    function index() {
    }
 
    public function uploadBD(){
    $idComentarioN = $this->input->post('idComentario');
    $idEmpresa = $this->input->post('idEmpresa');
    $nombreArchivo = $this->input->post('nombreArchivo');
    $this->mUpload->subir($nombreArchivo,$idComentarioN,$idEmpresa);
    }
    public function uploadBDpersonas(){
    $idComentarioN = $this->input->post('idComentario');
    $idPersona = $this->input->post('idPersona');
    $nombreArchivo = $this->input->post('nombreArchivo');
    $this->mUpload->subirPersonas($nombreArchivo,$idComentarioN,$idPersona);
    }
    function upload_file() {
    
        //upload file
        $config['upload_path'] = 'uploads/';
        $config['allowed_types'] = '*';
        $config['max_filename'] = '255';
        $config['encrypt_name'] = false;
        $config['max_size'] = '4096'; //4 MB
 
        if (isset($_FILES['file']['name'])) {
            if (0 < $_FILES['file']['error']) {
                echo 'Error during file upload' . $_FILES['file']['error'];
            } else {
                if (file_exists('uploads/' . $_FILES['file']['name'])) {
                    echo 'Archivo Subido Exitosamente :' . $_FILES['file']['name'];
                } else {
                    $this->load->library('upload', $config);
                    if (!$this->upload->do_upload('file')) {
                        echo $this->upload->display_errors();
                    } else {
                        // $this->mUpload->subir($_FILES['file']['name'],$idComentarioN,$idEmpresa)
                        echo 'Archivo subido Exitosamente:' . $_FILES['file']['name'];

                    }
                }
            }
        } else {
            echo 'Error: Recarga la pagina o seleccona otro archivo';
        }
    }
    function getArchivos(){
        $idEmpresa = $this->input->post('idEmpresa');
        $resultado = $this->mUpload->getArchivos($idEmpresa);
        echo json_encode($resultado);
    }
        function getArchivosPersona(){
        $idEmpresa = $this->input->post('idPersona');
        $resultado = $this->mUpload->getArchivosPersona($idEmpresa);
        echo json_encode($resultado);
    }
 
}