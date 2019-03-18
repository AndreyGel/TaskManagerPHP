<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
//check for emptiness
    require 'Validate.php';
    Checks::checkAtEmpty();
//add
    require 'TasksManager.php';
    $query = new TasksManager();
    $query->addTask();
    header("Location: /list.php");
    exit;

}