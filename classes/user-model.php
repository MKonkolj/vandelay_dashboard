<?php 
// redirect to login if not logged in
if(!isset($_SESSION)) {
    session_start();
}
if(!isset($_SESSION["user_id"])) {
    header("location: ../login.php?error=notloggedin");
}

class UserModel extends Connection {

    // get user data
    protected function getUserData($email) : array {
        $stmt = $this->connect()->prepare("SELECT employee_id, firstname, lastname, position_id, position_name FROM employees JOIN positions ON employees.position_id = positions.id WHERE email = ?");
        $stmt->execute([$email]);
        $result = $stmt->fetchAll();

        return $result;
    }

    public function deleteEmployeeFromDB(int $id) : void {
        $stmt = $this->connect()->prepare("DELETE FROM employees WHERE employee_id = ?");
        $stmt->execute([$id]);
    }

    public function createEmployeeInDB(string $firstname,string $lastname,int $position,int $salary,string $email) {

        $stmt = $this->connect()->prepare("INSERT INTO employees(firstname, lastname, position_id, salary, email) VALUES (:firstname, :lastname, :position, :salary, :email)");
        $stmt->bindParam(":firstname", $firstname, PDO::PARAM_STR);
        $stmt->bindParam(":lastname", $lastname, PDO::PARAM_STR);
        $stmt->bindParam(":position", $position, PDO::PARAM_INT);
        $stmt->bindParam(":salary", $salary, PDO::PARAM_INT);
        $stmt->bindParam(":email", $email, PDO::PARAM_STR);
        $stmt->execute();
    }

    public function updateEmployeeInDB(string $firstname,string $lastname,int $position,int $salary, int $id) {

        $stmt = $this->connect()->prepare("UPDATE employees SET firstname=:firstname, lastname=:lastname, position_id=:position, salary=:salary WHERE employee_id=:id");
        $stmt->bindParam(":firstname", $firstname, PDO::PARAM_STR);
        $stmt->bindParam(":lastname", $lastname, PDO::PARAM_STR);
        $stmt->bindParam(":position", $position, PDO::PARAM_INT);
        $stmt->bindParam(":salary", $salary, PDO::PARAM_INT);
        $stmt->bindParam(":id", $id, PDO::PARAM_INT);
        $stmt->execute();

        header("location: ../employees.php");
    }

    public function getAllEmployees() : array {
        $stmt = $this->connect()->prepare("SELECT employee_id, firstname, lastname, position_id, position_name FROM employees JOIN positions ON employees.position_id = positions.id");
        $stmt->execute();
        $result = $stmt->fetchAll();

        return $result;
    }
}