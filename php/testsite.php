<?php
require_once '../assets/functions.php';
require_once '../assets/sessioncheck.php';

if (isset($_POST['testGetUserRoom'])) {
    $rooms = getUserRoom($_SESSION['userId']);

    echo "<pre>";
    print_r($rooms);
    echo "</pre>";
}
if (isset($_POST['createRoom'])) {
    $roomName = $_POST['roomName'];
    $createRoom = createRoom($roomName);
}
if (isset($_POST['addRoomUserSubmit'])) {
    $roomId = $_POST['roomIdUserAdd'];
    $roomAddUserId = $_POST['addRoomUser'];
    $role = null;
    addRoomUser($roomId, $roomAddUserId, $role);
}
if (isset($_POST['getRoomNameSubmit'])) {
    $roomId = $_POST['roomIdGetName'];
    $roomName = getRoomName($roomId);
    echo "<pre>";
    print_r($roomName);
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
        <button type="submit" name="testGetUserRoom">Testa getUserRoom</button>
        <br>
        <button type="submit" name="createRoom">Skapa Rum</button>
        <input type="text" name="roomName" placeholder="Namn på rummet">
        <br>
        <button type="submit" name="addRoomUserSubmit">Lägg till användare i rum</button>
        <input type="text" name="addRoomUser" placeholder="Användar Id för den som ska läggas till">
        <input type="text" name="roomIdUserAdd" placeholder="Id för rummet">
        <br>
        <button type="submit" name="getRoomNameSubmit">Get room name</button>
        <input type="text" name="roomIdGetName" placeholder="Enter the Room Id ">
        <br>
        <button type="submit" name></button>
    </form>
</body>

</html>