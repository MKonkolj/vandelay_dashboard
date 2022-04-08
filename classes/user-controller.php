<?php
// redirect to login if not logged in
if(!isset($_SESSION)) {
    session_start();
}
if(!isset($_SESSION["user_id"])) {
    header("location: ../login.php?error=notloggedin");
}

class UserController extends UserModel {

    public array $errors;

    public function setUser(string $email) : void {

        $user_data = $this->getUserData($email);
    
        session_start();
        $_SESSION["user_id"] = $user_data[0]["employee_id"];
        $_SESSION["user_firstname"] = $user_data[0]["firstname"];
        $_SESSION["user_lastname"] = $user_data[0]["lastname"];
        $_SESSION["position_id"] = $user_data[0]["position_id"];
        $_SESSION["position_name"] = $user_data[0]["position_name"];
    }

    public function deleteEmployee(string $id) : void {
        $this->deleteEmployeeFromDB($id);      
        header("location: ../employees.php?employeedeleted");
    }

    public function addInputError(string $input, string $message) : void {
        $this->errors[$input] = $message;
    }

    public function checkName(string $name, string $field = "name") : void {
        $name = trim($name);
        if(empty($name)) {
            $this->addInputError($field, "Field can't be empty");
        } else if(!preg_match('/[a-zA-Z]/', $name)) {
            $this->addInputError($field, "Can only contain numbers");
        }
    }

    public function checkSalary(float $salary) : void {
        $salary = trim($salary);
        if(empty($salary)) {
            $this->addInputError("salary", "Field can't be empty");
        } else if(!preg_match('/[0-9]/', $salary)) {
            $this->addInputError("salary", "Can only contain numbers");
        }
    }

    public function checkEmail(string $email) : void {
        $email = filter_var($email, FILTER_SANITIZE_EMAIL);
        if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $this->addInputError("email", "Must be a valid email");
        }
    }
}