<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model("Administrador_model", 'adm');
	}

	public function index()
	{
		$data['produtos'] = $this->adm->pegarDados();
		$this->load->view("Admin/partes/header");
		$this->load->view("Admin/index", $data);
		$this->load->view("Admin/partes/footer");
	}

	public function AdicionarProduto() {
		$this->load->view("Admin/partes/header");
		$this->load->view("Admin/adicionar");
		$this->load->view("Admin/partes/footer");
	}

	public function editarProduto($id) {
		$data['data'] = $this->adm->pegarDadosID(array("id_produto" => $id));
		$this->load->view("Admin/partes/header");
		$this->load->view("Admin/edit", $data);
		$this->load->view("Admin/partes/footer");
	}

	public function slides() {
		$data['slides'] = $this->adm->getSlides();
		$this->load->view("Admin/partes/header");
		$this->load->view("Admin/slides", $data);
		$this->load->view("Admin/partes/footer");
	}

	public function comentarios() {
		$data['comentarios'] = $this->adm->getAllComentarios();
		$this->load->view("Admin/partes/header");
		$this->load->view("Admin/comentarios", $data);
		$this->load->view("Admin/partes/footer");
	}

	// Crud

	public function appendProduct() {
		$config['upload_path']          = 'public/uploads/';
		$config['allowed_types']        = 'gif|jpg|png';
		$config['encrypt_name']			= TRUE;

		$this->load->library('upload', $config);

		if ( ! $this->upload->do_upload('imagem'))
		{
				$error = array('error' => $this->upload->display_errors());
				$this->session->set_flashdata('insert_data', 'error');
				redirect(base_url("admin/novo"));
		}
		else
		{
				$data['foto'] = $this->upload->data("file_name");
				$data['nome_produto'] = $this->input->post("nome_produto");
				$data['descricao_produto'] = $this->input->post("desc_produto");
				$data['preco_produto'] = $this->input->post("preco_produto");
				
				if($this->adm->inserirDados($data)) {
					$this->session->set_flashdata('insert_data', 'success');
					redirect(base_url("admin/novo"));
				}

		}
	}
	
	public function deleteProduct($id) {
	    $data['id_produto'] = $id;
	    if($this->adm->apagarID($data)) {
			$this->session->set_flashdata("deleteStatus", true);
			redirect(base_url("admin"));
	    }
	}
	
	public function editProduct() {
		$config['upload_path']          = 'public/uploads/';
		$config['allowed_types']        = 'gif|jpg|png';
		$config['encrypt_name']			= TRUE;

		$id['id_produto'] = $this->input->post("id_produto");
		$data['nome_produto'] = $this->input->post("nome_produto");
		$data['descricao_produto'] = $this->input->post("desc_produto");
		$data['preco_produto'] = $this->input->post("preco_produto");


		$this->load->library('upload', $config);

		if ( ! $this->upload->do_upload('imagem'))
		{
				
				if($this->adm->editarID($data, $id)) {
					$this->session->set_flashdata('edit_data', 'success');

				}
				redirect(base_url("admin/editar/{$this->input->post("id_produto")}"));
		}
		else
		{				
				$data['foto'] = $this->upload->data("file_name");
				if($this->adm->editarID($data, $id)) {
					$this->session->set_flashdata('edit_data', 'success');
					redirect(base_url("admin/editar/{$this->input->post("id_produto")}"));
				}

		}
	}

	// Slides

	public function addSlide() {
		$config['upload_path']          = 'public/uploads/';
		$config['allowed_types']        = 'gif|jpg|png';
		$config['encrypt_name']			= TRUE;

		$this->load->library('upload', $config);

		if ( ! $this->upload->do_upload('imagem'))
		{
				$this->session->set_flashdata('slide_status', array('status' => 'error', 'msg' => 'Não possivel adicionar o slide'));
				redirect(base_url("admin/slides"));
		}
		else
		{				
				$data['slide'] = $this->upload->data("file_name");
				if($this->adm->appendSlide($data)) {
					$this->session->set_flashdata('slide_status', array('status' => 'success', 'msg' => 'Slide adicionado com sucesso'));
					redirect(base_url("admin/slides"));
				}

		}
	}
	public function deleteSlide($id) {
		if($this->adm->deleteSlide(array("id_slide" => $id))) {
			$this->session->set_flashdata("slide_status", array('status' => 'success', 'msg' => 'Slide apagado com sucesso'));
			redirect(base_url("admin/slides"));
		}
	}

	// Comentarios

	public function addComentario() {
		$data['id_produto'] = $this->input->post("id_produto");
		$data['comentario'] = $this->input->post("comentario");
		if($this->adm->addComentario($data)) {
			redirect(base_url("produto/").$data['id_produto']);
		}
	}

	public function deleteComentario($id) {
		$data['id_comentario'] = $id;
		if($this->adm->deleteComentario($data)) {
			$this->session->set_flashdata("status_delete", true);
			redirect(base_url("admin/comentarios"));
		} 
	}
}
