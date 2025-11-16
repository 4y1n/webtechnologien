<?php
session_start();

if (!isset($_SESSION["user_logged_in"])) die("Nicht eingeloggt.");

$id = $_POST["id"];
$commentText = trim($_POST["comment"]);

$posts = json_decode(file_get_contents("../posts.json"), true);

foreach ($posts as &$post) {
    if ($post["id"] == $id) {

        if (!isset($post["comments"])) $post["comments"] = [];

        $post["comments"][] = [
            "user" => $_SESSION["username"],
            "text" => $commentText,
            "date" => date("Y-m-d H:i")
        ];

        break;
    }
}

file_put_contents("../posts.json", json_encode($posts, JSON_PRETTY_PRINT));
header("Location: ../posts.php");
exit;
?>