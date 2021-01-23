<?php


/**
 * PostController 
 * General post controller
 */
class PostController extends Core {
    public $db;
    public $userModel;
    public $postModel;
    public $catModel;
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
        $this->postModel = $this->controller->model('Post');
        $this->userModel = $this->controller->model('User');
        $this->catModel = $this->controller->model('Category');
    }
    
    /**
     * loadDatabases
     * Method sends local db to models
     * @return void
     */
    public function loadDatabases(){
        $this->userModel->initDatabase($this->db);
        $this->postModel->initDatabase($this->db);
        $this->catModel->initDatabase($this->db);
    }
    
    /**
     * loadDatabase
     * Method includes database
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
        if( isset($_COOKIE['user_id'])){
            return True;
        }
        return False;
    }


}

/**
 * confirmAction
 * Works when user added new post
 */
class confirmAction extends PostController{
    public function __construct($smarty,$controller){
        if(!$this->isLoggedIn()){
            Core::redirect('');
        }

        $this->loadController($controller);
        $this->loadSmarty($smarty);
        $this->loadDatabase();
        $this->loadModels();
        $this->loadDatabases();

        $this->controller->view('pageTitle', 'Add post Page');
        $this->controller->view('userName', htmlspecialchars($_COOKIE['user_name']));
        
        $this->startEngine();
    }

    public function startEngine(){
        $this->loadInclude('header');
        $this->loadTemplate('post-confirm');
        $this->loadInclude('footer');    

    }
}

/**
 * addAction
 * Action for new post
 */
class addAction extends PostController{

    public function __construct($smarty,$controller){
        if(!$this->isLoggedIn()){
            Core::redirect('?controller=user&action=login');
        }

        $this->loadController($controller);
        $this->loadSmarty($smarty);
        $this->loadDatabase();
        $this->loadModels();
        $this->loadDatabases();

        $thisUrl = $_SERVER['REQUEST_URI'];
        $thisUrl = str_replace('/~abdykili/','',$thisUrl);

        $this->checkStyles($thisUrl);
        
        if(isset($_COOKIE['snow'])){
            $this->controller->view('snow', htmlspecialchars($_COOKIE['snow']));
        }
        if(isset($_COOKIE['dark'])){
            $this->controller->view('dark', htmlspecialchars($_COOKIE['dark']));
        }

        if(isset($_POST['add_post'])){
            
            $this->registerPost();
        }
        if(isset($_SESSION["post_add_name"])){
            $this->controller->view('post_add_name', htmlspecialchars($_SESSION["post_add_name"]));
        }
        if(isset($_SESSION["post_add_price"])){
            $this->controller->view('post_add_price', htmlspecialchars($_SESSION["post_add_price"]));
        }
        if(isset($_SESSION["post_add_address"])){
            $this->controller->view('post_add_address', htmlspecialchars($_SESSION["post_add_address"]));
        }
        if(isset($_SESSION["post_add_square"])){
            $this->controller->view('post_add_square', htmlspecialchars($_SESSION["post_add_square"]));
        }
        if(isset($_SESSION["post_add_desc"])){
            $this->controller->view('post_add_desc', htmlspecialchars($_SESSION["post_add_desc"]));
        }
        if(isset($_SESSION["post_add_owner"])){
            $this->controller->view('post_add_owner', htmlspecialchars($_SESSION["post_add_owner"]));
        }
        if(isset($_SESSION["post_add_const"])){
            $this->controller->view('post_add_const', htmlspecialchars($_SESSION["post_add_const"]));
        }
        if(isset($_SESSION["post_add_cond"])){
            $this->controller->view('post_add_cond', htmlspecialchars($_SESSION["post_add_cond"]));
        }



        if(isset($_SESSION["post_cat_error"])){
            $this->controller->view('post_cat_error', htmlspecialchars($_SESSION["post_cat_error"]));
        }
        if(isset($_SESSION["post_name_error"])){
            $this->controller->view('post_name_error', htmlspecialchars($_SESSION["post_name_error"]));
        }
        if(isset($_SESSION["post_price_error"])){
            $this->controller->view('post_price_error', htmlspecialchars($_SESSION["post_price_error"]));
        }
        if(isset($_SESSION["post_address_error"])){
            $this->controller->view('post_address_error', htmlspecialchars($_SESSION["post_address_error"]));
        }
        if(isset($_SESSION["post_square_error"])){
            $this->controller->view('post_square_error', htmlspecialchars($_SESSION["post_square_error"]));
        }
        if(isset($_SESSION["post_desc_error"])){
            $this->controller->view('post_desc_error', htmlspecialchars($_SESSION["post_desc_error"]));
        }
        if(isset($_SESSION["post_cond_error"])){
            $this->controller->view('post_cond_error', htmlspecialchars($_SESSION["post_cond_error"]));
        }
        if(isset($_SESSION["post_const_error"])){
            $this->controller->view('post_const_error', htmlspecialchars($_SESSION["post_const_error"]));
        }
        if(isset($_SESSION["post_file_error"])){
            $this->controller->view('post_file_error', htmlspecialchars($_SESSION["post_file_error"]));
        }
        if(isset($_SESSION["post_owner_error"])){
            $this->controller->view('post_owner_error', htmlspecialchars($_SESSION["post_owner_error"]));
        }
        
        $mainCategories = $this->catModel->getMainCategories();
        $this->controller->view('pageTitle', 'Add post Page');
        $this->controller->view('mainCategories', $mainCategories);
        $this->controller->view('userName', htmlspecialchars($_COOKIE['user_name']));
        $this->controller->view('userEmail', htmlspecialchars($_COOKIE['user_email']));
        $this->controller->view('userId', htmlspecialchars($_COOKIE['user_id']));
        
        $this->startEngine();
    }
        
