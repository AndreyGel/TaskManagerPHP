<?php


class Checks
{
public static function checkAtEmpty() {
    foreach ($_POST as $input) {
        if (empty($input)) {
            include 'errors.php';
            exit;
        }
    }
}
}