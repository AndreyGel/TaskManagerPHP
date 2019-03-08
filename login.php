<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
//check for emptiness
    require 'Checks.php';
    Checks::checkAtEmpty();

    require 'Auth.php';
    $login = new Auth();
    $userData = $login->login();
    session_start();
    $_SESSION['logged_user'] = md5($userData['id']);
    $_SESSION['logged_user_email'] = $userData['email'];

    header("Location: /list.php");
    exit;
}