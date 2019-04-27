<!doctype html>
    <html lang="ru">
    <head>
        <meta charset="utf-8">

        <title>Edit Task</title>

        <!-- Bootstrap core CSS -->
        <link href="/assets/css/bootstrap.css" rel="stylesheet">
        <link href="/assets/css/style.css" rel="stylesheet">

        <style>

        </style>
    </head>

    <body>
    <div class="form-wrapper text-center">
        <form class="form-signin" action="/task/edit/<?=$taskId?>" method="post" enctype="multipart/form-data">
            <img class="mb-4" src="/assets/img/bootstrap-solid.svg" alt="" width="72" height="72">
            <h1 class="h3 mb-3 font-weight-normal">Добавить запись</h1>
            <label for="title" class="sr-only">Название</label>
            <input type="text" id="title" name="title" class="form-control" p laceholder="Название" required
                   value="<?= $task['title'] ?>">
            <label for="description" class="sr-only">Описание</label>
            <textarea name="description" id="description" class="form-control" cols="30" rows="10"
                      placeholder="Описание"><?= $task['description'] ?></textarea>
            <input id="file" type="file" name="image">
            <img src="<?='http://'.$_SERVER['HTTP_HOST'].'/'.$task['image'] ?>" alt="" width="300" class="mb-3">
            <button class="btn btn-lg btn-success btn-block" type="submit">Редактировать</button>
            <input type="hidden" name="old_image" value="<?= $task['image'] ?>"">
            <p class="mt-5 mb-3 text-muted">&copy; 2018-2019</p>
        </form>
    </div>
    </body>
    </html>