<?php

require_once('EmpDatabaseConnect.php');

class EmployeeQuery {
    public $connection = null;
    public function __construct(EmpDatabaseConnect $db_connect)
    {
        $this->connection = $db_connect->getConnection();
    }

    public function addEmployee($name) {
        $sql = "insert into employees (`name`) values (:name)";
        $statement = $this->connection->prepare($sql);
        $statement->bindParam(':name',$name, PDO::PARAM_STR);
        return $statement->execute();
    }

    public function deleteEmployee($id) {
        $sql = "delete from employees where id = :id";
        $statement = $this->connection->prepare($sql);
        $statement->bindParam(':id',$id, PDO::PARAM_INT);
        $statement->execute();
        return $statement->rowCount() > 0;
    }

    public function updateEmployee($id, $name) {
        $sql = "update employees set `name` = :name where id = :id";
        $statement = $this->connection->prepare($sql);
        $statement->bindParam(':id',$id, PDO::PARAM_INT);
        $statement->bindParam(':name',$name, PDO::PARAM_STR);
        $statement->execute();
        return $statement->rowCount() > 0;
    }

    public function getAllEmployees() {
        $sql = "select * from employees order by `name`";
        $statement = $this->connection->prepare($sql);
        $statement->execute();
        return $statement->fetchAll();
    }
}