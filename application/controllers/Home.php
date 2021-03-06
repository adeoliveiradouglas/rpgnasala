<?php

defined('BASEPATH') OR exit('No direct script access allowed');

require_once APPPATH .'resources/Constants.php';
require_once APPPATH .'resources/PageConstants.php';
require_once APPPATH .'resources/NavigationConstants.php';

require_once APPPATH .'controllers/BaseController.php';

class Home extends BaseController {

    function __construct(){
        parent::__construct();
    }
    
    public function index(){
        parent::load(PageConstants::HOME);
    }
}
