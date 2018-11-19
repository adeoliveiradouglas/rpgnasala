<?php

defined('BASEPATH') OR exit('No direct script access allowed');

require_once APPPATH .'resources/Constants.php';
require_once APPPATH .'resources/PageConstants.php';
require_once APPPATH .'resources/NavigationConstants.php';

class BaseController extends CI_Controller {
    
    function __construct(){
        parent::__construct();
        
        $this->load->helper('url');
        
        $this->load->library('session');

                
    }

    public function load($page, $data = NULL){
        if(!$this->session->has_userdata(Constants::LOGGED_USER)){
            redirect(NavigationConstants::LOGIN);
        } else {
            $userData = $this->session->get_userdata(Constants::LOGGED_USER);
            $data[Constants::LOGGED_USER] = $userData[Constants::LOGGED_USER];
            $this->load->view($page, $data);
        }
    }

}
