<?php
// must be logged in to access
session_start();
if(!isset($_SESSION["user_id"])){
    header("location: login.php");
}

include "../classes/connection.php";
include "../classes/user-model.php";
include "../classes/user-controller.php";

$delete = new UserController();
$delete->deleteEmployee($_SERVER["QUERY_STRING"]);