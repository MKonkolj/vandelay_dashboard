<?php

if(!isset($_POST["submit"])) {
    header("location: ../login.php?error=usernotloggedin");
    die();
}

// grab data
$email = $_POST["email"];
$pass = $_POST["pass"];


// include classes
include "../classes/connection.php";
include "../classes/login-model.php";
include "../classes/login-controller.php";
include "../classes/user-model.php";
include "../classes/user-controller.php";

// instaciate LoginController
$login = new LoginController($email, $pass);
// login user
$login->login();