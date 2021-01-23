<?php

/**
 * IndexAction
 * Category's controller default action
 * @param  mixed $core,$smarty
 * @return void
 */

class IndexAction extends Core{
    protected $cat;
    protected $post;
    private $db;
    public $smarty;
    public $test = 1;

    /**
     * __construct
     * An automatically called function, which calls other functions within class    
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
        $page = isset($_GET['page']) ? $_GET['page'] : 1;
        $sorted = isset($_GET['sorted']) ? $_GET['sorted'] : 'byDateDESC';
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


        $thisUrl = $_SERVER['REQUEST_URI'];
        $thisUrl = str_replace('/~abdykili/','',$thisUrl);

        $this->checkStyles($thisUrl);
        
        if(isset($_COOKIE['snow'])){
            $this->controller->view('snow', $_COOKIE['snow']);
        }
        if(isset($_COOKIE['dark'])){
            $this->controller->view('dark', $_COOKIE['dark']);
        }
        
        $posts = $this->cat->getPosts($categoryId,$this->post);
        
        if($sorted == 'byDateASC'){
            usort($posts, $this->build_sorter('PostDate'));
            
        }elseif($sorted == 'byDateDESC'){
            usort($posts, $this->build_sorter('PostDate'));
            $posts = array_reverse($posts);
            
        }elseif($sorted == 'byPriceASC'){
            usort($posts, $this->build_sorter('PostPrice'));
            
        }elseif($sorted == 'byPriceDESC'){
            usort($posts, $this->build_sorter('PostPrice'));
            $posts = array_reverse($posts);
        }
        $vipposts = array();
        foreach($posts as $post){
            if($post['VipStatus'] == '1'){
                array_push($vipposts, $post);
            }
        }

        $vipposts = array_slice($vipposts, 0, 10);

        if(isset($_POST['sortedType'])){
            $url = "$_SERVER[REQUEST_URI]";
            if(isset($_GET['sorted'])){
                $strPage = '&sorted='. strip_tags($_GET['sorted']);
                $url = str_replace($strPage, "", $url);
                $url = str_replace('/~abdykili/', "", $url);
            }
            if(isset($_GET['page'])){
                $strPage = '&page='.strip_tags($_GET['page']);
                $url = str_replace($strPage, "", $url);
                $url = str_replace('/~abdykili/', "", $url);
            }
            $url = $url . '&sorted='.strip_tags($_POST['sortedType']);
            $url = str_replace('/~abdykili/', "", $url);

            Core::redirect($url);
        }

        // set the number of items to display per page
        $items_per_page = 5;

        // build query
        $offset = ($page - 1) * $items_per_page;
        $pageCount = round(count($posts)/ $items_per_page);

        $paginationUrl = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
        if(isset($_GET['page'])){
            $strPage = '&page='. strip_tags($_GET['page']);
            $paginationUrl = str_replace($strPage, "", $paginationUrl);
            $paginationUrl = $paginationUrl . "&page=";
        }
        else{
            $paginationUrl = $paginationUrl . "&page=";
        }
        $paginationUrl = $this->SanitizeUrl($paginationUrl);

        $posts = array_slice($posts,$offset,$items_per_page);


        $categoryName = $this->cat->getCategoryName($categoryId);
        $mainCategories = $this->cat->getMainCategories();
        $childCategories = $this->cat->getChildCategory($categoryId);
        $breadcrumbs = $this->cat->getBreadcrumbs($categoryId);

        if(isset($_COOKIE['user_email'])){
            $this->controller->view('userEmail', htmlspecialchars($_COOKIE['user_email']));
        }

        foreach($mainCategories  as &$category){
            foreach($category as &$value){
                $value = htmlspecialchars($value);
            }
        }
        foreach($breadcrumbs  as &$bread){
            foreach($bread as &$value){
                $value = htmlspecialchars($value);
            }
        }

        foreach($posts as &$post){
            foreach($post as &$value){
                $value = htmlspecialchars($value);
            }
        }
        foreach($vipposts as &$vip){
            foreach($vip as &$value){
                $value = htmlspecialchars($value);
            }
        }
        foreach($childCategories as &$child){
            foreach($child as &$value){
                $value = htmlspecialchars($value);
            }
        }
        
        $this->controller->view('pageTitle', htmlspecialchars($categoryName));
        $this->controller->view('mainCategories', $mainCategories);
        $this->controller->view('breadcrumbs', $breadcrumbs);
        $this->controller->view('childCategories', $childCategories);
        $this->controller->view('categoryId', htmlspecialchars($categoryId));
        $this->controller->view('categoryName', htmlspecialchars($categoryName));
        $this->controller->view('paginationUrl', $paginationUrl);
        $this->controller->view('posts', $posts);
        $this->controller->view('vipposts', $vipposts);
        $this->controller->view('page', htmlspecialchars($page));
        $this->controller->view('sorted', htmlspecialchars($sorted));
        $this->controller->view('pageCount', htmlspecialchars($pageCount));
        
        $this->startEngine();
    }

    public function build_sorter($key) {
        return function ($a, $b) use ($key) {
            return strnatcmp($a[$key], $b[$key]);
        };
    }

    public function SanitizeUrl($url)
    {
        return htmlspecialchars($url);
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
     * loadModels
     * Method loads needed models and create new local variable - db 
     * @return void
     */
    public function loadModels(){
        $this->db = new Database();
        $this->cat = $this->controller->model('Category');
        $this->post = $this->controller->model('Post');
    }
    
