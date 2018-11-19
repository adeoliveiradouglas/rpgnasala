<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

require_once APPPATH .'entities/Person.php';

class Team
{
    const TABLE_NAME = "turmas";
    
    public $id;
    
    public $name;
    
    public $horario;

    public $id_professor;
    
    public $professor;
    
    
    
}

