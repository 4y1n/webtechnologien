<?php
session_start();

if (!isset($_SESSION["admin_logged_in"]) && !isset($_SESSION["user_logged_in"])) {
    // KEIN LOGIN -> zurück zur Login-Seite
    header("Location: login.php");
    exit;
}
$username = $_SESSION["username"] ?? "Unbekannt";
    ?>

<!DOCTYPE html>
<html lang="de">
<head>
  <?php require_once "includes/head.php"; ?>
  <title>Home</title>
</head>
<body>

  <?php require_once "includes/nav.php"; ?>
  

  <div class="container">
    <div class="row">
      
      <div class="col-3"><div class="card"><h1>Dashboard</h1></div></div>
      <div class="col-2"><div class="card"><a href="profile.php">Profil bearbeiten</a></div></div>
      <div class="col-2"><div class="card"><a href="new_post.php">Neuen Beitrag erstellen</a></div></div>
      <h3><?= htmlspecialchars($username)?></h3>
      
    </div>
 <div class="row">
  <div class="col-4"><div class="card">Beiträge</div></div>
  <div class="col-4"><div class="card">Kommentare</div></div>
  <div class="col-4"><div class="card">Likes</div></div>
</div>
</div>
</body>
</html>
