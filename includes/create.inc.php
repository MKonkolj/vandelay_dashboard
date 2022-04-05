<?php 

if(isset($_POST["submit"])) {
    include "../classes/connection.php";
    include "../classes/user-model.php";
    include "../classes/user-controller.php";

    $firstname = trim($_POST["firstname"]);
    $lastname = trim($_POST["lastname"]);
    $position = trim(intval($_POST["position"]));
    $salary = trim(intval($_POST["salary"]));
    $email = trim($_POST["email"]);
    
    $create = new UserController();
    $create->checkName($firstname, "firstname");
    $create->checkName($lastname, "lastname");
    $create->checkSalary($salary);
    $create->checkEmail($email);

    
    if(!empty($create->errors)) {
        session_start();
        $_SESSION["create_form_errors"] = $create->errors;
        $_SESSION["create_form_values"] = ["firstname" => $firstname, 
                                            "lastname" => $lastname, 
                                            "position" => $position, 
                                            "salary" => $salary, 
                                            "email" => $email];
        header("location: ../create.php?error=fieldsnotgood");
    } else {
        $create->createEmployeeInDB($firstname, $lastname, $position, $salary, $email);
        header("location: ../employees.php?employeeadded");
    }

} else {
    header("location: ../login.php?error=formnotsubmitted");
}