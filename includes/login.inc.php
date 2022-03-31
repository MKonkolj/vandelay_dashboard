<?php
var_dump($_POST);

if(isset($_POST["submit"])) {
    echo "submitted";

    // grabing data
    $email = $_POST["email"];
    $pass = $_POST["password"];

    // $email = "admin@vandelay.com";
    // $pass = "admin";

    // create loginctrl object
    include "../classes/dbconnect.class.php";
    include "../classes/login.class.php";
    include "../classes/login-ctrl.class.php";
    $login = new LoginCtrl($email, $pass);

    // check errors and login
    var_dump($login);
    $login->loginUser();

    // go back to index
    header("location: ../index.php?error=none");
}