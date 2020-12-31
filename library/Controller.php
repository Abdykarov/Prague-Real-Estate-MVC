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
     * model
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
     * view
     *
     * @param  mixed $view
     * @param  mixed $data
     * @return void
     */
    public function view($view, $data){
        $this->smarty->assign($view, $data);
    }
}