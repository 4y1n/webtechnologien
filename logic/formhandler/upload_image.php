<?php

var_dump($_POST);
var_dump($_FILES);

$text = $_POST['text'] ?? ''; //Holt den Text aus dem Feld

if (!isset($_FILES['image']) || $_FILES['image']['error'] !== UPLOAD_ERR_OK) {
    die("Fehler beim Hochladen des Bildes."); 
}//Checkt ob ein Bild hoichgeladen wurde


// Upload-Verzeichnis festlegen
$uploadDir = "../../uploads/";

// Falls der Ordner nicht existiert, wird er erstellt
if (!is_dir($uploadDir)) {
    mkdir($uploadDir, 0777, true);
}

$id = str_pad(random_int(0, 9999999999), 10, '0', STR_PAD_LEFT); //id random Nummer vergeben


// Dateiendung beibehalten (z. B. jpg oder png)
$ext = pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION);
$targetPath = $uploadDir . $id . "." . $ext;

// Datei verschieben
if (move_uploaded_file($_FILES['image']['tmp_name'], $targetPath)) {
    echo "<h2>Upload erfolgreich!</h2>";
    echo "<p><strong>Text:</strong> " . htmlspecialchars($text) . "</p>";
    echo "<p><strong>Dateiname:</strong> " . htmlspecialchars($id . "." . $ext) . "</p>";
    echo "<img src='../../uploads/" . htmlspecialchars($id . "." . $ext) . "' alt='Hochgeladenes Bild' style='max-width:300px; margin-top:10px;'>";
} else {
    echo "Fehler beim Speichern der Datei.";
}