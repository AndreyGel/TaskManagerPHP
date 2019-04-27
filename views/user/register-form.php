<!doctype html>
<html lang="ru">
<head>
    <meta charset="utf-8">

    <title>Register</title>

    <!-- Bootstrap core CSS -->
    <link href="/assets/css/bootstrap.css" rel="stylesheet">
    <link href="/assets/css/style.css" rel="stylesheet">

    <style>

    </style>
</head>

<body>
<div class="form-wrapper text-center">
    <form class="form-signin" action="/user/register" method="post">
        <img class="mb-4" src="/assets/img/bootstrap-solid.svg" alt="" width="72" height="72">
        <h1 class="h3 mb-3 font-weight-normal">Регистрация</h1>
        <label for="name" class="sr-only">Имя</label>
        <input type="text" name="user_name" id="name" class="form-control" placeholder="Имя">
        <label for="email" class="sr-only">Email</label>
        <input type="email" name="email" id="Email" class="form-control" placeholder="Email">
        <label for="password" class="sr-only">Пароль</label>
        <input type="password" name ="password" id="password" class="form-control" placeholder="Пароль">
        <button class="btn btn-lg btn-primary btn-block" type="submit">Зарегистрироваться</button>
        <a href="/user/loginForm">Войти</a>
        <p class="mt-5 mb-3 text-muted">&copy; 2018-2019</p>
    </form>
</div>
</body>
</html>
