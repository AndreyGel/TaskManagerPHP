<?php


class UserController
{
    private $userInstance;

    public function __construct()
    {
        $this->userInstance = new User();
    }

    public function actionLoginForm()
    {
        require_once ROOT . '/views/user/login-form.php';
    }

    public function actionLogin()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            Validate::checkAtEmpty();
            $userData = $this->userInstance->login();

            if (session_id() == '') session_start();
            $_SESSION['logged_user'] = md5($userData['id']);
            $_SESSION['logged_user_email'] = $userData['email'];
            header("Location: /task/list");
            exit;
        } else {
            header("Location: /user/loginForm");
            exit;
        }
    }

    public function actionRegisterForm()
    {
        require_once ROOT . '/views/user/register-form.php';
    }

    public function actionRegister()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            Validate::checkAtEmpty();
            Validate::emailValidate();

            $this->userInstance->register();
            header("Location: /user/loginForm");
            exit;
        } else {
            header("Location: /user/loginForm");
            exit;
        }
    }

    public function actionLogout()
    {
        $this->userInstance->logout();
        header("Location: /user/loginForm");
        exit;
    }

}