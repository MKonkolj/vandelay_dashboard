<?php
// redirect to login if not logged in
if(!isset($_SESSION)) {
    session_start();
}
if(!isset($_SESSION["user_id"])) {
    header("location: ../login.php?error=notloggedin");
}

class EmployeeTableModel extends Connection {

    protected function getEmployeeArray() : array {
        $stmt = $this->connect()->prepare("SELECT employee_id, firstname, lastname, position_name, salary FROM employees LEFT JOIN positions ON employees.position_id=positions.id ORDER BY salary DESC");
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $result;
    }

    protected function getSelectedEmployeeArray($selected_id) : array {
        $stmt = $this->connect()->prepare("SELECT employee_id, firstname, lastname, position_name, salary FROM employees LEFT JOIN positions ON employees.position_id=positions.id WHERE position_id = ? ORDER BY salary DESC");
        $stmt->execute([$selected_id]);
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $result;
    }

    public function getPositions() : array {
        $stmt = $this->connect()->prepare("SELECT DISTINCT id, position_name FROM positions");
        $stmt->execute();
        $result = $stmt->fetchAll();

        return $result;
    }
}