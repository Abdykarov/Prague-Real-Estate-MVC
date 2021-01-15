<?php
/**
 * IndexAction
 *
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
                $url = $url . '&id=' . strip_tags($_POST['categoryId']);
            }
            if(!empty($_POST['fromPrice'])){
                $url = $url . '&fromPrice=' . strip_tags($_POST['fromPrice']);
            }        
            if(!empty($_POST['toPrice'])){
                $url = $url . '&toPrice=' . strip_tags($_POST['toPrice']);
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
            $this->controller->view('snow', strip_tags($_COOKIE['snow']));
        }
        if(isset($_COOKIE['dark'])){
            $this->controller->view('dark', strip_tags($_COOKIE['dark']));
        }
        
        if(isset($_COOKIE['user_email'])){
            $this->controller->view('userEmail', $_COOKIE['user_email']);
        }
        $this->controller->view('mainCategories', $mainCategories);
        $this->controller->view('postsCount', strip_tags($postsCount));
        $this->controller->view('allCategories', $allCategories);
        
        $this->startEngine();
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
        $this->postModel = $this->controller->model('Post');
        $this->cat = $this->controller->model('Category');
    }
    
    /**
     * initDatabases
     *
     * @return void
     */
    public function initDatabases(){
        $this->cat->initDatabase($this->db);
    }
    
    /**
     * loadIncludes
     *
     * @return void
     */
    public function loadIncludes(){
        include_once('library/Database.php');
        include_once('models/CategoryModel.php');
    }
    
    /**
     * startEngine
     *
     * @return void
     */
    public function startEngine() {
        $this->loadTemplate('index');
        $this->loadInclude('footer');
    }
}