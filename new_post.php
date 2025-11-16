<?php
session_start();

if (!isset($_SESSION["admin_logged_in"]) && !isset($_SESSION["user_logged_in"])) {
    // KEIN LOGIN -> zurück zur Login-Seite
    header("Location: login.php");
    exit;
}
?>

<!-- new_post.php -->
<!DOCTYPE html>
<html lang="de">
<head>
  <?php require_once "includes/head.php"; ?>
  <title>Post</title>
</head>
<body>
  <?php require_once "includes/nav.php"; ?>

  <div class="container">
    <h1>Neuer Beitrag</h1>
    <p>Poste hier deinen neuen Beitrag!</p>
  </div>


  <main class="container mt-5">
        <h1>
          
        </h1>

        <form action="logic/formhandler/upload_file.php" method="post" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="text" class="form-label">Text:</label>
                <textarea name="text" id="text" class="form-control" rows="4" placeholder="Schreibe etwas..." required></textarea>
            </div>

            <div class="mb-3">
                <label for="image" class="form-label">Bild hochladen:</label>
                <input type="file" name="image" id="image" class="form-control" accept="image/png, image/jpeg">
            </div>

            <button type="submit" class="btn btn-green">Upload</button>
        </form>
    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI"
        crossorigin="anonymous"></script>
</body>
</html>
