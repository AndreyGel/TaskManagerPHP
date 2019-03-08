<?php


class Auth
{
    private $pdo;
    private $user_name;
    private $email;
    private $password;

    public function __construct(){
        $this->pdo = new PDO("mysql:host=localhost; dbname=test", "root", "");
        $this->user_name = $_POST['user_name'];
        $this->email = $_POST['email'];
        $this->password = md5($_POST['password']);
    }

    public function register() {

        $sql = "SELECT email FROM users WHERE email=:email";
        $statement = $this->pdo->prepare($sql);
        $statement->bindParam(":email", $this->email);
        $statement->execute();

        if ($statement->fetch(PDO::FETCH_ASSOC)) {
            $errorMessage = 'Пользователь с таким email уже существует.';
            include 'errors.php';
            exit;
        }

        $sql = "INSERT INTO users (user_name,email, password) VALUES (:user_name, :email, :password)";
        $statement = $this->pdo->prepare($sql);
        $statement->bindParam(':user_name', $this->user_name, PDO::PARAM_STR);
        $statement->bindParam(':email', $this->email, PDO::PARAM_STR);
        $statement->bindParam(':password', $this->password, PDO::PARAM_STR);
        $statement->execute();
        return true;
    }
    public function login() {

        $sql = "SELECT id FROM users WHERE email=:email AND password=:password";
        $statement = $this->pdo->prepare($sql);
        $statement->bindParam(":email", $this->email);
        $statement->bindParam(":password", $this->password);
        $statement->execute();
        $result = $statement->fetch(PDO::FETCH_ASSOC);

        if ($result['id'] == null) {
            $errorMessage = 'Неправильный логин или пароль';
            include 'errors.php';
            exit;
        }
        $userData = [
            'id' => $result['id'],
            'email' => $this->email
        ];
        return $userData;
    }
}