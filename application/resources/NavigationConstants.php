<?php

defined('BASEPATH') OR exit('No direct script access allowed');

abstract class NavigationConstants {
    
    private const AUTH = 'auth';
    
    public const INDEX_BASE = "index.php/";
    public const HOME = NavigationConstants::INDEX_BASE.'home';
    public const LOGIN = NavigationConstants::INDEX_BASE.NavigationConstants::AUTH;
    public const LOGOUT = NavigationConstants::INDEX_BASE.NavigationConstants::AUTH.'/logout';
    public const USER = NavigationConstants::INDEX_BASE.'user';
    public const TEAM = NavigationConstants::INDEX_BASE.'team';
    
}
?>