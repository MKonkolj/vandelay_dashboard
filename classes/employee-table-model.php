<?php

class EmployeeTableModel extends Connection {

    protected function getEmployeeArray() : array {
        $stmt = $this->connect()->prepare("SELECT employee_id, firstname, lastname, position_name, salary FROM employees LEFT JOIN positions ON employees.position_id=positions.id ORDER BY salary DESC");
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $result;
    }

    public function getPositions() : array {
        $stmt = $this->connect()->prepare("SELECT DISTINCT id, position_name FROM positions");
        $stmt->execute();
        $result = $stmt->fetchAll();

        return $result;
    }

    protected function addEmployee() {
        
    }

    protected function updateEmployee() {

    }

    protected function deleteEmployee($employee_id) {
        $stmt = $this->connect()->prepare("DELETE FROM employees WHERE employee_id=$employee_id");
        $stmt->execute([$employee_id]);
        $result = $stmt->fetchAll();

        return $result;
    }

}