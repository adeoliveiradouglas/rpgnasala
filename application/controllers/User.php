<?php

defined('BASEPATH') OR exit('No direct script access allowed');

require_once APPPATH .'resources/Constants.php';
require_once APPPATH .'resources/PageConstants.php';
require_once APPPATH .'resources/NavigationConstants.php';

require_once APPPATH .'controllers/BaseController.php';

class User extends BaseController {
    
    function __construct(){
        
        parent::__construct();
        
        $this->load->model('Person_model');
    }


    public function index(){
        
        $data['users'] = $this->Person_model->getAll();
        
 		$this->load(PageConstants::USER, $data);
    }


}
