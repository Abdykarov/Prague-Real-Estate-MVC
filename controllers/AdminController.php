<?php

class Admin extends Core{

    protected $cat;
    protected $user;
    protected $post;
    private $db;
    public $smarty;
    public $controller;
    
    /**
     * __construct
     *
     * @param  mixed $smarty
     * @return void
     */
    public function __construct($smarty, $controller) {
        $this->loadSmarty($smarty);
        $this->loadController($controller);
        $this->loadIncludes();
        $this->initModels();
        $this->initDatabases();
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
     * initModels
     *
     * @return void
     */
    public function initModels(){
        $this->db = new Database();
        $this->cat = $this->controller->model('Category');
        $this->post = $this->controller->model('Post');
        $this->user = $this->controller->model('User');
    }
    
    /**
     * initDatabases
     *
     * @return void
     */
    public function initDatabases(){
        $this->cat->initDatabase($this->db);
        $this->post->initDatabase($this->db);
        $this->user->initDatabase($this->db);
    }
    
    /**
     * loadIncludes
     *
     * @return void
     */
    public function loadIncludes(){
        include_once('library/Database.php');
    }
    
    
}


/**
 * IndexAction
 *
 * @param  mixed $core,$smarty
 * @return void
 */

class IndexAction extends Admin{
    
    /**
     * __construct
     *
     * @param  mixed $smarty
     * @return void
     */
    public function __construct($smarty, $controller) {
        $this->loadController($controller);
        $this->loadSmarty($smarty);

        $this->controller->view('pageTitle', 'Admin Page');
        
        $this->startEngine();
    }

    /**
     * startEngine
     *
     * @return void
     */
    public function startEngine() {

        $this->loadAdminTemplate('index');

    }
}