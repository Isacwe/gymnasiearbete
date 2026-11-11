<?php
require_once '../assets/functions.php';
session_start();
$error = false;
if(isset($_POST['submit'])){
    if(($_POST['username'] != "") || ($_POST['displayname'] != "") || ($_POST['password'] != "") || ($_POST['email'] != "")){
        $username = $_POST['username'];
        $displayname = $_POST['displayname'];
        $password = hashPass($_POST['password']);
        if(filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL)){
            echo "Valid email format";
            $email = $_POST['email'];
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
            header('Location: chat.php');
        } else {
            echo "Error adding user";
            $error = true;
    }
}
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/styleSignupLogin.css">
    <title>Signup</title>

    <link href="https://fonts.googleapis.com/css2?family=Baloo+2:wght@800&display=swap" rel="stylesheet">
</head>

<body>
    <div id="page-transition"></div>

    <div class="video-background">
    <video autoplay muted loop playsinline>
        <source src="../files/Videor/wallpaper3.mp4" type="video/mp4">
    </video>
    </div>

    <h2 class="signup-title" id="cloud-text">Signup</h2>

    <form method="POST" action="" class="form-group-signup" id="cloud-text">

        <div class="form-field">
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" required>
        </div>

        <div class="form-field">
            <label for="displayname">Display Name:</label>
            <input type="text" id="displayname" name="displayname" required>
        </div>

        <div class="form-field">
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" placeholder="enter valid email" required >
        </div>

        <div class="form-field">
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>
        </div>

        <a href="login.php" id="loggaIn">Logga in</a>

        <button type="submit" name="submit" class="svampKnapp"></button>
    </form>

    <script src="../Javascript/signupLogin.js"></script>
</body>
</html>
