<?php

/**
 * User
 * General user controller
 */
class UserController extends Core {
    private $db;
    public $userModel;
    public $postModel;
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
        $this->postModel = $this->controller->model('Post');
    }
    
    /**
     * loadDatabases
     * Method sends local db to category model
     * @return void
     */
    public function loadDatabases(){
        $this->userModel->initDatabase($this->db);
        $this->postModel->initDatabase($this->db);
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
        $user_id1 = $data['id'];
        $user_email1 = $data['email'];
        $user_name1 = $data['name'];
        setcookie('user_id', $user_id1, time() + (86400 * 30), "/"); // 86400 = 1 day
        setcookie('user_email', $user_email1, time() + (86400 * 30), "/"); // 86400 = 1 day
        setcookie('user_name', $user_name1, time() + (86400 * 30), "/"); // 86400 = 1 day
    }

}




/**
 * InitMessageAction
 * Action works when user create new message branch
 */
class InitMessageAction extends UserController{
     
    /**
     * __construct
     *
     * @param  mixed $smarty
     * @param  mixed $controller
     * @return void
     */
    public function __construct($smarty,$controller){
        if(!$this->isLoggedIn()){
            Core::redirect('?controller=user&action=login');
        }

        if(!isset($_POST['sendMessage'])){
            Core::redirect('?controller=user&action=login');
        }
        
        $this->loadSmarty($smarty);
        $this->loadController($controller);
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

        $userId = $_POST['userId'];
        $authorId = $_POST['postAuthor'];
        $message = $_POST['message'];
        $date = date("d.m.y H:i:s");

        if($userId == $authorId){
            Core::deb("Nemužete psat sam sebe");
        }

        $data = [
            'postAuthorId' => $authorId,
            'userId' => $userId,
            'messageText' => $message,
            'messageDate' => $date
        ];

        $hasMG = $this->userModel->hasMessageGroup($data);

        if($hasMG){
            $msgGroup = $hasMG['GroupId'];
            Core::redirect('?controller=user&action=chatPage&id='.$msgGroup);
        }
        else{
            $rs = $this->userModel->registerMessageGroup($data);
            if($rs){
                $getMG = $this->userModel->hasMessageGroup($data);
                Core::redirect('?controller=user&action=chatPage&id='.$getMG['GroupId']);
            }else{
                Core::redirect('?controller=user&action=index');
            }
        }
        
    }
    
}

/**
 * StartChatAction
 * Action for chat between users
 */
class StartChatAction extends UserController{
    
    /**
     * __construct
     *
     * @param  mixed $smarty
     * @param  mixed $controller
     * @return void
     */
    public function __construct($smarty,$controller){
        if(!$this->isLoggedIn()){
            Core::redirect('?controller=user&action=login');
        }
        if(!isset($_POST['startChat'])){
            Core::redirect('?controller=user&action=login');
        }

        $this->loadSmarty($smarty);
        $this->loadController($controller);
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


        $userId = $_COOKIE['user_id'];
        $authorId = $_POST['postAuthorId'];

        if($userId == $authorId){
            Core::deb("Nemužete psat sam sebe");
        }
        
        $postAuthor = $this->userModel->getUser($authorId);
        foreach($postAuthor as &$value) {
            $value = htmlspecialchars($value);
        }
        $this->controller->view('pageTitle', 'Start Chat Page');
        $this->controller->view('postAuthor', $postAuthor);
        $this->controller->view('userName', htmlspecialchars($_COOKIE['user_name']));
        $this->controller->view('userEmail', htmlspecialchars($_COOKIE['user_email']));
        $this->controller->view('userId', htmlspecialchars($userId));
        
        $this->startEngine();
    }
    
    /**
     * startEngine
     *
     * @return void
     */
    public function startEngine(){
        $this->loadInclude('header');
        $this->loadTemplate('user-chat-start');
        $this->loadInclude('footer');    

    }
}

/**
 * ChatPageAction
 * Action for chat interface
 */
class ChatPageAction extends UserController{

