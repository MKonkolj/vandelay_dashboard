<?php

class LoginController extends LoginModel {
    private $email;
    private $pass;

    public function __construct($email, $pass) {
        $this->email = $email;
        $this->pass = $pass;
    }

    // login user
    public function login($email, $pass) {
        
    }
    // get data from model
    // check if password is good
    public function checkPassword($pass) {

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