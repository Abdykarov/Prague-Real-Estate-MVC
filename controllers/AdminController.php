<?php

class Admin extends Core{

    public $catModel;
    public $userModel;
    public $pageModel;
    public $postModel;
    public $db;
    public $smarty;

   
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
        $this->userModel = $this->controller->model('User');
        $this->catModel = $this->controller->model('Category');
        $this->pageModel = $this->controller->model('Page');
        $this->postModel = $this->controller->model('Post');
    }
    
    /**
     * loadDatabases
     *
     * @return void
     */
    public function loadDatabases(){
        $this->userModel->initDatabase($this->db);
        $this->pageModel->initDatabase($this->db);
        $this->catModel->initDatabase($this->db);
        $this->postModel->initDatabase($this->db);
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
        if( isset($_COOKIE['admin_email'])){
            return True;
        }
        return False;
    }
    
    /**
     * deleteSession
     *
     * @return void
     */
    public function deleteSession(){
        $past = time() - 3600;
        foreach ( $_COOKIE as $key => $value )
        {
            setcookie( $key, $value, $past, '/' );
        } 
    }
    
    /**
     * startSession
     *
     * @return void
     */
    public function startSession($data){    
        $admin_email = $data['email'];
        setcookie('admin_email', $admin_email, time() + (86400 * 30), "/"); // 86400 = 1 day
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

        if(!$this->isLoggedIn()){
            Core::redirect('?controller=admin&action=login');
        }
    
        $this->loadSmarty($smarty);
        $this->loadController($controller);
        $this->loadDatabase();
        $this->loadModels();
        $this->loadDatabases();

        $posts = $this->postModel->getAllPosts();

        $this->controller->view('pageTitle', 'Admin Page');
        $this->controller->view('posts', $posts);
        $this->controller->view('adminEmail', strip_tags($_COOKIE['admin_email']));
        
        $this->startEngine();
    }

    /**
     * startEngine
     *
     * @return void
     */
    public function startEngine() {


        $this->loadAdminInclude('header');
        $this->loadAdminTemplate('index');
        $this->loadAdminInclude('footer');

    }
}

class editPostAction extends Admin{
    
    /**
     * __construct
     *
     * @param  mixed $smarty
     * @return void
     */
    public function __construct($smarty, $controller) {

        if(!$this->isLoggedIn()){
            Core::redirect('?controller=admin&action=login');
        }
    
        $this->loadSmarty($smarty);
        $this->loadController($controller);
        $this->loadDatabase();
        $this->loadModels();
        $this->loadDatabases();

        $postId = isset($_GET['id']) ? strip_tags($_GET['id']): null;
        if($postId == null){
            exit();
        }
        $postId = strip_tags($postId);

        if(isset($_POST['makeVip'])){
            $rs = $this->postModel->giveVip($postId);
            if($rs){
                Core::redirect('?controller=admin&action=index');
            }else{
                Core::redirect('?controller=admin&action=index');
            }
        }

        if(isset($_POST['delete'])){
            $rs = $this->postModel->deletePost($postId);
            if($rs){
                Core::redirect('?controller=admin&action=index');
            }else{
                Core::redirect('?controller=admin&action=index');
            }
        }


        $this->controller->view('pageTitle', 'Post edit Page');
        $this->controller->view('postId', strip_tags($postId));
        $this->controller->view('adminEmail', strip_tags($_COOKIE['admin_email']));
        
        $this->startEngine();
    }

    /**
     * startEngine
     *
     * @return void
     */
    public function startEngine() {


        $this->loadAdminInclude('header');
        $this->loadAdminTemplate('post-edit');
        $this->loadAdminInclude('footer');

    }
}

