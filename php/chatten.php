<?php
session_start();
if(!isset($_SESSION['username'])) {
    header('Location: login.php');
    exit;
}
$currentUser = $_SESSION['displayname'] ?? $_SESSION['username'];
?>

<!DOCTYPE html>
<html lang="sv">
<head>
  <meta charset="UTF-8">
  <title>Chat</title>
  <link rel="stylesheet" href="../css/styleChat.css">

  <link href="https://fonts.googleapis.com/css2?family=Baloo+2:wght@800&display=swap" rel="stylesheet">
</head>
<body>

  <div id="meddelanden"></div>

    <form id="chatt-form">
    <textarea id="text-input" placeholder="Skriv ett meddelande..." required></textarea>
    <p id="charCount">0 / 4001</p>
    <button type="submit" id="submit">Skicka</button>
    
  </form>

  <script>
    const CURRENT_USER = <?php echo json_encode($currentUser); ?>;
  </script>
  
  <script src="../Javascript/dm.js"></script>
</body>
</html>
