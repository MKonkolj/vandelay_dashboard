<?php 

session_start();

if(!isset($_SESSION["loggedIn"])) {
    header("location: ./login.php?error=notloogedin");
}


?>