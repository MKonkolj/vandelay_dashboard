<?php

class LoginModel extends Connection {

    // getEmail and pass
    protected function getEmailPass($email) : array {
        $stmt = $this->connect()->prepare("SELECT email, password FROM employees WHERE email = ?");
        $stmt->execute([$email]);
        $result = $stmt->fetchAll();

        return $result;
    }
    
    // get user data
    protected function getUserData($email) : array {
        $stmt = $this->connect()->prepare("SELECT employee_id, firstname, lastname, position_id, position_name FROM employees JOIN positions ON employees.position_id = positions.id WHERE email = ?");
        $stmt->execute([$email]);
        $result = $stmt->fetchAll();

        return $result;
    }
}