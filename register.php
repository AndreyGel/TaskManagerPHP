<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    require 'Validate.php';
    require 'Auth.php';
    Validate::checkAtEmpty();
    Validate::emailValidate();
    $register = new Auth();
    $register->register();

    header("Location: /login-form.php");
    exit;
}
