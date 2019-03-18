<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
//check for emptiness
    require 'Validate.php';
    Checks::checkAtEmpty();
//edit
    require 'TasksManager.php';
    $query = new TasksManager();
    $query->editTask($_GET['id']);
    header("Location: /list.php");
    exit;
}