     /**
     * __construct
     *
     * @param  mixed $smarty
     * @param  mixed $controller
     * @return void
     */
    public function __construct($smarty,$controller){
        if(!$this->isLoggedIn()){
            Core::redirect('?controller=user&action=login');
        }

        if(!isset($_GET['id'])){
            Core::redirect('?controller=user&action=login');
        }


        $this->loadSmarty($smarty);
        $this->loadController($controller);
        $this->loadDatabase();
        $this->loadModels();
        $this->loadDatabases();

        $groupMessageId = $_GET['id'];
        $userId = $_COOKIE['user_id'];
        $partnerId = '';

        $thisUrl = $_SERVER['REQUEST_URI'];
        $thisUrl = str_replace('/~abdykili/','',$thisUrl);

        $this->checkStyles($thisUrl);
        
        if(isset($_COOKIE['snow'])){
            $this->controller->view('snow', htmlspecialchars($_COOKIE['snow']));
        }
        if(isset($_COOKIE['dark'])){
            $this->controller->view('dark', htmlspecialchars($_COOKIE['dark']));
        }


        if(isset($_POST['messageText'])){
            $message = $_POST['messageText'];
            $date = date("d.m.y H:i:s");
        
            $data = [
                'messageGroup' => $groupMessageId,
                'userId' => $userId,
                'messageText' => $message,
                'messageDate' => $date,
                'messageError' => ''
            ];

            if(empty($message)){
                $_SESSION['messageError'] = 'Napiště něco prosím';
                $data['messageError'] = 'Napiště něco prosím';
            }else{
                $_SESSION['messageError'] = '';
                $data['messageError'] = '';
            }

            if(empty($data['messageError'])){
                $this->userModel->registerMessage($data);
                Core::redirect('?controller=user&action=chatPage&id='.$groupMessageId);
            }else{
                Core::redirect('?controller=user&action=chatPage&id='.$groupMessageId);
            }

        }

        $messageGroup = $this->userModel->getMessageGroup($groupMessageId);
        $messages = $this->userModel->getMessages($groupMessageId);
        if($messageGroup['FromUser'] != $userId){
            $partnerId = $messageGroup['FromUser'];
        }else{
            $partnerId = $messageGroup['ToUser'];
        }
        $partner = $this->userModel->getUser($partnerId);     
        foreach($messages as &$msg){
            foreach($msg as &$value){
                $value = htmlspecialchars($value);
            }
        }   
        foreach($partner as &$value){
            $value = htmlspecialchars($value);
        }

        $this->controller->view('pageTitle', 'Chat Page');
        $this->controller->view('messages', $messages);
        $this->controller->view('partner', $partner);
        if(isset($_SESSION['messageError'])){
            $this->controller->view('msgError', htmlspecialchars($_SESSION['messageError']));
        }
        $this->controller->view('groupMessageId', htmlspecialchars($groupMessageId));
        $this->controller->view('userName', htmlspecialchars($_COOKIE['user_name']));
        $this->controller->view('userEmail', htmlspecialchars($_COOKIE['user_email']));
        $this->controller->view('userId', htmlspecialchars($_COOKIE['user_id']));
        
        $this->startEngine();
    }
    
    /**
     * startEngine
     *
     * @return void
     */
    public function startEngine(){
        $this->loadInclude('header');
        $this->loadTemplate('user-page');
        $this->loadInclude('footer');    


    }

}

/**
 * ChatAction
 * Action for chats page
 */
class ChatAction extends UserController{  
      
    /**
     * __construct
     *
     * @param  mixed $smarty
     * @param  mixed $controller
     * @return void
     */
    public function __construct($smarty,$controller){
        if(!$this->isLoggedIn()){
            Core::redirect('?controller=user&action=login');
        }

        $this->loadSmarty($smarty);
        $this->loadController($controller);
        $this->loadDatabase();
        $this->loadModels();
        $this->loadDatabases();

        $thisUrl = $_SERVER['REQUEST_URI'];
        $thisUrl = str_replace('/~abdykili/','',$thisUrl);

        $this->checkStyles($thisUrl);
        
        if(isset($_COOKIE['snow'])){
            $this->controller->view('snow', $_COOKIE['snow']);
        }
        if(isset($_COOKIE['dark'])){
            $this->controller->view('dark', $_COOKIE['dark']);
        }

        
        $messageGroups = $this->userModel->getMessagesGroup($_COOKIE['user_id']);
        foreach($messageGroups as &$msg){
            foreach($msg as &$value){
                $value = htmlspecialchars($value);
            }
        }  
        
        $this->controller->view('pageTitle', 'Chat Page');
        $this->controller->view('messageGroups', $messageGroups);
        $this->controller->view('userName', htmlspecialchars($_COOKIE['user_name']));
        $this->controller->view('userEmail', htmlspecialchars($_COOKIE['user_email']));
        $this->controller->view('userId', htmlspecialchars($_COOKIE['user_id']));
        
        $this->startEngine();
    }
    
