<?php
/**
 * 
 * Main config file
 * Define global variables (prefixes, db constants)
 */

//> Константы для обращения к контроллерам
define ('PathPrefix', 'controllers/');
define ('PathPostfix', 'Controller.php');
//<

// Database Params
define('DB_HOST','localhost');
define('DB_USER','abdykili');
define('DB_PASS','281001ilyas');
define('DB_NAME','abdykili');
define('DB_CHARSET','utf8');

//> используемый шаблон 
$template = 'default';

// пути к файлам шаблонов (*.tpl)
define ('TemplatePrefix', "views/{$template}/");
define ('TemplatePostfix', '.tpl');

// пути к файлам шаблонов в вебпространстве
define ('TemplateWebPath', "/templates/{$template}/");
//<

//> Инициализация шаблонизатора Smarty
// put full path to Smarty.class.php
require('library/smarty/libs/Smarty.class.php');
$smarty = new Smarty();

$smarty->setTemplateDir(TemplatePrefix);
$smarty->setCompileDir('tmp/smarty/templates_c');
$smarty->setCacheDir('tmp/smarty/cache');
$smarty->setConfigDir('library/smarty/demo/configs');

$smarty->assign('teplateWebPath', TemplateWebPath);
//<
