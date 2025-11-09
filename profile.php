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
    <div class="row">
        <div class="col-md-4 text-center">
            <img src="../assets/img/profile-placeholder.png" class="img-fluid" alt="Profilbild">
            <button class="btn btn-secondary btn-sm w-100">Profilbild ändern</button>
        </div>
        <div class="col-md-8">
            <form method="POST" action="#">
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
            <form method="POST">
                <!-- Formularfelder -->
                <button type="submit" class="btn btn-green me-2">Speichern</button>
                <button type="reset" class="btn btn-secondary">Abbrechen</button>
            </form>
        </div>
    </div>
</div>
</body>
    </html>