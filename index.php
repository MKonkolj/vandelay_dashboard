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
    <title>Dashboard</title>
</head>
<body>
    <h1>Bashboard</h1>
    <a href="logout.php">Log out</a>
    <?php
    var_dump($_SESSION);
    ?>
</body>
</html>