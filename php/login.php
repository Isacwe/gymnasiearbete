<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/styleSignupLogin.css">
    <title>Login</title>

    <link href="https://fonts.googleapis.com/css2?family=Baloo+2:wght@800&display=swap" rel="stylesheet">
</head>

<body>
    <div id="page-transition"></div>

    <div class="video-background">
    <video autoplay muted loop playsinline>
        <source src="../files/Videor/wallpaper3.mp4" type="video/mp4">
    </video>
    </div>

    <h2 class="signup-title" id="cloud-text">Login</h2>

    <form method="POST" action="" class="form-group-login" id="cloud-text">
        <div class="form-field">
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" required>
        </div>

        <div class="form-field">
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>
        </div>

        <a href="signup.php" id="skapaKonto">Skapa konto</a>

        <button type="submit" name="submit" class="svampKnapp"></button>
    </form>

    <script src="../Javascript/signupLogin.js"></script>
</body>
</html>
