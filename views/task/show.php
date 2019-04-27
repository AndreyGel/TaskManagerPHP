    <!doctype html>
    <html lang="en">
    <head>
        <meta charset="utf-8">

        <title>Show</title>

        <!-- Bootstrap core CSS -->
        <link href="/assets/css/bootstrap.css" rel="stylesheet">
        <link href="/assets/css/style.css" rel="stylesheet">

        <style>

        </style>
    </head>

    <body>
    <div class="form-wrapper text-center">
        <img src="<?='http://'.$_SERVER['HTTP_HOST'].'/'.$task['image'] ?>" alt="" width="400">
        <h2><?= $task['title'] ?></h2>
        <p><?= $task['description'] ?></p>
        <a href="<?= $_SERVER['HTTP_REFERER'] ?>">Назад</a>
    </div>
    </body>
    </html>
