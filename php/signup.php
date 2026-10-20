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

    <h2 class="signup-title reveal-item">Signup</h2>

    <form method="POST" action="" class="form-group">

        <svg class="animated-border" aria-hidden="true">
        <rect x="1" y="1" width="100" height="100" rx="10" ry="10"/>
        </svg>

        <div class="form-field reveal-item">
            <label for="username" class="cloud-text">Username:</label>
            <input type="text" id="username" name="username" required>
        </div>

        <div class="form-field reveal-item">
            <label for="displayname" class="cloud-text">Display Name:</label>
            <input type="text" id="displayname" name="displayname" required>
        </div>

        <div class="form-field reveal-item">
            <label for="email" class="cloud-text">Email:</label>
            <input type="email" id="email" name="email" required>
        </div>

        <div class="form-field reveal-item">
            <label for="password" class="cloud-text">Password:</label>
            <input type="password" id="password" name="password" required>
        </div>

        <button type="submit" name="submit" class="reveal-item">
            Signup
        </button>
    </form>

    <script src="../Javascript/signup.js"></script>
</body>
</html>
