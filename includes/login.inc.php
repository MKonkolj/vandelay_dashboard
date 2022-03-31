<?php

// if(!isset($_POST["submit"])) {
//     header("location: login.php");
//     die();
// }

// grab data
// $email = $_POST["email"];
// $pass = $_POST["pass"];
$email = "admin@vandely.com";
$pass = "admin";


// include classes
include "../classes/connection.php";
include "../classes/login-model.php";
include "../classes/login-controller.php";

$login = new LoginController($email, $pass);
var_dump($login);

// check username and pass
// add errors to $error
// relocate to login or index