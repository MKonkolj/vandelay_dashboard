<?php 
// redirect to index if loggedin
session_start();
if(isset($_SESSION["user_id"])) {
    header("location: index.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./assets/css/main.css">
    <link rel="stylesheet" href="./assets/css/login.css">
    <title>Vandelay login</title>
</head>
<body>
    <div class="background">
        <div class="form-wrapper">
            <form action="includes\login.inc.php" method="POST">
                <img class="logo" src="assets/images/Vandelay_logo_small.png" alt="Vandeley logo">
                <p class="error"><?php 
                
                // a non admin user logging in
                echo ($_SERVER["QUERY_STRING"] == "error=accessdenied") ? "access denied,<br>please contact admin" : "";
                
                ?></p>
                <input type="text" name="email" placeholder="Email">
                <p class="error"><?php 
                
                // email doesnt exist
                echo ($_SERVER["QUERY_STRING"] == "error=emailnotfound") ? "email not found" : "";
                
                ?></p>
                <input type="password" name="pass" placeholder="Password">
                <p class="error"><?php 
                
                // passwords dont match
                echo ($_SERVER["QUERY_STRING"] == "error=passwordincorrect") ? "incorrect password" : "";
                
                ?></p>
                <button type="submit" name="submit">LOG IN</button>
            </form>
        </div>
        <p style="color:white;position:absolute;top:0;left:0;font-size:12px"><?php 
        
        echo "admin@vandelay.com";
        echo "<br>";
        echo "admin";
        
        ?></p>
    </div>
</body>
</html>