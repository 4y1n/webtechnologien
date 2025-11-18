<?php
session_start();
$error = "";// Hardcoded demo credentials

$usersFile = "users.json";
if (!file_exists($usersFile)) {
    file_put_contents($usersFile, json_encode([])); // leeres Array, falls Datei fehlt
}
$userList = json_decode(file_get_contents($usersFile), true);
if (!is_array($userList)) $userList = [];

$adminUser = "admin@mail.com";
$adminPass = "admin123";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
$email = trim($_POST['email'] ?? '');
$password = trim($_POST['password'] ?? '');
if ($email === $adminUser && $password === $adminPass) {
$_SESSION["admin_logged_in"] = true;
$_SESSION["username"] = "Admin";

// Set new session variable
header("Location: admin_panel.php");
exit;
// Terminates the script
} $found = false;
    foreach ($userList as $user) {
        if ($user["email"] === $email && password_verify($password, $user["password"])) {
            $_SESSION["user_logged_in"] = true;
            $_SESSION["username"] = $user["username"];
            $_SESSION["profile_img"] = $user["profile_image"] ?? "../assets/img/profile-placeholder.png";
            $found = true;
            header("Location: overview.php"); // z. B. dein User-Dashboard
            exit;
        }
    }
     if (!$found) {
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
