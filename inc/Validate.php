<?php
namespace TaskManager\Classes;

class Validate
{
    public static function checkAtEmpty()
    {
        foreach ($_POST as $input) {
            if (empty($input)) {
                include '../errors.php';
                exit;
            }
        }
    }

    public static function emailValidate()
    {
        if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
            $errorMessage = 'Некорректный email!';
            include '../errors.php';
            exit;
        }
    }
}