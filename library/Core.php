<?php

/**
 * Core class - main methods here
 */
class Core{
    public $smarty;
    public $controller;
    
    /**
     * __construct
     *
     * @param  mixed $smarty
     * @return void
     */
    public function __construct($smarty){
        $this->smarty = $smarty;  
        $this->controller = $this->getController();
    }
    
    /**
     * getController
     * 
     * @return void
     */
    public function getController(){
        include_once('Controller.php'); // load Controller file, where is defined contoller class
        $controller = new Controller($this->smarty);

        return $controller;
    }

    /**
     * loadSmarty
     * Assign smarty class to local variable
     * @param  mixed $smarty
     * @return void
     */
    public function loadSmarty($smarty){
        $this->smarty = $smarty;
    }
    
    /**
     * redirect
     * Redirect to another url
     * @param  mixed $url
     * @return void
     */
    public function redirect($url = ""){
        header("Location: http://wa.toad.cz/~abdykili/".$url);
        exit();
    }
    
    /**
     * loadPage
     * Inits controller and action
     * @param  mixed $core
     * @param  mixed $controller
     * @param  mixed $action
     * @return void
     */
    public function loadPage($core, $controller, $action = 'Index'){
        $page = include_once(PathPrefix. $controller . PathPostfix);

        $action = $action.'Action';
        $class = new $action($this->smarty,$this->controller);

    }
        
    /**
     * loadTemplate
     * 
     * @param  mixed $tmpName
     * @return void
     */
    public function loadTemplate($tmpName){
        $this->smarty->display($tmpName . TemplatePostfix);
    }
    
    /**
     * loadAdminTemplate
     *
     * @param  mixed $tmpName
     * @return void
     */
    public function loadAdminTemplate($tmpName){
        $this->smarty->display('../admin/'.$tmpName . TemplatePostfix);
    }
    
     /**
     * loadAdminInclude
     *
     * @param  mixed $tmpName
     * @return void
     */
    public function loadAdminInclude($tmpName){
        $this->smarty->display("../admin/inc/".$tmpName . TemplatePostfix);
    }

    /**
     * loadInclude
     *
     * @param  mixed $tmpName
     * @return void
     */
    public function loadInclude($tmpName){
        $this->smarty->display("inc/".$tmpName . TemplatePostfix);
    }
        
    /**
     * deb
     * Method for debugging
     * @param  mixed $var
     * @param  mixed $die
     * @return void
     */
    public function deb($var = null, $die = True){
        echo "Debug: <br /><pre>";
        print_r($var);
        echo "</pre>";
    
        if($die == True){
            die();
        }
    }

    
    /**
     * checkStyles
     * Checks whether its dark or snow theme
     * @param  mixed $url
     * @return void
     */
    public function checkStyles($url){
        if(isset($_POST['snow'])){
            if(isset($_COOKIE['snow'])){
                unset($_COOKIE['snow']); 
                setcookie('snow', null, -1, '/');
                Core::redirect($url);
            }
            else{
                setcookie('snow', '1', -1, '/');
                Core::redirect($url);
            }
        }

        if(isset($_POST['dark'])){
            if(isset($_COOKIE['dark'])){
                unset($_COOKIE['dark']); 
                setcookie('dark', null, -1, '/');
                Core::redirect($url);
            }
            else{
                setcookie('dark', '1', -1, '/');
                Core::redirect($url);
            }
        }

    }
}
