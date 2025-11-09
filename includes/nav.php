<!-- includes/nav.php -->
<?php
$filename = basename($_SERVER['SCRIPT_NAME']);

function active($filename, $target) {
    return $filename === $target ? "active" : "";
}
?>

<nav class="navbar navbar-expand-lg bg-body-tertiary mb-4">
  <div class="container">
    <a class="navbar-brand" href="index.php">My App</a>
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
          <a class="nav-link <?php echo active($filename, "overview.php"); ?>" href="overview.php">Overview</a>
        </li>
        <li class="nav-item">
          <a class="nav-link <?php echo active($filename, "progress.php"); ?>" href="progress.php">Progress</a>
        </li>
        <li class="nav-item">
          <a class="nav-link <?php echo active($filename, "newsletter.php"); ?>" href="newsletter.php">Newsletter</a>
        </li>
      </ul>
    </div>
  </div>
</nav>
