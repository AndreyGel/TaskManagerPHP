<?php
if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    require 'TasksManager.php';
    $query = new TasksManager();
    $query->deleteTask($_GET['id']);
    header("Location: /list.php");
    exit;
}