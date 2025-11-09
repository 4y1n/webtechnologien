<!DOCTYPE html>
<html lang="en">
<head>
    <?php require_once "includes/head.php"; ?>
    <title>Newsletter</title>
</head>
<body>
    <?php require_once "includes/nav.php"; ?>

    <form method="post" action="logic/formhandler/registration_form.php">
        <div class="mb-3">
            <label for="email" class="form-label">Email address</label>
            <input name="email" type="text" class="form-control" id="email" aria-describedby="emailHelp">
         </div>
        <div class="mb-3 form-check">
            <input name="accept" type="checkbox" class="form-check-input" id="accept">
            <label class="form-check-label" for="accept">Create an account</label>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</body>
</html>