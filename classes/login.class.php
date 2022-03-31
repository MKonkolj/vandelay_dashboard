<?php
echo "login here";
class Login extends DBConnect {

    protected function getUser($email, $pass){
        $stmt = $this->connect()->prepare("SELECT * FROM employees WHERE email = ?;");

        if(!$stmt->execute(array($email))) {
            $stmt = null;
            header("location: ../index.php?error=stmtfailed");
            exit();
        }

        if($stmt->rowCount() == 0) {
            $stmt = null;
            header("location: ../index.php?error=usernotfound");
            exit();
        }

        $pass_hashed = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $check_pass = password_verify($pass, $pass_hashed[0]["password"]);

        if($check_pass == false) {
            $stmt = null;
            header("location: ../index.php?error=wrongpassword");
            exit();
        } else if($check_pass == true) {
            $stmt = $this->connect()->prepare("SELECT * FROM employees WHERE email = ?;");

            if(!$stmt->execute(array($email))) {
                $stmt = null;
                header("location: ../index.php?error=stmtfailed");
                exit();
            }

            if($stmt->rowCount() == 0) {
                $stmt = null;
                header("location: ../index.php?error=usernotfound");
                exit();
            }

            $user = $stmt->fetchAll(PDO::FETCH_ASSOC);

            session_start();
            $_SESSION["userid"] = $user[0]["id"];
            $_SESSION["username"] = $user[0]["firstname"];
        }

        $stmt = null;
    }



}