<?php


class TaskController
{
    private $taskInstance;

    public function __construct()
    {
        $this->taskInstance = new Task();
        if(session_id() == '') session_start();
        if (!isset($_SESSION['logged_user'])) {
            header("Location: /user/loginForm");
            exit;
        }
    }

    public function actionShow($id)
    {
        $task = $this->taskInstance->getSingle($id) ?? '';
        require_once ROOT . '/views/task/show.php';
        return true;
    }

    public function actionList()
    {
            $tasks = $this->taskInstance->getAll() ?? array();
            require_once ROOT . '/views/task/list.php';
            return true;
    }

    public function actionEditForm($id)
    {
        Validate::checkAtEmpty();
        $taskId = $id;
        $task = $this->taskInstance->getSingle($id) ?? '';
        require_once ROOT . '/views/task/edit-form.php';
        return true;

    }

    public function actionEdit($id)
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            Validate::checkAtEmpty();
            $this->taskInstance->edit($id);
        }
        header("Location: /task/list");
        return true;

    }

    public function actionCreateForm()
    {
        require_once ROOT . '/views/task/create-form.php';
        return true;
    }

    public function actionCreate()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            Validate::checkAtEmpty();
            $this->taskInstance->add();
        }
        header("Location: /task/list");
        return true;
    }

    public function actionDelete($id)
    {
        if (isset($_SERVER['HTTP_REFERER'])) {
            $this->taskInstance->delete($id);
        }
        header("Location: /task/list");
        return true;
    }

}