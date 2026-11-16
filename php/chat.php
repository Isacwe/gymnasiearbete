<?php
require_once '../assets/functions.php';

$id = 1;

if (isset($_POST['submit'])) {
    $rooms = getUserRoom($id);

    echo "<pre>";
    print_r($rooms);
    echo "</pre>";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <title>Chat</title>
</head>
<body>
    <form method="POST">
        <button type="submit" name="submit">Testa getUserRoom</button>
    </form>
</body>
</html>