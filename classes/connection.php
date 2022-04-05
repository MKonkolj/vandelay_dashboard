<?php 
// redirect to login if not logged in
if(!isset($_SESSION)) {
    session_start();
}
if(!isset($_SESSION["user_id"])) {
    header("location: ../login.php?error=notloggedin");
}

class Connection {
    private string $host = "localhost";
    private $user = "root";
    private $pass = "";
    private $database = "vandelay";
    
    protected function connect() : PDO {
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