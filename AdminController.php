<?php

/**
 * Admin
 * General admin controller
 */
class Admin extends Core{

    public $catModel;
    public $userModel;
    public $pageModel;
    public $postModel;
    public $db;
    public $smarty;

   
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
        $this->userModel = $this->controller->model('User');
        $this->catModel = $this->controller->model('Category');
        $this->pageModel = $this->controller->model('Page');
        $this->postModel = $this->controller->model('Post');
    }
    
    /**
     * loadDatabases
     * Method sends local db to category model
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
     * Method sends local db to category model
     * @return void
     */
    public function loadDatabase(){
        include_once('library/Database.php');
    }  

    /**
     * isLoggedIn - check if loggedIn
     * Check whether user logged in or not
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
        $this->controller->view('adminEmail', htmlspecialchars($_COOKIE['admin_email']));
        
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

/**
 * editPostAction - action for post editing
 */
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

        $postId = isset($_GET['id']) ? htmlspecialchars($_GET['id']): null;
        if($postId == null){
            exit();
        }
        $postId = htmlspecialchars($postId);

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
        $this->controller->view('postId', htmlspecialchars($postId));
        $this->controller->view('adminEmail', htmlspecialchars($_COOKIE['admin_email']));
        
        $this->startEngine();
    }

    /**
     * startEngine
     * Method includes smarty templates
     * @return void
     */
    public function startEngine() {


        $this->loadAdminInclude('header');
        $this->loadAdminTemplate('post-edit');
        $this->loadAdminInclude('footer');

    }
}

/**
 * LoginAction - action for login interface
 */
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
                'email' => htmlspecialchars($_POST['email']),
                'password' => htmlspecialchars($_POST['password']),
                'password_err' => '',
                'email_err' => ''
            ];

            if(empty($data['email'])){
                $_SESSION['admin_email_err'] = 'Inform admin email';
                $data['email_err'] = 'Inform admin email';
            }else{
                $_SESSION['admin_email_err'] = '';
                $data['email_err'] = '';
            }
            if(empty($data['password'])){
                $_SESSION['admin_password_err'] = 'Inform admin password';
                $data['password_err'] = 'Inform admin password';
            }else{
                if(password_verify($data['password'], $this->userModel->getAdminPasswordByEmail($data['email']))){
                    $_SESSION['admin_password_err'] = '';
                    $data['password_err'] = '';
                }else{
                    $_SESSION['admin_password_err'] = 'Špatný email nebo heslo';
                    $data['password_err'] = 'Špatný email nebo heslo';
                }
            }
            
            if(empty($data['password_err']) && empty($data['email_err'])){
                $this->startSession($data);
                Core::redirect('?controller=admin&action=index');
            }
            else{
                $_SESSION['admin_email_data'] = $data['email'];
                Core::redirect('?controller=admin&action=login');
            }

        }

        if(isset($_SESSION['admin_email_data'])){
            $this->controller->view('admin_email_data', $_SESSION['admin_email_data']);
        }
        if(isset($_SESSION['admin_password_err'])){
            $this->controller->view('admin_password_err', $_SESSION['admin_password_err']);
        }
        if(isset($_SESSION['admin_email_err'])){
            $this->controller->view('admin_email_err', $_SESSION['admin_email_err']);
        }

        $this->controller->view('pageTitle', 'Admin Auth Page');
        
        $this->startEngine();
    }

    /**
     * startEngine
     * Method includes smarty templates
     * @return void
     */
    public function startEngine() {


        $this->loadAdminInclude('header');
        $this->loadAdminTemplate('login');

    }
}


/**
 * PagesAction
 * Action for pages interface
 */
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
        $this->controller->view('adminEmail', htmlspecialchars($_COOKIE['admin_email']));
        
        $this->startEngine();
    }

    /**
     * startEngine
     * Method includes smarty templates
     * @return void
     */
    public function startEngine() {


        $this->loadAdminInclude('header');
        $this->loadAdminTemplate('pages');
        $this->loadAdminInclude('footer');

    }
}

/**
 * CategoriesAction
 * Action for categories interface
 */
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
        $this->controller->view('adminEmail', htmlspecialchars($_COOKIE['admin_email']));
        
        $this->startEngine();
    }

    /**
     * startEngine
     * Method includes smarty templates
     * @return void
     */
    public function startEngine() {

        $this->loadAdminInclude('header');
        $this->loadAdminTemplate('categories');
        $this->loadAdminInclude('footer');

    }
}

/**
 * UsersAction
 * Action for users interface
 */
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
            $deleteId = htmlspecialchars($_GET['deleteId']);
            $rs = $this->userModel->deleteUser($deleteId);
            if($rs){
                Core::redirect('?controller=admin&action=users');
            }else{
                Core::deb('Chyba při odstranění');
            }
        }

        $this->controller->view('pageTitle', 'Admin users page');
        $this->controller->view('users', $users);
        $this->controller->view('adminEmail', htmlspecialchars($_COOKIE['admin_email']));
        
        $this->startEngine();
    }

    /**
     * startEngine
     * Method includes smarty templates
     * @return void
     */
    public function startEngine() {

        $this->loadAdminInclude('header');
        $this->loadAdminTemplate('users');
        $this->loadAdminInclude('footer');

    }
}


/**
 * CreatePageAction
 * Action for creating new page
 */
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
        $this->controller->view('adminEmail', htmlspecialchars($_COOKIE['admin_email']));
        
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


/**
 * CreateCategoryAction
 * Action for creating new category
 */
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
                'CategoryName' => htmlspecialchars($_POST['categoryName']),
                'ParentCategoryId' => htmlspecialchars($_POST['parentCategory']),
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
            $this->controller->view('admin_cat_error', htmlspecialchars($_SESSION['admin_cat_error']));
        }
        if(isset($_SESSION['admin_name_error'])){
            $this->controller->view('admin_name_error', htmlspecialchars($_SESSION['admin_name_error']));
        }
        $this->controller->view('pageTitle', 'Admin category creation page');
        $this->controller->view('categories', $categories);
        $this->controller->view('adminEmail', htmlspecialchars($_COOKIE['admin_email']));
        
        $this->startEngine();
    }

    /**
     * startEngine
     * Method includes smarty templates
     * @return void
     */
    public function startEngine() {


        $this->loadAdminInclude('header');
        $this->loadAdminTemplate('category-create');
        $this->loadAdminInclude('footer');

    }
}


/**
 * CheckParentAction
 * Action for checking if exists categorys parent
 */
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

        $categoryId = htmlspecialchars($_POST['id']);

        $parent = $this->catModel->categoryHasParent($categoryId);
        if($parent){
            echo 1;
        }else{
            echo 0;
        }

    }
}