<?php
session_start();
if ($_SESSION['logged_user']) :
    require 'TasksManager.php';
    $query = new TasksManager();
    $task = $query->getTask($_GET['id']);
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">

    <title>Show</title>

    <!-- Bootstrap core CSS -->
    <link href="markup/assets/css/bootstrap.css" rel="stylesheet">
    <link href="markup/assets/css/style.css" rel="stylesheet">
    
    <style>
      
    </style>
  </head>

  <body>
    <div class="form-wrapper text-center">
      <img src="<?=$task['image']?>" alt="" width="400">
      <h2><?=$task['title']?></h2>
      <p><?=$task['description']?></p>
      <a href="<?=$_SERVER['HTTP_REFERER']?>">Назад</a>
    </div>
  </body>
</html>
<?php else:
    header("Location: /login-form.php");
    exit;
endif;
?>