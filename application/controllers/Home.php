<?php

defined('BASEPATH') OR exit('No direct script access allowed');

require_once APPPATH .'resources/Constants.php';
require_once APPPATH .'resources/PageConstants.php';
require_once APPPATH .'resources/NavigationConstants.php';

class Home extends CI_Controller {

    function __construct(){
        parent::__construct();
        $this->load->helper('url');
        $this->load->library('session');
    }
    
    public function index(){
        if(!$this->session->has_userdata(Constants::LOGGED_USER)){
            redirect(NavigationConstants::LOGIN);
        } else {
            $userData = $this->session->get_userdata(Constants::LOGGED_USER);
            $this->load->view(PageConstants::HOME, $userData[Constants::LOGGED_USER]);
        }
    }
}
