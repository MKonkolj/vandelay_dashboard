<?php
// redirect to login if not logged in
if(!isset($_SESSION)) {
    session_start();
}
if(!isset($_SESSION["user_id"])) {
    header("location: ../login.php?error=notloggedin");
}

class LoginModel extends Connection {

    // getEmail and pass
    protected function getEmailPass($email) : array {
        $stmt = $this->connect()->prepare("SELECT email, password FROM employees WHERE email = ?");
        $stmt->execute([$email]);
        $result = $stmt->fetchAll();

        return $result;
    }
}