    /**
     * startEngine
     *
     * @return void
     */
    public function startEngine(){
        $this->loadInclude('header');
        $this->loadTemplate('user-chat');
        $this->loadInclude('footer');    
    }
}

/**
 * PostAction
 * Action for posts page
 */
class PostAction extends UserController{
    public function __construct($smarty,$controller){
        if(!$this->isLoggedIn()){
            Core::redirect('?controller=user&action=login');
        }

        $this->loadSmarty($smarty);
        $this->loadController($controller);
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


        $userId = htmlspecialchars($_COOKIE['user_id']);
        $posts = $this->postModel->getPostByAuthorId($userId);
        foreach($posts as &$post){
            foreach($post as &$value){
                $value = htmlspecialchars($value);
            }
        }  
        $this->controller->view('pageTitle', 'Profile Posts Page');
        $this->controller->view('posts', $posts);
        $this->controller->view('userName', htmlspecialchars($_COOKIE['user_name']));
        $this->controller->view('userEmail', htmlspecialchars($_COOKIE['user_email']));
        $this->controller->view('userId', htmlspecialchars($_COOKIE['user_id']));
        
        $this->startEngine();
    }

    public function startEngine(){
        $this->loadInclude('header');
        $this->loadTemplate('user-posts');
        $this->loadInclude('footer');    


    }
}




/**
 * IndexAction
 * Default controllers action
 */
class IndexAction extends UserController{    
    
    /**
     * __construct
     *
     * @param  mixed $smarty
     * @param  mixed $controller
     * @return void
     */
    public function __construct($smarty,$controller){
        if(!$this->isLoggedIn()){
            Core::redirect('?controller=user&action=login');
        }
        // Core::deb($_SESSION);

        $this->loadSmarty($smarty);
        $this->loadController($controller);
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


        if(isset($_SESSION["user_upd_id_err"])){
            $this->controller->view('id_err', htmlspecialchars($_SESSION["user_upd_id_err"]));
        }
        if(isset($_SESSION["user_upd_name_err"])){
            $this->controller->view('name_err', htmlspecialchars($_SESSION["user_upd_name_err"]));
        }
        if(isset($_SESSION["user_upd_phone_err"])){
            $this->controller->view('phone_err', htmlspecialchars($_SESSION["user_upd_phone_err"]));
        }
        if(isset($_SESSION["user_upd_newpass_err"])){
            $this->controller->view('newpass_err', htmlspecialchars($_SESSION["user_upd_newpass_err"]));
        }
        if(isset($_SESSION["user_upd_oldpass_err"])){
            $this->controller->view('oldpass_err', htmlspecialchars($_SESSION["user_upd_oldpass_err"]));
        }


        $userPhone = $this->userModel->getPhoneByEmail($_COOKIE['user_email']);
        $this->controller->view('pageTitle', 'Profile Page');
        $this->controller->view('userName', htmlspecialchars($_COOKIE['user_name']));
        $this->controller->view('userEmail', htmlspecialchars($_COOKIE['user_email']));
        $this->controller->view('userId', htmlspecialchars($_COOKIE['user_id']));
        $this->controller->view('userPhone', htmlspecialchars($userPhone));
        
        $this->startEngine();
    }
    
    /**
     * startEngine
     *
     * @return void
     */
    public function startEngine(){
        $this->loadInclude('header');
        $this->loadTemplate('user');
        $this->loadInclude('footer');    


    }
}

/**
 * UpdateUserAction
 * Action for update user data
 */
