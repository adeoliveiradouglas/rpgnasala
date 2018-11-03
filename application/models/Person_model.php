<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Person_model extends CI_Model {
    
    function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    function getPersonByLoginAndPassword($postData){
        
        $response = array();
        
        if($postData['email'] && $postData['passwd']){
            $result = $this->db->get_where('pessoa',  array('email' => $postData['email'], 'senha' => $postData['passwd']));
            $response = $result->row();
        }
        
        return $response;
    }
}

