<?php
require_once __DIR__ . '/vendor/autoload.php';

use TaskManager\Classes\Auth;
use TaskManager\Classes\Validate;


if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    Validate::checkAtEmpty();
    Validate::emailValidate();
    $register = new Auth();
    $register->register();

    header("Location: /login-form.php");
    exit;
}
