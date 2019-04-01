<?php
require_once __DIR__ . '/vendor/autoload.php';

use TaskManager\Classes\TasksManager;
use TaskManager\Classes\Validate;

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
//check for emptiness
    Validate::checkAtEmpty();
//add

    $query = new TasksManager();
    $query->addTask();
    header("Location: /list.php");
    exit;

}