    /**
     * loadDatabases
     * Method sends local db to category model
     * @return void
     */
    public function loadDatabases(){
        $this->cat->initDatabase($this->db);
        $this->post->initDatabase($this->db);
    }
    
    /**
     * loadDatabase
     * Method sends local db to category model
     * @return void
     */
    public function loadDatabase(){
        include_once('library/Database.php');
    }    
    /**
     * getCategoryId
     * Gets category id via url
     * @return void
     */
    public function getCategoryId() {
        $categoryId = isset($_GET['id']) ? $_GET['id']: null;
        return $categoryId;
    }
    
    /**
     * startEngine
     * Method assign variables and sends them to view layer
     * @return void
     */
    public function startEngine() {
        $this->loadInclude('header');
        $this->loadInclude('filter-empty');
        $this->loadTemplate('category');
        $this->loadInclude('footer');
    }
}


/**
 * FilterAction
 * Filter action - works when user search posts using filter form
 */
class FilterAction extends IndexAction{

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
        $fromPrice = isset($_GET['fromPrice'])?  $_GET['fromPrice'] : '';
        $toPrice = isset($_GET['toPrice']) ? $_GET['toPrice'] : '';
        $owner = isset($_GET['owner']) ? $_GET['owner'] : '';
        $cond = isset($_GET['cond']) ? $_GET['cond'] : '';
        $const = isset($_GET['const']) ? $_GET['const'] : '';
        $page = isset($_GET['page']) ? $_GET['page'] : 1;
        $sorted = isset($_GET['sorted']) ? $_GET['sorted'] : 'byDateDESC';
        $categoryId = isset($_POST['id']) ? $_POST['id'] : $categoryId;
        $url = '?controller=category&action=filter&id='.$categoryId;
        if(isset($_POST['filter'])){
            if(!empty($_POST['fromPrice'])){
                $url = $url . '&fromPrice=' . $_POST['fromPrice'];
            }        
            if(!empty($_POST['toPrice'])){
                $url = $url . '&toPrice=' . $_POST['toPrice'];
            }
            if(!empty($_POST['owner'])){
                $url = $url . '&owner=' . $_POST['owner'];
            }
            if(!empty($_POST['cond'])){
                $url = $url . '&cond=' . $_POST['cond'];
            }
            if(!empty($_POST['const'])){
                $url = $url . '&const=' . $_POST['const'];
            }
            Core::redirect($url);
        }


        
        if(isset($_POST['sortedType'])){
            $url = "$_SERVER[REQUEST_URI]";
            if(isset($_GET['sorted'])){
                $strPage = '&sorted='.$_GET['sorted'];
                $url = str_replace($strPage, "", $url);
                $url = str_replace('/~abdykili/', "", $url);
            }
            if(isset($_GET['page'])){
                $strPage = '&page='.$_GET['page'];
                $url = str_replace($strPage, "", $url);
                $url = str_replace('/~abdykili/', "", $url);
            }
            $url = $url . '&sorted='.$_POST['sortedType'];
            $url = str_replace('/~abdykili/', "", $url);

            Core::redirect($url);
        }

        $data = [
            'id' => $categoryId,
            'fromPrice' => $fromPrice,
            'toPrice' => $toPrice,
            'owner' => $owner,
            'cond' => $cond,
            'sortedType' => $sorted,
            'const' => $const
        ];
        // set the number of items to display per page
        $items_per_page = 5;

