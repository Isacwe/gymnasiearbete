<?php
require_once 'assets/sessioncheck.php';
session_start();
if(isset($_POST['submit'])){
    if(($_POST['username'] != "") || ($_POST['password'] != "")){
        $username = $_POST['username'];
        $password = hashPass($_POST['password']);
        if(login($username, $password)){
            echo "Login successful";
            $_SESSION['username'] = $username;
            $_SESSION['displayname'] = getUser['displayname'];
            $_SESSION['email'] = getUser['email'];
            $_SESSION['createdAt'] = getUser['createdAt'];
            $_SESSION['userId'] = getUser['userId'];
        } else {
            echo "Invalid username or password";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    
</body>
</html>