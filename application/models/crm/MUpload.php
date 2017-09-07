<?php

class mUpload extends CI_Model {

    function __construct() {
        parent::__construct();
        $this->load->database();
    }
    
    function subir($NombreArchivo,$idComentarioN,$idEmpresa)
    {
        $NombreArchivo=str_replace(" ","_",$NombreArchivo);
        $data = array(
            'NombreArchivo' => $NombreArchivo,
            'idComentarioArchivo' => $idComentarioN,
            'idEmpresaArchivo'=>$idEmpresa
        );
        $result= $this->db->insert('Archivos', $data);
        // return $this->db->replace('Archivos'," ",'_');
        // UPDATE tabla SET campo = REPLACE(campo, "-", '_');
    }
    function subirPersonas($NombreArchivo,$idComentarioN,$idPersona)
    {
        $NombreArchivo=str_replace(" ","_",$NombreArchivo);
        $data = array(
            'NombreArchivo' => $NombreArchivo,
            'idComentarioArchivo' => $idComentarioN,
            'idEmpresaArchivo'=>$idEmpresa
        );
        $result= $this->db->insert('Archivos', $data);
        // return $this->db->replace('Archivos'," ",'_');
        // UPDATE tabla SET campo = REPLACE(campo, "-", '_');
    }

}