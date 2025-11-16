<?php
session_start();

$id = $_POST["id"] ?? null;
if (!$id) die("Fehler: Keine ID.");

$posts = json_decode(file_get_contents("../posts.json"), true);

foreach ($posts as &$post) {
    if ($post["id"] == $id) {
        $post["likes"] = ($post["likes"] ?? 0) + 1;
        break;
    }
}

file_put_contents("../posts.json", json_encode($posts, JSON_PRETTY_PRINT));
header("Location: ../posts.php");
exit;
?>