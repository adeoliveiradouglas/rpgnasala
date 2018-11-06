<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Person_model extends CI_Model {
    
    function __construct(){
        parent::__construct();
        $this->load->database();
    }

    function getPersonByLoginAndPassword($postData){
        $result = $this->db->get_where('pessoa',  $postData);
        return $result->row();
    }


    function insert($data){
    	$this->db->insert('pessoa', $data);
    	return $this->db->affected_rows();

    }

}

