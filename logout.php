<?php
session_start();

if (!isset($_SESSION['logged_user'])) {
    header('Location: /login-form.php');
    exit;
}
unset($_SESSION['logged_user']);
unset($_SESSION['logged_user_email']);

header("Location: /login-form.php");
exit;