class UpdateUserAction extends UserController{
    /**
     * __construct
     *
     * @param  mixed $smarty
     * @param  mixed $controller
     * @return void
     */
    public function __construct($smarty, $controller){

        if(!$this->isLoggedIn()){
            Core::redirect('?controller=user&action=login');
        }

        if(!isset($_POST['update'])){
            Core::redirect('');
        }
        

        $this->loadSmarty($smarty);
        $this->loadController($controller);
        $this->loadDatabase();
        $this->loadModels();
        $this->loadDatabases();

        // Sanitize POST Data
        $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
        
        // Process form
        $data = [
            'newName' => $_POST['new_name'],
            'newPhone' => $_POST['new_phone'],
            'userId' => $_POST['userId'],
            'newPass' => $_POST['new_pass'],
            'oldPass' => $_POST['pass'],
            'name_err' => '',
            'phone_err' => '',
            'id_err' => '',
            'newPass_err' => '',
            'oldPass_err' => '',
        ];

        //removing spaces 
        $data['newPhone'] = preg_replace('/\s+/', '', $data['newPhone']);
        $data['userId'] = preg_replace('/\s+/', '', $data['userId']);

        // Validate name
        if ( empty($data['newName']) ) {
            $_SESSION["user_upd_name_err"] = 'Please inform your name';
            $data['name_err'] = 'Please inform your name';
        } else {
            unset($_SESSION["user_upd_name_err"]);
            $data['name_err'] = '';  
        }

        // Validate if empty
        if ( empty($data['userId']) ) {
            $_SESSION["user_upd_id_err"] = 'Please inform your id';
            $data['id_err'] = 'Please inform your id';
        } else{
            // Check digits
            if (!ctype_digit($data['userId']) ) {
                $_SESSION["user_upd_id_err"] = 'Špatný obor hodnot! Jenom číslo';
                $data['id_err'] = 'Špatný obor hodnot! Jenom číslo';
            }
            else{
                unset($_SESSION["user_upd_id_err"]);
                $data['id_err'] = '';
            }
        }
        
        // Validate if empty
        if ( empty($data['newPhone']) ) {
            $_SESSION["user_upd_phone_err"] = 'Please inform your phone';
            $data['phone_err'] = 'Please inform your phone';
        } else{
            // Check digits
            if (!ctype_digit($data['newPhone']) ) {
                $_SESSION["user_upd_phone_err"] = 'Špatný obor hodnot! Jenom čísla';
                $data['phone_err'] = 'Špatný obor hodnot! Jenom čísla';
            }elseif(strlen($data['newPhone']) < 9 ){
                $_SESSION["user_upd_phone_err"] = 'Telefon musí být nejméně 9 znaků';
                $data['phone_err'] = 'Telefon musí být nejméně 9 znaků';
            }
            else{
                unset($_SESSION["user_upd_phone_err"]);
                $data['phone_err'] = '';
            }
        }

        // Validate Password
        if ( empty($data['newPass']) ) {
           $_SESSION["user_upd_newpass_err"] = 'Please inform your password';
           $data['newPass_err'] = 'Please inform your password';
        } elseif ( strlen($data['newPass']) < 6 ) {
           $_SESSION["user_upd_newpass_err"] = 'Heslo musí být nejméně 6 znaků';
           $data['newPass_err'] = 'Heslo musí být nejméně 6 znaků';
        }
        else{
            unset($_SESSION["user_reg_pass_err"]);
            $data['newPass_err'] = '';
        }

        // Validate Confirm Password
        if ( empty($data['oldPass']) ) {
            $_SESSION["user_upd_oldpass_err"] = 'Please inform your password';
            $data['oldPass_err'] = 'Please inform your password';
        } else if (!password_verify($data['oldPass'], $this->userModel->getPasswordById($data['userId']))) {
            $_SESSION["user_upd_oldpass_err"] = 'Heslo neodpovídá';
            $data['oldPass_err'] = 'Heslo neodpovídá';
        }else{
            $data['oldPass_err'] = '';
            unset($_SESSION["user_upd_oldpass_err"]);
        }

        //Make sure errors are empty
        if ( 
            empty($data['name_err']) &&
            empty($data['phone_err']) &&
            empty($data['id_err']) &&
            empty($data['newPass_err']) &&
            empty($data['oldPass_err']) 
        ) {
            $data['newPass'] = password_hash($data['newPass'], PASSWORD_DEFAULT);
            $update = $this->userModel->updateUser($data);
            if ($update) {
                $this->deleteSession();
                Core::redirect('?controller=user&action=login');
            } else {
                Core::redirect('?controller=user&action=index');
            }

        } else{
            $_SESSION["user_reg_name"] = $data['name'];
            $_SESSION["user_reg_surname"] = $data['surname'];
            $_SESSION["user_reg_phone"] = $data['phone'];
            $_SESSION["user_reg_email"] = $data['email'];
            Core::redirect('?controller=user&action=index');
        }
    }
}

