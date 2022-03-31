<?php 
// redirect to index if loggedin
session_start();
if(isset($_SESSION["loggedin"])) {
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
                <input type="text" name="email" placeholder="Email">
                <p class="error"><?php echo $error["email"] ?? "" ?></p>
                <input type="password" name="pass" placeholder="Password">
                <p class="error"><?php echo $error["pass"] ?? "" ?></p>
                <button type="submit">LOG IN</button>
            </form>
        </div>
    </div>
</body>
</html>