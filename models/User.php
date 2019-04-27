<?php

class User
{
    private $data;
    private $qb;

    public function __construct()
    {
        $this->qb = new QueryBuilder('users');
        $this->data['user_name'] = $_POST['user_name']?? '';
        $this->data['email'] = $_POST['email']?? '';
    }

    public function register()
    {
        $this->data['password'] = password_hash($_POST['password'], PASSWORD_DEFAULT);
        $result = $this->qb->select('email', false, $this->data,'email' );

        if ($result) {
            $errorMessage = 'Пользователь с таким email уже существует.';
            include ROOT.'/errors.php';
            exit;
        }
        $this->qb->insert('user_name, email, password',$this->data);
        return true;
    }

    public function login()
    {
        $result = $this->qb->select('id, password, user_name',false, $this->data,'email' );
        if (!$result || !password_verify($_POST['password'], $result['password']))
        {
            $errorMessage = 'Неправильный логин или пароль';
            include ROOT.'/errors.php';
            exit;
        }
        $userData = [
            'id' =>  $result['id'],
            'email' => $this->data['email'],
            'user_name' => $result['user_name']
        ];
        return $userData;
    }

    public function logout()
    {
        if (!isset($_SESSION['logged_user'])) {
            header('Location: /user/loginForm');
        }
        unset($_SESSION['logged_user']);
        unset($_SESSION['logged_user_email']);

        header('Location: /user/loginForm');
        exit;
    }

}