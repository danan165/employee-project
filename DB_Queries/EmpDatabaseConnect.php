<?php

class EmpDatabaseConnect {
    private static $instance = null;
    private $db;
    private $host;
    private $username;
    private $password;
    private $database;

    //the database connection is established in the private constructor
    private function __construct() {
        $this->db = new PDO("mysql:host=$this->host;dbname=$this->database",
            $this->username, $this->password);
    }

    public static function getInstance() {
        if (!self::$instance) {
            self::$instance = new EmpDatabaseConnect();
        }
        return self::$instance;
    }

    public function getConnection() {
        return $this->db;
    }
}