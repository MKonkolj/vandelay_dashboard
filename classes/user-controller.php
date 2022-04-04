<?php

class UserController extends UserModel {

    private $user_data;
    public $errors;

    public function setUser($email) {

        $user_data = $this->getUserData($email);
    
        session_start();
        $_SESSION["user_id"] = $user_data[0]["employee_id"];
        $_SESSION["user_firstname"] = $user_data[0]["firstname"];
        $_SESSION["user_lastname"] = $user_data[0]["lastname"];
        $_SESSION["position_id"] = $user_data[0]["position_id"];
        $_SESSION["position_name"] = $user_data[0]["position_name"];
    }

    public function deleteEmployee($id) {
        $this->deleteEmployeeFromDB($id);      
        header("location: ../employees.php?employeedeleted");
    }

    public function checkInputs($firstname, $lastname, $position, $salary, $email) {
        
    }
}