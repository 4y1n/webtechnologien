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
         <p class ="text-center mb-4"><a href="forgot_pw.php">Passwort vergessen</a></p>
</body>
    </html>