    /**
     * uploadFiles
     * Move to images/ returns false or true
     * @param  mixed $images
     * @return void
     */
    public function uploadFiles($images){

        $name       = $_FILES['file']['name'];  
        $temp_name  = $_FILES['file']['tmp_name'];
        
        $success = 0;
        $imageArray = explode(',',$images);
        $len = count($imageArray);

        for($i = 0; $i < $len; $i++){
            $location = 'images/postImages/';      
            if(move_uploaded_file($temp_name[$i], $location.$imageArray[$i])){
                $success = 1;
            }else{
                Core::deb( 'File didnt upload' );   
                $success = 0;
            }
            
        }
        return $success;
    }
        
    /**
     * registerPost
     * Validate data and add new post if empty errors
     * @return void
     */
    public function registerPost(){
        // Sanitize POST Data
        $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
        
        // Process form
        $data = [   
            'author' => $_COOKIE['user_id'],
            'category' => $_POST['category'],
            'name' => $_POST['name'],
            'price' => $_POST['price'],
            'address' => $_POST['address'],
            'square' => $_POST['square'],
            'desc' => $_POST['desc'],
            'owner' => $_POST['owner'],
            'cond' => $_POST['cond'],
            'const' => $_POST['const'],
            'category_error' => '',
            'name_error' => '',
            'price_error' => '',
            'address_error' => '',
            'square_error' => '',
            'desc_error' => '',
            'owner_error' => '',
            'cond_error' => '',
            'const_error' => '',
            'file_error' => '',
            'images' => ''
        ];

         // Validate if empty
         if ( empty($data['category']) ) {
            $_SESSION["post_cat_error"] = 'Please inform your category';
            $data['category_error'] = 'Please inform your category';
        } else{
            // Check digits
            if (!ctype_digit($data['category']) ) {
                $_SESSION["post_cat_error"] = 'Jenom čísla!';
                $data['category_error'] = 'Jenom čísla!';
            }
            else{
                unset($_SESSION["post_cat_error"]);
                $data['category_error'] = '';
            }
        }

        // Validate name
        if ( empty($data['name']) ) {
            $_SESSION["post_name_error"] = 'Please inform your name';
            $data['name_error'] = 'Please inform your name';
        } else {
            unset($_SESSION["post_name_error"]);
            $data['name_error'] = '';
        }

        // Validate if empty
        if ( empty($data['price']) ) {
            $_SESSION["post_price_error"] = 'Please inform your price';
            $data['price_error'] = 'Please inform your price';
        } else{
            // Check digits
            if (!ctype_digit($data['price']) ) {
                $_SESSION["post_price_error"] = 'Jenom čísla!';
                $data['price_error'] = 'Jenom čísla!';
            }
            else{
                unset($_SESSION["post_price_error"]);
                $data['price_error'] = '';
            }
        }
        
         // Validate name
         if ( empty($data['address']) ) {
            $_SESSION["post_address_error"] = 'Please inform your address';
            $data['address_error'] = 'Please inform your address';
        } else {
            unset($_SESSION["post_address_error"]);
            $data['address_error'] = '';
        }

        // Validate if empty
        if ( empty($data['square']) ) {
            $_SESSION["post_square_error"] = 'Please inform your square';
            $data['square_error'] = 'Please inform your square';
        } else{
            // Check digits
            if (!ctype_digit($data['square']) ) {
                $_SESSION["post_square_error"] = 'Jenom čísla';
                $data['square_error'] = 'Jenom čísla!';
            }
            else{
                unset($_SESSION["post_square_error"]);
                $data['square_error'] = '';
            }
        }
        
        // Validate if empty
        if ( empty($data['desc']) ) {
            $_SESSION["post_desc_error"] = 'Please inform your description';
            $data['desc_error'] = 'Please inform your description';
        } else {
            unset($_SESSION["post_desc_error"]);
            $data['desc_error'] = '';
        }
        
        // Validate if empty
        if ( empty($data['owner']) ) {
            $_SESSION["post_owner_error"] = 'Please inform your ownership';
            $data['owner_error'] = 'Please inform your ownership';
        } else {
            unset($_SESSION["post_owner_error"]);
            $data['owner_error'] = '';
        }


        // Validate if empty
        if ( empty($data['const']) ) {
            $_SESSION["post_const_error"] = 'Please inform your construction';
            $data['const_error'] = 'Please inform your construction';
        } else {
            unset($_SESSION["post_const_error"]);
            $data['const_error'] = '';
        }
        
        // Validate if empty
        if ( empty($data['cond']) ) {
            $_SESSION["post_cond_error"] = 'Please inform your condition';
            $data['cond_error'] = 'Please inform your condition';
        } else {
            unset($_SESSION["post_cond_error"]);
            $data['cond_error'] = '';
        }

        $name       = $_FILES['file']['name'];  
        $temp_name  = $_FILES['file']['tmp_name'];
        $new_images = '';
        $len = count($name);
        for($i = 0; $i < $len; $i++){
            if($_FILES['file']['size'][$i] > 10000000){
                $_SESSION["post_file_error"] = 'Maximalní velikost souboru - 10 mb';
                $data['file_error'] = 'Maximalní velikost souboru - 10 mb';
            }
            if( pathinfo($name[$i], PATHINFO_EXTENSION) != 'png' && pathinfo($name[$i], PATHINFO_EXTENSION) != 'jpg'){
                $_SESSION["post_file_error"] = 'Nesprávné rozšíření obrázku';
                $data['file_error'] = 'Nesprávné rozšíření obrázku';
            }
        }
        if (count($name) < 2){
            $_SESSION["post_file_error"] = 'Minimalní počet obrazků - 2';
            $data['file_error'] = 'Minimalní počet obrazků - 2';
        }

        for($i = 0; $i < $len; $i++){
            
            /* create new name file */
            $filename   = uniqid() . "_" . time(); // 5dab1961e93a7-1571494241
            $extension  = pathinfo( $_FILES["file"]["name"][$i], PATHINFO_EXTENSION ); // jpg
            $basename   = $filename . "." . $extension; // 5dab1961e93a7_1571494241.jpg
            
            $new_images = $new_images . ',' . $basename;           
        }

        $new_images = substr($new_images, 1);
        $data['images'] = $new_images;
        
        if(
            empty($data['category_error']) &&
            empty($data['name_error']) &&
            empty($data['price_error']) &&
            empty($data['address_error']) &&
            empty($data['square_error']) &&
            empty($data['desc_error']) &&
            empty($data['cond_error']) &&
            empty($data['const_error']) &&
            empty($data['file_error'])
        ){
            if($this->uploadFiles($data['images'])){
                $reg = $this->postModel->addPost($data);
                if ($reg) {
                    $this->redirect('?controller=post&action=confirm');
                } else {
                    Core::deb('UserModel registration method error');
                }
            }
        }else{
            $_SESSION["post_add_name"] = $data['name'];
            $_SESSION["post_add_price"] = $data['price'];
            $_SESSION["post_add_address"] = $data['address'];
            $_SESSION["post_add_square"] = $data['square'];
            $_SESSION["post_add_desc"] = $data['desc'];
            $_SESSION["post_add_owner"] = $data['owner'];
            $_SESSION["post_add_const"] = $data['const'];
            $_SESSION["post_add_cond"] = $data['cond'];
            Core::redirect('?controller=post&action=add');
        }
    
    }
    