/**
 * LogoutAction
 */
class LogoutAction extends UserController{    
    
    /**
     * __construct
     *
     * @param  mixed $smarty
     * @param  mixed $controller
     * @return void
     */
    public function __construct($smarty,$controller){
        if($this->isLoggedIn()){
           $this->deleteSession();
           $this->redirect();
        }
    }
}


/**
 * RegisterAction
 */
class RegisterAction extends UserController{
    
    /**
     * __construct
     *
     * @param  mixed $smarty
     * @param  mixed $controller
     * @return void
     */
    public function __construct($smarty,$controller){
        if($this->isLoggedIn()){
            Core::redirect('?controller=user&action=index');
        }
        $this->loadController($controller);
        $this->loadSmarty($smarty);

        $thisUrl = $_SERVER['REQUEST_URI'];
        $thisUrl = str_replace('/~abdykili/','',$thisUrl);

        $this->checkStyles($thisUrl);
        
        if(isset($_COOKIE['snow'])){
            $this->controller->view('snow', htmlspecialchars($_COOKIE['snow']));
        }
        if(isset($_COOKIE['dark'])){
            $this->controller->view('dark', htmlspecialchars($_COOKIE['dark']));
        }


        $this->controller->view('pageTitle', 'Register Page');
        if(isset($_SESSION["user_reg_name_err"])){
            $this->controller->view('name_err', htmlspecialchars($_SESSION["user_reg_name_err"]));
        }
        if(isset($_SESSION["user_reg_surname_err"])){
            $this->controller->view('surname_err', htmlspecialchars($_SESSION["user_reg_surname_err"]));
        }
        if(isset($_SESSION["user_reg_email_err"])){
            $this->controller->view('email_err', htmlspecialchars($_SESSION["user_reg_email_err"]));
        }
        if(isset($_SESSION["user_reg_phone_err"])){
            $this->controller->view('phone_err', htmlspecialchars($_SESSION["user_reg_phone_err"]));
        }
        if(isset($_SESSION["user_reg_pass_err"])){
            $this->controller->view('pass_err', htmlspecialchars($_SESSION["user_reg_pass_err"]));
        }
        if(isset($_SESSION["user_reg_confirm_err"])){
            $this->controller->view('confirm_err', htmlspecialchars($_SESSION["user_reg_confirm_err"]));
        }
        if(isset($_SESSION["form_err"])){
            $this->controller->view('form_err', htmlspecialchars($_SESSION["form_err"]));
        }

        if(isset($_SESSION["user_reg_name"])){
            $this->controller->view('user_reg_name', htmlspecialchars($_SESSION["user_reg_name"]));
        }
        if(isset($_SESSION["user_reg_surname"])){
            $this->controller->view('user_reg_surname', htmlspecialchars($_SESSION["user_reg_surname"]));
        }
        if(isset($_SESSION["user_reg_phone"])){
            $this->controller->view('user_reg_phone', htmlspecialchars($_SESSION["user_reg_phone"]));
        }
        if(isset($_SESSION["user_reg_email"])){
            $this->controller->view('user_reg_email', htmlspecialchars($_SESSION["user_reg_email"]));
        }

        
        $this->startEngine();
    }
    
    /**
     * startEngine
     *
     * @return void
     */
    public function startEngine(){
        $this->loadInclude('header');
        $this->loadTemplate('registration');
        $this->loadInclude('footer');    
    }
}



/**
 * AddUserAction
 * Action for user registration
 */
class AddUserAction extends UserController{
    
