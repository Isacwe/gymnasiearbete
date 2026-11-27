<?php
session_start();
if (!isset($_SESSION['username'])) {
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

  <div class="video-background">
    <video autoplay muted loop playsinline>
      <source src="../files/Videor/wallpaper3.mp4" type="video/mp4">
    </video>
  </div>

  <div class="settings-wrapper">
    <button type="button" id="settings-btn">Settings</button>
    <div id="settings-dropdown" class="hidden">
      <label for="bg-color-picker">Bakgrundsfärg:</label>
      <input type="color" id="bg-color-picker" value="#3660d4">
      
      <label for="bg-opacity-slider">Genomskinlighet:</label>
      <input type="range" id="bg-opacity-slider" min="0" max="1" step="0.05" value="0.5">
    </div>
  </div>

  <div class="chat-container">
    <div id="meddelanden"></div>

    <form id="chatt-form">
      <textarea id="text-input" placeholder="Skriv ett meddelande..." required></textarea>
      <button type="submit" id="submit">Skicka</button>
      <p id="charCount" class="cloud-text">0 / 4001</p>
    </form>
  </div>

  <script>
    const CURRENT_USER = <?php echo json_encode($currentUser); ?>;
  </script>
  <script src="../Javascript/dm.js"></script>
</body>
</html>