<?php

/**
 * IndexAction - default loader class
 */

class IndexAction extends Core{
    protected $cat;
    protected $post;
    private $db;
    public $smarty;
    public $test = 1;

    /**
     * __construct
     *
     * @param  mixed $smarty
     * @return void
     */
    public function __construct($smarty,$controller) {
        $this->loadSmarty($smarty);
        $this->loadController($controller);
        $this->loadDatabase();
        $this->loadModels();
        $this->loadDatabases();

        $childCategoriesPosts = null;
        $categoryPosts = null;
        $categoryId = $this->getCategoryId();
        if($categoryId == null) exit();
        
        $categoryName = $this->cat->getCategoryName($categoryId);
        $posts = $this->cat->getPosts($categoryId,$this->post);
        $mainCategories = $this->cat->getMainCategories();
        $childCategories = $this->cat->getChildForCategory($categoryId);
        $breadcrumbs = $this->cat->getBreadcrumbs($categoryId);
        
        $this->controller->view('pageTitle', $categoryName);
        $this->controller->view('mainCategories', $mainCategories);
        $this->controller->view('breadcrumbs', $breadcrumbs);
        $this->controller->view('childCategories', $childCategories);
        $this->controller->view('categoryId', $categoryId);
        $this->controller->view('categoryName', $categoryName);
        $this->controller->view('posts', $posts);
        
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
     * loadModels
     *
     * @return void
     */
    public function loadModels(){
        $this->db = new Database();
        $this->cat = $this->controller->model('Category');
        $this->post = $this->controller->model('Post');
    }
    
    /**
     * loadDatabases
     *
     * @return void
     */
    public function loadDatabases(){
        $this->cat->initDatabase($this->db);
        $this->post->initDatabase($this->db);
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
     * getCategoryId
     *
     * @return void
     */
    public function getCategoryId() {
        $categoryId = isset($_GET['id']) ? $_GET['id']: null;
        return $categoryId;
    }
    
    /**
     * startEngine
     *
     * @return void
     */
    public function startEngine() {
        $this->loadInclude('header');
        $this->loadInclude('filter');
        $this->loadTemplate('category');
        $this->loadInclude('news');
        $this->loadInclude('footer');
    }
}


class FilterAction extends IndexAction{
    public function __construct(){
        $this->deb($this->test);
    }
}