<?php
ob_start();
session_start();
include_once('config/config.php'); // load main config file, where are defined smarty, global variables, db settings
include_once('library/Core.php'); // load core file, where are defined main functions

// get controller name by url, if not then controller is Index by default
$controller = isset($_GET["controller"]) ? ucfirst($_GET["controller"]) : "Index";

// get action name by url, if not then action is Index by default
$action = isset($_GET["action"]) ? ucfirst($_GET["action"]) : "Index";

// init core file
$core = new Core($smarty);

// load page according to controller and action
$core->loadPage($core,strip_tags($controller),strip_tags($action));

