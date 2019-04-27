<?php
require_once __DIR__ . '/vendor/autoload.php';

use TaskManager\Classes\TasksManager;

if ($_SERVER['REQUEST_METHOD'] == 'GET') {

    $query = new TasksManager();
    $query->deleteTask($_GET['id']);
    header("Location: /list.php");
    exit;
}