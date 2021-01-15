<?php
/**
 * 
 * Main config file
 * Define global variables (prefixes, db constants)
 */

//> constants
define ('PathPrefix', 'controllers/');
define ('PathPostfix', 'Controller.php');
//<

// Database Params
define('DB_HOST','localhost');
define('DB_USER','abdykili');
define('DB_PASS','281001ilyas');
define('DB_NAME','abdykili');
define('DB_CHARSET','utf8');

//> using template 
$template = 'default';

// paths to templates (*.tpl)
define ('TemplatePrefix', "views/{$template}/");
define ('TemplatePostfix', '.tpl');

// paths in www 
define ('TemplateWebPath', "/templates/{$template}/");
//<

//> Template Smarty init 
// put full path to Smarty.class.php
require('library/smarty/libs/Smarty.class.php');
$smarty = new Smarty();

$smarty->setTemplateDir(TemplatePrefix);
$smarty->setCompileDir('tmp/smarty/templates_c');
$smarty->setCacheDir('tmp/smarty/cache');
$smarty->setConfigDir('library/smarty/demo/configs');

$smarty->assign('teplateWebPath', TemplateWebPath);
//<
