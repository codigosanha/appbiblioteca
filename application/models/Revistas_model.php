<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Revistas_model extends CI_Model
{
    public function getRevistas()
    {
       
        $resultados = $this->db->get("revistas");
        if ($resultados->num_rows() > 0) {
            return $resultados->result();
        } else {
            return false;
        }
    }

    public function getRevista($id)
    {

  
        $this->db->where("id", $id);
        $resultados = $this->db->get("revistas");
        if ($resultados->num_rows() > 0) {
            return $resultados->row();
        } else {
            return false;
        }

    }

    public function save($datos)
    {
        return $this->db->insert("revistas", $datos);
    }

    public function update($id, $data)
    {
        $this->db->where("id", $id);
        return $this->db->update("revistas", $data);
    }

    public function delete($id)
    {
        $this->db->where("id", $id);
        return $this->db->delete("revistas");
    }
    public function disponibilidad($codigo)
    {
        

        $this->db->select("l.*, f.nombre as facultad");
        $this->db->join("facultades f", "f.id = l.id_facultad");
        $this->db->where("l.codigo_libro", $codigo);
        $resultados = $this->db->get("revistas l");
        if ($resultados->num_rows() > 0) {
            return $resultados->row();
        } else {
            return false;
        }
    }
    public function verificar($codtitulo, $idfacultad, $campo)
    {
        $this->db->select("l.*,f.nombre as facultad");
        $this->db->join("facultades f", "f.id = l.id_facultad");
        if ($idfacultad !== "") {
            $this->db->where("l.id_facultad", $idfacultad);
        }
       
        if ($campo == 1) {
            $this->db->like('l.titulo_libro', $codtitulo);
        }
        else{
            $this->db->where('l.codigo_libro', $codtitulo);
        }
         
        
        

        $resultados = $this->db->get('revistas l');
        if ($resultados->num_rows() > 0) {
            return $resultados->result();
        } else {
            return false;
        }
    }
}
