<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

    public function index()
    {
        $this->load->library('session');
        $this->load->helper('url');
        
        $this->load->view('header');
        $this->load->view('login');
        $this->load->view('footer');
    }

     public function viewregistrarusuario()
    {
        $this->load->view('header');
        $this->load->view('resgistro');
        $this->load->view('footer');
    }

     public function deslogar()
    {
      
        echo "<script> window.location.href='" . base_url() . "index.php/login';</script>";
    }

}
