<?php

defined('BASEPATH') OR exit('No direct script access allowed');

require_once APPPATH . 'resources/NavigationConstants.php';

abstract class RestApiUrlConstants {
    
    public const API_BASE = "api/";
    
    public const USER = NavigationConstants::INDEX_BASE.RestApiUrlConstants::API_BASE.'user/users';
    public const TEAM = NavigationConstants::INDEX_BASE.RestApiUrlConstants::API_BASE.'team/teams';
    
}
?>