class LoginAction extends Admin{
    /**
     * __construct
     *
     * @param  mixed $smarty
     * @return void
     */
    public function __construct($smarty, $controller) {

        if($this->isLoggedIn()){
            Core::redirect('?controller=admin&action=index');
        }
        
        $this->loadSmarty($smarty);
        $this->loadController($controller);
        $this->loadDatabase();
        $this->loadModels();
        $this->loadDatabases();

        if(isset($_POST['auth'])){
            $data = [
                'email' => strip_tags($_POST['email']),
                'password' => strip_tags($_POST['password']),
                'password_err' => '',
                'email_err' => ''
            ];
            
            if(password_verify($data['password'], $this->userModel->getAdminPasswordByEmail($data['email']))){
                $this->startSession($data);
                Core::redirect('?controller=admin&action=index');
            }
            else{
                Core::redirect('');
            }

        }

        $this->controller->view('pageTitle', 'Admin Auth Page');
        
        $this->startEngine();
    }

    /**
     * startEngine
     *
     * @return void
     */
    public function startEngine() {


        $this->loadAdminInclude('header');
        $this->loadAdminTemplate('login');

    }
}


class PagesAction extends Admin{
    
    /**
     * __construct
     *
     * @param  mixed $smarty
     * @return void
     */
    public function __construct($smarty, $controller) {

        if(!$this->isLoggedIn()){
            Core::redirect('?controller=admin&action=login');
        }
    
        $this->loadSmarty($smarty);
        $this->loadController($controller);
        $this->loadDatabase();
        $this->loadModels();
        $this->loadDatabases();

        $pages = $this->pageModel->getAllPages();

        $this->controller->view('pageTitle', 'Admin page editing page');
        $this->controller->view('pages', $pages);
        $this->controller->view('adminEmail', strip_tags($_COOKIE['admin_email']));
        
        $this->startEngine();
    }

    /**
     * startEngine
     *
     * @return void
     */
    public function startEngine() {


        $this->loadAdminInclude('header');
        $this->loadAdminTemplate('pages');
        $this->loadAdminInclude('footer');

    }
}

class CategoriesAction extends Admin{
    
    /**
     * __construct
     *
     * @param  mixed $smarty
     * @return void
     */
    public function __construct($smarty, $controller) {

        if(!$this->isLoggedIn()){
            Core::redirect('?controller=admin&action=login');
        }
    
        $this->loadSmarty($smarty);
        $this->loadController($controller);
        $this->loadDatabase();
        $this->loadModels();
        $this->loadDatabases();

        $this->catModel->initPostModel($this->postModel, $this->db);
        $categories = $this->catModel->getAllCategories();

        $this->controller->view('pageTitle', 'Admin categories page');
        $this->controller->view('categories', $categories);
        $this->controller->view('adminEmail', strip_tags($_COOKIE['admin_email']));
        
        $this->startEngine();
    }

    /**
     * startEngine
     *
     * @return void
     */
    public function startEngine() {

        $this->loadAdminInclude('header');
        $this->loadAdminTemplate('categories');
        $this->loadAdminInclude('footer');

    }
}

class UsersAction extends Admin{
    
    /**
     * __construct
     *
     * @param  mixed $smarty
     * @return void
     */
    public function __construct($smarty, $controller) {

        if(!$this->isLoggedIn()){
            Core::redirect('?controller=admin&action=login');
        }
    
        $this->loadSmarty($smarty);
        $this->loadController($controller);
        $this->loadDatabase();
        $this->loadModels();
        $this->loadDatabases();

        $users = $this->userModel->getAllUsers();

        if(isset($_GET['deleteId'])){
            $deleteId = strip_tags($_GET['deleteId']);
            $rs = $this->userModel->deleteUser($deleteId);
            if($rs){
                Core::redirect('?controller=admin&action=users');
            }else{
                Core::deb('Chyba při odstranění');
            }
        }

        $this->controller->view('pageTitle', 'Admin users page');
        $this->controller->view('users', $users);
        $this->controller->view('adminEmail', strip_tags($_COOKIE['admin_email']));
        
        $this->startEngine();
    }

    /**
     * startEngine
     *
     * @return void
     */
    public function startEngine() {

        $this->loadAdminInclude('header');
        $this->loadAdminTemplate('users');
        $this->loadAdminInclude('footer');

    }
}


