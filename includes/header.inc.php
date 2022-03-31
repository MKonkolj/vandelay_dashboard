<?php 
// redirect to login if not logged in
session_start();
if(!isset($_SESSION["user_id"])) {
    header("location: ./login.php?error=notloggedin");
} elseif ($_SESSION["position_id"] !== "1") {
    session_unset();
    session_destroy();
    header("location: ./login.php?error=accessdenied");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./assets/css/main.css">
    <link rel="stylesheet" href="./assets/css/dashboard.css">
    <title>Dashboard</title>
</head>
<body>
    <div class="background">
        <div class="container">
            <header>
                <div class="navigation shadow">
                    <img class="logo" src="./assets/images/Vandelay_logo_small.png" alt="Vandelay logo">
                    <div class="nav-bar">
                        <div class="nav-item"><a href="">Home</a></div>
                        <div class="nav-item"><a href="">Employees</a></div>
                    </div>
                    <div class="user-bar">
                        <div class="user-name"><?php
                            echo $_SESSION["user_firstname"] . " " . $_SESSION["user_lastname"];
                            echo "<br>";
                            echo "(" . $_SESSION["position_name"] . ")"
                        ?></div>
                        <a href="logout.php"><button class="user-logout" >Log out</button></a>
                    </div>
                </div>
            </header>