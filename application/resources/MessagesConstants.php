<?php

defined('BASEPATH') OR exit('No direct script access allowed');

abstract class MessagesConstants {
    
    public const CREATED_SUCCESSFULY = "Registro criado com sucesso!";
    public const UPDATED_SUCCESSFULY = "Registro editado com sucesso!";
    public const DELETED_SUCCESSFULY = "Registro excluído com sucesso!";
    
    public const NOT_FOUND = "Registro não encontrado!";
    public const DELETE_NOT_FOUND = "Registro não encontrado para ser excluído!";
    public const UPDATE_NOT_FOUND = "Registro não encontrado para ser editado!";
    
    
    public const NOT_INFORMED_VALUE = "Nenhum valor foi informado!";
    public const INVALID_VALUE = "O valor informado não é válido!";
    
    public const EMAIL_ALREADY_EXISTS = "O email informado já existe cadastrado!";
    
}
?>