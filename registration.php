<?php
session_start();

$errors = [];
$success = false;

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $email = trim($_POST["email"] ?? "");
    $username = trim($_POST["username"] ?? "");
    $password = trim($_POST["password"] ?? "");
    $password_confirm = trim($_POST["password_confirm"] ?? "");

    if ($password !== $password_confirm) {
        $errors[] = "Passwörter stimmen nicht überein!";
    }
    $usersFile = "users.json";
    $userList = json_decode(file_get_contents($usersFile), true);
    foreach ($userList as $user) {
        if ($user["email"] === $email) {
            $errors[] = "Diese E-Mail ist bereits registriert!";
        }
    }

    // Wenn keine Fehler → Benutzer speichern
    if (empty($errors)) {
        $newUser = [
            "email" => $email,
            "username" => $username,
            "password" => password_hash($password, PASSWORD_DEFAULT), // sicher
            "profile_image" => "assets/img/profile-placeholder.png"
        ];

        $userList[] = $newUser;
        file_put_contents($usersFile, json_encode($userList, JSON_PRETTY_PRINT));

        $succes = true;
    }
}

    ?>
<!DOCTYPE html>
<html lang="de">
<head>
    <?php require_once "includes/head.php"; ?>
    <title>Konto erstellen</title>
</head>
<body>
    
    <div class="container log-inbox">
    <form method="POST">
        <h3 class="text-center mb-4">Konto erstellen</h3>
        <?php if (!empty($errors)): ?>
            <div class="alert alert-danger">
                <ul>
                <?php foreach ($errors as $e): ?>
                    <li><?= htmlspecialchars($e) ?></li>
                <?php endforeach; ?>
                </ul>
            </div>
        <?php endif ?>

        
        <?php if ($success): ?>
            <div class="alert alert-success">
                Konto erfolgreich erstellt! <a href="login.php">Jetzt einloggen</a>
            </div>
        <?php endif ?>

        <p class ="text-center mb-4">Bereits registriert? <a href="login.php">Anmelden</a></p>
        <div class="mb-3">
            <label class="form-label">E-Mail</label>
            <input type="email" name="email" class="form-control" placeholder="Useremail" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Benutzername</label>
            <input type="text" name="username" class="form-control" placeholder="Benutzername" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Passwort</label>
            <input type="password" name="password" class="form-control" placeholder="••••••••" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Passwort wiederholen</label>
            <input type="password" name="password_confirm" class="form-control" placeholder="••••••••" required>
        </div>

        <button type="submit" class="btn btn-green w-100">Registrieren</button>
    </form>
    </div>


    

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</body>
</html>