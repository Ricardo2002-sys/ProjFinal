<?php
namespace App\Database;

use Connection;
use \PDO;

class QueryBuilder
{
    private $pdo;
    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }
    public function getAll($table, $class = "StdClass")
    {
        $stmt = $this->pdo->prepare("SELECT * FROM $table");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_CLASS, $class);
    }
    public function findById($table, $id, $class = "StdClass")
    {
        $stmt = $this->pdo->prepare("SELECT * FROM $table WHERE id=:id");
        $stmt->setFetchMode(PDO::FETCH_CLASS, $class);
        $stmt->execute(['id' => $id]);
        return $stmt->fetch();
    }
    public function findByField($table, $field, $value, $class = "StdClass")
    {
        $stmt = $this->pdo->prepare("SELECT * FROM $table WHERE $field=:$field");
        $stmt->execute([$field => $value]);
        return $stmt->fetchAll(PDO::FETCH_CLASS, $class);
    }
    public function findFirstByField($table, $field, $value, $class = "StdClass")
    {
        $stmt = $this->pdo->prepare("SELECT * FROM $table WHERE $field=:$field");
        $stmt->setFetchMode(PDO::FETCH_CLASS, $class);
        $stmt->execute([$field => $value]);
        return $stmt->fetch();
    }
    public function deleteById($table, $id)
    {
        $stmt = $this->pdo->prepare("DELETE FROM $table WHERE id=:id");
        $stmt->execute(['id' => $id]);
        return $stmt->rowCount() == 1;
    }
    public function deleteByField($table, $field, $value)
    {
        $stmt = $this->pdo->prepare("DELETE FROM $table WHERE $field=?");
        $stmt->execute([$value]);
        return $stmt->rowCount();
    }
    public function create($table, $attributes)
    {
        $stmt = $this->pdo->prepare("INSERT INTO $table (" .
            implode(",", array_keys($attributes)) .
            ") VALUES (:" . implode(', :', array_keys($attributes)) . ")");
        $stmt->execute($attributes);
    }
    public function update($table, $id, $attributes)
    {
        $query = "UPDATE $table SET ";
        foreach ($attributes as $key => $attribute)
            $query .= "$key=:$key,";
        $query = rtrim($query, ",");
        $query .= ' WHERE id=:id';
        $attributes['id'] = $id;
        $stmt = $this->pdo->prepare($query);
        $stmt->execute($attributes);
        return $stmt->rowCount() == 1;
    }
    public function orderBy($table, $parameter, $dir, $class = "StdClass")
    {
        $stmt = $this->pdo->prepare("SELECT * FROM $table ORDER BY $parameter $dir");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_CLASS, $class);
    }
}