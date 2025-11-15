<?php
// adminpage.php
session_start();
// If admin is not logged in, redirect to login page
if (!isset($_SESSION["admin_logged_in"])) {
header("Location: login.php"); }
?>

<!DOCTYPE html>
<html lang="de">
<head>
    <?php require_once "includes/head.php"; ?>
    <title>Adminpage</title>
</head>
<body>
    <?php require_once "includes/nav.php"; ?>
    <h1>Welcome, Admin!</h1>
    
</body>
</html>