<?php

//get data from the user
$user_name = $_POST['user_name'];
$email = $_POST['email'];
$password = md5($_POST['password']);

//check for emptiness
foreach ($_POST as $input) {
    if (empty($input)) {
        include 'errors.php';
        exit;
    }
}

//connect database
$pdo = new PDO("mysql:host=localhost; dbname=test", "root", "");

//check email
$sql = "SELECT email FROM users WHERE email=:email";
$statement = $pdo->prepare($sql);
$statement->bindParam(":email",$email);
$statement->execute();
if ($statement->fetch(PDO::FETCH_ASSOC)) {
    $errorMessage = 'Пользователь с таким email уже существует.';
    include 'errors.php';
    exit;
}


//add user
$sql = "INSERT INTO users (user_name,email, password) VALUES (:user_name, :email, :password)";
$statement = $pdo->prepare($sql);
$statement->bindParam(':user_name', $user_name,PDO::PARAM_STR);
$statement->bindParam(':email', $email,PDO::PARAM_STR);
$statement->bindParam(':password', $password,PDO::PARAM_STR);
$statement->execute();

header("Location: /login-form.php");
exit;


