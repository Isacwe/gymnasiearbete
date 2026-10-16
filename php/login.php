<?php
require_once '../assets/functions.php';
if(isset($_POST['submit'])){
    if(($_POST['username'] != "") && ($_POST['password'] != "")){
        $username = $_POST['username'];
        $password = $_POST['password'];
        if(login($username, $password)){
            echo "Login successful";
            $_SESSION['username'] = $username;
            $_SESSION['displayname'] = getUser('displayname');
            $_SESSION['email'] = getUser('email');
            $_SESSION['createdAt'] = getUser('createdAt');
            $_SESSION['userId'] = getUser('userId');
            header('Location: index.php');
        } else {
            echo "Invalid username or password";
        }
    }
}
?>