    /**
     * startEngine
     * Includes smarty templates
     * @return void
     */
    public function startEngine(){
        $this->loadInclude('header');
        $this->loadTemplate('post-add');
        $this->loadInclude('footer');    
        
    }
}


/**
 * IndexAction
 * Default action for post Controller
 */
class IndexAction extends PostController{   
     
    /**
     * __construct
     *
     * @param  mixed $smarty
     * @param  mixed $controller
     * @return void
     */
    public function __construct($smarty,$controller){

        $this->loadSmarty($smarty);
        $this->loadController($controller);
        $this->loadDatabase();
        $this->loadModels();
        $this->loadDatabases();

        $postId = $this->getPostId();
        if($postId == null) exit();

        $thisUrl = $_SERVER['REQUEST_URI'];
        $thisUrl = str_replace('/~abdykili/','',$thisUrl);

        $this->checkStyles($thisUrl);
        
        if(isset($_COOKIE['snow'])){
            $this->controller->view('snow', htmlspecialchars($_COOKIE['snow']));
        }
        if(isset($_COOKIE['dark'])){
            $this->controller->view('dark', htmlspecialchars($_COOKIE['dark']));
        }

        $this->catModel->initPostModel($this->postModel,$this->db);
        
        $mainCategories = $this->catModel->getMainCategories();
        $postData = $this->postModel->getPostById($postId);
        $breadcrumbs = $this->catModel->getBreadcrumbsByPostId($postId);
        
        $userId = $postData[0]['AuthorId'];
        $userData = $this->userModel->getUser($userId);

        $url = $postData[0]['PostAddress'];
        $url = str_replace(' ', '+', $url);

        $posts = $this->postModel->getPostsByCategoryId($postData[0]['CategoryId']); 
        $posts = array_slice($posts, 0, 7);

        // xss prevention
        foreach($postData  as &$data){
            foreach($data as &$value){
                $value = htmlspecialchars($value);
            }
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
        
        foreach($userData as &$value){
            $value = htmlspecialchars($value);
        }
        
        if($this->isLoggedIn()){
            $userPhone = $this->userModel->getPhoneByEmail($_COOKIE['user_email']);
            $this->controller->view('userName', htmlspecialchars($_COOKIE['user_name']));
            $this->controller->view('userEmail', htmlspecialchars($_COOKIE['user_email']));
            $this->controller->view('userId', htmlspecialchars($_COOKIE['user_id']));
            $this->controller->view('userPhone', htmlspecialchars($userPhone));
        }
        
        $this->controller->view('pageTitle', 'Post Page');
        $this->controller->view('postData', $postData);
        $this->controller->view('mainCategories', $mainCategories);
        $this->controller->view('url', htmlspecialchars($url));
        $this->controller->view('userData', $userData);
        $this->controller->view('breadcrumbs', $breadcrumbs);
        $this->controller->view('posts', $posts);

        $this->startEngine();
    }
    
    /**
     * startEngine
     *
     * @return void
     */
    public function startEngine(){
        $this->loadInclude('header');
        $this->loadTemplate('post');
        $this->loadInclude('footer');    


    }

    /**
     * getCategoryId
     *
     * @return void
     */
    public function getPostId() {
        $postId = isset($_GET['id']) ? $_GET['id']: null;
        return $postId;
    }
}

class getChildCategoriesAction extends PostController{

    /**
     * __construct
     *
     * @param  mixed $smarty
     * @param  mixed $controller
     * @return void
     */
    public function __construct($smarty,$controller){
        
        $this->loadSmarty($smarty);
        $this->loadController($controller);
        $this->loadDatabase();
        $this->loadModels();
        $this->loadDatabases();
        
        $categoryId = $_POST['id']; 
        $childCategories = $this->catModel->getChildCategory($categoryId);
        
        echo json_encode($childCategories);

    }
}   


class getCategoryPathAction extends PostController{

    /**
     * __construct
     *
     * @param  mixed $smarty
     * @param  mixed $controller
     * @return void
     */
    public function __construct($smarty,$controller){
        
        $this->loadSmarty($smarty);
        $this->loadController($controller);
        $this->loadDatabase();
        $this->loadModels();
        $this->loadDatabases();
        
        $categoryId = $_POST['id']; 
        $childCategories = $this->catModel->getBreadcrumbs($categoryId);

        echo json_encode($childCategories);

    }

}
