<?php

/**
 * User
 */
class User extends Core {
    private $db;
    public $user;
    public $smarty;
    
    /**
     * __construct
     *
     * @param  mixed $smarty
     * @param  mixed $controller
     * @return void
     */
    public function __construct($smarty, $controller){
        $this->loadSmarty($smarty);
        $this->loadController($controller);
        $this->loadDatabase();
        $this->loadModels();
        $this->loadDatabases();

    }

    /**
     * loadSmarty
     *
     * @param  mixed $smarty
     * @return void
     */
    public function loadSmarty($smarty){
        $this->smarty = $smarty;
    }
    
    /**
     * loadController
     *
     * @param  mixed $controller
     * @return void
     */
    public function loadController($controller){
        $this->controller = $controller;
    }
        
    /**
     * loadModels
     *
     * @return void
     */
    public function loadModels(){
        $this->db = new Database();
        $this->user = $this->controller->model('User');
    }
    
    /**
     * loadDatabases
     *
     * @return void
     */
    public function loadDatabases(){
        $this->user->initDatabase($this->db);
    }
    
    /**
     * loadDatabase
     *
     * @return void
     */
    public function loadDatabase(){
        include_once('library/Database.php');
    }  

    /**
     * isLoggedIn - check if loggedIn
     *
     * @return void
     */
    public function isLoggedIn() {
        if( isset(session['loggedIn'])){
            return True;
        }
        return False;
    }

}


/**
 * LoginAction 
 */
class LoginAction extends User{
 

    public function __construct($smarty,$controller){
        $this->loadController($controller);
        $this->loadSmarty($smarty);

        $this->controller->view('pageTitle', 'Login Page');
        
        $this->startEngine();
    }

    public function startEngine(){
        $this->loadInclude('header');
        $this->loadTemplate('login');
        $this->loadInclude('footer');    
    }
}

/**
 * RegisterAction
 */
class RegisterAction extends User{

    public function __construct($smarty,$controller){
        $this->loadController($controller);
        $this->loadSmarty($smarty);

        $this->controller->view('pageTitle', 'Register Page');
        
        $this->startEngine();
    }

    public function startEngine(){
        $this->loadInclude('header');
        $this->loadTemplate('registration');
        $this->loadInclude('footer');    
    }
}

/**
 * IndexAction
 */
class IndexAction extends User{
    public function __construct(){
        Core::deb('profile');
    }
}

/**
 * ChatAction
 */
class ChatAction extends User{

}

/**
 * PostAction
 */
class PostAction extends User{

}

class AddUserAction extends User{

    public function __construct($smarty, $controller){
        $this->loadController($controller);
        $this->loadSmarty($smarty);

        $data = [
            'name' => strip_tags($_POST['name']),
            'last_name' => strip_tags($_POST['last_name']),
            'phone' => strip_tags($_POST['phone']),
            'email' => strip_tags($_POST['email']),
            'pass' => strip_tags($_POST['pass']),
            'email_err' => '',
            'password_err' => '',
        ];
        Core::deb($this->user);
        $this->user->register($data);
        
    }

    
    public function returnResponse($response){
        Core::deb($response);
    }

}