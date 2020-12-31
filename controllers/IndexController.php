<?php
/**
 * IndexAction
 *
 * @param  mixed $core,$smarty
 * @return void
 */

class IndexAction extends Core{
    protected $cat;
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

        $ip = $_SERVER['REMOTE_ADDR'];
        if($ip != '147.32.117.65'){
            $sql = "INSERT INTO visits (ip)
            VALUES ('$ip')";       
        $this->db->executeStatement($sql);

        }   

        $allCategories = $this->cat->getAllCategories();
        $mainCategories = $this->cat->getMainCategories();

        $this->controller->view('pageTitle', 'Hlavní stranka');
        $this->controller->view('mainCategories', $mainCategories);
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
        $this->loadInclude('news');
        $this->loadInclude('footer');
    }
}