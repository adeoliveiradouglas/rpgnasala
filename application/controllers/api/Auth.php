<?php
use Restserver\Libraries\REST_Controller;
defined('BASEPATH') OR exit('No direct script access allowed');

// This can be removed if you use __autoload() in config.php OR use Modular Extensions
/** @noinspection PhpIncludeInspection */
//To Solve File REST_Controller not found
require APPPATH . 'libraries/REST_Controller.php';
require APPPATH . 'libraries/Format.php';

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
class Auth extends REST_Controller {

    function __construct()
    {
        parent::__construct();
        $this->load->model('Person_model');
    }

    public function login_get()
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
    
    public function login_post()
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
            'passwd' => $this->post('passwd')
        ];
        
        $result = $this->Person_model->getPersonByLoginAndPassword($postData);
        if(isset($result)){
            $this->set_response($result, REST_Controller::HTTP_OK); // CREATED (201) being the HTTP response code
        } else {
            $this->set_response("Usuário ou senha inválido!", REST_Controller::HTTP_UNAUTHORIZED); // CREATED (201) being the HTTP response code
        }
        
        
    }
}
