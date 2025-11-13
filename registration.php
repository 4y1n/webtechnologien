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
        <p class ="text-center mb-4">Bereits registriert? <a href="login.php">Anmelden</a></p>
        <div class="mb-3">
            <label class="form-label">E-Mail</label>
            <input type="email" name="email" class="form-control" placeholder="name@beispiel.de" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Benutzername</label>
            <input type="text" name="username" class="form-control" placeholder="Dein Name" required>
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