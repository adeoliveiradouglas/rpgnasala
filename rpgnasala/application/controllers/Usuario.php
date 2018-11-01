<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class usuario extends CI_Controller
{

	public function index()
	{

		$this->load->library('session');
		$this->load->helper('url');
		$this->load->model('Usuarios_model');

		$this->load->view('header');

		$usuario = $this->session->userdata('usuario')[0];

		if ($usuario["graudeacesso"] <= 1) {
			try {
				$this->load->view('menu');
				$data["usuarios"] = $this->Usuarios_model->selectAll();
				$this->load->view('usuarios/lista', $data);

			} catch (Exception $e) {
				$this->session->set_flashdata('mensagem-error', $e);
			}
		} else {
			echo "<script> window.location.href='" . base_url() . "index.php/login';</script>";
		}

		$this->load->view('footer');

	}

	public function criar()
	{
		$this->load->library('session');
		$this->load->helper('url');

		$data["id"] = $this->input->post("id");
		$usuario = $this->session->userdata('usuario')[0];

		$this->load->view('header');
		$this->load->view('menu');


		if ($usuario["graudeacesso"] <= 1) {
			$this->load->view('usuarios/create');
			$this->load->view('usuarios/form', $data);
		} else {
			echo "<script> window.location.href='" . base_url() . "index.php/login';</script>";
		}


		$this->load->view('footer');
	}


	public function editar()
	{
		$this->load->library('session');
		$this->load->helper('url');

		$data["id"] = $this->input->post("id");
		$usuario = $this->session->userdata('usuario')[0];

		$this->load->view('header');
		$this->load->view('menu');


		if ($usuario["graudeacesso"] <= 1) {
			$this->load->view('usuarios/edit');
			$this->load->view('usuarios/form', $data);
		} else {
			echo "<script> window.location.href='" . base_url() . "index.php/login';</script>";
		}


		$this->load->view('footer');
	}

	public function actdeletar()
	{
		$this->load->library('session');
		$this->load->helper('url');
		$this->load->model('Usuarios_model');

		$data["id"] = $this->input->post("id");
		$usuario = $this->session->userdata('usuario')[0];

		$this->load->view('header');

		if ($usuario["graudeacesso"] <= 1) {

			try {
				$this->Usuarios_model->delete($data["id"]);
				$this->session->set_flashdata('mensagem-success', "Usuário deletado com sucesso!");
				echo "<script> window.location.href='" . base_url() . "index.php/usuario';</script>";
			} catch (Exception $e) {
				$this->session->set_flashdata('mensagem-error', $e);
				echo "<script> window.location.href='" . base_url() . "index.php/usuario';</script>";
			}
		} else {
			echo "<script> window.location.href='" . base_url() . "index.php/login';</script>";
		}

	}

	public function actregistro()
	{
		$this->load->view('header');
		$this->load->library('session');
		$this->load->helper('url');
		$this->load->model('Usuarios_model');

		if($this->input->method() === 'post'){
			try {
                //Pegar campos do formulario
				$data["nome"] = $this->input->post("nome");
                $data["email"] = $this->input->post("email");
                $data["senha"] = md5($this->input->post("senha")); // revisão - (a senha não funciona para logar)
                $data["datadenascimento"] = $this->input->post("datadenascimento");
                $data["graudeacesso"] = $this->input->post("graudeacesso");// revisão - (o valor passado é sempre 0)
                $data["xpatual"] = 0;
		

				if(strlen(trim($data["nome"])) > 3 and strlen(trim($data["email"])) > 2 and strlen(trim($data["senha"])) > 5
                    and strlen(trim($data["datadenascimento"])) > 5){
					if($this->Usuarios_model->insert($data)){
						$this->session->set_flashdata('mensagem-success', "Usuário cadastrado com sucesso!");
						echo "<script> window.location.href='" . base_url() . "index.php/usuario';</script>";
					}else{
						$this->session->set_flashdata('mensagem-success', "Erro ao cadastrar usuário!");
						echo "<script> window.location.href='" . base_url() . "login';</script>";
					}
				}else{
					$this->session->set_flashdata('mensagem-success', "Seus dados estão incompletos. Tente novamente !");
					echo "<script> window.location.href='" . base_url() . "login/registro';</script>";
				}

			} catch (Exception $e) {
				$this->load->library('session');
				var_dump($e);exit();
			}
		} else {
			$this->load->library('session');
			$this->load->helper('url');

			$this->load->view('login');
		}

		$this->load->view('footer');
	}

}
