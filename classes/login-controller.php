<?php
// redirect to login if not logged in
if(!isset($_SESSION)) {
    session_start();
}
if(!isset($_SESSION["user_id"])) {
    header("location: ../login.php?error=notloggedin");
}

class LoginController extends LoginModel {
    private $email;
    private $pass;

    public function __construct(string $email, string $pass) {
        $this->email = $email;
        $this->pass = $pass;
    }

    // login user
    public function login() {
        // check email and password in db
        $this->checkEmailPass();

        // setUser
        $user = new UserController();
        $user->setUser($this->email);


        header("location: ../index.php");
    }


    private function checkEmailPass() {
        $emailPass = $this->getEmailPass($this->email);

        // no such email in database
        if(empty($emailPass)) {
            header("location: ../login.php?error=emailnotfound");
            die();
        }

        $hashed_pass = $emailPass[0]["password"];

        // passwords dont match
        if(!password_verify($this->pass, $hashed_pass)) {
            header("location: ../login.php?error=passwordincorrect");
            die();
        }
    }
}