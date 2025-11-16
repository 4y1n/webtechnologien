<?php
session_start();

// Zugriff nur für eingeloggte Benutzer
if (!isset($_SESSION["admin_logged_in"]) && !isset($_SESSION["user_logged_in"])) {
    header("Location: login.php");
    exit();
}

// Dateien anlegen, falls sie fehlen
if (!file_exists("posts.json")) {
    file_put_contents("posts.json", "[]");
}
if (!is_dir("uploads")) {
    mkdir("uploads");
}

// Text übernehmen
$text = trim($_POST["text"] ?? "");
$imagePath = null;

// Bild speichern
if (!empty($_FILES["image"]["name"])) {
    $file = $_FILES["image"];
    $ext = strtolower(pathinfo($file["name"], PATHINFO_EXTENSION));

    // Nur jpg und png zulassen
    if (in_array($ext, ["jpg", "jpeg", "png"])) {

        $newFilename = uniqid("img_", true) . "." . $ext;
        $target = "uploads/" . $newFilename;

        if (move_uploaded_file($file["tmp_name"], $target)) {
            $imagePath = $target;
        }
    }
}

// Posts laden
$posts = json_decode(file_get_contents("posts.json"), true);

// Neuen Post erstellen
$newPost = [
    "user" => $_SESSION["username"] ?? "Unbekannt",
    "text" => $text,
    "image" => $imagePath,
    "date" => date("Y-m-d H:i:s")
];

$posts[] = $newPost;

// JSON speichern
file_put_contents("posts.json", json_encode($posts, JSON_PRETTY_PRINT));

header("Location: index.php");
exit();
?>