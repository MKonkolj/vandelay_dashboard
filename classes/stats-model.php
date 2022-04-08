<?php
// redirect to login if not logged in
if(!isset($_SESSION)) {
    session_start();
}
if(!isset($_SESSION["user_id"])) {
    header("location: ../login.php?error=notloggedin");
}

class StatsModel extends Connection {

    protected function getNumberOfEmployees() : int {
        $stmt = $this->connect()->prepare("SELECT count(employee_id) as numEmployees FROM employees");
        $stmt->execute([]);
        $result = $stmt->fetchAll();

        return intval($result[0]["numEmployees"]);
    }

    protected function getaverageSalary() : float {
        $stmt = $this->connect()->prepare("SELECT avg(salary) as avgSalary FROM employees");
        $stmt->execute([]);
        $result = $stmt->fetchAll();

        return intval($result[0]["avgSalary"]);
    }

    protected function getemployeesPerPosition() : array {
        $stmt = $this->connect()->prepare("SELECT count(employee_id) as num_employees, position_name FROM employees JOIN positions ON employees.position_id=positions.id GROUP BY position_id;");
        $stmt->execute([]);
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $result;
    }
}