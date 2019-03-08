<?php
class TasksManager {
    private $pdo;
    public function __construct() {
        $this->pdo = new PDO("mysql:host=localhost; dbname=test", "root", "");
    }

    public function addTask() {
        //add picture
        $imgName = basename($_FILES['image']['name']);
        $uploadPath = 'upload/'.$imgName;
        move_uploaded_file($_FILES['image']['tmp_name'], $uploadPath);

        $title = $_POST['title'];
        $description = $_POST['description'];
        $image = $uploadPath;

        //add tasks
        $sql = "INSERT INTO tasks (title, description, image) VALUES (:title, :description, :image)";
        $statement = $this->pdo->prepare($sql);
        $statement->bindParam(':title', $title, PDO::PARAM_STR);
        $statement->bindParam(':description', $description, PDO::PARAM_STR);
        $statement->bindParam(':image', $image, PDO::PARAM_STR);
        $statement->execute();
    }
    public function editTask($id) {
        //add image
        $imgName = basename($_FILES['image']['name']);
        $uploadPath = 'upload/'.$imgName;
        move_uploaded_file($_FILES['image']['tmp_name'], $uploadPath);

        $title = $_POST['title'];
        $description = $_POST['description'];
        $image = $uploadPath;

        $sql = "UPDATE tasks SET title = :title, description = :description, image = :image WHERE id = :id";
        $statement = $this->pdo->prepare($sql);
        $statement->bindParam(':id', $id, PDO::PARAM_STR);
        $statement->bindParam(':title', $title, PDO::PARAM_STR);
        $statement->bindParam(':description', $description, PDO::PARAM_STR);
        $statement->bindParam(':image', $image, PDO::PARAM_STR);
        $statement->execute();
    }
    public function getAllTasks() {
        $sql = "SELECT id, title, description,image FROM tasks ";
        $statement = $this->pdo->prepare($sql);
        $statement->execute();
        $tasks = $statement->fetchAll(PDO::FETCH_ASSOC);
        return $tasks;
    }
    public function getTask($id) {
        $sql = "SELECT title, description, image FROM tasks WHERE id = :id";
        $statement = $this->pdo->prepare($sql);
        $statement->bindParam(':id', $id, PDO::PARAM_STR);
        $statement->execute();
        $task = $statement->fetch(PDO::FETCH_ASSOC);
        return $task;
    }
    public function deleteTask($id) {
        $sql = "DELETE FROM tasks WHERE id = :id";
        $statement = $this->pdo->prepare($sql);
        $statement->bindParam(':id', $id, PDO::PARAM_STR);
        $statement->execute();
        $statement->fetch(PDO::FETCH_ASSOC);
    }
}