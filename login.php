<?php
session_start();
$error = "";// Hardcoded demo credentials
$adminUser = "admin@mail.com";
$adminPass = "admin123";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
$username = trim($_POST['email'] ?? '');
$password = trim($_POST['password'] ?? '');
if ($username === $adminUser && $password === $adminPass) {
$_SESSION["admin_logged_in"] = true;
// Set new session variable
header("Location: admin_panel.php");
exit;
// Terminates the script
} else {
$error = "E-mail oder Passwort ist falsch!";
}
}
?>

<!DOCTYPE html>
<html lang="de">
<head>
    <?php require_once "includes/head.php"; ?>
    <title>Anmelden</title>
</head>
<body>
    
     <div class="container log-inbox">
    <form method="POST">
        <h3 class="text-center mb-4">Anmelden</h3>
        <?php if (!empty($error)): ?>
            <div class="alert alert-danger">
                <?= $error ?>
            </div>
        <?php endif; ?>
        <p class ="text-center mb-4">Noch kein Konto? <a href="registration.php">Registrieren</a></p>
        <div class="mb-3">
            <label class="form-label">E-Mail</label>
            <input type="email" name="email" class="form-control" placeholder="Useremail" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Passwort</label>
            <input type="password" name="password" class="form-control" placeholder="••••••••" required>
        </div>
         <button type="submit" class="btn btn-green w-100">Anmelden</button>
</form>
</body>
    </html>
