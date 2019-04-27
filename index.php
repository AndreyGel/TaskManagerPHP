<?php
// FRONT CONTROLLER

// Общие настройки
ini_set('display_errors',1);
error_reporting(E_ALL);

session_start();

// Подключение файлов системы
define('ROOT', dirname(__FILE__));
require_once (ROOT.'/components/Router.php');
require_once (ROOT.'/components/QueryBuilder.php');
require_once (ROOT.'/components/Validate.php');
require_once (ROOT.'/models/Task.php');
require_once (ROOT.'/models/User.php');


// Вызов Router
$router = new Router();
$router->run();