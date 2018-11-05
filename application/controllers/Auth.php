<?php

defined('BASEPATH') OR exit('No direct script access allowed');

require_once APPPATH .'resources/Constants.php';
require_once APPPATH .'resources/PageConstants.php';
require_once APPPATH .'resources/NavigationConstants.php';

class Auth extends CI_Controller {
    
    function __construct(){
        parent::__construct();
        
        $this->load->helper('url');
        
        $this->load->library('session');
        
        $this->load->model('Person_model');
    }

    public function index(){
        $data = [
            'title' => Constants::TITLE,
        ];
        
        if($this->session->has_userdata(Constants::LOGGED_USER)){
            redirect(NavigationConstants::HOME);
        }
        
        $accessType = $this->input->get('access');
        
        if($accessType === 'login'){
            $this->login($data);
        } else {
            $this->loadView($data);
        }
        
    }
    
    private function login($data){
        
        $email = $this->input->post('email');
        $senha = $this->input->post('senha');
        
        $postData = [
            'email' => $email,
            'senha' => $senha
        ];
        
        if(empty($email) && empty($senha)){
            $data['msg'] = "Os campos email e senha são obrigatórios!";
            $this->loadView($data);
        }
        
        $result = $this->Person_model->getPersonByLoginAndPassword($postData);
        
        if(empty($result)){
            $data['msg'] = "Email ou senha inválido!";
            $this->loadView($data);
        } else {
            $this->session->set_userdata(Constants::LOGGED_USER, $result);
            redirect(NavigationConstants::HOME);
        }
    }
    
    private function loadView($data){
        $this->load->view(PageConstants::LOGIN, $data);
    }
    
    public function logout(){
        $this->session->unset_userdata(Constants::LOGGED_USER);
        redirect(NavigationConstants::HOME);
    }

}
