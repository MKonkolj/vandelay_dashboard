<?php 
include "../classes/connection.php";
include "../classes/user-model.php";

if(isset($_POST["submit"])) {
    $firstname = $_POST["firstname"];
    $lastname = $_POST["lastname"];
    $position = intval($_POST["position"]);
    $salary = intval($_POST["salary"]);
    $email = $_POST["email"];
    
    $create = new UserModel();
    $create->createEmployeeInDB($firstname, $lastname, $position, $salary, $email);

} else {
    header("location: login.php");
}