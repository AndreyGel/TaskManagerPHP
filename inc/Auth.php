<?php
namespace TaskManager\Classes;
class Auth
{
    private $data;
    private $qb;

    public function __construct()
    {
        $this->qb = new QueryBuilder('users');
        $this->data['user_name'] = $_POST['user_name'];
        $this->data['email'] = $_POST['email'];
        $this->data['password'] = md5($_POST['password']);
    }

    public function register()
    {
        $result = $this->qb->select('email', false, $this->data,'email' );

        if ($result) {
            $errorMessage = 'Пользователь с таким email уже существует.';
            include '../errors.php';
            exit;
        }
        $this->qb->insert('user_name, email, password',$this->data);
        return true;
    }

    public function login()
    {
        $result = $this->qb->select('id, password, user_name',false, $this->data,'email' );
        if ($this->data['password'] !== $result['password'])
        {
            $errorMessage = 'Неправильный логин или пароль';
            include '../errors.php';
            exit;
        }
        $userData = [
            'id' =>  $result['id'],
            'email' => $this->data['email'],
            'user_name' => $result['user_name']
        ];
        return $userData;
    }

}