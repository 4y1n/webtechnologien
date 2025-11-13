<!-- includes/nav.php -->
<?php
$filename = basename($_SERVER['SCRIPT_NAME']);

function active($filename, $target) {
    return $filename === $target ? "active" : "";
}
?>

<nav class="navbar navbar-expand-lg bg-body-tertiary mb-4">
  <div class="container">
    <a class="navbar-brand" href="index.php">Grünraum</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" 
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link <?php echo active($filename, "index.php"); ?>" href="index.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link <?php echo active($filename, "overview.php"); ?>" href="overview.php">Dashboard</a>
        </li>
        <li class="nav-item">
<<<<<<< HEAD
=======
          <a class="nav-link <?php echo active($filename, "profile.php"); ?>" href="profile.php">Profil</a>
        </li>
         <li class="nav-item">
          <a class="nav-link <?php echo active($filename, "new_post.php"); ?>" href="new_post.php">Neuer Beitrag</a>
        </li>
        <li class="nav-item">
>>>>>>> 68acd1a3d6d01ba5588b33a770ea709cdfe2f3ef
          <a class="nav-link <?php echo active($filename, "registation.php"); ?>" href="registration.php">Konto erstellen</a>
        </li>
        <li class="nav-item">
          <a class="nav-link <?php echo active($filename, "login.php"); ?>" href="login.php">Anmelden</a>
        </li>
      </ul>
    </div>
  </div>
</nav>
