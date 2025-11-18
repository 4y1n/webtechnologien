<?php
session_start();

if (!isset($_SESSION["admin_logged_in"]) && !isset($_SESSION["user_logged_in"])) {
    
    header("Location: login.php");
    exit;
}
$profileImg = $_SESSION["profile_img"] ?? "../assets/img/profile-placeholder.png";
?>
<!DOCTYPE html>
<html lang="de">
<head>
    <?php require_once "includes/head.php"; ?>
    <title>Profil</title>
</head>
<body>
    <?php require_once "includes/nav.php"; ?>
    <div class="container profile-box">
        <h3>Profileinstellungen</h3>
       
     <form action="logic/formhandler/upload_profile.php" method="post" enctype="multipart/form-data">
    <div class="row">
        <div class="col-md-4 text-center">
            <img src="<?= htmlspecialchars($profileImg) ?>" class="img-fluid rounded-circle mb-3 profile-img-preview" alt="Profilbild">
                <input type="file" name="profile_img" id="profile_img" class="d-none" accept="image/png, image/jpeg">
            <label for="profile_img" class="btn btn-secondary btn-green w-100">Profilbild ändern</label>
        </div>

        <div class="col-md-8">
                <div class="mb-3">
                    <label class="form-label">E-Mail</label>
                    <input type="email" class="form-control" placeholder="Useremail">
                </div>

                <div class="mb-3">
                    <label class="form-label">Benutzername</label>
                    <input type="text" name="username" class="form-control" placeholder="Benutzername">
                </div>

                <div class="mb-3">
                    <label class="form-label">Altes Passwort</label>
                    <input type="password" name="old_password" class="form-control" placeholder="••••••••">
                </div>

                <div class="mb-3">
                    <label class="form-label">Neues Passwort</label>
                    <input type="password" name="new_password" class="form-control" placeholder="••••••••">
                </div>

                <div class="mb-3">
                    <label class="form-label">Neues Passwort bestätigen</label>
                    <input type="password" name="new_password_confirm" class="form-control" placeholder="••••••••">
                </div>

        <div class="col-md-8">

                <button type="submit" class="btn btn-green me-2">Speichern</button>
                
            </form>
        </div>
    </div>
</div>
</body>
    </html>