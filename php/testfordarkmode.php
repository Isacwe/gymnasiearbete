<?php
session_start();
require_once '../assets/functions.php';
if(isset($_POST['submit'])){
    if(($_POST['username'] != "") && ($_POST['password'] != "")){
        $username = $_POST['username'];
        $password = $_POST['password'];
        if(login($username, $password)){
            $_SESSION['username'] = $username;
            $userInfo = getUserInfo($username);
            echo "<pre>";
print_r($userInfo);
echo "</pre>";
            $_SESSION['displayname'] = $userInfo['displayname'];
            $_SESSION['email'] = $userInfo['email'];
            $_SESSION['createdAt'] = $userInfo['created_At'];
            $_SESSION['userId'] = $userInfo['user_Id'];
            header('Location: chat.php');
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
    <link rel="stylesheet" href="../css/styleSignupLogin.css">
    <link rel="stylesheet" href="../css/styleDarkMode.css">
    <link rel="stylesheet" href="../css/styleLightMode.css">
    <title>Login</title>

    <link href="https://fonts.googleapis.com/css2?family=Baloo+2:wght@800&display=swap" rel="stylesheet">
</head>

<body>
    <div id="page-transition"></div>

    <div class="video-background">
    <video id="background-video" autoplay muted loop playsinline>
        <source src="../files/Videor/wallpaper2.mp4" type="video/mp4">
    </video>
    </div>

    <h2 class="signup-title" id="cloud-text">Login</h2>

    <form method="POST" action="" class="form-group-DarkMode" id="cloud-text">
        <div class="form-field">
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" class="boxStyle-DarkMode" required>
        </div>

        <div class="form-field">
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" class="boxStyle-DarkMode" required>
        </div>

        <a href="signup.php" id="loggaIn">Skapa konto</a>

        <button type="submit" name="submit" class="svampKnapp-DarkMode"></button>
    </form>

    <button id="themes">Change Theme</button>

    <script src="../Javascript/themes.js" defer></script>
    <script src="../Javascript/signupLogin.js"></script>
</body>
</html>