    /**
     * __construct
     *
     * @param  mixed $smarty
     * @param  mixed $controller
     * @return void
     */
    public function __construct($smarty, $controller){

        if(!isset($_POST['register'])){
            Core::redirect('');
        }

        $this->loadSmarty($smarty);
        $this->loadController($controller);
        $this->loadDatabase();
        $this->loadModels();
        $this->loadDatabases();

        // Sanitize POST Data
        $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
        
        // Process form
        $data = [
            'name' => $_POST['name'],
            'surname' => $_POST['last_name'],
            'phone' => $_POST['phone'],
            'email' => $_POST['email'],
            'password' => $_POST['pass'],
            'confirm_password' => $_POST['pass_confirm'],
            'name_err' => '',
            'surname_err' => '',
            'phone_err' => '',
            'email_err' => '',
            'password_err' => '',
            'confirm_password_err' => '',
            'errors' => ''
        ];

        //removing spaces 
        $data['phone'] = preg_replace('/\s+/', '', $data['phone']);
        $data['email'] = preg_replace('/\s+/', '', $data['email']);

        // Validate name
        if ( empty($data['name']) ) {
            $_SESSION["user_reg_name_err"] = 'Please inform your name';
            $data['name_err'] = 'Please inform your name';
        } else {
            unset($_SESSION["user_reg_name_err"]);
            $data['name_err'] = '';
        }

        // Validate name
        if ( empty($data['surname']) ) {
            $_SESSION["user_reg_surname_err"] = 'Please inform your surname';
            $data['surname_err'] = 'Please inform your name';
        } else {
    
            unset($_SESSION["user_reg_surname_err"]);
            $data['surname_err'] = '';
    
        }
        
        // Validate if empty
        if ( empty($data['phone']) ) {
            $_SESSION["user_reg_phone_err"] = 'Please inform your phone';
            $data['phone_err'] = 'Please inform your phone';
        } else{
            // Check digits
            if (!ctype_digit($data['phone']) ) {
                $_SESSION["user_reg_phone_err"] = 'Špatný obor hodnot! Jenom čísla';
                $data['phone_err'] = 'Špatný obor hodnot! Jenom čísla';
            }elseif(strlen($data['phone']) < 9 ){
                $_SESSION["user_reg_phone_err"] = 'Telefon musí být nejméně 9 znaků';
                $data['phone_err'] = 'Telefon musí být nejméně 9 znaků';
            }
            else{
                unset($_SESSION["user_reg_phone_err"]);
                $data['phone_err'] = '';
            }
        }

        // Validate email
        if ( empty($data['email']) ) {
            $_SESSION["user_reg_email_err"] = 'Please inform your email';
            $data['email_err'] = 'Please inform your email';
        } else {
            // Check email
            if ( $this->userModel->getUserByEmail($data['email']) ) {
                $_SESSION["user_reg_email_err"] = 'E-mail už existuje!';
                $data['email_err'] = 'E-mail už existuje!';
            }
            else{
                unset($_SESSION["user_reg_email_err"]);
                $data['email_err'] = '';
            }
        }

        // Validate Password
        if ( empty($data['password']) ) {
           $_SESSION["user_reg_pass_err"] = 'Please inform your password';
           $data['password_err'] = 'Please inform your password';
        } elseif ( strlen($data['password']) < 6 ) {
           $_SESSION["user_reg_pass_err"] = 'Heslo musí být nejméně 6 znaků';
           $data['password_err'] = 'Heslo musí být nejméně 6 znaků';
        }
        else{
            unset($_SESSION["user_reg_pass_err"]);
            $data['password_err'] = '';
        }

        // Validate Confirm Password
        if ( empty($data['confirm_password']) ) {
            $_SESSION["user_reg_confirm_err"] = 'Please inform your password';
            $data['confirm_password_err'] = 'Please inform your password';
        } 
         else if ( $data['password'] != $data['confirm_password'] ) {
            $_SESSION["user_reg_confirm_err"] = 'Heslo neodpovídá!';
            $data['confirm_password_err'] = 'Heslo neodpovídá!';
        }
    

        //Make sure errors are empty
        if ( 
            empty($data['name_err']) &&
            empty($data['surname_err']) &&
            empty($data['phone_err']) &&
            empty($data['email_err']) &&
            empty($data['password_err']) && 
            empty($data['confirm_password_err']) 
        ) {
          
            // Hash Password
            $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);
            $reg = $this->userModel->registerUser($data);
            if ($reg) {
                $data['id'] = $this->userModel->getUserByEmail($data['email']);
                $this->startSession($data);
                Core::redirect('?controller=user&action=index');
            } else {
                $_SESSION['form_err'] = 'hasnt registrated';
                Core::redirect('?controller=user&action=register');
            }

        } else{
            $_SESSION["user_reg_name"] = $data['name'];
            $_SESSION["user_reg_surname"] = $data['surname'];
            $_SESSION["user_reg_phone"] = $data['phone'];
            $_SESSION["user_reg_email"] = $data['email'];
            Core::redirect('?controller=user&action=register');
        }
    }
}


/**
 * LoginAction 
 * Action for login interface
 */
