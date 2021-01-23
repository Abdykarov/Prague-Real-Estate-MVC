<?php
/**
 * IndexAction
 * Main page controller, has only index action
 * @param  mixed $core,$smarty
 * @return void
 */

class IndexAction extends Core{
    protected $cat;
    public $postModel;
    private $db;
    public $smarty;
    public $controller;
    
    /**
     * __construct
     * An automatically called function, which calls other functions within class    
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
        $url = '?controller=category&action=filter';
        if(isset($_POST['filter'])){
            if(!empty($_POST['categoryId'])){
                $url = $url . '&id=' . $_POST['categoryId'];
            }
            if(!empty($_POST['fromPrice'])){
                $url = $url . '&fromPrice=' . $_POST['fromPrice'];
            }        
            if(!empty($_POST['toPrice'])){
                $url = $url . '&toPrice=' . $_POST['toPrice'];
            }
            Core::redirect($url);
        }
        
        
        $this->cat->initPostModel($this->postModel, $this->db);
        $allCategories = $this->cat->getAllCategories();
        $mainCategories = $this->cat->getMainCategories(); 
        $postsCount = $this->postModel->getPostsCount();
        $this->controller->view('pageTitle', 'Hlavní stranka');
        
        $this->checkStyles('');
        if(isset($_COOKIE['snow'])){
            $this->controller->view('snow', htmlspecialchars($_COOKIE['snow']));
        }
        if(isset($_COOKIE['dark'])){
            $this->controller->view('dark', htmlspecialchars($_COOKIE['dark']));
        }
        
        if(isset($_COOKIE['user_email'])){
            $this->controller->view('userEmail', $_COOKIE['user_email']);
        }
        foreach($mainCategories as &$category){
            foreach($category as &$value){
                $value = htmlspecialchars($value);
            }
        }
       
        $this->controller->view('mainCategories', $mainCategories);
        $this->controller->view('postsCount', htmlspecialchars($postsCount));
        $this->controller->view('allCategories', $allCategories);
        
        $this->startEngine();
    }

    /**
     * loadSmarty 
     * Takes a smarty class from library/Core.php -> loadPage() method
     * Assigns a smarty class to a local variable
     * @param  mixed $smarty
     * @return void
     */
    public function loadSmarty($smarty){
        $this->smarty = $smarty;
    }
    
    /**
     * loadController
     * Takes a controller from library/Core.php -> loadPage() method
     * Assigns a controller object to a local variable
     * @param  mixed $controller
     * @return void
     */
    public function loadController($controller){
        $this->controller = $controller;
    }
        
    /**
     * initModels
     * Method loads needed models and create new local variable - db 
     * @return void
     */
    public function initModels(){
        $this->db = new Database();
        $this->postModel = $this->controller->model('Post');
        $this->cat = $this->controller->model('Category');
    }
    
    /**
     * initDatabases
     * Method sends local db to category model
     * @return void
     */
    public function initDatabases(){
        $this->cat->initDatabase($this->db);
    }
    
    /**
     * loadIncludes
     * Method includes database and category model
     * @return void
     */
    public function loadIncludes(){
        include_once('library/Database.php');
        include_once('models/CategoryModel.php');
    }
    
    /**
     * startEngine
     * Method includes smarty templates
     * @return void
     */
    public function startEngine() {
        $this->loadTemplate('index');
        $this->loadInclude('footer');
    }
}