<?php 

class Connection {
    private $host = "localhost";
    private $user = "root";
    private $pass = "";
    private $database = "vandelay";
    
    protected function connect() {
        try {
            $dsn = "mysql:host=" . $this->host . ";dbname=" . $this->database;
            $pdo = new PDO($dsn, $this->user, $this->pass);
            return $pdo;
        } catch (PDOException $e) {
            echo "Error!: " . $e->getMessage() . "<br>";
            die();
        }
    }
}