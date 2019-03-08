<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
//check for emptiness
    require 'Checks.php';
    Checks::checkAtEmpty();

    require 'Auth.php';
    $register = new Auth();
    $register->register();

    header("Location: /login-form.php");
    exit;
}
