<?php 
include "../classes/connection.php";
include "../classes/user-model.php";
include "../classes/user-controller.php";

if(isset($_POST["submit"])) {
    $firstname = trim($_POST["firstname"]);
    $lastname = trim($_POST["lastname"]);
    $position = intval($_POST["position"]);
    $salary = intval(trim($_POST["salary"]));
    $id = intval($_SERVER["QUERY_STRING"]);
    
    $update = new UserController();
    $update->checkName($firstname, "firstname");
    $update->checkName($lastname, "lastname");
    $update->checkSalary($salary);

    if(!empty($update->errors)) {
        session_start();
        $_SESSION["update_form_errors"] = $update->errors;
        $_SESSION["update_form_values"] = ["firstname" => $firstname, 
                                            "lastname" => $lastname, 
                                            "position" => $position, 
                                            "salary" => $salary, 
                                            "email" => $email];
        header("location: ../update.php?$id");
    } else {
        $update->updateEmployeeInDB($firstname, $lastname, $position, $salary, $id);
        header("location: ../employees.php?employeeadded");
    }
} else {
    header("location: login.php");
}