<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/styleSignup.css">
    <title>Signup</title>
</head>
<body>
    <div id="page-transition"></div>
    <h2>Signup</h2>
    <form method="POST" action="">
        <label for="username">Username:</label>
        <input type="text" id="username" name="username" required>
        <br>

        <label for="displayname">Display Name:</label>
        <input type="text" id="displayname" name="displayname" required>
        <br>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required>
        <br>

        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required>
        <br>

        <button type="submit" name="submit">Signup</button>
    </form>
</body>
</html>

<!--Username, displayname, password, email-->