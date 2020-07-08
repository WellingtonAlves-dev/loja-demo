<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model("Administrador_model", "adm");
	}
	public function index()
	{
		$header['titulo'] = 'Home';

		$data['produtos'] = $this->adm->pegarDados();
		$data['slides'] = $this->adm->getSlides();
		$this->load->view("Loja/partes/header", $header);
		$this->load->view("Loja/index", $data);
		$this->load->view("Loja/partes/footer");

	}
	public function produto($id) {
		$header['titulo'] = "Produto {$id}";
		$data['produto'] = $this->adm->pegarDadosID(array("id_produto" => $id));
		$data['comentarios'] = $this->adm->getComentariosProduto(array("id_produto" => $id));
		$this->load->view("Loja/partes/header", $header);
		$this->load->view("Loja/produto", $data);
		$this->load->view("Loja/partes/footer");
	}
}
