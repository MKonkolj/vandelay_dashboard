<?php 
include "../classes/connection.php";
include "../classes/user-model.php";

if(isset($_POST["submit"])) {
    $firstname = $_POST["firstname"];
    $lastname = $_POST["lastname"];
    $position = intval($_POST["position"]);
    $salary = intval($_POST["salary"]);
    $email = $_POST["email"];
    $id = intval($_SERVER["QUERY_STRING"]);
    
    $create = new UserModel();
    $create->updateEmployeeInDB($firstname, $lastname, $position, $salary, $email, $id);
} else {
    header("location: login.php");
}