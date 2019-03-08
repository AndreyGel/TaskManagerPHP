<?php
session_start();
if ($_SESSION['logged_user']) :?>
<!doctype html>
<html lang="ru">
  <head>
    <meta charset="utf-8">

    <title>Create Task</title>

    <!-- Bootstrap core CSS -->
    <link href="markup/assets/css/bootstrap.css" rel="stylesheet">
    <link href="markup/assets/css/style.css" rel="stylesheet">
    
    <style>
      
    </style>
  </head>

  <body>
    <div class="form-wrapper text-center">
      <form class="form-signin" action="create.php" method="post" enctype="multipart/form-data">
        <img class="mb-4" src="markup/assets/img/bootstrap-solid.svg" alt="" width="72" height="72">
        <h1 class="h3 mb-3 font-weight-normal">Добавить запись</h1>
        <label for="title" class="sr-only">Название</label>
        <input type="text" name="title" id="title" class="form-control" placeholder="Название">
        <label for="description" class="sr-only">Описание</label>
        <textarea name="description" id="description" class="form-control" cols="30" rows="10" placeholder="Описание"></textarea>
        <input type="file" name="image">
        <button class="btn btn-lg btn-primary btn-block" type="submit">Отправить</button>
        <p class="mt-5 mb-3 text-muted">&copy; 2018-2019</p>
      </form>
    </div>
  </body>
</html>
<?php else:
    header("Location: /login-form.php");
    exit;
    endif;
?>