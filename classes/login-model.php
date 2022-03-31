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
        $stmt = $this->connect()->prepare("SELECT id, firstname, lastname, position_id FROM employees WHERE email = ?");
        $stmt->execute([$email]);
        $result = $stmt->fetchAll();

        return $result;
    }
}