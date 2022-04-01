<?php

class LoginModel extends Connection {

    // getEmail and pass
    protected function getEmailPass($email) : array {
        $stmt = $this->connect()->prepare("SELECT email, password FROM employees WHERE email = ?");
        $stmt->execute([$email]);
        $result = $stmt->fetchAll();

        return $result;
    }
}