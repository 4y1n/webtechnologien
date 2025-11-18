<?php
session_start();

if (!isset($_SESSION["admin_logged_in"]) && !isset($_SESSION["user_logged_in"])) {
    header("Location: ../../../login.php");
    exit;
}

if (!isset($_FILES['profile_img']) || $_FILES['profile_img']['error'] !== UPLOAD_ERR_OK) {
    die("Fehler beim Hochladen des Profilbildes.");
}

// Upload-Ordner
$uploadDir = "../../uploads/profiles/";
if (!is_dir($uploadDir)) mkdir($uploadDir, 0777, true);

// Dateiendung prüfen
$ext = strtolower(pathinfo($_FILES['profile_img']['name'], PATHINFO_EXTENSION));
if (!in_array($ext, ['png','jpg','jpeg'])) {
    die("Nur PNG/JPG erlaubt.");
}

// Dateiname eindeutig (username + timestamp)
$user = $_SESSION["username"] ?? "user";
$filename = $user . "_" . time() . "." . $ext;
$targetPath = $uploadDir . $filename;

// Datei verschieben
if (move_uploaded_file($_FILES['profile_img']['tmp_name'], $targetPath)) {
    // Session aktualisieren
    $_SESSION["profile_img"] = "uploads/profiles/" . $filename;

    // Zurück zu profile.php mit Erfolgsmeldung
    header("Location: ../../profile.php?success=1");
    exit;
} else {
    die("Fehler beim Speichern der Datei.");
}