class LoginAction extends UserController{
 
    
    /**
     * __construct
     *
     * @param  mixed $smarty
     * @param  mixed $controller
     * @return void
     */
    public function __construct($smarty,$controller){
        if($this->isLoggedIn()){
            Core::redirect('?controller=user&action=index');
        }
        $this->loadController($controller);
        $this->loadSmarty($smarty);

        $thisUrl = $_SERVER['REQUEST_URI'];
        $thisUrl = str_replace('/~abdykili/','',$thisUrl);

        $this->checkStyles($thisUrl);
        
        if(isset($_COOKIE['snow'])){
            $this->controller->view('snow', htmlspecialchars($_COOKIE['snow']));
        }
        if(isset($_COOKIE['dark'])){
            $this->controller->view('dark', htmlspecialchars($_COOKIE['dark']));
        }

        //errors
        if(isset($_SESSION["user_login_email_err"])){
            $this->controller->view('email_err', htmlspecialchars($_SESSION["user_login_email_err"]));
        }
        if(isset($_SESSION["user_login_pass_err"])){
            $this->controller->view('pass_err', htmlspecialchars($_SESSION["user_login_pass_err"]));
        }
        
        //values
        if(isset($_SESSION["user_login_email"])){
            $this->controller->view('user_login_email', htmlspecialchars($_SESSION["user_login_email"]));
        }



        $this->controller->view('pageTitle', 'Login Page');
        $this->startEngine();
    }
    
    /**
     * startEngine
     *
     * @return void
     */
    public function startEngine(){
        $this->loadInclude('header');
        $this->loadTemplate('login');
        $this->loadInclude('footer');    
    }
}


/**
 * LoginUserAction
 * Action for login into account
 */
class LoginUserAction extends UserController{
            
    /**
     * __construct
     *
     * @param  mixed $smarty
     * @param  mixed $controller
     * @return void
     */
    public function __construct($smarty, $controller){
        
        if(!isset($_POST['login'])){
            Core::redirect('');
        }
        $this->loadSmarty($smarty);
        $this->loadController($controller);
        $this->loadDatabase();
        $this->loadModels();
        $this->loadDatabases();

        // Sanitize POST Data
        $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

        // Process form
        $data = [
            'email' => $_POST['email'],
            'password' => $_POST['password'], 
            'email_err' => '',
            'confirm_password_err' => '',
            'password_err' => ''
        ];

        // Validate email
        if ( empty($data['email']) ) {
            $_SESSION["user_login_email_err"] = 'Please inform your email';
            $data['email_err'] = 'Please inform your email';
        } else {
            // Check email
            if ( !$this->userModel->getUserByEmail($data['email']) ) {
                $_SESSION["user_login_email_err"] = 'E-mail neexistuje!';
                $data['email_err'] = 'E-mail neexistuje!';
            }else{
                unset($_SESSION["user_login_email_err"]);
                $data['email_err'] = '';
            }
        }

        // Validate Password
        if ( empty($data['password']) ) {
           $_SESSION["user_login_pass_err"] = 'Please inform your password';
           $data['password_err'] = 'Please inform your password';
        } elseif ( strlen($data['password']) < 6 ) {
           $_SESSION["user_login_pass_err"] = 'Heslo musí být nejméně 6 znaků';
           $data['password_err'] = 'Heslo musí být nejméně 6 znaků';
        }else{
            unset($_SESSION["user_login_pass_err"]);
            $data['password_err'] = '';
        }
        
        if(empty($data['password_err']) && empty($data['email_err'])){
            if(password_verify($data['password'], $this->userModel->getPasswordByEmail($data['email']))){
                unset($_SESSION["user_login_pass_err"]);
                $data['confirm_password_err'] = '';
            }
            else{
                $_SESSION["user_login_pass_err"] = 'Heslo neodpovídá!';
                $data['confirm_password_err'] = 'Heslo neodpovídá!';
            }
        }

        //Make sure errors are empty
        if ( 
            empty($data['email_err']) &&
            empty($data['password_err']) && 
            empty($data['confirm_password_err']) 
        ) {
            $data['id'] = $this->userModel->getUserByEmail($data['email']);
            $data['name'] = $this->userModel->getNameByEmail($data['email']);
            $this->startSession($data);
            Core::redirect('?controller=user&action=index');
    
        } else{
            $_SESSION["user_login_email"] = $data['email'];
            Core::redirect('?controller=user&action=login');
        }     
    }
}


