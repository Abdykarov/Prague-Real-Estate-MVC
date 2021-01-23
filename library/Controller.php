<?php

/**
 * Controller class
 * Loads models and views
 */
class Controller extends Core{ 
    public $smarty;
    
    /**
     * __construct
     *
     * @param  mixed $smarty
     * @return void
     */
    public function __construct($smarty){
        $this->smarty = $smarty;
    }
    
    /**
     * model - includes model file
     *
     * @param  mixed $model
     * @return void
     */
    public function model($model){  
        include_once('models/'.$model.'Model.php');
        $init = new $model;
        return $init;
    }
    
    /**
     * view - create new variabl and sends data to the view layer
     *
     * @param  mixed $view
     * @param  mixed $data
     * @return void
     */
    public function view($view, $data){
        $this->smarty->assign($view, $data);
    }
}