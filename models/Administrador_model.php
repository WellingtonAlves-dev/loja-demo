<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Administrador_model extends CI_Model {

    public function __construct()
    {
        parent::__construct();
    }

    public function inserirDados($data) {
        return $this->db->insert("produtos", $data);
    }

    public function pegarDados() {
        $this->db->select("*");
        $this->db->from("produtos");
        $this->db->order_by("id_produto", "desc");
        return $this->db->get()->result();
    }
    public function pegarDadosID($data) {
        return $this->db->get_where("produtos", $data)->result();
    }
    
    public function apagarID($data) {
        $foto = $this->pegarDadosID($data);
        $foto = $foto[0]->foto;
        unlink("public/uploads/".$foto);
        return $this->db->delete("produtos", $data);
    }

    public function editarID($data, $id) {
        if(isset($data['foto'])) {
            $foto = $this->pegarDadosID($id);
            $foto = $foto[0]->foto;
            unlink("public/uploads/".$foto);
        }
        return $this->db->update("produtos", $data, $id);
    }

    public function appendSlide($data) {
        return $this->db->insert("slides", $data);
    }
    public function getSlideId($data) {
        return $this->db->get_where("slides", $data)->result();
    }

    public function getSlides() {
        return $this->db->get("slides")->result();
    }
    public function deleteSlide($data) {
        $foto = $this->getSlideId($data);
        $foto = $foto[0]->slide;
        unlink("public/uploads/{$foto}");
        return $this->db->delete("slides", $data);
    }

    // Comentarios

    public function addComentario($data) {
        return $this->db->insert("comentarios", $data);
    }
    
    public function getComentariosProduto($data) {
        $this->db->select("*");
        $this->db->from("comentarios");
        $this->db->where($data);
        $this->db->order_by("id_comentario", "desc");
        return $this->db->get()->result();
    }

    public function getAllComentarios() {
        $this->db->order_by("id_comentario", "desc");
        return $this->db->get("comentarios")->result();
    }

    public function deleteComentario($data) {
        return $this->db->delete("comentarios", $data);
    }

}
