<?php
require_once 'assets/sessioncheck.php';
session_start();
$error = false;
if(isset($_POST['submit'])){
    if(($_POST['username'] != "") || ($_POST['displayname'] != "") || ($_POST['password'] != "") || ($_POST['email'] != "")){
        $username = $_POST['username'];
        $displayname = $_POST['displayname'];
        $password = hasPass($_POST['password']);
        if($filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL)){
            echo "Valid email format";
            $emial = $_POST['email'];
        } else {
            echo "Invalid email format";
            $error = true;
        }
        $createdAt = date('Y-m-d H:i:s');
        $login = ["username" => $username, "displayname" => $displayname, "password" => $password, "email" => $email, "createdAt" => $createdAt];
        if(addUser($login)){
            echo "User added successfully";
            $_SESSION['username'] = $username;
            $_SESSION['displayname'] = $displayname;
            $_SESSION['email'] = $email;
$_SESSION['createdAt'] = $createdAt;
            $_SESSION['userId'] = getUserId($username);
        } else {
            echo "Error adding user";
            $error = true;
    }
}
}
?>