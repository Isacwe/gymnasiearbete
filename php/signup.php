<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="../css/styleSignup.css">
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

    <h2 class="signup-title">Signup</h2>

    <form method="POST" action="" class="form-group">
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
            <input type="email" id="email" name="email" required>
        </div>

        <div class="form-field">
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>
        </div>

        <button type="submit" name="submit" class="svampKnapp"></button>
    </form>

    <script src="../Javascript/signup.js"></script>
</body>
</html>
