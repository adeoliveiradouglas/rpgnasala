<?php
use Restserver\Libraries\REST_Controller;

defined('BASEPATH') OR exit('No direct script access allowed');

// This can be removed if you use __autoload() in config.php OR use Modular Extensions
/** @noinspection PhpIncludeInspection */
//To Solve File REST_Controller not found
require APPPATH . 'libraries/REST_Controller.php';
require APPPATH . 'libraries/Format.php';
require_once APPPATH . 'resources/MessagesConstants.php';

/**
 * This is an example of a few basic user interaction methods you could use
 * all done with a hardcoded array
 *
 * @package         CodeIgniter
 * @subpackage      Rest Server
 * @category        Controller
 * @author          Phil Sturgeon, Chris Kacerguis
 * @license         MIT
 * @link            https://github.com/chriskacerguis/codeigniter-restserver
 */
class User extends REST_Controller {

    function __construct()
    {
        parent::__construct();
        $this->load->library('session');
        $this->load->model('Person_model');
    }

    public function users_get()
    {
        // $this->some_model->update_user( ... );
        $email = $this->get('email');
        $senha = $this->get('passwd');
        
        $message = [
                'senha' => $senha,
                'email' => $email,
                'message' => 'Getted'
            ];
        
        $this->set_response($message, REST_Controller::HTTP_CREATED); // CREATED (201) being the HTTP response code
        
    }
    
    /*
    public function users_post()
    {
                
        $message = '';
        
        if($this->post('email') === 'daniel.sajur@gmail.com'
            && $this->post('passwd') === '12345'){
                $message = "Login realizado com sucesso!";
        }else{
            $message = "Usuário ou senha inválido!";
        }
        
        $postData = [
            'email' => $this->post('email'),
            'senha' => $this->post('passwd')
        ];
        
        $result = $this->Person_model->getPersonByLoginAndPassword($postData);
        if(isset($result)){
            $this->session->set_userdata('user', $result);
            
            //$this->set_response($result, REST_Controller::HTTP_OK); // CREATED (201) being the HTTP response code
        } else {
            $this->set_response("Usuário ou senha inválido!", REST_Controller::HTTP_UNAUTHORIZED); // CREATED (201) being the HTTP response code
        }
    }
    */
    
    public function users_delete($id){
        
        if($id == NULL || empty($id)){
            $this->set_response(MessagesConstants::NOT_INFORMED_VALUE, REST_Controller::HTTP_NOT_ACCEPTABLE);
            return;
        }
        
        if(!is_numeric($id)){
            $this->set_response(MessagesConstants::INVALID_VALUE, REST_Controller::HTTP_NOT_ACCEPTABLE);
            return;
        }
        
        try{
            $result = $this->Person_model->deleteById($id);
            if($result > 0){
                $this->set_response(MessagesConstants::DELETED_SUCCESSFULY, REST_Controller::HTTP_OK);
                return;
            } else {
                $this->set_response(MessagesConstants::DELETE_NOT_FOUND, REST_Controller::HTTP_NOT_FOUND);
                return;
            }
            
        } catch (Exception $excecption) {
            $this->set_response($excecption->getMessage(), REST_Controller::HTTP_BAD_REQUEST);
            return;
        }
    }
    
    public function users_post($id = NULL){

        try{
            $result = 0;
            $person = array();
            $successMessage = '';
            $failureMessage = '';
            $successStatus = '';
            $failureStatus = '';
            
            
            $result = $this->Person_model->getByEmail($this->post('email'));
            
            if($result != NULL && $result->id != $id){
                $this->set_response(MessagesConstants::EMAIL_ALREADY_EXISTS, REST_Controller::HTTP_FOUND);
                return;
                
            }

            if($id != NULL && !empty($id)){
                
                if(!is_numeric($id)){
                    $this->set_response(MessagesConstants::INVALID_VALUE, REST_Controller::HTTP_NOT_ACCEPTABLE);
                    return;
                }
                
                $person = [
                    'id' => $id,
                    'nome' => $this->post('name'),
                    'email' => $this->post('email')
                ];
                
                $successStatus = REST_Controller::HTTP_OK;
                $failureStatus = REST_Controller::HTTP_NOT_FOUND;
                $successMessage = MessagesConstants::UPDATED_SUCCESSFULY;
                $failureMessage = MessagesConstants::UPDATE_NOT_FOUND;
                
                $result = $this->Person_model->update($person);
            } else {
                
                $person = [
                    'tipo' => 'Aluno',
                    'senha' => '123456',
                    'xp' => 1,
                    'nome' => $this->post('name'),
                    'email' => $this->post('email')
                ];
                
                $successStatus = REST_Controller::HTTP_OK;
                $successMessage = MessagesConstants::CREATED_SUCCESSFULY;
                $result = $this->Person_model->insert($person);
            }
            
            if($result > 0){
                $this->set_response($successMessage, $successStatus);
                return;
            } else {
                $this->set_response($failureMessage, $failureStatus);
                return;
            }
            
        } catch (Exception $excecption) {
            $this->set_response($excecption->getMessage(), REST_Controller::HTTP_BAD_REQUEST);
            return;
        }
    }
    
}
