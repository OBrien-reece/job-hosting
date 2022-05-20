<?php

class Database {

    private $host = DB_HOST;
    private $user = DB_USER;
    private $pass = DB_PASS;
    private $name = DB_NAME;

    private $stmt;
    private $db;
    private $errors;

    public function __construct() {
        //set DSN
        $dsn = 'mysql:host=' .$this->host. ':dbname=' .$this->name;
        $options = array(
            PDO::ATTR_PERSISTENT => true,
            PDO::ERRMODE_EXCEPTION => PDO::ERRMODE_EXCEPTION,
        );

        try {

            $this->db = new PDO($dsn, $this->user, $this->pass, $options);

        }catch (PDOException $e) {

            $this->errors = $e->getMessage();
            echo $this->errors;
        }
    }

    private function query($sql) {

        $this->stmt = $this->db->prepare($sql);
    }

    private function bind($params, $value, $type = []) {
        if(is_null($type)) {
            switch(true) {
                case is_int($value):
                    $type = PDO::PARAM_INT;
                    break;
                case is_bool($value):
                    $type = PDO::PARAM_BOOL;
                    break;
                case is_null($value):
                    $type = PDO::PARAM_NULL;
                    break;
                default:
                    $type = PDO::PARAM_STR;
            }
        }
        $this->stmt->bindValue($params, $value, $type);
    }

    public function execute() {

        return $this->stmt->execute();
    }

    public function single() {
        $this->execute();
        $this->stmt->fetch(PDO::FETCH_OBJ);
    }

    public function resultSet() {
        $this->execute();
        $this->stmt->fetchAll(PDO::FETCH_OBJ);
    }

    public function rowCount() {

        $this->stmt->rowCount();
    }
}