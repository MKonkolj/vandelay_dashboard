<?php 

class UserModel extends Connection {

    // get user data
    protected function getUserData($email) : array {
        $stmt = $this->connect()->prepare("SELECT employee_id, firstname, lastname, position_id, position_name FROM employees JOIN positions ON employees.position_id = positions.id WHERE email = ?");
        $stmt->execute([$email]);
        $result = $stmt->fetchAll();

        return $result;
    }

    public function deleteEmployee($id) {
        $stmt = $this->connect()->prepare("DELETE FROM employees WHERE employee_id = ?");
        $stmt->execute([$id]);
    }
}