class CreatePageAction extends Admin{
    /**
     * __construct
     *
     * @param  mixed $smarty
     * @return void
     */
    public function __construct($smarty, $controller) {

        if(!$this->isLoggedIn()){
            Core::redirect('?controller=admin&action=login');
        }
    
        $this->loadSmarty($smarty);
        $this->loadController($controller);
        $this->loadDatabase();
        $this->loadModels();
        $this->loadDatabases();

        $pages = $this->pageModel->getAllPages();

        $this->controller->view('pageTitle', 'Admin page editing page');
        $this->controller->view('pages', $pages);
        $this->controller->view('adminEmail', strip_tags($_COOKIE['admin_email']));
        
        $this->startEngine();
    }

    /**
     * startEngine
     *
     * @return void
     */
    public function startEngine() {


        $this->loadAdminInclude('header');
        $this->loadAdminTemplate('page-create');
        $this->loadAdminInclude('footer');

    }
}


class CreateCategoryAction extends Admin{
    /**
     * __construct
     *
     * @param  mixed $smarty
     * @return void
     */
    public function __construct($smarty, $controller) {

        if(!$this->isLoggedIn()){
            Core::redirect('?controller=admin&action=login');
        }
    
        $this->loadSmarty($smarty);
        $this->loadController($controller);
        $this->loadDatabase();
        $this->loadModels();
        $this->loadDatabases();

        $this->catModel->initPostModel($this->postModel, $this->db);
        $categories = $this->catModel->getAllCategories();

        if(isset($_POST['createCategory'])){
            $data = [
                'CategoryName' => strip_tags($_POST['categoryName']),
                'ParentCategoryId' => strip_tags($_POST['parentCategory']),
                'CategoryError' => '',
                'NameErr' => ''
            ];

            // Validate name
            if ( empty($data['CategoryName']) ) {
                $_SESSION["admin_name_error"] = 'Please inform category name';
                $data['NameErr'] = 'Please inform category name';
            } else{
                $_SESSION["admin_name_error"] = '';
                $data['NameErr'] = '';
            }

             // Validate name
             if ( empty($data['ParentCategoryId']) ) {
                $_SESSION["admin_cat_error"] = 'Please choose category';
                $data['CategoryError'] = 'Please inform choose category';
            } else{
                $_SESSION["admin_cat_error"] = '';
                $data['CategoryError'] = '';
            }
            

            if(empty($data['CategoryError']) && empty($data['NameErr'])){
                
                $rs = $this->catModel->createCategory($data);
                if($rs){
                    Core::redirect('?controller=admin&action=categories');
                }else{
                    Core::deb('Category hasnd added');
                }
            }else{
                Core::redirect('?controller=admin&action=createCategory');

            }
        }

        if(isset($_SESSION['admin_cat_error'])){
            $this->controller->view('admin_cat_error', strip_tags($_SESSION['admin_cat_error']));
        }
        if(isset($_SESSION['admin_name_error'])){
            $this->controller->view('admin_name_error', strip_tags($_SESSION['admin_name_error']));
        }
        $this->controller->view('pageTitle', 'Admin category creation page');
        $this->controller->view('categories', $categories);
        $this->controller->view('adminEmail', strip_tags($_COOKIE['admin_email']));
        
        $this->startEngine();
    }

    /**
     * startEngine
     *
     * @return void
     */
    public function startEngine() {


        $this->loadAdminInclude('header');
        $this->loadAdminTemplate('category-create');
        $this->loadAdminInclude('footer');

    }
}


class CheckParentAction extends Admin{

    /**
     * __construct
     *
     * @param  mixed $smarty
     * @return void
     */
    public function __construct($smarty, $controller) {

        if(!$this->isLoggedIn()){
            Core::redirect('?controller=admin&action=login');
        }
        
        if(!isset($_POST['id'])){
            Core::redirect('?controller=admin&action=login');
        }

        $this->loadSmarty($smarty);
        $this->loadController($controller);
        $this->loadDatabase();
        $this->loadModels();
        $this->loadDatabases();

        $categoryId = strip_tags($_POST['id']);

        $parent = $this->catModel->categoryHasParent($categoryId);
        if($parent){
            echo 1;
        }else{
            echo 0;
        }

    }
}