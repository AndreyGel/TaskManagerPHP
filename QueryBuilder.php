<?php


class QueryBuilder
{
    private $pdo;
    private $table;

    public function __construct($table)
    {
        $this->pdo = new PDO("mysql:host=localhost; dbname=test", "root", "");
        $this->table = $table;
    }

    public function select($select, bool $all, array $data = null, $where = null)
    {
        if ($where === null) {
            $condition = '1 = 1';
        } else {
            $condition = $where . '=:' . $where;
        }

        $sql = "SELECT {$select} FROM {$this->table} WHERE {$condition}";
        $statement = $this->bindHelper($data, $sql, $where);
        $result = $statement->fetchAll(PDO::FETCH_ASSOC);

        return $all ? $result : $result[0];
    }

    public function insert($fields, $data)
    {
        $fieldsArr = array_map('trim', explode(',', $fields));
        $values = ':' . implode(',:', $fieldsArr);
        $fields = implode(',', $fieldsArr);


        $sql = "INSERT INTO {$this->table} ({$fields}) VALUES ({$values})";
        $this->bindHelper($data, $sql);

    }

    public function update($fields, $data, $id)
    {
        $fieldsArr = array_map('trim', explode(',', $fields));
        $set = '';
        foreach ($fieldsArr as $field) {
            $set .= $field . '=:' . $field . ',';
        }
        $set = mb_substr($set, 0, -1);
        $sql = "UPDATE {$this->table} SET {$set} WHERE id = :id";
        $data['id'] = $id;
        $this->bindHelper($data, $sql);
    }

    public function delete($id)
    {
        $sql = "DELETE FROM {$this->table} WHERE id = :id";
        $this->bindHelper($id, $sql);
    }

    private function bindHelper($bindParams, $sql, $bindCondition = null)
    {
        $statement = $this->pdo->prepare($sql);
        if ($bindParams !== null) {
            foreach ($bindParams as $param => $value) {
                if (($param === $bindCondition) || ($bindCondition === null)) {
                    $statement->bindValue(':' . $param, $value);
                }
            }
        }
        $statement->execute();
        return $statement;
    }
}