        // build query
        $offset = ($page - 1) * $items_per_page;
        

        $category = $this->cat->getCategoryById($categoryId);
        $categoryFriends = $this->cat->getChildForCategory($category['ParentCategoryId']);
        $posts = $this->post->getFilterPosts($categoryId,$data);
        $pageCount = round(count($posts)/ $items_per_page);

        $vipposts = array();
        foreach($posts as $post){
            if($post['VipStatus'] == '1'){
                array_push($vipposts, $post);
            }
        }

        $vipposts = array_slice($vipposts, 0, 10);

        $paginationUrl = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
        if(isset($_GET['page'])){
            $strPage = '&page='. $_GET['page'];
            $paginationUrl = str_replace($strPage, "", $paginationUrl);
            $paginationUrl = $paginationUrl . "&page=";
        }
        else{
            $paginationUrl = $paginationUrl . "&page=";
        }
        $paginationUrl = $this->SanitizeUrl($paginationUrl);
        $posts = array_slice($posts,$offset,$items_per_page);
        $categoryName = $this->cat->getCategoryName($categoryId);
        $mainCategories = $this->cat->getMainCategories();
        $childCategories = $this->cat->getChildForCategory($categoryId);
        $breadcrumbs = $this->cat->getBreadcrumbs($categoryId);
        
        $thisUrl = $_SERVER['REQUEST_URI'];
        $thisUrl = str_replace('/~abdykili/','',$thisUrl);

        $this->checkStyles($thisUrl);
        
        if(isset($_COOKIE['snow'])){
            $this->controller->view('snow', htmlspecialchars($_COOKIE['snow']));
        }
        if(isset($_COOKIE['dark'])){
            $this->controller->view('dark', htmlspecialchars($_COOKIE['dark']));
        }

        $this->controller->view('pageTitle', $categoryName);
        if(isset($_GET['fromPrice'])){
            $this->controller->view('fromPrice', htmlspecialchars($_GET['fromPrice']));
        }
        
        if(isset($_GET['toPrice'])){
            $this->controller->view('toPrice', htmlspecialchars($_GET['toPrice']));
        }

        if(isset($_COOKIE['user_email'])){
            $this->controller->view('userEmail', htmlspecialchars($_COOKIE['user_email']));
        }       
        foreach($mainCategories  as &$cat){
            foreach($cat as &$value){
                $value = htmlspecialchars($value);
            }
        }
        foreach($categoryFriends  as &$friend){
            foreach($friend as &$value){
                $value = htmlspecialchars($value);
            }
        }
        foreach($category as &$value){
            $value = htmlspecialchars($value);
        }
        foreach($breadcrumbs  as &$bread){
            foreach($bread as &$value){
                $value = htmlspecialchars($value);
            }
        }

        foreach($posts as &$post){
            foreach($post as &$value){
                $value = htmlspecialchars($value);
            }
        }
        foreach($vipposts as &$vip){
            foreach($vip as &$value){
                $value = htmlspecialchars($value);
            }
        }
        foreach($childCategories as &$child){
            foreach($child as &$value){
                $value = htmlspecialchars($value);
            }
        }


        $this->controller->view('mainCategories', $mainCategories);
        $this->controller->view('category', $category);
        $this->controller->view('pageCount', htmlspecialchars($pageCount));
        $this->controller->view('page', htmlspecialchars($page));
        $this->controller->view('vipposts', $vipposts);
        $this->controller->view('sorted', htmlspecialchars($sorted));
        $this->controller->view('paginationUrl', htmlspecialchars($paginationUrl));
        $this->controller->view('categoryFriends', $categoryFriends);
        $this->controller->view('breadcrumbs', $breadcrumbs);
        $this->controller->view('childCategories', $childCategories);
        $this->controller->view('categoryId', htmlspecialchars($categoryId));
        $this->controller->view('categoryName', htmlspecialchars($categoryName));
        $this->controller->view('posts', $posts);
        
        $this->startEngine();
    }

    public function SanitizeUrl($url)
    {
        return htmlspecialchars($url);
    }

    /**
     * startEngine
     * Method assign variables and sends them to view layer
     * @return void
     */
    public function startEngine() {
        $this->loadInclude('header');
        $this->loadInclude('filter');
        $this->loadTemplate('category');
        $this->loadInclude('footer');
    }
    
}
