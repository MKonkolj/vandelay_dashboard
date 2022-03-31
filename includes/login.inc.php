<?php

if(!isset($_POST["submit"])) {
    header("location: login.php");
    die();
}

// include classes
include "classes/login-model.class.php";
include "classes/login-controller.class.php";
// check username and pass
// add errors to $error
// relocate to login or index