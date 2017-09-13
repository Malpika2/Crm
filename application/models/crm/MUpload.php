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
            'idPersonaArchivo'=>$idPersona
        );
        $result= $this->db->insert('Archivos', $data);
        // return $this->db->replace('Archivos'," ",'_');
        // UPDATE tabla SET campo = REPLACE(campo, "-", '_');
    }
    function getArchivos($s){
        $this->db->select('*');
        $this->db->from('Archivos');
        $this->db->where('idEmpresaArchivo',$s);
        $query = $this->db->get();           
        return $query->result();
    }
    function getArchivosPersona($s){
        $this->db->select('*');
        $this->db->from('Archivos');
        $this->db->where('idPersonaArchivo',$s);
        $query = $this->db->get();           
        return $query->result();
    }

}