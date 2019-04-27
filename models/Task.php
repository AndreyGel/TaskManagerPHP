<?php

class Task
{
    private $qb;
    private $data;

    public function __construct()
    {
        $this->qb = new QueryBuilder('tasks');
        $this->data['title'] = $_POST['title']?? '';
        $this->data['description'] = $_POST['description']?? '';
    }

    public function add()
    {
        $this->data['image'] = $this->addPicture();
        $this->qb->insert('title, description, image', $this->data);
        return true;
    }

    public function edit($id)
    {
        $old_image = $_POST['old_image'] ?? null;
        $this->data['image'] = $this->addPicture($old_image);
        $this->qb->update('title, description, image', $this->data, $id);
        return true;
    }

    public function getAll()
    {
        $tasks = $this->qb->select('id, title, description, image', true);
        return $tasks;
    }

    public function getSingle($id)
    {
        $task = $this->qb->select('title, description, image', false, ['id' => $id], 'id');
        return $task;
    }

    public function delete($id)
    {
        $this->qb->delete(['id' => $id]);
        return true;
    }

    private function addPicture($old_image = null)
    {
        if (empty($_FILES['image']['name'])) {
            return $old_image ?: '/assets/img/no_image.png';
        } else {
            $imgName = basename($_FILES['image']['name']);
            $uploadPath = 'upload/' . $imgName;
            move_uploaded_file($_FILES['image']['tmp_name'], $uploadPath);
            return $uploadPath;
        }
    }
}