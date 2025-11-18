<?php
session_start();
var_dump($_POST);
var_dump($_FILES);
$user = $_SESSION["username"] ?? "Unbekannt";
$text = $_POST['text'] ?? ''; //Holt den Text aus dem Feld
$category = $_POST['category'] ?? '';
if ($text === '') {
    die("Fehler: Text fehlt.");
}
if ($category === '') {
    $category = "Unkategorisiert";
}
$imagePath = ""; // Standard: kein Bild


// Prüfen, ob überhaupt ein Bild ausgewählt wurde
if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {

    $uploadDir = "../../uploads/";

    if (!is_dir($uploadDir)) {
        mkdir($uploadDir, 0777, true);
    }
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
$post = [
    "id" => uniqid("post_"),
    "user" => $user,
    "text" => $text,
    "image" => $imagePath,
    "category" => $category,
    "date" => date("d.m.Y H:i"),
    "likes" => 0,
    "comments" => []
];

// posts.json laden
$postsFile = "../../posts.json";
$posts = [];

if (file_exists($postsFile)) {
    $posts = json_decode(file_get_contents($postsFile), true);
}

// Beitrag hinzufügen
$posts[] = $post;

// speichern
file_put_contents($postsFile, json_encode($posts, JSON_PRETTY_PRINT));

// Weiterleitung
header("Location: ../../index.php");
exit;
?>