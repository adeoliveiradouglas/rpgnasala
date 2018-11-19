<?php

defined('BASEPATH') OR exit('No direct script access allowed');

require_once APPPATH .'resources/Constants.php';
require_once APPPATH .'resources/PageConstants.php';
require_once APPPATH .'resources/NavigationConstants.php';

require_once APPPATH .'controllers/BaseController.php';

class Team extends BaseController {
    
    function __construct(){
        
        parent::__construct();

        //$this->load->model('Team_model');
    }


    public function index(){
 		$this->load(PageConstants::TEAM);    	
    }


    public function create(){

    	 $email = $this->input->post('email');
         $senha = $this->input->post('senha');
         $nome = $this->input->post('nome');
        
        $postData = [
            'email' => $email,
            'senha' => $senha,
            'nome' => $nome,
            'tipo' => 1
        ];

    	$result = $this->Person_model->insert($postData);
    	if($result >0){
    		redirect(NavigationConstants::LOGIN, array('msg' => 'Usuário cadastrado com sucesso'));
    	}

    }
}
