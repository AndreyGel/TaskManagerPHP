<?php

require_once __DIR__ . '/vendor/autoload.php';

use TaskManager\Classes\Auth;
use TaskManager\Classes\Validate;


if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    Validate::checkAtEmpty();

    $login = new Auth();
    $userData = $login->login();

    session_start();
    $_SESSION['logged_user'] = md5($userData['id']);
    $_SESSION['logged_user_email'] = $userData['email'];
    header("Location: /list.php");
    exit;
}