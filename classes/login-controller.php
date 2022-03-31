<?php

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

        // login user
        $user_data = $this->getUserData($this->email);

        session_start();
        $_SESSION["user_id"] = $user_data[0]["employee_id"];
        $_SESSION["user_firstname"] = $user_data[0]["firstname"];
        $_SESSION["user_lastname"] = $user_data[0]["lastname"];
        $_SESSION["position_id"] = $user_data[0]["position_id"];
        $_SESSION["position_name"] = $user_data[0]["position_name"];

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



    // redirects
    // get user data from model
    // set session storage
    // redirecct to admin index
}








// class LoginCtrl extends Login {
//     private $email;
//     private $pass;

//     public function __construct($email, $pass) {
//         $this->email = $email;
//         $this->pass = $pass;
//     }

//     public function loginUser() {
//         if($this->emptyInput() == false) {
//             //echo "empty input"
//             header("location: ../index.php?error=emptyinput");
//         }

//         $this->getUser($this->email, $this->pass);
//     }

//     private function emptyInput() {
//         $result = "";
//         if(empty($this->email) || empty($this->pass)) {
//             $result = false;
//         } else {
//             $result = true;
//         }
//         return $result;
//     }
// }